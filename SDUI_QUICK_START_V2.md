# SDUI Admin Panel - Quick Start Guide (Page-Level Architecture)

## 🚀 Quick Setup (5 Minutes)

This guide will get you up and running with the new **page-level SDUI architecture** in just 5 minutes.

### Step 1: Run Migrations
```bash
php artisan migrate
```

This creates the necessary database tables with the new `json_schema` column.

### Step 2: Seed Default Data
```bash
php artisan db:seed --class=SduiRoleSeeder
php artisan db:seed --class=SduiSampleDataSeeder
```

### Step 3: Access Admin Panel
Navigate to: `http://your-domain.com/admin/sdui/pages`

**Login Required:** You must have admin or Super Admin role

---

## 📱 Flutter App Integration

### API Endpoint
```
GET /api/sdui/config?role={role_slug}&screen={screen_slug}
```

### Example Response (New Format)
```json
{
  "success": true,
  "data": {
    "page": {
      "id": 1,
      "title": "Login Screen",
      "slug": "login",
      "screen_type": "login"
    },
    "schema": {
      "version": "1.0",
      "metadata": {
        "title": "Login",
        "description": "User authentication"
      },
      "components": [
        {
          "id": "header_1",
          "type": "header",
          "order": 0,
          "props": {
            "title": "Welcome Back",
            "subtitle": "Sign in to continue"
          }
        }
      ],
      "layout": {
        "type": "vertical",
        "spacing": 16
      }
    }
  },
  "cached": false
}
```

### Example Usage in Flutter

```dart
import 'package:http/http.dart' as http;
import 'dart:convert';

Future<Map<String, dynamic>> fetchSDUIConfig(String role, String screen) async {
  final response = await http.get(
    Uri.parse('https://your-domain.com/api/sdui/config?role=$role&screen=$screen'),
  );

  if (response.statusCode == 200) {
    final data = json.decode(response.body);
    return data['data']['schema']; // Returns complete JSON schema
  } else {
    throw Exception('Failed to load SDUI config');
  }
}

// Usage
void loadDashboard() async {
  try {
    final schema = await fetchSDUIConfig('field-executive', 'dashboard');
    final components = schema['components'] as List;
    
    // Sort by order
    components.sort((a, b) => a['order'].compareTo(b['order']));
    
    // Render components dynamically
    for (var component in components) {
      renderComponent(component['type'], component['props']);
    }
  } catch (e) {
    print('Error: $e');
  }
}
```

---

## 🎨 Creating Your First Page

### 1. Create a Page with JSON Schema
1. Go to **App UI Settings > SDUI Management > Pages**
2. Click **Create New Page**
3. Fill in page details:
   - **Title**: "My Dashboard"
   - **Slug**: "my-dashboard" (auto-generated)
   - **Screen Type**: "dashboard"
   - **Status**: Active ✓
   - **Roles**: Select "Field Executive"
4. Edit the **JSON Schema** in the editor:

```json
{
  "version": "1.0",
  "metadata": {
    "title": "My Dashboard",
    "description": "Custom dashboard for field executives"
  },
  "components": [
    {
      "id": "header_1",
      "type": "header",
      "order": 0,
      "props": {
        "title": "Welcome to Dashboard",
        "subtitle": "Manage your tasks",
        "alignment": "center"
      }
    },
    {
      "id": "card_tasks",
      "type": "card",
      "order": 1,
      "props": {
        "title": "Today's Tasks",
        "content": "You have 5 pending tasks",
        "action": "navigate",
        "route": "/tasks"
      }
    }
  ],
  "layout": {
    "type": "vertical",
    "spacing": 16,
    "padding": 20
  }
}
```

5. Click **Create Page**

### 2. Test in Flutter
```
GET /api/sdui/config?role=field-executive&screen=dashboard
```

---

## 📋 Complete JSON Schema Examples

### Login Page
```json
{
  "version": "1.0",
  "metadata": {
    "title": "Login",
    "description": "User authentication screen"
  },
  "components": [
    {
      "id": "header_1",
      "type": "header",
      "order": 0,
      "props": {
        "title": "Welcome Back",
        "subtitle": "Sign in to continue",
        "alignment": "center"
      }
    },
    {
      "id": "input_email",
      "type": "input",
      "order": 1,
      "props": {
        "type": "email",
        "name": "email",
        "label": "Email Address",
        "placeholder": "Enter your email",
        "required": true,
        "validation": ["email"]
      }
    },
    {
      "id": "input_password",
      "type": "input",
      "order": 2,
      "props": {
        "type": "password",
        "name": "password",
        "label": "Password",
        "placeholder": "Enter your password",
        "required": true
      }
    },
    {
      "id": "button_login",
      "type": "button",
      "order": 3,
      "props": {
        "label": "Sign In",
        "action": "api_call",
        "endpoint": "/api/auth/login",
        "method": "POST",
        "style": {
          "backgroundColor": "#007bff",
          "textColor": "#ffffff",
          "borderRadius": 8,
          "width": "100%"
        }
      }
    }
  ],
  "layout": {
    "type": "vertical",
    "spacing": 16,
    "padding": 20
  }
}
```

### Dashboard with Role-Based Components
```json
{
  "version": "1.0",
  "metadata": {
    "title": "Dashboard",
    "description": "Main dashboard"
  },
  "components": [
    {
      "id": "header_1",
      "type": "header",
      "order": 0,
      "props": {
        "title": "Dashboard",
        "subtitle": "Welcome back"
      }
    },
    {
      "id": "card_fe_tasks",
      "type": "card",
      "order": 1,
      "props": {
        "title": "Field Tasks",
        "content": "5 pending tasks"
      },
      "roles": ["Field Executive"]
    },
    {
      "id": "card_engineer_orders",
      "type": "card",
      "order": 2,
      "props": {
        "title": "Work Orders",
        "content": "3 active orders"
      },
      "roles": ["Engineer"]
    }
  ],
  "layout": {
    "type": "vertical",
    "spacing": 16
  }
}
```

---

## 🔧 Configuration

### Enable Caching
1. Go to **App UI Settings > SDUI Management > Settings**
2. Enable "Enable Caching"
3. Set "Cache TTL" to 3600 (1 hour)
4. Click **Save Settings**

### Clear Cache
```bash
# Via API (requires admin auth)
POST /api/sdui/clear-cache
Authorization: Bearer {your_token}
```

---

## 🎯 Role-Based Access

### Page-Level Roles
- Assigned in the admin panel when creating/editing a page
- Controls which roles can access the entire page
- Leave empty for all roles

### Component-Level Roles
- Defined in the JSON schema using the `roles` array
- Example: `"roles": ["Field Executive", "Engineer"]`
- Components without roles are shown to all users
- API automatically filters components based on user role

---

## 🔄 Version Control

### Automatic Versioning
- Every page update creates a new version snapshot
- Includes complete JSON schema state
- View history in the right sidebar when editing

### Revert to Previous Version
1. Edit a page
2. View **Version History** in the right sidebar
3. Click **Revert** next to any version
4. Confirm the action
5. The page JSON schema will be restored

---

## 🐛 Troubleshooting

### Page not showing in API?
- ✓ Check if page `is_active` is true
- ✓ Verify `screen_type` matches API query
- ✓ Check role assignments
- ✓ Clear cache

### Invalid JSON error?
- ✓ Validate JSON syntax (use online validator)
- ✓ Ensure all required fields present: `version`, `components`
- ✓ Check component structure: `id`, `type`, `order`, `props`
- ✓ Remove trailing commas
- ✓ Use double quotes for keys

### Components not rendering?
- ✓ Check component `order` values
- ✓ Verify component `type` is supported in Flutter
- ✓ Check role-based filtering in `roles` array
- ✓ Validate `props` structure for each component type

---

## 📚 Next Steps

1. **Read Full Documentation**: `SDUI_PAGE_LEVEL_ARCHITECTURE.md`
2. **Component Reference**: `SDUI_COMPONENT_SCHEMAS.md`
3. **Create pages** for each role and screen type
4. **Test API endpoints** with Postman
5. **Integrate with Flutter app** using provided examples
6. **Configure caching** for production

---

## 🆘 Need Help?

- Check `SDUI_PAGE_LEVEL_ARCHITECTURE.md` for detailed documentation
- Review sample data created by the seeder
- Test API endpoints to understand response structure
- Contact the development team

**Happy Building! 🎉**

