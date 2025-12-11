# Documentation


## Roles: (same sequence)
1. Field Executive
2. Delivery Man
3. Sales Person
4. Customer
5. Admin


## Websites & Apps:

1. Frontend (E-commerce)
2. Backend (CRM) 
3. App (Customer, Sales Person, Field Executive, Delivery Man)

# Backend (CRM) 
- The backend panel is diveded into four parts such as e-commerce section, crm section, warehouse section and App settings

## Warehouse 

### Modules: 

1. Warehouses: 
    - Warehouse List 
    - Add Warehouse 
    - View Warehouse 
    - Edit Warehouse 
    - Delete Warehouse 

    Table: 
        id, warehouse_code, warehouse_name, warehouse_type, warehouse_addr1, warehouse_addr2, city, state, country, pincode, contact_person_name, phone_number, alternate_phone_number, email, working_hours, working_days, max_store_capacity, supported_operations, zone_conf, gst_no, licence_no, licence_doc, default_warehouse, status, verification_status, created_at, updated_at, deleted_at
        - add if something is missing 
    
    Note: 
    - verification_status: 0 - Pending, 1 - Verified, 2 - Rejected 
    - default_warehouse: 0 - No, 1 - Yes 
    - status: 0 - Inactive, 1 - Active 
    - Only one warehouse is default. 
    - Warehouse code is auto generated. 
    - Warehouse code is unique. 
    - Soft delete 
    - Show Available Stock, low stock, total stock, etc. in the list view 

    Defaults: 
        - verification_status: 0 
        - default_warehouse: 0 
        - status: 1 

    Model Relationships: 

    1. Has Many Warehouse Rack
        warehousesRacks()

    2. Has Many Product
        - total products count 
        - total available stock count 
        - total low stock count 
        - total scrap stock count 
        - etc. 
        
        products()
        


2. Warehouse Rack
    - Rack List 
    - Add Rack
    - Edit Rack
    - Delete Rack

    Table: 
        id, warehouse_id, rack_name, zone_area, rack_no, level_no, position_no, floor, quantity, filled_quantity, created_at, updated_at, deleted_at

    Note: 
    - filled_quantity <= quantity (constraint)
    - Soft delete 

    Model Relationships: 
    1. Belongs To Warehouse
        warehouse()


3. Product List: 
    - Vendor Tab: 
        - Vendor List 
        - Add Vendor 
        - Edit Vendor 
        - Delete Vendor
        - View Vendor

        - Table: 
            - Vendor Code
            - Vendor Name
            - Vendor Address
            - Vendor Contact Person
            - Vendor Contact Number
            - Vendor Email
            - Vendor GST Number
            - Vendor PAN Number
            - Vendor Profile Image
        
        Note: 
            - Vendor Code is auto generated.
            - Vendor Code is unique.
            - Soft delete 
            - Total Vendor POs, Total Vendor Invoices, Total Vendor Amount, etc. in the list view

        Model Relationships: 
        1. Has Many Vendor PO
            vendorPOs()


    - Vendor PO Tab: 
        - Vendor PO List 
        - Add Vendor PO 
        - Edit Vendor PO 
        - Delete Vendor PO 
        - View Vendor PO

        - Table: 
            - vendor Id
            - PO Number
            - Invoice Number
            - Invoice PDF/Image
            - Purchase Date
            - Bill Due Date
            - Bill Amount
            - Payment Status
            - Payment Date
            - Payment Mode
            - Payment Reference
            - Payment Remarks

        Note: 
            - Vendor Id is foreign key from Vendors table
            - PO Number is unique.
            - Soft delete 

        Model Relationships: 

        1. Belongs To Vendor
            vendor()
        2. Has Many Vendor PO Item
            vendorPOItems()
        3. Has Many Product
            products()
            

    - Product Tab: 
        - Product List 
        - Add Product 
        - Edit Product 
        - Delete Product 
        - View Product
        - Import Product 
        - Export Product 

        - Product Table: 
            - Vendor Id
            - Vendor Order Id 
            - Warehouse id 
            - name 
            - sku 
            - hsn code
            - brand (brands table)
            - model no 
            - serial no 
            - category (categories table)
            - sub category (sub categories table)
            - short description 
            - full description 
            - technical specification 
            - brand warranty 
            - company warranty 
            - cost price 
            - selling price 
            - discount price 
            - tax 
            - final price (auto calculated)
            - stock quantity 
            - primary image 
            - additional images 
            - datasheet/manual (pdf/excel)
            - variations (variants table)
            - status 
            - stock status 
            - warehouse rack 
            - zone area 
            - rack no 
            - level no 
            - position no 
            - created at 
            - updated at 
            - deleted at 
            
        
        Note: 
            - Vendor Id is foreign key from Vendors table
            - Vendor Order Id is foreign key from Vendor Orders table
            - Warehouse id is foreign key from Warehouses table
            - Brand is foreign key from Brands table
            - Category is foreign key from Categories table
            - Sub Category is foreign key from Sub Categories table
            - Variations is foreign key from Variants table 
            - Soft delete 
            - Stock status: 0 - In Stock, 1 - Low Stock, 2 - Out of Stock, 3 - Scrap

        Model Relationships: 
            1. Belongs To Vendor
            2. Belongs To Vendor Order
            3. Belongs To Warehouse
            4. Belongs To Brand
            5. Belongs To Category
            6. Belongs To Sub Category
            7. Belongs To Variants
            8. Has Many Product Serial

        - Product Serial Table: 
            - Product Id
            - Auto Generated Serial
            - Manual Serial
            - Final Serial (auto generated from auto or manual)
            - Is Manual (boolean)
            - Status (active, inactive, sold, scrap)
            - Created at 
            - Updated at 
            - Deleted at 

        Note: 
            - If manual serial is provided, use it as final serial and mark is_manual as true 
            - If manual serial is not provided, use auto generated serial as final serial and mark is_manual as false
            - Status is default active
            - Soft delete 
            - If product is scrapped, mark status as scrap and move to scrap items table
            - If product is sold, mark status as sold
            - If product is active, mark status as active
            - If product is inactive, mark status as inactive   

        Model Relationships: 
            1. Belongs To Product 


4. Scrap Items: 

    - Scrap Items List 
    - Add Scrap Item 
    - Restore Scrap Item 
    - View Scrap Item 

    Table: 
        - Product Id 
        - Product Serial Id 
        - Reason for Scrap
        - Quantity Scrapped
        - Scrapped At
        - Scrapped By

    Note: 
        - Product Id is foreign key from Products table
        - Product Serial Id is foreign key from Product Serials table
        - Quantity Scrapped is always greater than or equal to 1
        - Reason for Scrap is required
        - Soft delete 
        - Scrapped At is auto generated
        - Scrapped By is auto generated

    Model Relationships: 
        1. Belongs To Product
        2. Belongs To Product Serial
        3. Belongs To User (Scrapped By)




5. Track Product 
    - Search Product by SKU or Serial Number

    Table: 
        - Refer Product Table
        - Refer Product Serial Table
        - etc. 


6. Spare Parts Request  
    - List of spare parts request 
    - View Spare Parts Request 
    - Update Quantity 
    - Update Status 
    - etc. 

    Tables: 

        Requests Table: 
            - Requested By (Engineer)
            - Requested For (Customer)
            - Requested At
            - Requested Quantity
            - Delivered Quantity
            - Assigned Delivery Man
            - Assigned At
            - Delivered At
            - Status (pending, in progress, delivered, cancelled)
            - etc. 

        Requested Products Table: 

    Note: 
        - Product Id is foreign key from Products table
        - Product Serial Id is foreign key from Product Serials table
        - Requested By is foreign key from Engineers table
        - Requested For is foreign key from Customers table
        - Assigned Delivery Man is foreign key from Delivery Men table
        - Soft delete 
        - etc. 
        


7. Stock Report:    
    - List of stock report 
    - View Stock Report 
    - Add Stock Report 
    - Update Stock Report 
    - Delete Stock Report 

    Table: 
        - Product Id 
        - Product Serial Id 
        - etc. 

8. Low Stock Report
9. Vendor Purchase Bill


## CRM

## E-commerce

## App Settings



















# Frontend (E-commerce) 


# App (Customer, Sales Person, Field Executive, Delivery Man) - APIs