# SDUI Page-Level Architecture Documentation

## 🎯 Overview

The SDUI (Server-Driven UI) system has been refactored to use a **page-level architecture** where complete UI schemas are stored as JSON within each page record, rather than managing components as separate database entities.

## 🔄 Architecture Change

### Previous Architecture (Component-Based)
- Pages stored in `sdui_pages` table
- Components stored separately in `sdui_components` table
- Many-to-one relationship between components and pages
- Component roles managed via pivot table
- Required multiple database queries to build a page

### New Architecture (Page-Level)
- Pages stored in `sdui_pages` table with `json_schema` column
- Complete UI definition stored as JSON within each page
- Single database query to retrieve entire page configuration
- Component roles embedded within JSON schema
- Simplified data model and faster API responses

## 📊 Database Schema

### `sdui_pages` Table
```sql
- id (primary key)
- title (string)
- slug (string, unique)
- description (text, nullable)
- screen_type (string, nullable)
- json_schema (JSON) ← NEW: Complete page UI definition
- is_active (boolean)
- created_by (integer)
- updated_by (integer)
- deleted_at (timestamp, nullable)
- created_at (timestamp)
- updated_at (timestamp)
```

### JSON Schema Structure
```json
{
  "version": "1.0",
  "metadata": {
    "title": "Page Title",
    "description": "Page description",
    "author": "System"
  },
  "components": [
    {
      "id": "unique_component_id",
      "type": "header|input|button|card|image|text",
      "order": 0,
      "props": {
        "title": "Component Title",
        "...": "component-specific properties"
      },
      "roles": ["Field Executive", "Engineer"]  // Optional role restrictions
    }
  ],
  "layout": {
    "type": "vertical|horizontal|grid",
    "spacing": 16,
    "padding": 20
  }
}
```

## 🔧 API Endpoints

### Get Page Configuration
```http
GET /api/sdui/config?screen=login&role=field-executive
```

**Response:**
```json
{
  "success": true,
  "data": {
    "page": {
      "id": 1,
      "title": "Login Screen",
      "slug": "login",
      "description": "User authentication",
      "screen_type": "login"
    },
    "schema": {
      "version": "1.0",
      "metadata": {...},
      "components": [...],
      "layout": {...}
    }
  },
  "cached": false
}
```

### Get All Screens
```http
GET /api/sdui/screens?role=engineer
```

**Response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "title": "Login Screen",
      "slug": "login",
      "screen_type": "login",
      "description": "User authentication"
    }
  ]
}
```

### Get Component Types (Reference)
```http
GET /api/sdui/component-types
```

Returns available component types and their prop schemas for reference.

### Clear Cache
```http
POST /api/sdui/clear-cache
Authorization: Bearer {token}
```

## 🎨 Admin Panel Usage

### Creating a Page

1. Navigate to **Admin → SDUI Management → Pages**
2. Click **"Create New Page"**
3. Fill in page details:
   - **Title**: Display name
   - **Slug**: URL-friendly identifier
   - **Description**: Optional description
   - **Screen Type**: For API filtering (e.g., "login", "dashboard")
   - **Status**: Active/Inactive toggle
   - **Roles**: Assign page-level role restrictions
4. Edit the **JSON Schema** in the editor:
   ```json
   {
     "version": "1.0",
     "metadata": {
       "title": "My Page",
       "description": "Page description"
     },
     "components": [
       {
         "id": "header_1",
         "type": "header",
         "order": 0,
         "props": {
           "title": "Welcome",
           "subtitle": "Get started"
         }
       }
     ],
     "layout": {
       "type": "vertical",
       "spacing": 16
     }
   }
   ```
5. Click **"Create Page"**

### Editing a Page

1. Navigate to the page list
2. Click **"Edit"** on any page
3. Modify page details or JSON schema
4. Click **"Update Page"**
5. **Version History**: Previous versions are automatically saved and can be restored

### Version Control

- Every update creates a new version snapshot
- View version history in the right sidebar
- Click **"Revert"** to restore any previous version
- Versions include complete JSON schema state

### Duplicate a Page

- Click **"Duplicate"** to create a copy with "-copy" suffix
- Useful for creating similar pages or testing variations

## 📱 Flutter Integration

### Fetching Page Configuration

```dart
import 'package:http/http.dart' as http;
import 'dart:convert';

Future<Map<String, dynamic>> fetchPageConfig(String screenType, String role) async {
  final response = await http.get(
    Uri.parse('https://your-api.com/api/sdui/config?screen=$screenType&role=$role'),
  );
  
  if (response.statusCode == 200) {
    final data = json.decode(response.body);
    return data['data']['schema']; // Complete JSON schema
  } else {
    throw Exception('Failed to load page config');
  }
}
```

### Rendering Components

```dart
Widget buildComponent(Map<String, dynamic> component) {
  switch (component['type']) {
    case 'header':
      return HeaderWidget(props: component['props']);
    case 'input':
      return InputWidget(props: component['props']);
    case 'button':
      return ButtonWidget(props: component['props']);
    case 'card':
      return CardWidget(props: component['props']);
    default:
      return SizedBox.shrink();
  }
}

Widget buildPage(Map<String, dynamic> schema) {
  final components = schema['components'] as List;
  final layout = schema['layout'];
  
  // Sort by order
  components.sort((a, b) => a['order'].compareTo(b['order']));
  
  return ListView.builder(
    padding: EdgeInsets.all(layout['padding'] ?? 16.0),
    itemCount: components.length,
    itemBuilder: (context, index) {
      return Padding(
        padding: EdgeInsets.only(bottom: layout['spacing'] ?? 16.0),
        child: buildComponent(components[index]),
      );
    },
  );
}
```

### Role-Based Filtering

The API automatically filters components based on the `role` parameter. Components without role restrictions are shown to all users.

## 🔐 Security & Caching

### Role-Based Access Control

- **Page-level roles**: Assigned via admin panel, controls entire page visibility
- **Component-level roles**: Defined in JSON schema `roles` array, filters individual components
- If no roles specified, accessible to all users

### Caching

- Responses are cached based on role, screen, and page_id
- Default TTL: 3600 seconds (1 hour)
- Configure in **Settings** page
- Clear cache via API or admin panel

## 🚀 Migration from Component-Based Architecture

### Automatic Migration

Run the migration to convert existing component-based pages:

```bash
php artisan migrate
```

The migration `2025_09_30_100001_migrate_components_to_json_schema.php` automatically:
1. Reads existing components for each page
2. Builds JSON schema structure
3. Stores in `json_schema` column
4. Preserves component roles in JSON

### Manual Verification

After migration, verify pages in admin panel:
1. Check that all pages have valid JSON schemas
2. Test API endpoints
3. Verify role-based filtering works correctly

## 📝 Best Practices

### JSON Schema Design

1. **Use unique component IDs**: Helps with debugging and updates
2. **Keep order sequential**: 0, 1, 2, 3... for predictable rendering
3. **Document metadata**: Include title, description, author
4. **Specify layout**: Define spacing and padding for consistency
5. **Use role arrays**: `["Field Executive", "Engineer"]` for component-level access

### Performance

1. **Enable caching**: Reduces database queries
2. **Minimize schema size**: Only include necessary props
3. **Use appropriate TTL**: Balance freshness vs. performance
4. **Clear cache after updates**: Ensure users see latest changes

### Version Control

1. **Test before publishing**: Use duplicate feature to test changes
2. **Document changes**: Use descriptive version notes
3. **Keep version history**: Don't force-delete pages with history
4. **Revert carefully**: Understand impact before reverting

## 🛠️ Troubleshooting

### Invalid JSON Error

- Validate JSON syntax using online tools
- Check for missing commas, brackets, quotes
- Ensure all required fields are present (version, components)

### Components Not Showing

- Verify `is_active` is true for the page
- Check role-based filtering in JSON schema
- Clear cache and retry
- Check component `order` values

### API Returns 404

- Verify `screen_type` matches query parameter
- Check page is active
- Verify role has access to page
- Check slug is correct

## 📚 Additional Resources

- **Component Schemas**: See `SDUI_COMPONENT_SCHEMAS.md`
- **Quick Start**: See `SDUI_QUICK_START.md`
- **Deployment**: See `SDUI_DEPLOYMENT_CHECKLIST.md`

---

**Last Updated**: 2025-09-30  
**Architecture Version**: 2.0 (Page-Level)

