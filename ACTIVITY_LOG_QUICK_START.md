# Activity Log - Quick Start Guide

## Access the Activity Logs

**URL**: http://127.0.0.1:8000/crm/activity-logs

## What's Been Implemented

✅ **Spatie Activity Log Package** - Installed and configured
✅ **Database Table** - `activity_log` table created
✅ **7 Models Tracked** - User, Customer, Lead, Engineer, Meet, Quotation, DeliveryMan
✅ **Automatic Logging** - All CRUD operations are logged automatically
✅ **IP Address Tracking** - Every activity includes IP address and user agent
✅ **Search Functionality** - Search by user name, role, or activity
✅ **Pagination** - 15 records per page
✅ **Responsive Table** - Displays: User, Role, Action, Module, Date & Time, IP Address

## How It Works

### Automatic Logging

When you perform any of these actions on tracked models, they're automatically logged:

```php
// Creating a customer - logs "Customer created"
$customer = Customer::create([...]);

// Updating a lead - logs "Lead updated"
$lead->update(['status' => 'Qualified']);

// Deleting an engineer - logs "Engineer deleted"
$engineer->delete();
```

### What Gets Logged

Each activity log includes:
- **Who**: The user who performed the action
- **What**: The action (created, updated, deleted)
- **When**: Date and time
- **Where**: IP address and user agent
- **Which**: The model and its changes

### Viewing Logs

1. Navigate to: http://127.0.0.1:8000/crm/activity-logs
2. Use the search bar to filter by user name or role
3. View paginated results with all activity details

## Manual Logging (Optional)

For custom activities not tied to model events:

```php
use App\Helpers\ActivityLogger;

// Log a custom activity
ActivityLogger::log(
    'module_name',
    'User performed custom action',
    $model,
    ['additional' => 'data']
);

// Log authentication
ActivityLogger::logAuth('logged in');
```

## Testing

Generate sample activity logs:

```bash
php artisan db:seed --class=ActivityLogSeeder
```

## Tracked Models

1. **User** - name, email, phone, status
2. **Customer** - first_name, last_name, email, phone, customer_type, status
3. **Lead** - first_name, last_name, email, phone, company_name, status
4. **Engineer** - first_name, last_name, email, phone, designation, department
5. **Meet** - meet_title, client_name, meeting_type, date, status
6. **Quotation** - lead_id, quotation_number, amount, status
7. **DeliveryMan** - first_name, last_name, email, phone, assigned_area, status

## Adding More Models

To track activities on additional models:

1. Add the trait and import:
```php
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class YourModel extends Model
{
    use LogsActivity;
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['field1', 'field2', 'field3'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => "YourModel {$eventName}");
    }
}
```

## Maintenance

Clean old logs (older than 365 days):

```bash
php artisan activitylog:clean
```

## Configuration

Edit `config/activitylog.php` to customize:
- Enable/disable logging
- Change retention period
- Modify table name
- Set default log name

## Files Modified/Created

### Created Files:
- `config/activitylog.php` - Configuration
- `database/migrations/*_create_activity_log_table.php` - Database migrations
- `app/Providers/ActivityLogServiceProvider.php` - Auto IP logging
- `app/Helpers/ActivityLogger.php` - Helper class
- `database/seeders/ActivityLogSeeder.php` - Test data seeder
- `ACTIVITY_LOG_IMPLEMENTATION.md` - Full documentation

### Modified Files:
- `app/Models/User.php` - Added LogsActivity trait
- `app/Models/Customer.php` - Added LogsActivity trait
- `app/Models/Lead.php` - Added LogsActivity trait
- `app/Models/Engineer.php` - Added LogsActivity trait
- `app/Models/Meet.php` - Added LogsActivity trait
- `app/Models/Quotation.php` - Added LogsActivity trait
- `app/Models/DeliveryMan.php` - Added LogsActivity trait
- `app/Http/Controllers/ActivityLogController.php` - Fetch and display logs
- `resources/views/crm/activity-logs/index.blade.php` - Display table
- `bootstrap/providers.php` - Registered ActivityLogServiceProvider
- `composer.json` - Added spatie/laravel-activitylog package

## Support

For detailed documentation, see: `ACTIVITY_LOG_IMPLEMENTATION.md`

For package documentation: https://spatie.be/docs/laravel-activitylog

