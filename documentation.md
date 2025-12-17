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

(CRM)
1. Roles: List of roles available in the system 
    - List of roles available in the system 
    - Add Role 
    - View Role 
    - Update Role 
    - Delete Role 
    
2. Staff: List of staff available in the system (admin, sales person, field executive, delivery man, engineer) 
    - List of staff available in the system 
    - Add Staff 
    - View Staff 
    - Update Staff 
    - Delete Staff 

    Table: 
        `staff`: 
            - staff_id (auto generated) 
            - staff_role (engineer, sales_person, delivery_man, field_executive, admin) 
            - first_name 
            - last_name 
            - phone 
            - email 
            - dob 
            - gender 

            - employment_type (full_time, part_time) 
            - joining_date 
            - assigned_area (for field executive) 
            
            - otp (for engineer) 
            - otp_expiry (for engineer) 
            
            - status (active, inactive, resigned, terminated, blocked, suspended, pending) 
            - created_at 
            - updated_at 
            - deleted_at 

        `staff_address`: 
            - staff_id
            - address1
            - address2 
            - city 
            - state 
            - country 
            - pincode 
            
        `staff_aadhar_details`: 
            - staff_id
            - aadhar_number (unique) 
            - aadhar_front_path 
            - aadhar_back_path 

        `staff_pan_card_details`: 
            - staff_id
            - pan_number (unique) 
            - pan_card_front_path 
            - pan_card_back_path 

        `staff_bank_details`: 
            - staff_id
            - bank_acc_holder_name 
            - bank_acc_number 
            - bank_name 
            - ifsc_code 
            - passbook_pic 

        `staff_vehical_details`: 
            - staff_id
            - vehicle_type 
            - vehical_no 
            - driving_license_no 
            - driving_license 

        `staff_police_verification`: 
            - staff_id
            - police_verification 
            - police_verification_status 
            - police_certificate 
            
        `staff_work_skills`:
            - staff_id
            - primary_skills 
            - certifications 
            - experience 
            - languages_known 
            - employment_history 

        

3. Customers: 
    - List of customers available in the system (e-commerce customers, crm customers, both) 
    
    (E-commerce)
    - E-commerce Customers: 
        - List of customers available in the system 
        - View Customer 
        - Add Customer 
        - Update Customer 
        - Delete Customer 
    
    (CRM & App Customers)
    - CRM & App Customers:  
        - List of customers available in the system 
        - View Customer 
        - Add Customer 
        - Update Customer 
        - Delete Customer 

    Table: 
        `customers`: 
            - customer_id (auto generated) 
            - created_by - default null
            - first_name 
            - last_name 
            - phone 
            - email 
            - dob 
            - gender 
            - customer_type (e-commerce, crm, both, offline)     
            - source_type (website, app, call, walkin, other) 
            - password 
            - status (active, inactive, blocked, suspended) 
            - created_at 
            - updated_at 
            - deleted_at 
        
        Note: 
            - Created By: default null, only if admin creates customer, fill created by using login user id
            - phone: unique 
            - email: unique 
            - soft delete 

        `customer_company_details`: 
            - customer_id (foreign key) 
            - company_name 
            - address1
            - address2 
            - city 
            - state 
            - country 
            - pincode 
            - gst_no 

        Note: 
            - Not mandatory table 
            - Company name is unique
            - GST number is unique
            - Multiple addresses can be added 
            - soft delete 

        `customer_address_details`: 
            - customer_id (foreign key) 
            - branch_name 
            - address1
            - address2 
            - city 
            - state 
            - country 
            - pincode 
            - is_primary (1 - primary, 0 - secondary) 
            - created_at 
            - updated_at 
            - deleted_at 
        
        Note: 
            - Customer can have multiple addresses 
            - One address can be primary and rest can be secondary 
            - Primary address is used for all communications 
            - Secondary address is used for reference only
            - Primary address is mandatory
            - Soft delete

        `customer_aadhar_details`: 
            - customer_id (foreign key) 
            - aadhar_number (unique) 
            - aadhar_front_path 
            - aadhar_back_path 
            - created_at 
            - updated_at 
            - deleted_at 

        Note: 
            - Not mandatory table 
            - soft delete 

        `customer_pan_card_details`: 
            - customer_id (foreign key) 
            - pan_number (unique) 
            - pan_card_front_path 
            - pan_card_back_path 
            - created_at 
            - updated_at 
            - deleted_at 
        
        Note: 
            - Not mandatory table 
            - soft delete 



    (Warehouse)
4. Warehouses: 
    - Warehouse List 
    - Add Warehouse 
    - View Warehouse 
    - Edit Warehouse 
    - Delete Warehouse 

    `warehouses`:
        warehouse_id (auto generated), 
        name, 
        type, 
        address1, 
        address2, 
        city, 
        state, 
        country, 
        pincode,

        contact_person_name, 
        phone_number, 
        alternate_phone_number, 
        email, 
        
        working_hours, 
        working_days, 
        max_store_capacity, 
        supported_operations, 
        zone_conf, 
        
        gst_no, 
        licence_no, 
        licence_doc, 
        
        verification_status, 
        default_warehouse, 
        status, 
        created_at, 
        updated_at, 
        deleted_at

        - add if something is missing 
    
    Note: 
    - verification_status: 0 - Pending, 1 - Verified, 2 - Rejected 
    - default_warehouse: 0 - No, 1 - Yes 
    - status: 0 - Inactive, 1 - Active 
    - Only one warehouse is default. 
    - Warehouse Id is auto generated. 
    - Warehouse Id is unique. 
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
        


5. Warehouse Rack: 
    - Rack List 
    - Add Rack
    - Edit Rack
    - Delete Rack

    Table: 
        id
        warehouse_id
        rack_name
        zone_area
        rack_no
        level_no
        position_no
        floor
        quantity
        filled_quantity
        created_at
        updated_at
        deleted_at

    Note: 
    - filled_quantity <= quantity (constraint)
    - Soft delete 

    Model Relationships: 
    1. Belongs To Warehouse
        warehouse()








    (E-commerce)
6. Category: 
    
    - Parent Category 
        - List of categories available in the system 
        - Add Category 
        - View Category 
        - Update Category 
        - Delete Category 
        - Sort Order 

    - Sub Category 
        - List of sub categories available in the system 
        - Add Sub Category 
        - View Sub Category 
        - Update Sub Category 
        - Delete Sub Category 
        - Sort Order 

    Table: 
        `parent_categories`: 
            - id (auto generated) 
            - slug 
            - name 
            - image 
            - sort_order 
            - status_ecommerce 
            - status 
            - created_at 
            - updated_at 
            - deleted_at 

        Note: 
            - Slug is auto generated from name 
            - Slug is unique 
            - Sort order is auto incremented (for showing on website)
            - Soft delete 
            - Status ecommerce: 0 - No, 1 - Yes (for showing on e-commerce website) 
            - Status: 0 - Inactive, 1 - Active 

        `sub_categories`: 
            - id (auto generated) 
            - parent_category_id (foreign key) 
            - slug 
            - name 
            - image 
            - icon_image 
            - status_ecommerce (for showing on e-commerce website) 
            - status 
            - created_at 
            - updated_at 
            - deleted_at 

        Note: 
            - Slug is auto generated from name 
            - Slug is unique 
            - Soft delete 
            - Status ecommerce: 0 - No, 1 - Yes (for showing on e-commerce website) 
            - Status: 0 - Inactive, 1 - Active 
        

7. Brand: 
    - List of brands available in the system 
    - Add Brand 
    - Update Brand 
    - Delete Brand 
    
    Table: 
        `brands`: 
            - id (auto generated) 
            - slug 
            - name 
            - image 
            - status_ecommerce (for showing on e-commerce website) 
            - status 
            - created_at 
            - updated_at 
            - deleted_at 
    
    Note: 
        - Slug is auto generated from name 
        - Slug is unique 
        - Soft delete 
        - Status ecommerce: 0 - No, 1 - Yes (for showing on e-commerce website) 
        - Status: 0 - Inactive, 1 - Active 

8. Variations: 
    - Attributes: 
        - List of attributes available in the system 
        - Add Attribute 
        - View Attribute 
        - Update Attribute 
        - Delete Attribute 

    - Attribute Values: 
        - List of attribute values available in the system 
        - Add Attribute Value 
        - View Attribute Value 
        - Update Attribute Value 
        - Delete Attribute Value 

    Table: 
        `product_variant_attributes`: 
            - id (auto generated) 
            - name 
            - status 
            - created_at 
            - updated_at 
            - deleted_at 

        `product_variant_attribute_values`:     
            - id (auto generated) 
            - attribute_id (foreign key) 
            - value 
            - status 
            - created_at 
            - updated_at 
            - deleted_at 

(Warehouse)
9. Vendor: 
    - List of vendors available in the system 
    - Add Vendor 
    - View Vendor 
    - Update Vendor 
    - Delete Vendor 
    
    Table: 
        `vendors`: 
            - vendor_id (auto generated) 
            - created by - default null
            - name  
            - phone 
            - email 

            - address1
            - address2 
            - city 
            - state 
            - country 
            - pincode 

            - pan_no 
            - gst_no 

            - status 
            - created_at 
            - updated_at 
            - deleted_at 

    Note: 
        - Created by: default null, only if admin creates vendor, fill created by using login user id
        - Soft delete 
        - Status: 0 - Inactive, 1 - Active 
        - Create Own warehouse for currently available stock

10. Vendor Purchase Order:  
    - List of vendor purchase orders available in the system 
    - Add Vendor Purchase Order 
    - View Vendor Purchase Order 
    - Update Vendor Purchase Order 
    - Delete Vendor Purchase Order 

    Table: 
        `vendor_purchase_orders`: 
            - vendor_purchase_order_id (auto generated) 
            - vendor_id (foreign key) 
            - po_number (unique) 
            - invoice_number (unique) 
            - invoice_pdf 
            - purchase_date 
            - po_amount_due_date 
            - po_amount 
            - po_status (pending, approved, rejected, cancelled) 
            - created_at 
            - updated_at 
            - deleted_at 


    Note: 
        - PO Number is unique 
        - Invoice Number is unique 
        - Soft delete 
        - PO Status: 0 - Pending, 1 - Approved, 2 - Rejected, 3 - Cancelled  - default: 1 - Approved 



(CRM)
11. Manage Pincode: 
    - List of pincodes available in the system 
    - Add Pincode 
    - View Pincode 
    - Update Pincode 
    - Delete Pincode 

    Table: 
        `pincodes`: 
            - id (auto generated) 
            - pincode 
            - delivery_status (active, inactive) 
            - installation_status (active, inactive) 
            - repair_status (active, inactive) 
            - quick_service_status (active, inactive) 
            - amc_status (active, inactive) 
            - created_at 
            - updated_at 
            - deleted_at 

    Note: 
        - Pincode is unique 
        - All status are active by default 
        - Soft delete 
        - Status: 0 - Inactive, 1 - Active 


11. Product: 
    (Warehouse)
    - Warehouse Product: 
        - List of All products available in the system 
        - Add Warehouse Product 
        - View Warehouse Product 
        - Update Warehouse Product 
        - Delete Warehouse Product 

    Table: 
        `products`: 
            <!-- foreign keys -->
            - product_id (auto generated) 
            - vendor_id (foreign key) 
            - vendor_purchase_order_id (foreign key) 

            - brand_id (foreign key) 
            - parent_category_id (foreign key) 
            - sub_category_id (foreign key) 

            <!-- rack details -->
            - warehouse_id (foreign key) 

            <!-- product details -->
            - name 
            - hsn_code 
            - sku 
            - model_no 
            - short_description 
            - full_description 
            - technical_specification 
            - brand_warranty 
            - company_warranty 
            
            - cost_price 
            - selling_price 
            - discount_price 
            - tax 
            - final_price 
            
            - stock_quantity 
            - stock_status (in stock, low stock, out of stock, scrap) 
            
            - main_product_image 
            - additional_product_images 
            - datasheet_manual 
            
            - variations (json) 

            - status (active, inactive) 
            - created_at 
            - updated_at 
            - deleted_at 

            

            <!-- pending for future -->
            - warehouse_rack_id (foreign key) 
            - rack_zone_area 
            - rack_no 
            - level_no 
            - position_no 
            - expiry_date 
            - rack_status (available, blocked, reserved) 

            
        Note: 
            - Stock quantity is always greater than or equal to 0 
            - Stock status is auto generated based on stock quantity 
            - Soft delete 
            - Status: 0 - Inactive, 1 - Active 


        `product_serials`: 
            - product_serial_id (auto generated) 
            - product_id (foreign key) 

            - auto_generated_serial 
            - manual_serial 

            - price ( Fetch from product table and if we want to change for specific serial, we can change )
            - cost_price 
            - selling_price 
            - discount_price 
            - tax 
            - final_price 

            - Images ( Fetch from product table and if we want to change for specific serial, we can change )
            - main_product_image 
            - additional_product_images

            - status (active, inactive, sold, scrap) 
            
            - created_at 
            - updated_at 
            - deleted_at 

    (E-commerce)
    - E-commerce Product: 
        - List of All products available in the system 
        - Add E-commerce Product 
        - View E-commerce Product 
        - Update E-commerce Product 
        - Delete E-commerce Product 

        Table: 
        `ecommerce_products`: 
            - ecommerce_product_id (auto generated) 
            - warehouse_product_id (foreign key) 
            - sku 

            - with_installation (json) 

            <!-- optional fields repeated from warehouse product -->
            - company_warranty 
            - short_description 
            - full_description 
            - technical_specification 

            - min_order_qty - default 1
            - max_order_qty - default : stock quantity

            - shipping_charges 
            - shipping_class (light, heavy, fragile) 

            - is_featured 
            - is_best_seller 
            - is_suggested 
            - is_todays_deal 

            - product_tags (json) 

            - status (active, inactive, draft) 

            - meta_title 
            - meta_description 
            - meta_keywords 
            - meta_product_url_slug 

            - created_at 
            - updated_at 
            - deleted_at 

        Note: 
            - SKU is unique 
            - Meta Product URL Slug is unique 
            - Soft delete 
            - Status: 0 - Inactive, 1 - Active, 2 - Draft 
            - Meta Product URL Slug is auto generated from meta title 
            - This product relates to the warehouse product
            - Warehouse product can be related to multiple product serials table




    (CRM)
12. Covered Items: 
    - Add Covered Item 
    - Edit Covered Item 
    - Delete Covered Item 
        
    - List of covered items lists with (service type, covered item name, no of diagonisis)
    

    Table: 
        `covered_items`: 
            - id (auto generated)   
            - service_type (amc, quick_service, installation, repair) 
            - service_name 
            - service_charge ( if service type is amc then not required )
            - status 

            - diagonisis_list (json) 

            - created_at 
            - updated_at 
            - deleted_at 

    Note: 
        - Soft delete 
        - Status: 0 - Inactive, 1 - Active 
        - Diagonisis List: json array of diagonisis list
        - If service type is amc then not required to add service charge


13. AMC Plans: List of AMC plans like Yearly, Monthly, etc. with covered items
    - Add AMC Plan 
    - View AMC Plan 
    - Update AMC Plan 
    - Delete AMC Plan 

    Table: 
        `amc_plans`: 
            - id (auto generated)
            - plan_name 
            - plan_code 

            - description 
            - duration  ( If custom, then we will ask for duration as number of years ) - number in months
            - total_visits 

            - plan_cost 
            - tax 
            - total_cost 
            - pay_terms 

            - support_type 
            - covered_items (json) ( List of covered items only for AMC include diagnosis )

            - brochure 
            - tandc 
            - replacement_policy 

            - status 
            - created_at 
            - updated_at 
            - deleted_at 


    Note: 
        - Plan Code is unique 
        - Duration: 1 - 6 Months, 2 - 12 months, 3 - 24 months, 4 - 36 months, 5 - Custom 
        - Soft delete 
        - Status: 0 - Inactive, 1 - Active 
    

14. Quick Services Plans: List of quick services like Quick Repair, Full Cleaning, etc. with price and covered items
    - List of quick services available in the system 
    - No of Diagnosis available for each quick service 
    - Price for each quick service 
    - View Quick Service 

15. Installation Services Plans: List of installation services like Home Installation, Office Installation, etc. with price and covered items
    - List of installation services available in the system 
    - No of Diagnosis available for each installation service 
    - Price for each installation service 
    - View Installation Service 
    
16. Repairing Services Plans: List of repairing services like Battery Replacement, Screen Repair, etc. with price and covered items
    - List of repairing services available in the system 
    - No of Diagnosis available for each repairing service 
    - Price for each repairing service 
    - View Repairing Service 

15. Service Request: 
    1. Non-AMC Service: - Installation Services - Repairing Services: List of non amc services requested by customers
    2. AMC Services: List of AMC services requested by customers
    3. Quick Service Requests: List of quick service requests requested by customers

    Table: 
        For This we need 8 different tables
        - service_requests: 
        - products_list:
        - assigned-engineer:
        - assigned_group_engineers:
        - engineer_diagnosis_details:
        - request_products: 
        - assigned_delivery_man:
        - quotation:

        `service_requests`: 
            - request_id (auto generated) 
            - request_plan_id (foreign key) - from (covered items table)
            - customer_id (foreign key) 
            - request_date 
            - request_status (pending, approved, rejected, processing, processed, picking, picked, completed) 
            - request_source (customer, system) 
            - created_by (if created by system, then show admin) 
            - assign_status - (0 - Not Assigned, 1 - Assigned)
            - created_at 
            - updated_at 
            - deleted_at 

        Note: 
            - Request Source: If customer, then store source as customer and id in created_by, if system, then store source as system and id in created_by 

        `products_list`: 
            - product_list_id (auto generated) 
            - service_requests_id (foreign key) 
            - name 
            - model_no 
            - sku
            - hsn
            - brand
            - image
            - description
            - status (pending, approved, rejected, processing, in_progress, on_hold, diagnosis_completed, processed, picking, picked, completed)
            - created_at 
            - updated_at 
            - deleted_at 


        Note: 
            - Statuses: 
                - Pending: When request is created 
                - Approved: When request is approved by customer
                - Rejected: When request is rejected by customer

                - Processing: When request is assigned to engineer 
                - In Progress: When engineer starts working on the request 
                - on Hold: When request is on hold 
                - diagnosis_completed: When engineer has completed the diagnosis
                - Processed: When engineer has completed the diagnosis and completed the request 
                
                - Picking: When engineer is picking the product from customer 
                - Picked: When engineer has picked the product from customer 
                
                - Completed: When request is completed 


        `assigned-engineer`: 
            - id (auto generated) 
            - request_id (foreign key) 
            - engineer_id (foreign key)    
            
            - assignment_type (individual, group) 
            - assigned_at 
            - transferred_to (to whom request transferred) 
            - transferred_at (when request is transferred) 
            - notes  - (reason)
            - status (active, inactive) 
            - created_at 
            - updated_at 
            - deleted_at 

        Note: 
            - status: if active then only that engineer can work on the request. inactive means engineer is not working on the request or previous engineer has transferred the request to another engineer
            

        `assigned_group_engineers`: 
            - id (auto generated) 
            - assigned_engineer_id (foreign key) 
            - engineer_id (foreign key) 
            - group_name (if group assignment) 
            - is_supervisor (boolean) 
            - created_at 
            - updated_at 
            - deleted_at     










        `engineer_diagnosis_details`: 
            - id (auto generated) 
            - assignment_id (foreign key) 
            - diagnosis_types (json) 
            - diagnosis_notes 
            - completed_at 
            - created_at 
            - updated_at 
            - deleted_at    

        `engineer_product_delivery`: 
            - id (auto generated) 
            - request_id (foreign key) 
            - assignment_id (foreign key) 
            - product_id (foreign key) 
            - quantity 
            - delivered_at 
            - created_at 
            - updated_at 
            - deleted_at     

        `request_products`: 
            - id (auto generated) 
            - request_id (foreign key) 
            - product_id (foreign key) 
            - quantity 
            - price
            - assigned_delivery_man (delivery man , engineer)
            - created_at 
            - updated_at 
            - deleted_at 

        `assigned_delivery_man`: 
            - id (auto generated) 
            - request_id (foreign key) 
            - delivery_man_id (foreign key) 
            - assigned_at 
            - created_at 
            - updated_at 
            - deleted_at         

        `quotation`: 
            - id (auto generated) 
            - request_id (foreign key) 
            - quotation_from_admin (only price of that services)
            - quotation_status (pending, approved, rejected) 
            - quotation_date 
            - quotation_amount
            - quotation_file
            - created_at 
            - updated_at 
            - deleted_at     


16. Track Request: (Pending)

17. Case Transfer: List of case transfer requests from engineer 
    - List of case transfer requests 
    - View Case Transfer Request 
    - Approve/Reject Case Transfer Request 
    - Re-assign Engineer 
    - Assigned Engineer History 
    - Case Transfer History 

    Table: 
        `case_transfer_requests`: 
            - request_id (auto generated) 
            - Service Request Type (AMC, Non-AMC, Quick Service) 
            - Service Request Id (foreign key) 
            - Requested By (Engineer)
            - Re-assigned Engineer 
            - Engineer Reason 
            - Admin Reason 
            - Status (pending, approved, rejected) 
            
    Note: 
        - Service Request Type: 1 - AMC, 2 - Non-AMC, 3 - Quick Service 
        - Service Request Id: foreign key from respective service request table 
        - Status: pending -> approved -> rejected 
        - Soft delete 
        - Show Diagnosis details when view 
        - When transferred, update the service request table with new engineer id 

    Model Relationships: 
        1. Belongs To Service Request (Polymorphic)
        2. Belongs To Requested By (Engineer)
        3. Belongs To Re-assigned Engineer (Engineer)
            
18. Chats Logs

18. Activity Log: List of all activities performed in the system 

19. Pickup Request: List of pickup requests from engineers for customer product 
    - List of pickup requests 
    - View Pickup Request 
        - List of products 
        - Show Diagnosis details 
        - Update Status (pending, approved, rejected) 
        - Delivery/Engineer Man Assignment 

    Table: 
        `pickup_requests`: 
            - pickup_request_id (auto generated) 
            - Service Request Type (AMC, Non-AMC, Quick Service) 
            - Service Request Id (foreign key) 
            - Requested By (Engineer)
            - Assigned Delivery/Engineer Man (For Pickup) 
            - Assigned At 
            - Assigned Delivery/Engineer Man (For Delivery) 
            - Delivered At 
            - Status (pending, approved, rejected) 
            - etc. 
        
    Note: 
        - Status: pending -> approved -> rejected 
        - Either delivery man will be assigned or engineer will pick the product 
        - Soft delete 
        - Change status to picked for service request when engineer picks the product 
        - Change status to completed/cancelled for service request when delivery man delivers the product 
        - When product delivered verify customer using otp verification

20. Remote Jobs: visible to admin, team head 
    - List of requests coming from field executive for remote diagnosis 
    - List of remote jobs 
    - View Remote Job 
        - Assign Remote Engineer 
    - Update Remote Job 
    - Delete Remote Job 
    - Add Remote Job 
        - Assign Remote Engineer 

21. Assigned Jobs: visible to remote engineers 
    - List of jobs assigned to engineers 
    - View Assigned Job 
        - Start Job 
        - Diagnosis 
        - Take Action 
        - Escalate to Onsite 
        - Complete Job 
        
    Note: 
        - Display Escalate button only if job is not escalated and for every step 

22. Field Issues: visible to admin, team head 
    - List of field issues 
    - View Field Issue 
        - Assign Remote Engineer 
    - Add Field Issue 
    - Update Field Issue 

    Note: 
        - Tab switching: All issues, Pending, In Progress, Completed


23. Stock In Hand: engineer get stock from warehouse and use it for field service 
    - List of stock in hand 
        - All, Available, Used
    - View Stock In Hand 
    - Add Stock In Hand 
    - Update Stock In Hand 
    - Delete Stock In Hand 
    - Transfer Stock In Hand return to warehouse 

    Table: 
        `stock_in_hand`:
            - stock_in_hand_id (auto generated)
            <!-- - Product Id  -->
            - Product Serial Id 
            - Requested By (Engineer)
            - Requested Quantity
            - Delivered Quantity
            - Status (pending, approved, rejected, picked, used, returned, cancelled)
            
        `stock_in_hand_products`:
            - stock_in_hand_product_id (auto generated)
            - stock_in_hand_id (foreign key)
            - product_id (foreign key)
            - product_serial_id (foreign key)
            - quantity (requested quantity)
            - delivered_quantity
            - status (pending, approved, rejected, picked, used, returned, cancelled)

    Note: 
        - Requested By is foreign key from Engineers table
        - Status: pending -> approved -> picked -> used -> returned -> cancelled
        - Soft delete 

24. Spare Parts Request: List of spare parts request sent by engineers after going to customer site 
    - List of spare parts request 
        - All, Pending, Approved, Rejected, Cancelled
    - View Spare Parts Request 
    - Add Extra Product 
    - Remove Product 
    - Update Product 
    - Update Status (pending, approved, rejected) 

    Tables: 
        `spare_part_requests`:
            - request_id (auto generated)
            - Requested By (Engineer)
            - Requested For (Customer)
            - Requested At
            - Assigned Delivery Man
            - Assigned At
            - Delivered At
            - Status (pending, in progress, delivered, cancelled)
            - etc. 

        `stock_in_hand_pivot`:


    Note: 
        - Product Id is foreign key from Products table
        - Product Serial Id is foreign key from Product Serials table
        - Requested By is foreign key from Engineers table
        - Requested For is foreign key from Customers table
        - Assigned Delivery Man is foreign key from Delivery Men table
        - Soft delete 
        - etc. 
        


25. Stock Report:    
    - List of stock report 
    - View Stock Report 
    - Add Stock Report 
    - Update Stock Report 
    - Delete Stock Report 

    Table: 
        - Product Id 
        - Product Serial Id 
        - etc. 


25. Leads:
26. Follow Up:
27. Meets:
28. Quotations:

(Warehouse)
29. Scrap Items:
30. Track Product:
33. Stock Reports: 
34. Low Stock Report: 

(E-commerce)
35. Orders:
36. Coupons:
37. Subscribers:
38. Contacts: 
39. Banner:
    - Website Banner 
    - Promotional Banner    
40. Testimonials:
41. Product Deal Offers:
42. Collections:
43. Profile: 

(CRM)
44. Tickets:
45. Invoices:

(Admin Panel & Website Setting)
46. Settings:





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




5. Track Product - Pending
    - Search Product by SKU or Serial Number

    Table: 
        - Refer Product Table
        - Refer Product Serial Table
        - etc. 



6. Stock In Hand: engineer get stock from warehouse and use it for field service 
    - List of stock in hand 
        - All, Available, Used
    - View Stock In Hand 
    - Add Stock In Hand 
    - Update Stock In Hand 
    - Delete Stock In Hand 
    - Transfer Stock In Hand return to warehouse 

    Table: 
        `stock_in_hand`:
            - stock_in_hand_id (auto generated)
            <!-- - Product Id  -->
            - Product Serial Id 
            - Requested By (Engineer)
            - Requested Quantity
            - Delivered Quantity
            - Status (pending, approved, rejected, picked, used, returned, cancelled)
            
        `stock_in_hand_products`:
            - stock_in_hand_product_id (auto generated)
            - stock_in_hand_id (foreign key)
            - product_id (foreign key)
            - product_serial_id (foreign key)
            - quantity (requested quantity)
            - delivered_quantity
            - status (pending, approved, rejected, picked, used, returned, cancelled)

    Note: 
        - Requested By is foreign key from Engineers table
        - Status: pending -> approved -> picked -> used -> returned -> cancelled
        - Soft delete 

7. Spare Parts Request: List of spare parts request sent by engineers after going to customer site 
    - List of spare parts request 
        - All, Pending, Approved, Rejected, Cancelled
    - View Spare Parts Request 
    - Add Extra Product 
    - Remove Product 
    - Update Product 
    - Update Status (pending, approved, rejected) 

    Tables: 
        `spare_part_requests`:
            - request_id (auto generated)
            - Requested By (Engineer)
            - Requested For (Customer)
            - Requested At
            - Assigned Delivery Man
            - Assigned At
            - Delivered At
            - Status (pending, in progress, delivered, cancelled)
            - etc. 

        `stock_in_hand_pivot`:


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