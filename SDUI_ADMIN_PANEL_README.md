# Laravel SDUI Admin Panel - Complete Documentation

## Overview

This is a comprehensive Server-Driven UI (SDUI) admin panel system built with Laravel for managing dynamic Flutter app interfaces. The system allows non-technical administrators to create, manage, and version UI components without requiring app updates.

## Features

✅ **Full CRUD Operations** - Create, Read, Update, Delete pages and components
✅ **Soft Delete & Restore** - Safely delete and restore pages/components
✅ **Version Control** - Track changes and revert to previous versions
✅ **Role-Based Access** - Assign pages/components to specific user roles
✅ **Drag-and-Drop Reordering** - Easily reorder components within pages
✅ **JSON Props Editor** - Configure component properties with JSON
✅ **API for Flutter** - RESTful API endpoints for mobile app integration
✅ **Caching System** - Configurable caching for improved performance
✅ **User-Friendly Interface** - Intuitive admin panel for non-technical users

## Installation

### Step 1: Run Migrations

```bash
php artisan migrate
```

This will create the following tables:
- `sdui_pages` - Stores page definitions
- `sdui_components` - Stores component definitions
- `sdui_page_role` - Page-role relationships
- `sdui_component_role` - Component-role relationships
- `sdui_page_versions` - Page version history
- `sdui_component_versions` - Component version history
- `sdui_settings` - System settings

### Step 2: Seed Default Data

```bash
php artisan db:seed --class=SduiRoleSeeder
php artisan db:seed --class=SduiSampleDataSeeder
```

This will create:
- Default roles (Field Executive, Engineer, Delivery Man, Customer, Admin)
- Sample login page with components
- Sample dashboards for different roles
- Default system settings

### Step 3: Access the Admin Panel

Navigate to: `http://your-domain.com/admin/sdui/pages`

**Note:** You must be logged in with an admin or Super Admin role to access the SDUI admin panel.

## Database Schema

### Pages Table (`sdui_pages`)
- `id` - Primary key
- `title` - Page title
- `slug` - URL-friendly identifier
- `description` - Page description
- `screen_type` - Screen type for API filtering (e.g., 'login', 'dashboard')
- `is_active` - Active status
- `created_by` - User who created the page
- `updated_by` - User who last updated the page
- `deleted_at` - Soft delete timestamp
- `created_at`, `updated_at` - Timestamps

### Components Table (`sdui_components`)
- `id` - Primary key
- `page_id` - Foreign key to pages
- `type` - Component type (header, text, button, etc.)
- `props` - JSON properties
- `order` - Display order
- `is_active` - Active status
- `created_by` - User who created the component
- `updated_by` - User who last updated the component
- `deleted_at` - Soft delete timestamp
- `created_at`, `updated_at` - Timestamps

## Admin Panel Usage

### Managing Pages

#### Create a New Page
1. Navigate to **App UI Settings > Pages**
2. Click **Create Page**
3. Fill in the form:
   - **Title**: Display name of the page
   - **Slug**: URL-friendly identifier (auto-generated if left empty)
   - **Description**: Optional description
   - **Screen Type**: Used for API filtering (e.g., 'login', 'dashboard')
   - **Status**: Active/Inactive toggle
   - **Assign Roles**: Select which roles can access this page
4. Click **Create Page**

#### Edit a Page
1. Click the **Edit** button on any page
2. Update page details in the left panel
3. Manage components in the right panel:
   - **Add Component**: Click the "Add Component" button
   - **Reorder**: Drag components using the grip icon
   - **Edit**: Click the edit icon on any component
   - **Delete**: Click the delete icon
4. View **Version History** in the left panel
5. Click **Revert** to restore a previous version

#### Delete and Restore Pages
- **Soft Delete**: Click the delete button (page is hidden but not permanently removed)
- **Restore**: Check "Show deleted pages" and click the restore button
- **Permanent Delete**: Click the permanent delete button (cannot be undone)

### Managing Components

#### Component Types

The system supports the following component types:

1. **Header** - Display titles and subtitles
   ```json
   {
     "title": "Welcome",
     "subtitle": "Sign in to continue",
     "alignment": "center",
     "style": {
       "fontSize": 24,
       "fontWeight": "bold",
       "color": "#000000"
     }
   }
   ```

2. **Text** - Display text content
   ```json
   {
     "content": "Your text here",
     "alignment": "left",
     "style": {
       "fontSize": 14,
       "color": "#333333"
     }
   }
   ```

3. **Button** - Interactive buttons
   ```json
   {
     "label": "Sign In",
     "action": "api_call",
     "endpoint": "/api/auth/login",
     "method": "POST",
     "style": {
       "backgroundColor": "#007bff",
       "textColor": "#ffffff",
       "borderRadius": 8
     }
   }
   ```

4. **Input** - Form input fields
   ```json
   {
     "type": "email",
     "name": "email",
     "label": "Email Address",
     "placeholder": "Enter your email",
     "required": true,
     "validation": ["email"]
   }
   ```

5. **Image** - Display images
   ```json
   {
     "url": "https://example.com/image.jpg",
     "alt": "Image description",
     "width": "100%",
     "height": "auto"
   }
   ```

6. **Card** - Content cards
7. **List** - List of items
8. **Form** - Complete forms
9. **Divider** - Visual separators
10. **Spacer** - Empty space

#### Add a Component
1. Navigate to a page's edit screen
2. Click **Add Component**
3. Select component type
4. Enter JSON props
5. Set display order
6. Optionally assign roles
7. Click **Add Component**

#### Reorder Components
- Use drag-and-drop on the page edit screen
- Changes are saved automatically

### Settings Management

Navigate to **App UI Settings > Settings** to configure:

#### General Settings
- `app_name` - Application name
- `api_version` - API version
- `enable_caching` - Enable/disable caching
- `cache_ttl` - Cache time-to-live in seconds

#### Validation Settings
- `strict_mode` - Enable strict validation
- `allow_unknown_types` - Allow unknown component types

#### Security Settings
- `require_authentication` - Require auth for SDUI API
- `rate_limit` - API rate limit per minute

## API Documentation

### For Flutter App Integration

#### Get SDUI Configuration

**Endpoint:** `GET /api/sdui/config`

**Query Parameters:**
- `role` (optional) - Role slug (e.g., 'field-executive', 'engineer')
- `screen` (optional) - Screen slug (e.g., 'login', 'dashboard')
- `page_id` (optional) - Direct page ID

**Example Request:**
```
GET /api/sdui/config?role=field-executive&screen=dashboard
```

**Example Response:**
```json
{
  "success": true,
  "data": {
    "page": {
      "id": 1,
      "title": "Field Executive Dashboard",
      "slug": "field-executive-dashboard",
      "description": "Dashboard for field executives",
      "screen_type": "dashboard"
    },
    "components": [
      {
        "id": 1,
        "type": "header",
        "props": {
          "title": "Dashboard",
          "subtitle": "Welcome to your workspace"
        },
        "order": 0
      },
      {
        "id": 2,
        "type": "card",
        "props": {
          "title": "Today's Tasks",
          "content": "You have 5 pending tasks"
        },
        "order": 1
      }
    ]
  },
  "cached": false
}
```

#### Get All Screens

**Endpoint:** `GET /api/sdui/screens`

**Query Parameters:**
- `role` (optional) - Filter by role slug

**Example Response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "title": "Login Screen",
      "slug": "login",
      "screen_type": "login",
      "description": "Universal login screen"
    },
    {
      "id": 2,
      "title": "Dashboard",
      "slug": "dashboard",
      "screen_type": "dashboard",
      "description": "Main dashboard"
    }
  ]
}
```

#### Get Component Types

**Endpoint:** `GET /api/sdui/component-types`

Returns all available component types with their schemas.

#### Clear Cache (Admin Only)

**Endpoint:** `POST /api/sdui/clear-cache`

**Headers:**
- `Authorization: Bearer {token}`

Requires admin role and authentication.

## Versioning System

### How It Works

1. **Automatic Versioning**: Every time a page or component is updated, a new version is automatically created
2. **Version History**: View all previous versions in the admin panel
3. **Revert**: Click the revert button to restore any previous version
4. **Full Snapshot**: Each version stores a complete snapshot of the page/component including all relationships

### Reverting to a Previous Version

1. Navigate to the page/component edit screen
2. View the **Version History** panel
3. Click **Revert** on the desired version
4. Confirm the action
5. The page/component will be restored to that version

## Role-Based Access

### Page-Level Roles
- Assign roles to pages to control which users can see them
- Leave empty to make the page available to all roles
- Multiple roles can be assigned to a single page

### Component-Level Roles
- Optionally assign roles to individual components
- Useful for showing/hiding specific UI elements based on user role
- If no roles are assigned, the component is visible to all users who can access the page

## Best Practices

1. **Use Descriptive Slugs**: Make slugs meaningful (e.g., 'login-screen', 'engineer-dashboard')
2. **Test JSON Props**: Validate JSON before saving to avoid errors
3. **Version Control**: Review version history before making major changes
4. **Role Assignment**: Carefully assign roles to ensure proper access control
5. **Component Order**: Use logical ordering for better UX
6. **Caching**: Enable caching for production to improve performance
7. **Backup**: Regularly backup your database

## Troubleshooting

### Issue: Components not showing in Flutter app
- Check if the page is active (`is_active = true`)
- Verify role assignments match the user's role
- Check if components are active
- Clear cache: `POST /api/sdui/clear-cache`

### Issue: Cannot access admin panel
- Ensure you're logged in
- Verify you have admin or Super Admin role
- Check middleware configuration in `bootstrap/app.php`

### Issue: JSON validation errors
- Validate JSON syntax using a JSON validator
- Ensure required fields are present for each component type
- Check for trailing commas or syntax errors

## File Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/
│   │   │   ├── SduiPageController.php
│   │   │   ├── SduiComponentController.php
│   │   │   └── SduiSettingController.php
│   │   └── Api/
│   │       └── SDUIController.php
│   └── Middleware/
│       └── AdminMiddleware.php
├── Models/
│   ├── SduiPage.php
│   ├── SduiComponent.php
│   ├── SduiPageVersion.php
│   ├── SduiComponentVersion.php
│   └── SduiSetting.php
database/
├── migrations/
│   ├── 2025_09_30_000001_create_sdui_pages_table.php
│   ├── 2025_09_30_000002_create_sdui_components_table.php
│   ├── 2025_09_30_000003_create_sdui_page_role_table.php
│   ├── 2025_09_30_000004_create_sdui_component_role_table.php
│   ├── 2025_09_30_000005_create_sdui_page_versions_table.php
│   ├── 2025_09_30_000006_create_sdui_component_versions_table.php
│   └── 2025_09_30_000007_create_sdui_settings_table.php
└── seeders/
    ├── SduiRoleSeeder.php
    └── SduiSampleDataSeeder.php
resources/views/admin/sdui/
├── pages/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
├── components/
│   ├── index.blade.php
│   └── edit.blade.php
└── settings/
    └── index.blade.php
routes/
├── web.php (Admin routes)
└── api.php (Flutter API routes)
```

## Support

For issues or questions, please contact the development team or refer to the Laravel documentation at https://laravel.com/docs

---

**Version:** 1.0.0
**Last Updated:** 2025-09-30
**Author:** Development Team

