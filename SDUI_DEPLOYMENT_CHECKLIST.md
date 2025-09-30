# SDUI Admin Panel - Deployment Checklist

## 📋 Pre-Deployment Checklist

### ✅ Code Review
- [ ] All files are committed to version control
- [ ] No sensitive data in code (API keys, passwords, etc.)
- [ ] Environment variables are properly configured
- [ ] Code follows Laravel best practices

### ✅ Database Setup
- [ ] Run migrations: `php artisan migrate`
- [ ] Verify all 7 tables are created
- [ ] Check indexes are properly created
- [ ] Backup existing database (if applicable)

### ✅ Seed Data
- [ ] Run role seeder: `php artisan db:seed --class=SduiRoleSeeder`
- [ ] Run sample data seeder: `php artisan db:seed --class=SduiSampleDataSeeder`
- [ ] Verify roles are created in `roles` table
- [ ] Verify sample pages and components are created

### ✅ Admin User Setup
- [ ] Ensure at least one admin user exists
- [ ] Assign admin or Super Admin role to user
- [ ] Test login with admin credentials
- [ ] Verify admin can access `/admin/sdui/pages`

### ✅ Configuration
- [ ] Review `.env` file settings
- [ ] Configure cache driver (Redis recommended for production)
- [ ] Set `APP_ENV=production` for production
- [ ] Set `APP_DEBUG=false` for production
- [ ] Configure `APP_URL` correctly

### ✅ Permissions
- [ ] Set proper file permissions (755 for directories, 644 for files)
- [ ] Ensure `storage/` and `bootstrap/cache/` are writable
- [ ] Run: `php artisan storage:link` if needed

### ✅ Dependencies
- [ ] Run: `composer install --optimize-autoloader --no-dev` (production)
- [ ] Verify Spatie Laravel Permission is installed
- [ ] Verify php-flasher is installed
- [ ] Check PHP version (8.2+ required)

---

## 🚀 Deployment Steps

### Step 1: Database Migration
```bash
# Backup existing database first!
php artisan migrate

# Expected output: 7 new tables created
# - sdui_pages
# - sdui_components
# - sdui_page_role
# - sdui_component_role
# - sdui_page_versions
# - sdui_component_versions
# - sdui_settings
```

### Step 2: Seed Initial Data
```bash
# Create roles
php artisan db:seed --class=SduiRoleSeeder

# Create sample data (optional, but recommended for testing)
php artisan db:seed --class=SduiSampleDataSeeder
```

### Step 3: Clear Caches
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

### Step 4: Test Admin Panel Access
1. Navigate to: `http://your-domain.com/admin/sdui/pages`
2. Login with admin credentials
3. Verify you can see the SDUI admin panel
4. Check sidebar menu shows "App UI Settings"

### Step 5: Configure Settings
1. Go to: `/admin/sdui/settings`
2. Click "Initialize Defaults" if settings are empty
3. Configure:
   - Enable caching: `true` (recommended for production)
   - Cache TTL: `3600` (1 hour)
   - Require authentication: `true` (recommended)
   - Rate limit: `60` (per minute)
4. Click "Save Settings"

### Step 6: Create Your First Page
1. Go to: `/admin/sdui/pages`
2. Click "Create Page"
3. Create a test page with components
4. Verify it appears in the list

### Step 7: Test API Endpoints
```bash
# Test config endpoint
curl "http://your-domain.com/api/sdui/config?role=field-executive&screen=dashboard"

# Expected: JSON response with page and components

# Test screens endpoint
curl "http://your-domain.com/api/sdui/screens"

# Expected: JSON response with list of screens

# Test component types endpoint
curl "http://your-domain.com/api/sdui/component-types"

# Expected: JSON response with component types
```

---

## 🧪 Testing Checklist

### Admin Panel Testing
- [ ] Can create a new page
- [ ] Can edit existing page
- [ ] Can delete page (soft delete)
- [ ] Can restore deleted page
- [ ] Can add components to page
- [ ] Can reorder components (drag-and-drop)
- [ ] Can edit component
- [ ] Can delete component
- [ ] Version history displays correctly
- [ ] Can revert to previous version
- [ ] Settings page loads and saves
- [ ] Search and filters work
- [ ] Role assignment works

### API Testing
- [ ] `/api/sdui/config` returns correct data
- [ ] Role-based filtering works
- [ ] Screen-based filtering works
- [ ] Caching works (check `cached` field in response)
- [ ] `/api/sdui/screens` returns all screens
- [ ] `/api/sdui/component-types` returns types
- [ ] Admin-only endpoints require authentication

### Security Testing
- [ ] Non-admin users cannot access admin panel
- [ ] CSRF protection works on forms
- [ ] SQL injection protection (Laravel handles this)
- [ ] XSS protection (Laravel handles this)
- [ ] Rate limiting works (if configured)

### Performance Testing
- [ ] Page load times are acceptable
- [ ] API response times are fast
- [ ] Caching reduces database queries
- [ ] No N+1 query problems

---

## 🔧 Post-Deployment Configuration

### 1. Configure Caching (Recommended)
```bash
# Install Redis (if not already installed)
# Ubuntu/Debian:
sudo apt-get install redis-server

# Update .env
CACHE_DRIVER=redis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

# Restart services
php artisan config:cache
```

### 2. Set Up Queue Workers (Optional)
If you plan to add background jobs:
```bash
# Update .env
QUEUE_CONNECTION=redis

# Start queue worker
php artisan queue:work --daemon
```

### 3. Configure Logging
```bash
# Update .env
LOG_CHANNEL=daily
LOG_LEVEL=error
```

### 4. Set Up Monitoring
- Monitor API response times
- Monitor database query performance
- Monitor cache hit rates
- Set up error tracking (e.g., Sentry)

---

## 📱 Flutter App Integration

### 1. Update API Base URL
```dart
// In your Flutter app
const String baseUrl = 'https://your-domain.com';
```

### 2. Implement SDUI Renderer
```dart
// Create a widget factory for component types
Widget buildComponent(Map<String, dynamic> component) {
  switch (component['type']) {
    case 'header':
      return HeaderWidget(props: component['props']);
    case 'button':
      return ButtonWidget(props: component['props']);
    case 'input':
      return InputWidget(props: component['props']);
    // ... add other types
    default:
      return SizedBox.shrink();
  }
}
```

### 3. Test with Sample Data
- Use the sample pages created by seeder
- Test role-based filtering
- Test screen-based filtering
- Verify all component types render correctly

---

## 🔒 Security Hardening

### Production Security Checklist
- [ ] Set `APP_DEBUG=false` in `.env`
- [ ] Set `APP_ENV=production` in `.env`
- [ ] Use HTTPS (SSL certificate)
- [ ] Configure CORS properly
- [ ] Set secure session cookies
- [ ] Enable rate limiting
- [ ] Regular security updates
- [ ] Database backups configured

### Recommended .env Settings for Production
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

# Security
SESSION_SECURE_COOKIE=true
SESSION_SAME_SITE=strict

# Cache
CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis

# Database
DB_CONNECTION=mysql
# ... your database settings
```

---

## 📊 Monitoring and Maintenance

### Daily Tasks
- [ ] Check error logs
- [ ] Monitor API response times
- [ ] Check cache hit rates

### Weekly Tasks
- [ ] Review version history table size
- [ ] Check database performance
- [ ] Review user activity logs

### Monthly Tasks
- [ ] Database backup verification
- [ ] Security updates
- [ ] Performance optimization review
- [ ] Clean up old versions (if needed)

### Maintenance Commands
```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Clear SDUI cache via API
curl -X POST http://your-domain.com/api/sdui/clear-cache \
  -H "Authorization: Bearer YOUR_ADMIN_TOKEN"

# Optimize for production
php artisan optimize
```

---

## 🆘 Troubleshooting

### Issue: Cannot access admin panel
**Solution:**
1. Check if user is logged in
2. Verify user has admin or Super Admin role
3. Check middleware configuration in `bootstrap/app.php`
4. Clear route cache: `php artisan route:clear`

### Issue: API returns empty data
**Solution:**
1. Check if pages exist in database
2. Verify pages are active (`is_active = 1`)
3. Check role assignments
4. Clear cache: `POST /api/sdui/clear-cache`

### Issue: Components not showing
**Solution:**
1. Check if components are active
2. Verify component order is correct
3. Check role assignments on components
4. Verify JSON props are valid

### Issue: Version history not working
**Solution:**
1. Check if version tables exist
2. Verify model boot methods are working
3. Check created_by and updated_by fields

### Issue: Drag-and-drop not working
**Solution:**
1. Check if SortableJS is loaded
2. Verify JavaScript console for errors
3. Check if reorder route is accessible
4. Clear browser cache

---

## 📞 Support Resources

### Documentation
- Full Documentation: `SDUI_ADMIN_PANEL_README.md`
- Quick Start Guide: `SDUI_QUICK_START.md`
- Implementation Summary: `SDUI_IMPLEMENTATION_SUMMARY.md`

### Laravel Resources
- Laravel Documentation: https://laravel.com/docs
- Spatie Permission: https://spatie.be/docs/laravel-permission
- Laravel Sanctum: https://laravel.com/docs/sanctum

### Community
- Laravel Forums: https://laracasts.com/discuss
- Stack Overflow: Tag `laravel`
- GitHub Issues: (your repository)

---

## ✅ Final Verification

Before going live, verify:
- [ ] All migrations ran successfully
- [ ] Sample data is created
- [ ] Admin panel is accessible
- [ ] API endpoints work correctly
- [ ] Caching is configured
- [ ] Security settings are applied
- [ ] Documentation is available
- [ ] Team is trained on usage
- [ ] Backup system is in place
- [ ] Monitoring is configured

---

## 🎉 Deployment Complete!

Once all items are checked, your SDUI Admin Panel is ready for production use.

**Next Steps:**
1. Train your team on using the admin panel
2. Create pages for each role
3. Test thoroughly with Flutter app
4. Monitor performance and user feedback
5. Iterate and improve

**Good luck! 🚀**

---

**Deployment Date:** _____________
**Deployed By:** _____________
**Version:** 1.0.0

