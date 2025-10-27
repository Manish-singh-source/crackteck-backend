# Spare Parts Request Module - Quick Start Guide

## Module Location
- **URL**: `/warehouse/spare-parts`
- **Controller**: `app/Http/Controllers/SparePartController.php`
- **Model**: `app/Models/SparePartRequest.php`
- **Views**: `resources/views/warehouse/spare-parts-requests/`

## Quick Navigation

### 1. View All Spare Part Requests
**URL**: `http://yourapp.com/warehouse/spare-parts`

**What You'll See:**
- Table with all spare part requests
- 12 columns showing complete request information
- Color-coded status and urgency badges
- View button for each request

**Table Columns:**
- Sr. No. (Serial Number)
- Product Name
- Type (Category)
- Brand
- Module Number
- Serial Number
- Requested By (Engineer Name)
- Request Date
- Urgency Level
- Quantity
- Approval Status
- Action (View Button)

### 2. View Request Details
**URL**: `http://yourapp.com/warehouse/view-spare-part/{id}`

**Example**: `http://yourapp.com/warehouse/view-spare-part/1`

**What You'll See:**
Four information cards:

#### Card 1: Spare Part Request
- Engineer Name
- Service Request ID
- Request Date
- Approval Status

#### Card 2: Spare Part Details
- Product Image
- Product Name
- Type/Category
- Brand
- Model Number
- Serial Number
- Quantity Requested
- Reason for Request

#### Card 3: Customer Details (Engineer Info)
- Engineer Name
- Contact Number
- Address

#### Card 4: Assign Delivery Man
- Dropdown to select delivery man
- Current assignment display
- Assign button

### 3. Assign Delivery Man
**Steps:**
1. Go to request detail page
2. Scroll to "Assign Delivery Man" card
3. Select a delivery man from dropdown
4. Click "Assign Delivery Man" button
5. Page refreshes with success message
6. Current assignment is displayed

## Database Structure

### spare_part_requests Table
```
id                  - Auto-increment primary key
product_id          - Links to products table
requested_by        - Links to engineers table
delivery_man_id     - Links to delivery_men table (optional)
request_date        - Date of request
urgency_level       - Low, Medium, High, Critical
quantity            - Number of items requested
reason              - Why the spare part is needed
approval_status     - Pending, Approved, Rejected
service_request_id  - Reference ID (e.g., SR-00001)
created_at          - Timestamp
updated_at          - Timestamp
```

## Status & Urgency Levels

### Approval Status
| Status | Color | Meaning |
|--------|-------|---------|
| Pending | Red | Awaiting approval |
| Approved | Green | Request approved |
| Rejected | Yellow | Request rejected |

### Urgency Level
| Level | Color | Priority |
|-------|-------|----------|
| Critical | Red | Highest priority |
| High | Yellow | High priority |
| Medium | Blue | Normal priority |
| Low | Green | Low priority |

## API Routes

```
GET    /warehouse/spare-parts
       → Lists all spare part requests
       → Route name: spare-parts.index

GET    /warehouse/view-spare-part/{id}
       → Shows details of specific request
       → Route name: spare-parts.view

POST   /warehouse/assign-delivery-man/{id}
       → Assigns delivery man to request
       → Route name: spare-parts.assign-delivery-man
```

## Creating Test Data

Run the seeder to create sample data:
```bash
php artisan db:seed --class=SparePartRequestSeeder
```

This creates 10 sample spare part requests with:
- Random products
- Random engineers
- Random delivery men (if available)
- Various urgency levels
- Different approval statuses
- Sample reasons

## Common Tasks

### View All Requests
1. Navigate to `/warehouse/spare-parts`
2. Browse the table
3. Click View button for details

### Assign Delivery Man
1. Go to request detail page
2. Find "Assign Delivery Man" card
3. Select delivery man from dropdown
4. Click "Assign Delivery Man"
5. Confirm success message

### Check Request Status
1. View request details
2. Look at "Spare Part Request" card
3. Status badge shows current approval status

### View Product Details
1. Go to request detail page
2. Check "Spare Part Details" card
3. See product image, specs, and serial number

## Troubleshooting

### No Requests Showing
- Check if spare part requests exist in database
- Run seeder: `php artisan db:seed --class=SparePartRequestSeeder`
- Verify products and engineers exist

### Delivery Man Dropdown Empty
- Ensure delivery men exist in database
- Check that delivery men have status = 'Active'
- Add delivery men if needed

### Image Not Showing
- Check if product has main_product_image path
- Verify image file exists in public folder
- Placeholder image will show if not available

### Form Validation Error
- Ensure delivery man is selected
- Verify delivery man ID exists in database
- Check form submission method is POST

## Performance Tips

1. **Pagination**: Can be added to index view for large datasets
2. **Search**: Can be implemented for filtering requests
3. **Filters**: Can be added for status, urgency, date range
4. **Export**: Can be added for CSV/PDF export

## Security Features

- ✅ CSRF protection on forms
- ✅ Validation on all inputs
- ✅ Foreign key constraints
- ✅ Proper authorization ready (can be added)
- ✅ Input sanitization

## Related Models

- **Product** - Spare part being requested
- **Engineer** - Person requesting the spare part
- **DeliveryMan** - Person assigned to deliver the spare part

## File Locations

```
app/
├── Models/
│   └── SparePartRequest.php
└── Http/
    └── Controllers/
        └── SparePartController.php

database/
├── migrations/
│   └── 2025_10_27_173735_create_spare_part_requests_table.php
└── seeders/
    └── SparePartRequestSeeder.php

resources/views/warehouse/spare-parts-requests/
├── index.blade.php
└── view.blade.php

routes/
└── warehouse.php
```

## Next Steps

1. ✅ Module is ready to use
2. Add approval workflow (approve/reject buttons)
3. Add search and filter functionality
4. Add email notifications
5. Add delivery tracking
6. Add activity logging

