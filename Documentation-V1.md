# Crackteck - Complete Project Documentation

**Project Name:** Crackteck  
**Version:** 1.0  
**Last Updated:** December 2025  
**Methodology:** Agile/SDLC  
**Target Users:** 1M+ concurrent users

---

## Table of Contents

1. [Executive Summary](#executive-summary)
2. [Project Overview](#project-overview)
3. [Technology Stack](#technology-stack)
4. [System Architecture](#system-architecture)
5. [User Roles & Permissions](#user-roles--permissions)
6. [Module Documentation](#module-documentation)
7. [Database Architecture](#database-architecture)
8. [API Documentation](#api-documentation)
9. [Security Framework](#security-framework)
10. [Backup & Recovery Strategy](#backup--recovery-strategy)
11. [Performance & Scalability](#performance--scalability)
12. [Deployment Strategy](#deployment-strategy)

---

## Executive Summary

**Crackteck** is an enterprise-grade, multi-platform solution built on Laravel 12 designed to manage:

-   E-commerce operations and inventory
-   Customer Relationship Management (CRM)
-   Warehouse & inventory management
-   Field service operations (installation, repair, AMC)
-   Staff and delivery management
-   Real-time request tracking and escalation

**Key Features:**

-   Multi-tenant architecture supporting 1M+ users
-   Role-based access control (RBAC) with 5 primary roles
-   Comprehensive service request management with diagnosis tracking
-   Real-time GPS tracking for field engineers
-   Integrated payment gateway (PhonePe)
-   SMS notifications (Fast2SMS)
-   Social authentication support
-   Activity audit logging with Spatie Activity Log
-   JWT token-based API authentication

---

## Project Overview

### Scope & Objectives

**Primary Objectives:**

1. Provide seamless e-commerce experience for customers
2. Enable CRM teams to manage leads, quotations, and follow-ups
3. Optimize warehouse operations and inventory management
4. Streamline field service requests (Installation, Repair, AMC, Quick Service)
5. Real-time tracking and status updates across all modules
6. Generate actionable business reports and analytics

### Key Platforms

| Platform                  | Purpose                                  | Users                                                      |
| ------------------------- | ---------------------------------------- | ---------------------------------------------------------- |
| **Frontend (E-commerce)** | Customer shopping experience             | Customers                                                  |
| **Backend (CRM)**         | Admin panel for all operations           | Admin, Staff                                               |
| **Mobile App**            | Field operations and customer engagement | Field Exec, Delivery Man, Sales Person, Engineer, Customer |

---

## Technology Stack

### Backend Framework & Libraries

```json
{
    "php": "^8.2",
    "laravel/framework": "^12.0",
    "laravel/sanctum": "^4.2",
    "tymon/jwt-auth": "^2.2",
    "spatie/laravel-permission": "^6.21",
    "spatie/laravel-activitylog": "^4.10",
    "barryvdh/laravel-dompdf": "^3.1",
    "laravel/ui": "^4.6",
    "php-flasher/flasher-laravel": "^2.1",
    "laravolt/avatar": "^6.2",
    "laravel/tinker": "^2.10.1"
}
```

### External Integrations

| Service                     | Purpose                         | Status     |
| --------------------------- | ------------------------------- | ---------- |
| **PhonePe Payment Gateway** | Secure payment processing       | Integrated |
| **Fast2SMS**                | OTP & SMS notifications         | Integrated |
| **Social Logins**           | Google, Facebook, LinkedIn auth | Planned    |
| **AWS S3**                  | Document & image storage        | Planned    |
| **Twilio**                  | Video call support              | Planned    |

### Database & Caching

-   **Primary DB:** MySQL 8.0+ (InnoDB with Row-Level Locking)
-   **Cache Layer:** Redis (for session, queue, and rate limiting)
-   **Queue System:** Laravel Queue (RabbitMQ/Redis)
-   **Search Engine:** Elasticsearch (optional, for product search)

### DevOps & Infrastructure

-   **Hosting:** Hostinger VPS / AWS EC2
-   **Web Server:** Nginx (reverse proxy + load balancer)
-   **SSL/TLS:** Let's Encrypt with auto-renewal
-   **CDN:** CloudFlare for static assets
-   **Monitoring:** New Relic / Datadog
-   **Logging:** ELK Stack (Elasticsearch, Logstash, Kibana)

---

## System Architecture

### High-Level Architecture Diagram

```
┌─────────────────────────────────────────────────────────┐
│                    CLIENT LAYER                          │
├──────────────────┬──────────────────┬──────────────────┤
│  Web Frontend    │   Mobile Apps    │   Third-party    │
│  (E-commerce)    │   (iOS/Android)  │   Integrations   │
└────────┬─────────┴────────┬─────────┴─────────┬────────┘
         │                  │                   │
┌────────▼──────────────────▼───────────────────▼────────┐
│         API GATEWAY & LOAD BALANCER                     │
│  (Rate Limiting, Request Validation, Routing)          │
└────────┬────────────────────────────────────────────────┘
         │
┌────────▼─────────────────────────────────────────────────────────┐
│                    APPLICATION LAYER                             │
├─────────────────────┬──────────────────┬────────────────────────┤
│  CRM Module         │  Warehouse Mgmt  │  E-commerce Engine     │
│  (Leads, Quotes)    │  (Inventory)     │  (Products, Orders)    │
├─────────────────────┼──────────────────┼────────────────────────┤
│  Field Service Mgmt │  Payment Mgmt    │  Notification Service  │
│  (Service Requests) │  (PhonePe)       │  (SMS, Email, Push)    │
├─────────────────────┼──────────────────┼────────────────────────┤
│  Staff Management   │  Analytics       │  Authentication        │
│  (RBAC, Roles)      │  (Reports)       │  (JWT, Sanctum)        │
└─────────┬───────────┴────────┬─────────┴──────────────┬─────────┘
          │                    │                        │
┌─────────▼──────────┬─────────▼────────┬──────────────▼──────────┐
│                    │                  │                         │
│  CACHING LAYER     │  QUEUE SYSTEM    │  SEARCH ENGINE          │
│  (Redis)           │  (RabbitMQ)      │  (Elasticsearch)        │
│                    │                  │                         │
└─────────┬──────────┴────────┬─────────┴──────────────┬──────────┘
          │                   │                       │
┌─────────▼───────────────────▼───────────────────────▼──────────┐
│                    DATA LAYER                                    │
├────────────────────┬──────────────────┬─────────────────────────┤
│  Primary MySQL DB  │  Replica MySQL   │  Backup Storage         │
│  (Master)          │  (Read-Only)     │  (S3 / Backblaze)       │
└────────────────────┴──────────────────┴─────────────────────────┘
```

### Module Interactions Flow

```
User Login
    ↓
Authentication (JWT/Sanctum)
    ↓
Role-Based Authorization (Spatie)
    ↓
Audit Logging (Activity Log)
    ↓
Module-Specific Logic
    ├─ CRM: Lead → Quote → Order
    ├─ Warehouse: Stock → Rack → Allocation
    ├─ Field Service: Request → Assignment → Diagnosis → Resolution
    └─ E-commerce: Browse → Add Cart → Checkout → Payment
    ↓
Response with Cache Layer (Redis)
    ↓
Notification Dispatch (Queue)
```

---

## User Roles & Permissions

### 5 Primary Roles

| Role                | Level       | Responsibilities                                  | Modules Access               |
| ------------------- | ----------- | ------------------------------------------------- | ---------------------------- |
| **Admin**           | 5 (Highest) | Full system access, Settings, Reports, Staff Mgmt | All                          |
| **Sales Person**    | 4           | Lead management, Quotations, Follow-ups           | CRM, E-commerce, Leads       |
| **Field Executive** | 3           | Area-specific ops, Service requests, Diagnosis    | CRM, Field Service, Stock    |
| **Delivery Man**    | 2           | Order/Service delivery, Pickup requests           | Field Service, Orders, Stock |
| **Customer**        | 1 (Lowest)  | Purchase, Service requests, Tracking              | E-commerce, Service Portal   |

### Permission Structure

```
Admin:
├── users.manage
├── roles.manage
├── permissions.manage
├── settings.manage
├── reports.view (all)
└── audit.logs (view)

Sales Person:
├── leads.create|read|update
├── quotes.create|read|update
├── followups.create|read|update
├── customers.read|update (owned)
└── orders.read

Field Executive:
├── service_requests.read|update
├── diagnosis.create|update
├── stock_in_hand.manage
├── spare_parts.create|read
└── equipment.assign

Delivery Man:
├── orders.read|update
├── service_requests.read|update
├── pickups.read|update
└── tracking.update (location)

Customer:
├── products.browse
├── orders.create|read
├── service_requests.create|read|track
└── profile.manage
```

---

## Module Documentation

### 1. Warehouse Management

#### Overview

Manages inventory, stock levels, warehouse operations, and product tracking.

#### Sub-modules

-   **Warehouses:** Multiple warehouse support with zone management
-   **Warehouse Racks:** Physical storage organization with capacity tracking
-   **Products:** Master product catalog with variants and serials
-   **Product Serials:** Individual product tracking for warranty and service
-   **Vendors:** Supplier management and purchase orders
-   **Stock In Hand:** Engineer field inventory management

#### Key Features

-   Real-time stock level monitoring
-   Low stock alerts and automated reordering
-   Scrap item management with audit trails
-   Multi-warehouse inventory sync
-   Product serial tracking for warranty and support
-   Vendor purchase order lifecycle management

#### Database Tables

-   `warehouses`
-   `warehouse_racks`
-   `products`
-   `product_serials`
-   `vendors`
-   `vendor_purchase_orders`
-   `stock_in_hand`
-   `stock_in_hand_products`

---

### 2. E-commerce Module

#### Overview

Complete e-commerce platform for customer shopping and ordering.

#### Sub-modules

-   **Categories:** Product categorization (Parent/Sub-categories)
-   **Brands:** Brand management
-   **Products:** E-commerce product listings with variations
-   **Product Variations:** Attributes and attribute values
-   **Orders:** Order management and tracking
-   **Coupons:** Discount and promotional codes
-   **Collections:** Product groupings and bundles
-   **Banners & Promotions:** Marketing materials

#### Key Features

-   Product catalog with multi-variant support
-   Shopping cart and checkout process
-   Order tracking with real-time updates
-   Multiple payment gateway integration (PhonePe)
-   Promotional campaigns and coupon management
-   Customer review and rating system
-   Wishlist functionality
-   Product recommendations

#### Database Tables

-   `parent_categories`
-   `sub_categories`
-   `brands`
-   `products` (e-commerce specific)
-   `ecommerce_products`
-   `product_variant_attributes`
-   `product_variant_attribute_values`
-   `orders`
-   `order_items`
-   `coupons`
-   `banners`

---

### 3. CRM Module

#### Overview

Comprehensive customer and lead management system for sales teams.

#### Sub-modules

-   **Leads:** Lead capture and qualification
-   **Follow-ups:** Sales follow-up tracking
-   **Meetings:** Meeting scheduling and documentation
-   **Quotations:** Quote generation and management
-   **Customers:** B2B customer profiles with company details
-   **Tickets:** Support ticket management
-   **Invoices:** Invoice generation and tracking

#### Key Features

-   Lead scoring and segmentation
-   Automated follow-up reminders
-   Sales pipeline visualization
-   Quote-to-invoice workflow
-   Email and call logging
-   Customer interaction history
-   Sales forecasting and reporting
-   Multi-address customer support

#### Database Tables

-   `customers`
-   `customer_company_details`
-   `customer_address_details`
-   `leads`
-   `follow_ups`
-   `meets`
-   `quotations`
-   `quotation_products`
-   `tickets`
-   `invoices`

---

### 4. Field Service Management

#### Overview

Manages all field-based service operations including installation, repair, maintenance, and AMC.

#### Sub-modules

-   **Service Requests:** Central hub for all service requests (AMC, Non-AMC, Quick Service, Installation, Repair)
-   **Engineer Assignment:** Individual or group assignment with transfer tracking
-   **Diagnosis:** Detailed diagnosis documentation with issue categorization
-   **Pickup Requests:** Product pickup and delivery management
-   **Spare Parts Requests:** Field spare part requisition system
-   **Remote Jobs:** Remote diagnosis and troubleshooting
-   **Case Transfers:** Engineer to engineer case transfers with approval workflow

#### Service Type Details

**1. AMC (Annual Maintenance Contract)**

-   Time-based service (Yearly, Monthly, Custom)
-   Multiple visits included
-   Covered items and diagnosis types pre-defined
-   Proactive maintenance scheduling

**2. Installation Service**

-   Home/Office installation
-   Technical setup and configuration
-   User training included
-   Warranty activation

**3. Repair Service**

-   On-site or in-shop repair
-   Diagnostic fee (optional)
-   Parts replacement with warranty
-   Post-repair follow-up

**4. Quick Service**

-   Walk-in service requests
-   Cleaning, basic troubleshooting
-   Same-day completion target
-   No appointment required

#### Key Features

-   Real-time engineer location tracking (GPS)
-   Mobile app for field operations
-   Diagnosis template system
-   Quotation generation for non-covered services
-   Parts inventory management
-   Engineer skill-based assignment
-   Service completion with photo documentation
-   OTP verification for delivery/completion

#### Database Tables

-   `covered_items`
-   `amc_plans`
-   `service_requests`
-   `products_list` (service request items)
-   `assigned_engineer`
-   `assigned_group_engineers`
-   `engineer_diagnosis_details`
-   `engineer_product_delivery`
-   `request_products`
-   `assigned_delivery_man`
-   `quotation` (service quotation)
-   `case_transfer_requests`
-   `pickup_requests`
-   `remote_jobs`
-   `field_issues`

---

### 5. Staff Management

#### Overview

Complete employee and contractor management system.

#### Sub-modules

-   **Roles:** Role definition and assignment
-   **Staff:** Employee profiles and management
-   **Certifications:** Staff qualification tracking
-   **Staff Documents:** Aadhar, PAN, Driving License, Police Verification
-   **Bank Details:** Payment information
-   **Work Skills:** Skill set and experience tracking

#### Staff Types Supported

-   Admin
-   Sales Person
-   Field Executive
-   Delivery Man
-   Engineer

#### Key Features

-   Comprehensive staff onboarding workflow
-   Document verification and expiry tracking
-   Skill matrix and competency assessment
-   Vehicle and equipment tracking
-   Police verification management
-   Area/zone assignment for field staff
-   OTP for sensitive operations (Engineers)
-   Employment status tracking (Active, Resigned, Terminated, etc.)

#### Database Tables

-   `roles`
-   `staff`
-   `staff_address`
-   `staff_aadhar_details`
-   `staff_pan_card_details`
-   `staff_bank_details`
-   `staff_vehical_details`
-   `staff_police_verification`
-   `staff_work_skills`

---

### 6. Geographic & Operational Management

#### Overview

Manages service coverage areas and operational capabilities.

#### Sub-modules

-   **Pincode Management:** Service availability by pincode
-   **Service Coverage:** Delivery, Installation, Repair, AMC, Quick Service availability

#### Key Features

-   Pincode-based service enablement
-   Service-specific pincode availability
-   Area management for field executives
-   Zone-based rack organization in warehouses

#### Database Tables

-   `pincodes`

---

## Database Architecture

### Database Design Principles

1. **Scalability**: Partitioning by date for large transactional tables
2. **Performance**: Proper indexing on foreign keys and frequently queried columns
3. **Audit Trail**: Soft deletes and activity logging on critical entities
4. **Data Integrity**: Foreign key constraints, CHECK constraints
5. **Security**: Encrypted sensitive fields (PAN, Aadhar)
6. **Normalization**: Proper 3NF design to prevent data redundancy

### Schema Overview

#### Core User Management

```sql
-- Roles & Permissions (Spatie)
role_has_permissions
user_has_roles
role_has_roles
permissions
roles

-- Authentication Tokens
personal_access_tokens (Sanctum)
jwt_tokens (JWT-Auth)
```

#### Warehouse Schema

```sql
warehouses
├── warehouse_racks
│   └── products
│       ├── product_serials
│       ├── product_images
│       └── product_documents
├── vendors
│   └── vendor_purchase_orders
│       └── vendor_purchase_order_items
└── stock_tracking
    ├── stock_in_hand
    ├── stock_in_hand_products
    └── scrap_items
```

#### E-commerce Schema

```sql
parent_categories
├── sub_categories
│   └── products (e-commerce)
│       ├── product_variants
│       ├── product_images
│       └── product_reviews
├── brands
├── coupons
├── banners
└── orders
    ├── order_items
    ├── order_payments
    └── order_shipments
```

#### CRM Schema

```sql
customers
├── customer_company_details
├── customer_address_details
├── customer_documents (Aadhar, PAN)
├── leads
│   ├── follow_ups
│   ├── meets
│   └── quotations
│       └── quotation_products
└── tickets
    ├── ticket_comments
    └── ticket_attachments
```

#### Field Service Schema

```sql
service_requests
├── covered_items
├── amc_plans
├── products_list
├── assigned_engineer
│   ├── assigned_group_engineers
│   └── engineer_diagnosis_details
├── request_products
├── assigned_delivery_man
├── quotation (service)
├── pickup_requests
├── case_transfer_requests
└── spare_part_requests
    └── spare_part_request_items
```

#### Staff Management Schema

```sql
staff
├── staff_address
├── staff_aadhar_details
├── staff_pan_card_details
├── staff_bank_details
├── staff_vehical_details
├── staff_police_verification
└── staff_work_skills
```

### Critical Indexes

```sql
-- Performance indexes (to be created)
INDEX idx_warehouse_status ON warehouses(status);
INDEX idx_products_sku ON products(sku);
INDEX idx_products_vendor ON products(vendor_id);
INDEX idx_service_requests_status ON service_requests(status);
INDEX idx_service_requests_customer ON service_requests(customer_id);
INDEX idx_staff_status ON staff(status);
INDEX idx_orders_customer ON orders(customer_id);
INDEX idx_orders_status ON orders(status);

-- Composite indexes
INDEX idx_service_requests_customer_status ON service_requests(customer_id, status);
INDEX idx_products_category_brand ON products(parent_category_id, brand_id);
INDEX idx_stock_warehouse_product ON stock_in_hand(warehouse_id, product_id);
```

### Partitioning Strategy (1M+ Users)

```sql
-- Partition service_requests by date (Quarter-wise)
PARTITION BY RANGE (YEAR(created_at) * 4 + QUARTER(created_at)) (
    PARTITION p2024_q1 VALUES LESS THAN (2024 * 4 + 2),
    PARTITION p2024_q2 VALUES LESS THAN (2024 * 4 + 3),
    ...
    PARTITION p_future VALUES LESS THAN MAXVALUE
);

-- Partition orders similarly
PARTITION BY RANGE (YEAR(created_at) * 12 + MONTH(created_at)) (
    PARTITION p2024_01 VALUES LESS THAN (2024 * 12 + 2),
    ...
    PARTITION p_future VALUES LESS THAN MAXVALUE
);
```

---

## API Documentation

### API Architecture

**Base URL:** `https://api.crackteck.com/api/v1`  
**Authentication:** JWT Bearer Token / Sanctum Tokens  
**Rate Limiting:** 1000 requests/hour per IP  
**Response Format:** JSON

### Authentication Endpoints

```
POST /auth/login
Request: { "phone": "+919XXXXXXXXX", "password": "..." }
Response: { "token": "...", "user": {...}, "expires_in": 3600 }

POST /auth/register
Request: { "name": "...", "phone": "...", "email": "...", "password": "..." }
Response: { "user": {...}, "token": "..." }

POST /auth/logout
Headers: Authorization: Bearer {token}
Response: { "message": "Logged out successfully" }

POST /auth/refresh
Headers: Authorization: Bearer {token}
Response: { "token": "..." }

POST /auth/otp/request
Request: { "phone": "+919XXXXXXXXX" }
Response: { "otp_id": "...", "expires_in": 300 }

POST /auth/otp/verify
Request: { "otp_id": "...", "otp": "XXXXXX" }
Response: { "token": "...", "user": {...} }
```

### Customer Endpoints

```
GET /customers
GET /customers/{id}
POST /customers
PUT /customers/{id}
DELETE /customers/{id}
GET /customers/{id}/orders
GET /customers/{id}/service-requests
```

### Product Endpoints

```
GET /products (with filters: category, brand, price range, etc.)
GET /products/{id}
GET /products/{id}/serials
GET /products/{id}/variants
GET /products/search?q=...
```

### Order Endpoints

```
POST /orders
GET /orders/{id}
GET /orders/{id}/items
PUT /orders/{id}/status
POST /orders/{id}/cancel
GET /orders/{id}/tracking
POST /orders/{id}/reviews
```

### Service Request Endpoints

```
POST /service-requests
GET /service-requests/{id}
GET /service-requests/{id}/diagnosis
PUT /service-requests/{id}/status
POST /service-requests/{id}/escalate
POST /service-requests/{id}/pickup
GET /service-requests/{id}/tracking
POST /service-requests/{id}/quote
```

### Field Operations Endpoints

```
GET /engineers/assigned-jobs
PUT /engineers/jobs/{id}/status
POST /engineers/diagnosis
POST /engineers/spare-parts-request
POST /engineers/location/update (GPS tracking)
GET /engineers/stock-in-hand
PUT /engineers/stock-in-hand/{id}/update
```

### Payment Endpoints

```
POST /payments/initiate
Request: { "order_id": "...", "amount": 5000, "gateway": "phonepe" }
Response: { "payment_id": "...", "redirect_url": "..." }

POST /payments/callback
Request: { "payment_id": "...", "status": "success" }
Response: { "order_id": "...", "status": "paid" }

GET /payments/{id}/status
```

### Pagination & Filtering

```
All GET endpoints support:
?page=1&limit=20
?sort_by=created_at&sort_order=desc
?search=...
?filter[status]=active
?filter[date_from]=2025-01-01&filter[date_to]=2025-12-31
```

### Error Response Format

```json
{
    "success": false,
    "message": "Resource not found",
    "errors": {
        "phone": ["Phone number is required"]
    },
    "status_code": 404
}
```

---

## Security Framework

### 1. Authentication & Authorization

#### JWT Implementation

```
Header: Authorization: Bearer {jwt_token}
Token Structure:
  - Header: { "alg": "HS256", "typ": "JWT" }
  - Payload: { "sub": user_id, "iat": timestamp, "exp": timestamp, "role": role }
  - Signature: HMAC-SHA256(secret)

Token Expiry: 24 hours (refresh token: 30 days)
```

#### OAuth 2.0 (Social Logins)

```
Supported:
- Google OAuth 2.0
- Facebook Login
- LinkedIn OAuth 2.0

Implementation: Laravel Socialite
```

#### Sanctum Token Management

```
API Tokens with expiry
Session cookies (CSRF protection)
Rate limiting per token
```

### 2. Data Protection

#### Encryption at Rest

```
Sensitive Fields (Encrypted):
- PAN Card Number: AES-256-CBC
- Aadhar Number: AES-256-CBC
- Bank Account Details: AES-256-CBC
- Passwords: BCrypt with salt

.env Configuration:
APP_KEY=base64:xxxxx (must be 32 bytes for AES-256)
APP_CIPHER=AES-256-CBC
```

#### Encryption in Transit

```
Protocol: TLS 1.3 (minimum)
Certificate: Let's Encrypt (auto-renewed)
HSTS: max-age=31536000; includeSubDomains
```

### 3. Application Security

#### Input Validation & Sanitization

```php
// All user inputs validated
use Illuminate\Validation\Rule;

$request->validate([
    'phone' => ['required', 'regex:/^[6-9]\d{9}$/'],
    'email' => ['required', 'email:rfc,dns'],
    'amount' => ['required', 'numeric', 'min:1', 'max:1000000'],
]);

// Sanitization
$clean_input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
```

#### SQL Injection Prevention

```
- Parameterized queries (Eloquent ORM)
- Prepared statements throughout
- No raw SQL concatenation
```

#### Cross-Site Scripting (XSS) Prevention

```
- Content Security Policy (CSP) headers
- CSRF token validation on forms
- Output escaping with Blade {{{ }}}
- HttpOnly cookies (no JS access)
```

#### Cross-Site Request Forgery (CSRF)

```
CSRF Middleware enabled
Token in session/cookie
Verified on POST/PUT/PATCH/DELETE
```

### 4. API Security

#### Rate Limiting

```php
// Per user: 1000 requests/hour
// Per IP: 100 requests/minute for auth endpoints
// Throttle middleware with Redis backing
```

#### API Key Management

```
- API keys stored hashed in database
- Key rotation every 90 days
- Separate keys for dev/staging/production
- Key scoping for specific resources
```

#### CORS Configuration

```php
// Allowed Origins:
  - https://crackteck.com
  - https://app.crackteck.com
  - https://admin.crackteck.com

// Allowed Methods: GET, POST, PUT, DELETE, PATCH
// Allow Credentials: true
```

### 5. File Upload Security

#### File Validation

```php
$request->validate([
    'document' => ['required', 'file', 'mimes:pdf,jpg,png', 'max:5120'], // 5MB
    'license' => ['required', 'image', 'dimensions:min_width=100,max_width=10000'],
]);

// Storage: /storage/uploads/{year}/{month}/{random_name}
// Never store in web root
```

#### Virus Scanning

```
ClamAV integration for uploaded files
Scan before storage
Quarantine suspected files
```

### 6. Database Security

#### Access Control

```sql
-- Read-only users for analytics
CREATE USER 'analytics'@'10.0.1.%' IDENTIFIED BY 'strong_password';
GRANT SELECT ON crackteck_db.* TO 'analytics'@'10.0.1.%';

-- Application user
CREATE USER 'app'@'localhost' IDENTIFIED BY 'strong_password';
GRANT ALL ON crackteck_db.* TO 'app'@'localhost';

-- Backup user
CREATE USER 'backup'@'backup_host' IDENTIFIED BY 'strong_password';
GRANT SELECT ON crackteck_db.* TO 'backup'@'backup_host';
```

#### Query Monitoring

```
Enable Query Log for audit
MySQL Audit Plugin for sensitive operations
Slow Query Log (threshold: 2 seconds)
```

### 7. Audit & Logging

#### Activity Logging (Spatie)

```php
// Automatically logged
- User login/logout
- Data modifications (create, update, delete)
- Role/Permission changes
- Settings modifications
- File uploads/downloads
- Payment transactions
- API access

LogModel: activity_log table with:
- user_id, event, description
- subject_type, subject_id
- properties (before/after values)
- ip_address, user_agent
```

#### Error Logging

```
Centralized error logging
Stack trace capture for debugging
User notification for errors
Admin alerts for critical errors
Sensitive data redaction in logs
```

### 8. Infrastructure Security

#### Firewall Rules

```
Incoming:
- Port 80 (HTTP → HTTPS redirect)
- Port 443 (HTTPS)
- Port 22 (SSH, restricted IPs only)
- Port 3306 (MySQL, internal only)
- Port 6379 (Redis, internal only)

Outgoing:
- Port 443 (API calls)
- Port 25/587 (SMTP)
```

#### DDoS Protection

```
- CloudFlare DDoS protection
- Rate limiting at WAF level
- IP reputation blocking
- Geographic restrictions (if applicable)
```

#### Server Hardening

```
- SSH key-based authentication only
- Disable root login
- UFW firewall enabled
- SELinux/AppArmor configured
- Automatic security updates
- Regular penetration testing
```

### 9. Incident Response Plan

```
1. Detection: Monitor logs and alerts
2. Analysis: Identify breach scope and impact
3. Containment: Isolate affected systems
4. Communication: Notify affected users within 24 hours
5. Recovery: Restore from backups, patch vulnerabilities
6. Documentation: Post-incident review and improvements
```

---

## Backup & Recovery Strategy

### Backup Architecture

#### Backup Types

1. **Full Database Backup**

    - Frequency: Daily (00:00 UTC)
    - Retention: 30 days
    - Location: AWS S3 + Off-site Backblaze
    - Compression: gzip (reduces size ~70%)

2. **Incremental Backup**

    - Frequency: Every 6 hours
    - Retention: 7 days
    - Uses Binary Logs (binlog)
    - Enables point-in-time recovery

3. **Transaction Log Backup**

    - Frequency: Continuous (with MySQL binlog)
    - Retention: 7 days (stored locally + S3)
    - Allows recovery to any specific minute

4. **File Backup**
    - Frequency: Daily
    - Includes: Uploads, Documents, Configuration
    - Retention: 14 days
    - Storage: AWS S3

#### Backup Script (bash)

```bash
#!/bin/bash
# Full backup strategy
BACKUP_DIR="/backups/mysql"
DB_NAME="crackteck_db"
DB_USER="backup"
DB_PASSWORD="strong_password"
DATE=$(date +%Y%m%d_%H%M%S)

# Full backup with innodb options
mysqldump \
  --user=$DB_USER \
  --password=$DB_PASSWORD \
  --single-transaction \
  --lock-tables=false \
  --events \
  --routines \
  --triggers \
  --master-data=2 \
  --compress \
  $DB_NAME > $BACKUP_DIR/full_backup_$DATE.sql.gz

# Upload to S3
aws s3 cp $BACKUP_DIR/full_backup_$DATE.sql.gz \
  s3://crackteck-backups/mysql/full/

# Upload to Backblaze B2
b2 sync $BACKUP_DIR s3://b2-backteck/mysql/

# Retention cleanup (keep 30 days)
find $BACKUP_DIR -name "*.sql.gz" -mtime +30 -delete
```

### Recovery Procedures

#### Complete Database Restore

```bash
# 1. Stop application
sudo systemctl stop laravel-app

# 2. Restore from backup
gunzip -c /backups/full_backup_20250101_000000.sql.gz | \
  mysql -u$DB_USER -p$DB_PASSWORD $DB_NAME

# 3. Verify integrity
mysql -u$DB_USER -p$DB_PASSWORD -e "CHECK TABLE * FROM $DB_NAME;"

# 4. Start application
sudo systemctl start laravel-app
```

#### Point-in-Time Recovery

```bash
# Restore to specific timestamp
# 1. Restore last full backup
mysql -u$DB_USER -p$DB_PASSWORD $DB_NAME < \
  full_backup_20250101_000000.sql

# 2. Apply binary logs until target time
mysqlbinlog \
  --start-datetime="2025-01-01 10:00:00" \
  --stop-datetime="2025-01-01 11:30:00" \
  binlog.000001 | \
  mysql -u$DB_USER -p$DB_PASSWORD

# 3. Verify data integrity
SELECT COUNT(*) FROM customers; -- expected count
```

#### Application Recovery (RPO/RTO)

```
Recovery Point Objective (RPO):
- Full Backups: 1 day
- Incremental + Binlog: 15 minutes
- Critical systems: 5 minutes

Recovery Time Objective (RTO):
- Full Database: < 30 minutes
- Application Service: < 5 minutes
- User-facing systems: < 15 minutes
```

### Disaster Recovery Plan

#### Failover Strategy

```
Primary DC (Active)
├─ MySQL Master
├─ Redis Cache
└─ Application Servers

Secondary DC (Standby)
├─ MySQL Slave (read-only)
├─ Redis Replica
└─ Application Servers (inactive)

Failover Process:
1. Health check fails for Primary (3 consecutive failures)
2. Automated failover triggered (DNS switch)
3. Secondary promoted to Primary
4. Alerts sent to ops team
5. Database replication verified
6. Application health checked
```

#### Data Validation Post-Recovery

```sql
-- Verify row counts match
SELECT TABLE_NAME, TABLE_ROWS FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_SCHEMA = 'crackteck_db'
ORDER BY TABLE_ROWS DESC;

-- Check for orphaned records (foreign key integrity)
SELECT * FROM products
WHERE vendor_id NOT IN (SELECT vendor_id FROM vendors);

-- Verify no corruption
ANALYZE TABLE products;
CHECK TABLE products;
```

---

## Performance & Scalability

### 1. Database Optimization

#### Query Optimization

```php
// ❌ N+1 Query Problem
$products = Product::all();
foreach ($products as $product) {
    echo $product->vendor->name; // Query per iteration
}

// ✅ Eager Loading
$products = Product::with('vendor', 'category')->get();
```

#### Index Strategy

```sql
-- Primary indexes (unique identifiers)
PRIMARY KEY (`id`)

-- Foreign key indexes
INDEX `idx_vendor_id` (`vendor_id`)
INDEX `idx_warehouse_id` (`warehouse_id`)

-- Search indexes
INDEX `idx_sku` (`sku`)
INDEX `idx_phone` (`phone`)
INDEX `idx_email` (`email`)

-- Date-range indexes (for reports)
INDEX `idx_created_date` (`created_at`)
INDEX `idx_order_date` (`order_date`)

-- Composite indexes
INDEX `idx_service_status_date` (`status`, `created_at`)
INDEX `idx_customer_status_type` (`customer_id`, `status`, `type`)

-- Full-text search
FULLTEXT INDEX `idx_product_search` (`name`, `description`, `sku`)
```

#### Query Caching

```php
// Cache frequently accessed data
use Illuminate\Support\Facades\Cache;

$categories = Cache::remember('categories', 24 * 60, function () {
    return Category::with('subcategories')->get();
});

// Cache with tag for invalidation
Cache::tags('categories')->remember('all', 24 * 60, function () {
    return Category::all();
});

// Invalidate on update
Category::created(function ($category) {
    Cache::tags('categories')->flush();
});
```

### 2. Application Optimization

#### Response Caching

```php
// HTTP caching headers
Route::get('/products', function () {
    return response()
        ->json($products)
        ->header('Cache-Control', 'public, max-age=3600')
        ->header('ETag', md5(json_encode($products)));
})->middleware('cache:3600');
```

#### API Response Optimization

```php
// Pagination instead of fetching all
$products = Product::paginate(20); // Returns max 20 results

// Field filtering
Product::select('id', 'name', 'sku', 'price')->get();

// Lazy loading for large datasets
foreach (Product::cursor() as $product) {
    // Process one product at a time
}
```

#### Database Query Optimization

```php
// Use database-level operations instead of PHP
// ❌ Fetch and increment in PHP
$product = Product::find($id);
$product->increment('stock_quantity');
$product->save();

// ✅ Database-level increment
Product::find($id)->increment('stock_quantity');

// ❌ Loop and update
foreach ($products as $product) {
    $product->update(['status' => 'active']);
}

// ✅ Bulk update
Product::whereIn('id', $ids)->update(['status' => 'active']);
```

### 3. Caching Strategy

#### Cache Layers

```
┌─────────────────────────────────────┐
│      Browser/Client Cache           │ (24 hours)
├─────────────────────────────────────┤
│      CDN Cache (CloudFlare)         │ (1 hour)
├─────────────────────────────────────┤
│      Application Cache (Redis)      │ (varies)
│      ├─ Session: 2 hours           │
│      ├─ Products: 24 hours         │
│      ├─ Categories: 24 hours       │
│      ├─ Orders: 1 hour             │
│      └─ User Preferences: 24 hours │
├─────────────────────────────────────┤
│      Database Query Cache           │ (5 mins)
├─────────────────────────────────────┤
│      Database (Primary)             │
└─────────────────────────────────────┘
```

#### Cache Configuration (.env)

```env
CACHE_DRIVER=redis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

SESSION_DRIVER=redis
QUEUE_DRIVER=redis

# Cache durations (in minutes)
CACHE_PRODUCTS=1440
CACHE_CATEGORIES=1440
CACHE_ORDERS=60
CACHE_SESSION=120
```

### 4. Load Balancing

#### Nginx Load Balancer Configuration

```nginx
upstream app_backend {
    least_conn;  # Least connections algorithm
    server 10.0.1.10:8000 weight=5;
    server 10.0.1.11:8000 weight=5;
    server 10.0.1.12:8000 weight=3;
    server 10.0.1.13:8000 weight=3;

    keepalive 32;
    keepalive_requests 100;
    keepalive_timeout 60s;
}

server {
    listen 443 ssl http2;
    server_name api.crackteck.com;

    location / {
        proxy_pass http://app_backend;
        proxy_http_version 1.1;
        proxy_set_header Connection "";
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;

        # Timeouts
        proxy_connect_timeout 60s;
        proxy_send_timeout 60s;
        proxy_read_timeout 60s;
    }
}
```

### 5. Database Replication

#### Master-Slave Replication

```mysql
-- On Master
SHOW MASTER STATUS;
-- Output: File: mysql-bin.000001, Position: 567

-- On Slave
CHANGE MASTER TO
    MASTER_HOST='10.0.1.100',
    MASTER_USER='replication',
    MASTER_PASSWORD='password',
    MASTER_LOG_FILE='mysql-bin.000001',
    MASTER_LOG_POS=567;

START SLAVE;
SHOW SLAVE STATUS;
```

#### Read Replicas for Reports

```php
// Configure read replica connection
// config/database.php
'connections' => [
    'mysql' => [
        'driver' => 'mysql',
        'read' => [
            'host' => ['10.0.1.11', '10.0.1.12'], // Slaves
        ],
        'write' => [
            'host' => ['10.0.1.10'], // Master
        ],
    ],
]

// Usage in queries
$activeOrders = Order::where('status', 'active')->get(); // Uses Master
$completedOrders = DB::connection('mysql')->select(...); // Can route to Slave
```

### 6. Queue & Job Processing

#### Async Processing

```php
// Instead of processing synchronously
// ❌ Slow (blocks request)
foreach ($orders as $order) {
    sendInvoiceEmail($order);
    updateInventory($order);
    notifyVendor($order);
}

// ✅ Fast (returns immediately, processes in background)
foreach ($orders as $order) {
    SendInvoiceJob::dispatch($order);
    UpdateInventoryJob::dispatch($order);
    NotifyVendorJob::dispatch($order);
}
```

#### Queue Configuration

```env
QUEUE_CONNECTION=redis
QUEUE_TIMEOUT=600

# Background jobs
BATCH_SIZE=100
RETRY_ATTEMPTS=3
```

### 7. Monitoring & Metrics

#### Key Performance Indicators (KPIs)

```
- API Response Time: < 200ms (p95)
- Database Query Time: < 100ms (p95)
- Throughput: 10,000+ requests/second capacity
- Cache Hit Ratio: > 80%
- Error Rate: < 0.1%
- Availability: 99.9% uptime
```

#### Monitoring Tools

```
New Relic / Datadog:
  - Application performance monitoring
  - Custom dashboard
  - Alerting rules
  - Log aggregation

Prometheus + Grafana:
  - Metrics collection
  - Custom queries
  - Visual dashboards
  - Historical trends

ELK Stack:
  - Elasticsearch: Log storage
  - Logstash: Log processing
  - Kibana: Log visualization
```

---

## Deployment Strategy

### Deployment Environments

```
Development (Dev)
├─ Used by: Developers
├─ Updates: Multiple times daily
├─ Data: Synthetic data
└─ Infrastructure: Single server

Staging (Stg)
├─ Used by: QA, Product team
├─ Updates: Daily
├─ Data: Mirror of production
├─ Infrastructure: Production-like

Production (Prod)
├─ Used by: End users
├─ Updates: Weekly (planned)
├─ Data: Real customer data
├─ Infrastructure: Highly available
```

### CI/CD Pipeline

```
GitHub Push
    ↓
[1] Code Quality Check
    ├─ PHP Code Sniffer
    ├─ PHPStan static analysis
    └─ Security scan
    ↓
[2] Run Tests
    ├─ Unit tests (PHPUnit)
    ├─ Integration tests
    └─ Feature tests
    ↓
[3] Build Artifacts
    ├─ Compile assets
    ├─ Generate documentation
    └─ Create Docker image
    ↓
[4] Deploy to Staging
    ├─ Database migrations
    ├─ Cache clearing
    └─ Health checks
    ↓
[5] Automated Testing (Staging)
    ├─ Smoke tests
    ├─ API tests
    └─ Performance tests
    ↓
[6] Manual QA Approval
    ↓
[7] Deploy to Production
    ├─ Blue-green deployment
    ├─ Database migrations (with rollback)
    └─ Health verification
    ↓
[8] Post-deployment Checks
    ├─ Monitor error rates
    ├─ Check performance metrics
    └─ User feedback monitoring
```

### Database Migration Strategy

```php
// 1. Create migration
php artisan make:migration create_new_feature_table

// 2. Write migration with rollback
Schema::create('new_table', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->timestamps();
});

// 3. Test on staging
php artisan migrate --env=staging

// 4. Backup production before migration
mysqldump -u root -p crackteck_db > backup_$(date +%Y%m%d_%H%M%S).sql

// 5. Run migration on production (with zero-downtime strategy)
php artisan migrate --env=production

// 6. Rollback if needed
php artisan migrate:rollback --env=production
```

### Zero-Downtime Deployment

```
1. Deploy new code to idle servers
2. Run database migrations on replica (if changes needed)
3. Switch traffic gradually (10% → 50% → 100%)
4. Monitor for errors
5. If error: switch back to old version
6. If success: decommission old servers
```

### Rollback Procedure

```bash
# 1. Revert to previous version
git checkout v1.2.0
git push --force production

# 2. Rollback database changes
php artisan migrate:rollback --step=1

# 3. Clear caches
php artisan cache:clear
php artisan route:clear

# 4. Restart application
sudo systemctl restart laravel-app

# 5. Notify users if necessary
```

---

## Technical Specifications Summary

### Minimum System Requirements

```
Server:
- CPU: 8 cores minimum
- RAM: 16GB minimum
- Storage: 500GB SSD
- Network: 100 Mbps (dedicated)
- OS: Ubuntu 22.04 LTS or CentOS 8

PHP:
- Version: 8.2 or higher
- Extensions: PDO, MySQL, Redis, GD, Mbstring, OpenSSL

Database:
- MySQL: 8.0+
- InnoDB storage engine
- Max connections: 1000

Cache:
- Redis: 7.0+
- Memory: 8GB minimum

Web Server:
- Nginx: 1.25+
- or Apache 2.4.54+
```

### Recommended Production Setup

```
Load Balancer: Nginx (Active-Active)
├─ 2 instances
├─ Health check every 5 seconds
└─ Automatic failover

Application Servers: 4-8 instances
├─ Docker containers
├─ Auto-scaling based on CPU/Memory
├─ Gradual rolling updates

Database:
├─ Master-Slave replication
├─ Read replicas for analytics
├─ Automated backups every 6 hours
└─ Point-in-time recovery enabled

Cache/Session:
├─ Redis Cluster (3 nodes)
├─ Persistence enabled (RDB + AOF)
└─ Memory: 32GB total

Storage:
├─ AWS S3 / Backblaze B2
├─ CDN: CloudFlare
└─ Backup: Off-site replication

Monitoring:
├─ New Relic / Datadog
├─ Log aggregation: ELK Stack
├─ Uptime monitoring: StatusPage
└─ Alert routing: PagerDuty
```

---

## Conclusion

Crackteck is designed as an enterprise-grade, scalable platform capable of serving 1M+ concurrent users with high availability, security, and performance. The modular architecture allows for independent scaling of different components based on demand.

### Key Achievements

✅ Multi-tenant architecture supporting unlimited users  
✅ Comprehensive role-based access control  
✅ Complete audit trail and compliance logging  
✅ Enterprise-grade security (AES-256 encryption, JWT auth)  
✅ 99.9% uptime target with failover mechanisms  
✅ Automated backup and disaster recovery  
✅ Performance optimizations for 10K+ requests/second  
✅ Scalable cloud infrastructure ready

### Next Steps

1. Database migration scripts execution
2. API endpoint implementation and documentation
3. Mobile application development (iOS/Android)
4. Security penetration testing
5. Load testing and optimization
6. Production deployment planning
7. User training and documentation
8. Ongoing monitoring and support

---

**Document Version:** 1.0  
**Last Updated:** December 2025  
**Prepared By:** Development Team  
**Reviewed By:** Architecture Team  
**Approved By:** Project Management
