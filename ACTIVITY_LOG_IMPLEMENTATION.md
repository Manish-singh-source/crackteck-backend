# Activity Log Implementation Guide

## Overview
This document describes the implementation of Spatie Activity Log package in the Laravel CRM application. The activity logs are accessible at: `http://127.0.0.1:8000/crm/activity-logs`

## Package Information
- **Package**: `spatie/laravel-activitylog` (v4.10.2)
- **Documentation**: https://spatie.be/docs/laravel-activitylog

## Installation Steps Completed

### 1. Package Installation
```bash
composer require spatie/laravel-activitylog
```

### 2. Published Configuration and Migrations
```bash
php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="activitylog-migrations"
php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="activitylog-config"
```

### 3. Run Migrations
```bash
php artisan migrate
```

This created the `activity_log` table with the following structure:
- `id` - Primary key
- `log_name` - Category/module name
- `description` - Activity description
- `subject_type` - Model class name
- `subject_id` - Model ID
- `causer_type` - User model class
- `causer_id` - User ID who performed the action
- `properties` - JSON field for additional data (IP, user agent, etc.)
- `event` - Event type (created, updated, deleted)
- `batch_uuid` - For batch operations
- `created_at` - Timestamp

## Models Updated

The following models have been updated to track activities:

### 1. User Model (`app/Models/User.php`)
- Added `LogsActivity` trait
- Tracks: name, email, phone, status
- Description: "User {event}"

### 2. Customer Model (`app/Models/Customer.php`)
- Added `LogsActivity` trait
- Tracks: first_name, last_name, email, phone, customer_type, status
- Description: "Customer {event}"

### 3. Lead Model (`app/Models/Lead.php`)
- Added `LogsActivity` trait
- Tracks: first_name, last_name, email, phone, company_name, status
- Description: "Lead {event}"

### 4. Engineer Model (`app/Models/Engineer.php`)
- Added `LogsActivity` trait
- Tracks: first_name, last_name, email, phone, designation, department
- Description: "Engineer {event}"

### 5. Meet Model (`app/Models/Meet.php`)
- Added `LogsActivity` trait
- Tracks: meet_title, client_name, meeting_type, date, status
- Description: "Meeting {event}"

### 6. Quotation Model (`app/Models/Quotation.php`)
- Added `LogsActivity` trait
- Tracks: lead_id, quotation_number, amount, status
- Description: "Quotation {event}"

### 7. DeliveryMan Model (`app/Models/DeliveryMan.php`)
- Added `LogsActivity` trait
- Tracks: first_name, last_name, email, phone, assigned_area, status
- Description: "Delivery Man {event}"

## Controller Implementation

### ActivityLogController (`app/Http/Controllers/ActivityLogController.php`)

The controller fetches activity logs with the following features:

1. **Eager Loading**: Loads `causer` (user) and `subject` (model) relationships
2. **Search Functionality**: Searches by user name, email, description, or log name
3. **Pagination**: 15 records per page
4. **Latest First**: Orders by most recent activities

```php
public function index(Request $request)
{
    $query = Activity::with(['causer', 'subject'])
        ->latest();

    // Search functionality
    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->whereHas('causer', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            })
            ->orWhere('description', 'like', "%{$search}%")
            ->orWhere('log_name', 'like', "%{$search}%");
        });
    }

    $activities = $query->paginate(15);
    return view('/crm/activity-logs/index', compact('activities'));
}
```

## View Implementation

### Activity Logs Table (`resources/views/crm/activity-logs/index.blade.php`)

The view displays activity logs in a table with the following columns:

1. **User**: Name or email of the user who performed the action (or "System" if no user)
2. **Role**: User's role(s) from Spatie Permission package
3. **Action**: Event type with color-coded badges:
   - Created: Green badge
   - Updated: Blue badge
   - Deleted: Red badge
   - Other: Gray badge
4. **Module**: Activity description or model class name
5. **Date & Time**: Formatted as "Y-m-d h:i A"
6. **IP Address**: IP address from properties or current request IP

Features:
- Responsive table design
- Pagination with entry count
- Empty state message
- Search functionality
- Sort options

## Automatic IP Address Logging

### ActivityLogServiceProvider (`app/Providers/ActivityLogServiceProvider.php`)

A custom service provider automatically adds IP address and user agent to all activity logs:

```php
Activity::saving(function (Activity $activity) {
    $properties = $activity->properties ?? collect();
    
    if (!$properties->has('ip')) {
        $activity->properties = $properties->put('ip', request()->ip());
    }
    
    if (!$properties->has('user_agent')) {
        $activity->properties = $properties->put('user_agent', request()->userAgent());
    }
});
```

This provider is registered in `bootstrap/providers.php`.

## Helper Class

### ActivityLogger (`app/Helpers/ActivityLogger.php`)

A helper class for manual activity logging with IP address:

```php
// Log custom activity
ActivityLogger::log('module_name', 'Description', $model, ['key' => 'value']);

// Log authentication activity
ActivityLogger::logAuth('logged in', $user);
```

## Testing

### Seeder (`database/seeders/ActivityLogSeeder.php`)

A seeder is provided to generate sample activity logs for testing:

```bash
php artisan db:seed --class=ActivityLogSeeder
```

This creates:
- Login activities for users
- Profile update activities
- Customer creation activities
- Lead creation activities

## Usage Examples

### Automatic Logging (via Model Events)

When you create, update, or delete a tracked model, activities are logged automatically:

```php
// This will automatically log "Customer created"
$customer = Customer::create([
    'first_name' => 'John',
    'last_name' => 'Doe',
    'email' => 'john@example.com',
    // ...
]);

// This will automatically log "Customer updated"
$customer->update(['status' => 'active']);

// This will automatically log "Customer deleted"
$customer->delete();
```

### Manual Logging

For custom activities not tied to model events:

```php
use App\Helpers\ActivityLogger;

// Log a custom activity
ActivityLogger::log(
    'crm',
    'User exported customer list',
    null,
    ['export_format' => 'csv', 'record_count' => 100]
);

// Log authentication
ActivityLogger::logAuth('logged in');
```

### Advanced Manual Logging

```php
activity('order')
    ->causedBy(auth()->user())
    ->performedOn($order)
    ->withProperties([
        'old_status' => 'pending',
        'new_status' => 'completed',
        'ip' => request()->ip()
    ])
    ->log('Order status changed');
```

## Route

The activity logs are accessible via:
- **URL**: `http://127.0.0.1:8000/crm/activity-logs`
- **Route Name**: `activity-logs.index`
- **Controller**: `ActivityLogController@index`

## Configuration

The configuration file is located at `config/activitylog.php`:

- **enabled**: Enable/disable activity logging (default: true)
- **delete_records_older_than_days**: Auto-cleanup old logs (default: 365 days)
- **default_log_name**: Default category name (default: 'default')
- **activity_model**: Model class for activities
- **table_name**: Database table name (default: 'activity_log')

## Maintenance

### Clean Old Logs

To remove old activity logs:

```bash
php artisan activitylog:clean
```

This removes logs older than the configured days (365 by default).

## Future Enhancements

Potential improvements for the activity log system:

1. **Filtering**: Add filters by date range, user, module, action type
2. **Export**: Add CSV/Excel export functionality
3. **Detailed View**: Create a modal or page to view full activity details
4. **Real-time Updates**: Implement WebSocket for live activity feed
5. **Dashboard Widget**: Add recent activities widget to CRM dashboard
6. **Email Notifications**: Send alerts for critical activities
7. **Activity Restore**: Add ability to restore deleted records from activity log

## Troubleshooting

### Activities Not Being Logged

1. Check if `ACTIVITY_LOGGER_ENABLED` is set to `true` in `.env`
2. Verify the model has `LogsActivity` trait
3. Ensure `getActivitylogOptions()` method is implemented
4. Check database connection

### IP Address Not Showing

1. Verify `ActivityLogServiceProvider` is registered in `bootstrap/providers.php`
2. Check if the provider's `boot()` method is being called
3. Ensure the application is receiving requests with proper IP headers

### Performance Issues

1. Add database indexes on frequently queried columns
2. Implement log rotation/archiving
3. Use queue for logging in high-traffic scenarios
4. Consider using a separate database for activity logs

## Support

For issues or questions:
- Spatie Documentation: https://spatie.be/docs/laravel-activitylog
- GitHub Issues: https://github.com/spatie/laravel-activitylog/issues

