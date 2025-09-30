# SDUI Admin Panel - Quick Start Guide

## 🚀 Quick Setup (5 Minutes)

### Step 1: Run Migrations
```bash
php artisan migrate
```

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

### Example Usage in Flutter

```dart
import 'package:http/http.dart' as http;
import 'dart:convert';

Future<Map<String, dynamic>> fetchSDUIConfig(String role, String screen) async {
  final response = await http.get(
    Uri.parse('https://your-domain.com/api/sdui/config?role=$role&screen=$screen'),
  );

  if (response.statusCode == 200) {
    return json.decode(response.body);
  } else {
    throw Exception('Failed to load SDUI config');
  }
}

// Usage
void loadDashboard() async {
  try {
    final config = await fetchSDUIConfig('field-executive', 'dashboard');
    final components = config['data']['components'];
    
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

### 1. Create a Page
1. Go to **App UI Settings > Pages**
2. Click **Create Page**
3. Fill in:
   - Title: "My Dashboard"
   - Slug: "my-dashboard" (auto-generated)
   - Screen Type: "dashboard"
   - Status: Active ✓
   - Roles: Select "Field Executive"
4. Click **Create Page**

### 2. Add Components
1. Click **Edit** on your new page
2. Click **Add Component**
3. Select type: "header"
4. Enter props:
```json
{
  "title": "Welcome to Dashboard",
  "subtitle": "Manage your tasks",
  "alignment": "center"
}
```
5. Click **Add Component**

### 3. Test in Flutter
```
GET /api/sdui/config?role=field-executive&screen=dashboard
```

---

## 📋 Common Component Examples

### Header Component
```json
{
  "title": "Welcome Back",
  "subtitle": "Sign in to continue",
  "alignment": "center",
  "style": {
    "fontSize": 24,
    "fontWeight": "bold",
    "color": "#000000"
  }
}
```

### Button Component
```json
{
  "label": "Submit",
  "action": "api_call",
  "endpoint": "/api/submit",
  "method": "POST",
  "style": {
    "backgroundColor": "#007bff",
    "textColor": "#ffffff",
    "borderRadius": 8,
    "width": "100%"
  }
}
```

### Input Component
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

### Card Component
```json
{
  "title": "Today's Tasks",
  "content": "You have 5 pending tasks",
  "action": "navigate",
  "route": "/tasks",
  "style": {
    "backgroundColor": "#f8f9fa",
    "padding": 16,
    "borderRadius": 8
  }
}
```

---

## 🔧 Configuration

### Enable Caching
1. Go to **App UI Settings > Settings**
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

### Available Roles
- Field Executive
- Engineer
- Delivery Man
- Customer
- Admin

### Assign Roles to Pages
1. Edit a page
2. Check the roles you want to assign
3. Leave empty for all roles
4. Click **Update Page**

### Assign Roles to Components
1. Edit a component
2. Check the roles you want to assign
3. Leave empty to inherit from page
4. Click **Update Component**

---

## 🔄 Version Control

### View Version History
1. Edit a page or component
2. Check the **Version History** panel on the right
3. See all previous versions with timestamps

### Revert to Previous Version
1. Click the **Revert** button next to any version
2. Confirm the action
3. The page/component will be restored

---

## 🐛 Troubleshooting

### Components not showing?
- ✓ Check if page is active
- ✓ Verify role assignments
- ✓ Ensure components are active
- ✓ Clear cache

### Cannot access admin panel?
- ✓ Login with admin account
- ✓ Check user has admin or Super Admin role

### JSON errors?
- ✓ Validate JSON syntax
- ✓ Remove trailing commas
- ✓ Use double quotes for keys

---

## 📚 Next Steps

1. Read the full documentation: `SDUI_ADMIN_PANEL_README.md`
2. Create pages for each role
3. Test API endpoints with Postman
4. Integrate with your Flutter app
5. Configure caching for production

---

## 🆘 Need Help?

- Check the full documentation
- Review sample data in the database
- Contact the development team

**Happy Building! 🎉**

