# Mobile API Authentication Documentation

This document describes the API endpoints created for mobile application authentication using Laravel Sanctum.

## Base URL
```
http://your-domain.com/api
```

## Authentication Overview

The API uses Laravel Sanctum for token-based authentication. Users receive an access token upon successful login, which must be included in the Authorization header for protected endpoints.

## API Endpoints

### 1. Login API

**Endpoint:** `POST /api/auth/login`

**Description:** Authenticates user credentials and returns an access token.

**Request Body:**
```json
{
    "email": "user@example.com",
    "password": "password123"
}
```

**Success Response (200):**
```json
{
    "success": true,
    "message": "Login successful",
    "data": {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "user@example.com",
            "username": "johndoe",
            "roles": ["admin"]
        },
        "access_token": "1|token_string_here",
        "token_type": "Bearer"
    }
}
```

**Error Response (401):**
```json
{
    "success": false,
    "message": "The provided credentials do not match our records.",
    "errors": {
        "email": ["The provided credentials are incorrect."]
    }
}
```

**Validation Error (422):**
```json
{
    "success": false,
    "message": "Validation failed",
    "errors": {
        "email": ["The email field is required."],
        "password": ["The password field is required."]
    }
}
```

### 2. Logout API

**Endpoint:** `POST /api/auth/logout`

**Description:** Invalidates the current access token.

**Headers:**
```
Authorization: Bearer {access_token}
```

**Success Response (200):**
```json
{
    "success": true,
    "message": "Logout successful"
}
```

### 3. Get User Information

**Endpoint:** `GET /api/auth/user`

**Description:** Returns authenticated user information.

**Headers:**
```
Authorization: Bearer {access_token}
```

**Success Response (200):**
```json
{
    "success": true,
    "data": {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "user@example.com",
            "username": "johndoe",
            "roles": ["admin"],
            "email_verified_at": null,
            "created_at": "2025-09-08T07:26:35.000000Z",
            "updated_at": "2025-09-08T09:18:30.000000Z"
        }
    }
}
```

## Role-Based Access Control

### Available Roles
- `admin`: Full access to all endpoints
- `user`: Limited access to user-specific endpoints
- `Super Admin`: Highest level access (configured in AppServiceProvider)

### Protected Endpoints Examples

#### Admin Only Endpoint
**Endpoint:** `GET /api/admin/users`
**Required Role:** `admin`

#### User or Admin Endpoint
**Endpoint:** `GET /api/user/profile`
**Required Roles:** `user` or `admin`

### Access Denied Response (403)
```json
{
    "success": false,
    "message": "Access denied. You do not have the required permissions to access this resource.",
    "required_roles": ["admin"],
    "user_roles": ["user"]
}
```

## Error Responses

### Unauthenticated (401)
```json
{
    "success": false,
    "message": "Unauthenticated. Please login to access this resource."
}
```

### Forbidden (403)
```json
{
    "success": false,
    "message": "Access denied. You do not have the required permissions to access this resource.",
    "required_roles": ["admin"],
    "user_roles": ["user"]
}
```

### Server Error (500)
```json
{
    "success": false,
    "message": "An error occurred during login",
    "error": "Error details here"
}
```

## Implementation Details

### Technologies Used
- **Laravel Sanctum**: For API token authentication
- **Spatie Laravel Permission**: For role-based access control
- **Laravel Framework**: Backend framework

### Security Features
- Password hashing using Laravel's built-in hashing
- Token-based authentication
- Role-based access control
- Input validation
- CSRF protection (for web routes)

### Database Tables
- `users`: User information
- `personal_access_tokens`: Sanctum tokens
- `roles`: User roles (Spatie Permission)
- `model_has_roles`: User-role relationships

## Testing

A test script is available at `backend/test_api.php` that demonstrates all API functionality including:
- Admin user login
- Regular user login
- Role-based access control
- Token validation
- Logout functionality
- Error handling

## Usage in Mobile Applications

1. **Login Flow:**
   - Send POST request to `/api/auth/login` with credentials
   - Store the returned access token securely
   - Include token in Authorization header for subsequent requests

2. **Making Authenticated Requests:**
   ```
   Authorization: Bearer {access_token}
   ```

3. **Logout Flow:**
   - Send POST request to `/api/auth/logout` with token
   - Clear stored token from device

4. **Error Handling:**
   - Handle 401 responses by redirecting to login
   - Handle 403 responses by showing access denied message
   - Handle validation errors appropriately

## Next Steps

To extend this API system:
1. Add password reset functionality
2. Implement refresh tokens
3. Add rate limiting
4. Add API versioning
5. Implement additional user management endpoints
6. Add logging and monitoring
