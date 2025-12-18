# Crackteck - Comprehensive API & Implementation Roadmap

## Part 1: API Endpoints Reference

### Base Configuration
```
Base URL: https://api.crackteck.com/api/v1
Default Timeout: 30 seconds
Response Format: JSON
Authentication: JWT Bearer Token or Sanctum API Token
Rate Limit: 1000 requests/hour per user
```

---

## Authentication Endpoints

### 1. User Login
```
POST /auth/login
Content-Type: application/json

Request Body:
{
  "phone": "+919876543210",
  "password": "secure_password",
  "device_id": "device_uuid_optional"
}

Response (200):
{
  "success": true,
  "message": "Login successful",
  "data": {
    "access_token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...",
    "refresh_token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...",
    "expires_in": 86400,
    "user": {
      "id": 1,
      "name": "John Doe",
      "phone": "+919876543210",
      "email": "john@example.com",
      "role": "admin",
      "avatar_url": "https://cdn.crackteck.com/avatars/1.jpg"
    }
  }
}

Error Response (401):
{
  "success": false,
  "message": "Invalid credentials",
  "status_code": 401
}
```

### 2. User Registration
```
POST /auth/register
Content-Type: application/json

Request Body:
{
  "name": "John Doe",
  "phone": "+919876543210",
  "email": "john@example.com",
  "password": "secure_password",
  "password_confirmation": "secure_password",
  "role": "customer"
}

Response (201):
{
  "success": true,
  "message": "User registered successfully",
  "data": {
    "access_token": "...",
    "user": {...}
  }
}
```

### 3. OTP Request
```
POST /auth/otp/request
Content-Type: application/json

Request Body:
{
  "phone": "+919876543210"
}

Response (200):
{
  "success": true,
  "message": "OTP sent to your phone",
  "data": {
    "otp_id": "otp_request_uuid",
    "expires_in": 300
  }
}
```

### 4. OTP Verification
```
POST /auth/otp/verify
Content-Type: application/json

Request Body:
{
  "otp_id": "otp_request_uuid",
  "otp": "123456"
}

Response (200):
{
  "success": true,
  "message": "OTP verified",
  "data": {
    "access_token": "...",
    "user": {...}
  }
}
```

### 5. Refresh Token
```
POST /auth/refresh
Headers:
  Authorization: Bearer {refresh_token}

Response (200):
{
  "success": true,
  "data": {
    "access_token": "new_access_token",
    "expires_in": 86400
  }
}
```

### 6. Logout
```
POST /auth/logout
Headers:
  Authorization: Bearer {access_token}

Response (200):
{
  "success": true,
  "message": "Logged out successfully"
}
```

---

## Product Endpoints

### 1. Get All Products (E-commerce)
```
GET /products?page=1&limit=20&sort_by=created_at&sort_order=desc
Headers:
  Authorization: Bearer {access_token}

Query Parameters:
- page (default: 1)
- limit (default: 20, max: 100)
- sort_by (created_at, name, price, rating)
- sort_order (asc, desc)
- search (product name or SKU)
- category_id (filter by category)
- brand_id (filter by brand)
- min_price (filter by price range)
- max_price
- status (active, draft)
- is_featured (true/false)

Response (200):
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "Product Name",
      "sku": "PROD001",
      "price": 5000,
      "discount_price": 4500,
      "stock_quantity": 50,
      "main_image": "https://cdn.crackteck.com/products/1.jpg",
      "rating": 4.5,
      "reviews_count": 125,
      "is_wishlist": false
    }
  ],
  "pagination": {
    "current_page": 1,
    "total_pages": 5,
    "total_items": 100,
    "per_page": 20
  }
}
```

### 2. Get Product Details
```
GET /products/{id}
Headers:
  Authorization: Bearer {access_token}

Response (200):
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Product Name",
    "sku": "PROD001",
    "brand_id": 1,
    "brand_name": "Brand Name",
    "category_id": 1,
    "category_name": "Category",
    "short_description": "...",
    "full_description": "...",
    "technical_specification": "...",
    "price": 5000,
    "discount_price": 4500,
    "tax": 18,
    "final_price": 5310,
    "cost_price": 3500,
    "stock_quantity": 50,
    "stock_status": "in_stock",
    "warranty": "2 years",
    "main_image": "https://cdn.crackteck.com/products/1.jpg",
    "images": ["...", "..."],
    "variants": [
      {
        "attribute": "Color",
        "values": ["Red", "Blue", "Green"]
      }
    ],
    "rating": 4.5,
    "reviews": [
      {
        "user": "John Doe",
        "rating": 5,
        "comment": "Great product!",
        "date": "2025-01-15T10:00:00Z"
      }
    ],
    "related_products": [...],
    "is_wishlist": false
  }
}
```

### 3. Get Product Serials
```
GET /products/{product_id}/serials
Headers:
  Authorization: Bearer {access_token}

Query Parameters:
- status (active, sold, scrap)

Response (200):
{
  "success": true,
  "data": [
    {
      "id": 1,
      "serial_number": "AUTO_SERIAL_001",
      "manual_serial": "MAN_001",
      "status": "active",
      "price": 5000,
      "warranty_expiry": "2027-01-15"
    }
  ]
}
```

---

## Order Endpoints

### 1. Create Order
```
POST /orders
Headers:
  Authorization: Bearer {access_token}
  Content-Type: application/json

Request Body:
{
  "items": [
    {
      "product_id": 1,
      "quantity": 2,
      "price": 5000,
      "variant": {
        "color": "Red"
      }
    }
  ],
  "shipping_address": {
    "address1": "123 Main St",
    "city": "Mumbai",
    "state": "Maharashtra",
    "pincode": "400001",
    "country": "India"
  },
  "billing_address": "same_as_shipping",
  "coupon_code": "SAVE10",
  "payment_method": "phonepe",
  "notes": "Deliver after 2pm"
}

Response (201):
{
  "success": true,
  "message": "Order created successfully",
  "data": {
    "order_id": "ORD123456",
    "items": [...],
    "subtotal": 10000,
    "tax": 1800,
    "discount": 1000,
    "shipping": 200,
    "total": 11000,
    "status": "pending",
    "payment_status": "pending",
    "created_at": "2025-01-15T10:00:00Z"
  }
}
```

### 2. Get Orders
```
GET /orders?page=1&status=active
Headers:
  Authorization: Bearer {access_token}

Query Parameters:
- page (default: 1)
- limit (default: 20)
- status (pending, confirmed, shipped, delivered, cancelled)
- sort_by (created_at, amount)

Response (200):
{
  "success": true,
  "data": [
    {
      "id": 1,
      "order_number": "ORD123456",
      "total_amount": 11000,
      "status": "shipped",
      "payment_status": "paid",
      "created_at": "2025-01-15T10:00:00Z",
      "items_count": 2,
      "estimated_delivery": "2025-01-20T10:00:00Z"
    }
  ]
}
```

### 3. Get Order Details
```
GET /orders/{order_id}
Headers:
  Authorization: Bearer {access_token}

Response (200):
{
  "success": true,
  "data": {
    "id": 1,
    "order_number": "ORD123456",
    "items": [
      {
        "product_id": 1,
        "product_name": "Product",
        "quantity": 2,
        "price": 5000,
        "subtotal": 10000
      }
    ],
    "shipping_address": {...},
    "status": "shipped",
    "tracking_number": "TRACK123456",
    "tracking_url": "https://track.crackteck.com/TRACK123456",
    "payment_method": "PhonePe",
    "payment_id": "PAY123456",
    "total": 11000,
    "notes": "Delivery instructions",
    "timeline": [
      {
        "status": "confirmed",
        "timestamp": "2025-01-15T11:00:00Z"
      },
      {
        "status": "shipped",
        "timestamp": "2025-01-16T08:00:00Z"
      }
    ]
  }
}
```

### 4. Cancel Order
```
PUT /orders/{order_id}/cancel
Headers:
  Authorization: Bearer {access_token}
Content-Type: application/json

Request Body:
{
  "reason": "Changed mind",
  "comments": "Optional comments"
}

Response (200):
{
  "success": true,
  "message": "Order cancelled successfully",
  "data": {
    "order_id": "ORD123456",
    "status": "cancelled",
    "refund_initiated": true,
    "refund_amount": 11000,
    "refund_id": "REF123456"
  }
}
```

### 5. Track Order
```
GET /orders/{order_id}/tracking
Headers:
  Authorization: Bearer {access_token}

Response (200):
{
  "success": true,
  "data": {
    "order_number": "ORD123456",
    "current_status": "in_transit",
    "current_location": {
      "city": "Pune",
      "state": "Maharashtra",
      "coordinates": {
        "latitude": 18.5204,
        "longitude": 73.8567
      }
    },
    "tracking_events": [
      {
        "status": "confirmed",
        "timestamp": "2025-01-15T11:00:00Z",
        "location": "Mumbai",
        "description": "Order confirmed"
      },
      {
        "status": "shipped",
        "timestamp": "2025-01-16T08:00:00Z",
        "location": "Mumbai Warehouse",
        "description": "Order shipped from warehouse"
      }
    ],
    "estimated_delivery": "2025-01-20T18:00:00Z",
    "delivery_agent": {
      "name": "Raj Kumar",
      "phone": "+919876543210",
      "vehicle": "Two Wheeler",
      "current_location": {...}
    }
  }
}
```

---

## Service Request Endpoints

### 1. Create Service Request
```
POST /service-requests
Headers:
  Authorization: Bearer {access_token}
Content-Type: application/json

Request Body:
{
  "service_type": "installation", // installation, repair, amc, quick_service
  "product_ids": [1, 2],
  "customer_address": {
    "address1": "123 Main St",
    "city": "Mumbai",
    "state": "Maharashtra",
    "pincode": "400001",
    "contact_name": "John Doe",
    "contact_phone": "+919876543210"
  },
  "preferred_date": "2025-01-20",
  "preferred_time_slot": "morning", // morning, afternoon, evening
  "description": "Installation required",
  "attachments": ["image_url_1", "image_url_2"]
}

Response (201):
{
  "success": true,
  "message": "Service request created successfully",
  "data": {
    "request_id": "SR123456",
    "reference_number": "REF001",
    "status": "pending",
    "service_type": "installation",
    "created_at": "2025-01-15T10:00:00Z",
    "estimated_completion": "2025-01-22T18:00:00Z"
  }
}
```

### 2. Get Service Requests
```
GET /service-requests?status=pending
Headers:
  Authorization: Bearer {access_token}

Query Parameters:
- status (pending, approved, assigned, in_progress, completed)
- service_type (all, installation, repair, amc, quick_service)
- page
- limit

Response (200):
{
  "success": true,
  "data": [
    {
      "id": 1,
      "request_id": "SR123456",
      "service_type": "installation",
      "status": "in_progress",
      "assigned_engineer": {
        "id": 5,
        "name": "Raj Kumar",
        "phone": "+919876543210",
        "rating": 4.8
      },
      "created_at": "2025-01-15T10:00:00Z",
      "estimated_completion": "2025-01-22T18:00:00Z"
    }
  ]
}
```

### 3. Get Service Request Details
```
GET /service-requests/{request_id}
Headers:
  Authorization: Bearer {access_token}

Response (200):
{
  "success": true,
  "data": {
    "id": 1,
    "request_id": "SR123456",
    "service_type": "installation",
    "status": "in_progress",
    "customer": {...},
    "products": [
      {
        "id": 1,
        "name": "Product",
        "serial": "SERIAL001"
      }
    ],
    "assigned_engineer": {
      "name": "Raj Kumar",
      "phone": "+919876543210",
      "location": {...},
      "rating": 4.8,
      "reviews": 250
    },
    "diagnosis": {
      "issues_found": ["Issue 1", "Issue 2"],
      "actions_taken": ["Action 1"],
      "spare_parts_used": ["Part 1"]
    },
    "quotation": {
      "amount": 2000,
      "status": "approved",
      "breakdown": {...}
    },
    "timeline": [
      {
        "status": "pending",
        "timestamp": "2025-01-15T10:00:00Z"
      },
      {
        "status": "approved",
        "timestamp": "2025-01-15T11:00:00Z"
      },
      {
        "status": "assigned",
        "timestamp": "2025-01-16T09:00:00Z"
      }
    ]
  }
}
```

### 4. Track Service Request
```
GET /service-requests/{request_id}/tracking
Headers:
  Authorization: Bearer {access_token}

Response (200):
{
  "success": true,
  "data": {
    "request_id": "SR123456",
    "current_status": "in_progress",
    "engineer": {
      "name": "Raj Kumar",
      "phone": "+919876543210",
      "estimated_arrival": "2025-01-20T15:30:00Z",
      "current_location": {
        "latitude": 19.0760,
        "longitude": 72.8777,
        "address": "Fort, Mumbai"
      },
      "distance_from_customer": 5.2 // in km
    },
    "events": [
      {
        "event": "engineer_assigned",
        "timestamp": "2025-01-16T09:00:00Z",
        "description": "Engineer Raj Kumar assigned"
      },
      {
        "event": "engineer_started",
        "timestamp": "2025-01-20T14:00:00Z",
        "description": "Engineer started towards your location"
      }
    ]
  }
}
```

### 5. Add Diagnosis & Quote
```
POST /service-requests/{request_id}/diagnosis
Headers:
  Authorization: Bearer {access_token}
Content-Type: application/json

Request Body:
{
  "diagnosis_types": ["No display", "Not turning on"],
  "diagnosis_notes": "Found motherboard issue",
  "parts_required": [1, 2, 3],
  "labor_charges": 1000,
  "parts_cost": 3000,
  "total_quote": 4000,
  "estimated_days": 2
}

Response (201):
{
  "success": true,
  "data": {
    "diagnosis_id": 1,
    "quote_id": "QUOTE123456",
    "status": "pending_approval",
    "quote_amount": 4000
  }
}
```

---

## Payment Endpoints

### 1. Initiate Payment
```
POST /payments/initiate
Headers:
  Authorization: Bearer {access_token}
Content-Type: application/json

Request Body:
{
  "order_id": "ORD123456",
  "amount": 11000,
  "currency": "INR",
  "payment_method": "phonepe",
  "redirect_url": "https://app.crackteck.com/payment-callback"
}

Response (200):
{
  "success": true,
  "data": {
    "payment_id": "PAY123456",
    "payment_url": "https://phonepe.api.com/pay?ref=PAY123456",
    "expires_in": 900
  }
}
```

### 2. Payment Callback
```
POST /payments/callback
Content-Type: application/json

Request Body:
{
  "payment_id": "PAY123456",
  "status": "success",
  "transaction_id": "TXN123456",
  "amount": 11000,
  "timestamp": "2025-01-15T10:30:00Z",
  "signature": "signature_hash"
}

Response (200):
{
  "success": true,
  "data": {
    "order_id": "ORD123456",
    "payment_status": "completed",
    "message": "Payment successful"
  }
}
```

### 3. Get Payment Status
```
GET /payments/{payment_id}/status
Headers:
  Authorization: Bearer {access_token}

Response (200):
{
  "success": true,
  "data": {
    "payment_id": "PAY123456",
    "order_id": "ORD123456",
    "amount": 11000,
    "status": "completed",
    "transaction_id": "TXN123456",
    "timestamp": "2025-01-15T10:30:00Z"
  }
}
```

---

## Field Operations Endpoints (For App)

### 1. Get Assigned Jobs (Engineer)
```
GET /field/assigned-jobs?status=pending
Headers:
  Authorization: Bearer {access_token}

Query Parameters:
- status (pending, in_progress, completed)
- page
- limit

Response (200):
{
  "success": true,
  "data": [
    {
      "job_id": 1,
      "request_id": "SR123456",
      "service_type": "installation",
      "status": "pending",
      "customer": {
        "name": "John Doe",
        "phone": "+919876543210",
        "address": "123 Main St, Mumbai"
      },
      "product": {
        "name": "Product",
        "serial": "SERIAL001"
      },
      "distance": 5.2,
      "eta": "15:30",
      "priority": "high"
    }
  ]
}
```

### 2. Start Job
```
POST /field/jobs/{job_id}/start
Headers:
  Authorization: Bearer {access_token}
Content-Type: application/json

Request Body:
{
  "location": {
    "latitude": 19.0760,
    "longitude": 72.8777
  }
}

Response (200):
{
  "success": true,
  "data": {
    "job_id": 1,
    "status": "in_progress",
    "started_at": "2025-01-20T15:30:00Z"
  }
}
```

### 3. Submit Diagnosis
```
POST /field/jobs/{job_id}/diagnosis
Headers:
  Authorization: Bearer {access_token}
Content-Type: application/json

Request Body:
{
  "issues_found": ["Issue 1", "Issue 2"],
  "diagnosis_photos": ["photo_url_1", "photo_url_2"],
  "spare_parts_needed": [1, 2, 3],
  "estimated_days": 2,
  "notes": "Found motherboard issue"
}

Response (201):
{
  "success": true,
  "data": {
    "diagnosis_id": 1,
    "quote_generated": true,
    "quote_amount": 4000
  }
}
```

### 4. Update Location (GPS Tracking)
```
POST /field/location/update
Headers:
  Authorization: Bearer {access_token}
Content-Type: application/json

Request Body:
{
  "latitude": 19.0760,
  "longitude": 72.8777,
  "accuracy": 10,
  "job_id": 1
}

Response (200):
{
  "success": true,
  "message": "Location updated"
}
```

### 5. Request Spare Parts
```
POST /field/spare-parts-request
Headers:
  Authorization: Bearer {access_token}
Content-Type: application/json

Request Body:
{
  "job_id": 1,
  "request_id": "SR123456",
  "items": [
    {
      "product_id": 1,
      "quantity": 2
    }
  ]
}

Response (201):
{
  "success": true,
  "data": {
    "request_id": "SPR123456",
    "status": "pending_approval",
    "estimated_delivery": "2025-01-21T10:00:00Z"
  }
}
```

---

## Error Handling

### Standard Error Response
```json
{
  "success": false,
  "message": "Error description",
  "errors": {
    "field_name": ["Error message 1", "Error message 2"]
  },
  "status_code": 422
}
```

### HTTP Status Codes
- **200 OK** - Successful GET, PUT, DELETE
- **201 Created** - Successful POST
- **400 Bad Request** - Invalid input
- **401 Unauthorized** - Missing or invalid token
- **403 Forbidden** - Insufficient permissions
- **404 Not Found** - Resource not found
- **422 Unprocessable Entity** - Validation error
- **429 Too Many Requests** - Rate limit exceeded
- **500 Internal Server Error** - Server error

---

## Part 2: Implementation Roadmap (Next 90 Days)

### Phase 1: Foundation (Weeks 1-2)
**Deliverables:**
- [ ] Database setup and migrations
- [ ] Authentication system (JWT + Sanctum)
- [ ] RBAC implementation
- [ ] API structure and middleware
- [ ] Error handling and logging

**Tasks:**
1. Create database migrations (as provided)
2. Implement authentication controller
3. Set up JWT token generation
4. Create middleware for role verification
5. Implement activity logging
6. Setup Redis for caching
7. Configure queue system

**Testing:**
- Unit tests for auth (90% coverage)
- Integration tests for database

---

### Phase 2: Core Modules (Weeks 3-5)
**Deliverables:**
- [ ] Product Management APIs
- [ ] Order Management APIs
- [ ] Customer Management APIs
- [ ] Warehouse Management APIs

**Tasks:**
1. Product CRUD with variants
2. Category and brand management
3. Inventory tracking
4. Order creation and tracking
5. Customer profiles
6. Address management

**Testing:**
- API endpoint tests
- Database relationship tests
- Cache layer tests

---

### Phase 3: Advanced Features (Weeks 6-8)
**Deliverables:**
- [ ] Service Request Management
- [ ] Engineer Assignment system
- [ ] Payment Integration (PhonePe)
- [ ] SMS Notifications (Fast2SMS)

**Tasks:**
1. Service request creation and tracking
2. Engineer assignment algorithm
3. Diagnosis documentation
4. Quote generation
5. PhonePe payment gateway
6. SMS OTP and notifications
7. Email notifications

**Testing:**
- Payment flow testing
- Service request workflow
- Notification delivery

---

### Phase 4: Field Operations (Weeks 9-11)
**Deliverables:**
- [ ] Field App APIs
- [ ] GPS Tracking
- [ ] Real-time Updates
- [ ] Offline Support

**Tasks:**
1. Engineer job assignment
2. Real-time location tracking
3. Spare parts request system
4. Photo documentation
5. OTP verification for delivery
6. Offline data sync

**Testing:**
- GPS accuracy testing
- Real-time update latency
- Offline sync reliability

---

### Phase 5: Analytics & Reporting (Week 12)
**Deliverables:**
- [ ] Dashboard APIs
- [ ] Report generation
- [ ] Export functionality

**Tasks:**
1. Sales reports
2. Service request analytics
3. Inventory reports
4. Staff performance
5. Customer insights
6. Financial reports

**Testing:**
- Report accuracy
- Large dataset performance

---

## Implementation Checklist

### Security Implementation
- [ ] AES-256 encryption for PAN, Aadhar, Bank Account
- [ ] Rate limiting on all endpoints
- [ ] Input validation on all requests
- [ ] CORS configuration
- [ ] SQL injection prevention
- [ ] XSS prevention
- [ ] CSRF protection
- [ ] File upload virus scanning
- [ ] SSL/TLS configuration
- [ ] API key rotation

### Performance Optimization
- [ ] Database indexing complete
- [ ] Redis caching implemented
- [ ] Query optimization done
- [ ] N+1 query problems resolved
- [ ] Database replication setup
- [ ] Load balancer configuration
- [ ] CDN integration
- [ ] API response compression

### Infrastructure Setup
- [ ] Nginx reverse proxy
- [ ] SSL certificates (Let's Encrypt)
- [ ] Firewall rules configured
- [ ] Backup automation
- [ ] Monitoring tools setup
- [ ] Log aggregation (ELK)
- [ ] Docker containerization
- [ ] CI/CD pipeline

### Testing
- [ ] Unit tests (>90% coverage)
- [ ] Integration tests
- [ ] API endpoint tests
- [ ] Load testing (10K+ RPS)
- [ ] Security penetration testing
- [ ] Backup restore testing
- [ ] Disaster recovery testing

### Documentation
- [ ] API documentation (Swagger/OpenAPI)
- [ ] Database schema documentation
- [ ] Deployment guide
- [ ] Configuration guide
- [ ] Troubleshooting guide
- [ ] User manual
- [ ] Admin guide

---

## Success Metrics

### Performance Targets
- API Response Time: < 200ms (p95)
- Database Query Time: < 100ms (p95)
- Throughput: 10,000+ req/second capacity
- Cache Hit Ratio: > 80%
- Error Rate: < 0.1%
- Uptime: 99.9%

### Scalability Metrics
- Support 1M+ concurrent users
- Handle 1TB+ database
- Process 10M+ transactions/month
- Support 100K+ orders/day
- Real-time tracking for 50K+ field operations

### Business Metrics
- Customer satisfaction: > 4.5/5
- Service completion rate: > 98%
- Payment success rate: > 99%
- Average order processing time: < 24 hours
- Customer retention: > 85%

---

**This comprehensive API and roadmap provides a complete blueprint for implementing Crackteck with enterprise-grade quality, security, and scalability.**
