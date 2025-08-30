1. Warehouse Type (Many-to-Many)

CREATE TABLE warehouse_types (
  warehouse_type ENUM('storage_type', 'return_center') NOT NULL,
);


2. Zone Configurations (Many-to-Many)
CREATE TABLE warehouse_zones (
  zone_type ENUM('receiving_zone','pick_zone','cold_storage') NOT NULL,
);


3. Supported Operations (Many-to-Many)
CREATE TABLE warehouse_operations (
  operation_type ENUM('inbound','outbound','returns','qc') NOT NULL,
);


4. Warehouses Table
CREATE TABLE warehouses (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  type ENUM('storage_hub','return_center') NOT NULL,

  address_line1 VARCHAR(255) NOT NULL,
  address_line2 VARCHAR(255) NULL,
  city VARCHAR(100) NOT NULL,
  state VARCHAR(100) NOT NULL,
  country VARCHAR(100) NOT NULL,
  pin_code VARCHAR(20) NOT NULL,

  contact_person_name VARCHAR(255) NOT NULL,
  phone_number VARCHAR(50) NOT NULL,
  alternate_phone_number VARCHAR(50) NULL,
  email VARCHAR(255) NOT NULL,

  working_hours VARCHAR(100) NULL,
  working_days VARCHAR(100) NULL,
  max_storage_capacity INT NULL,
  supported_operations_id – referenced from ‘warehouse_operations’ 
  zone_confirmation_id – referenced from ‘warehouse_zones’

  gst_number VARCHAR(100) NOT NULL,
  licence_number VARCHAR(100) NULL,
  licence_document VARCHAR(500) NULL,
  is_default BOOLEAN DEFAULT FALSE,
  status ENUM('active','inactive') DEFAULT 'active',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



5. Warehouse Racks Table

Existing warehouse_racks table with refined fields
CREATE TABLE warehouse_racks (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  warehouse_id BIGINT NOT NULL – referenced from ‘warehouses’, 
  rack_name VARCHAR(255) NOT NULL,
  zone_area VARCHAR(100) NULL,
  rack_no VARCHAR(100) NOT NULL,
  level_no VARCHAR(50) NULL,
  position_no VARCHAR(50) NULL,
  floor VARCHAR(50) NULL,
  quantity INT DEFAULT 0,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (warehouse_id) REFERENCES warehouses(id) ON DELETE CASCADE
);



6. Product Tags (Many-to-Many)
CREATE TABLE warehouse_operations (
  name VARCHAR(255) NOT NULL,
);


7. Categories (Many-to-Many)
CREATE TABLE categories (
  name VARCHAR(255) NOT NULL,
  feature_image VARCHAR(255) NOT NULL,
  icon_image VARCHAR(255) NOT NULL,
  parent_category VARCHAR(255) NOT NULL, 
  top_category VARCHAR(255) NOT NULL,
);


8. Sub Categories (Many-to-Many)
CREATE TABLE sub_categories (
  category_id VARCHAR(255) NOT NULL, - referenced from 'categories'
  name VARCHAR(255) NOT NULL,
);


9. Product Brands (Many-to-Many)
CREATE TABLE product_variations (
  name VARCHAR(255) NOT NULL,
  top_brand VARCHAR(255) NOT NULL, 
  status ENUM('active','inactive') DEFAULT 'active',
);


10. Product Variations (Many-to-Many)
CREATE TABLE product_variations (
  name VARCHAR(255) NOT NULL,
  status ENUM('active','inactive') DEFAULT 'active',
);


11. Product Variations Attribute (Many-to-Many)
CREATE TABLE product_variations_attribute (
  product_variations_id VARCHAR(255) NOT NULL, - referenced from 'product_variations'
  name VARCHAR(255) NOT NULL,
);


12. Products 

-- Table: products
CREATE TABLE products (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  vendor_name BIGINT NOT NULL, 
  po_number VARCHAR(100) NULL,
  invoice_number VARCHAR(100) NULL,
  invoice_file VARCHAR(500) NULL,
  purchase_date DATE NULL,
  bill_due_date DATE NULL,
  bill_amount DECIMAL(15,2) NULL,

  product_name VARCHAR(255) NOT NULL,
  hsn_code VARCHAR(100) NULL,
  sku VARCHAR(100) UNIQUE NOT NULL,
  brand VARCHAR(100) NULL, - referenced from 'brands'
  model_no VARCHAR(100) NULL,
  serial_no VARCHAR(100) NULL,
  category VARCHAR(100) NULL, - referenced from 'categories'
  subcategory VARCHAR(100) NULL, - referenced from 'sub_categories'

  short_description TEXT NULL,
  full_description LONGTEXT NULL,
  technical_specifications LONGTEXT NULL,
  brand_warranty VARCHAR(255) NULL,
  company_warranty VARCHAR(255) NULL,
  with_installation array NULL,

  cost_price DECIMAL(15,2) NULL,
  selling_price DECIMAL(15,2) NULL,
  discount_price DECIMAL(15,2) NULL,
  tax_percent DECIMAL(5,2) NULL,
  final_price DECIMAL(15,2) NULL,

  stock INT DEFAULT 0,
  stock_status ENUM('in_stock','out_of_stock','pre_order') DEFAULT 'in_stock',

  min_order_qty Integer NULL,
  max_order_qty Integer NULL,

  meta_title VARCHAR(255) NULL,
  meta_description VARCHAR(255) NULL,
  meta_keywords VARCHAR(255) NULL,
  meta_product_url_slug VARCHAR(255) NULL,

 
  product_img VARCHAR(255) NULL,
  additional_product_imgs VARCHAR(255) NULL,
  additional_product_manual VARCHAR(255) NULL,

  product_variation_id Integer, - referenced from 'product_variations' table 
  product_variation_attribute_id Integer, - referenced from 'product_variations_attribute' table 

  product_weight VARCHAR(255) NULL, 
  product_dimension VARCHAR(255) NULL, 
  product_shipping_charges VARCHAR(255) NULL, 
  product_shipping_class VARCHAR(255) NULL, 

  featured_product VARCHAR(255) NULL, 
  product_tags_id VARCHAR(255) NULL,  - referenced from 'product_tags'

  status ENUM('active','inactive') DEFAULT 'active',

);



13. Customers 

-- customers: Core personal and company info
CREATE TABLE customers (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(100) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  phone VARCHAR(50) NOT NULL,
  email VARCHAR(255) NOT NULL,
  date_of_birth DATE NULL,
  gender ENUM('male','female') NULL,

  customer_type ENUM('retail','wholesale','corporate') NOT NULL,
  company_name VARCHAR(255) NULL,
  company_address VARCHAR(500) NULL,
  gst_number VARCHAR(50) NULL,
  pan_number VARCHAR(50) NULL,
  profile_picture VARCHAR(500) NULL,
);



14. Customer Branches
-- customer_branches: Address details per branch for a customer
CREATE TABLE customer_branches (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  customer_id BIGINT NOT NULL,
  branch_name VARCHAR(255) NOT NULL,
  address_line1 VARCHAR(255) NOT NULL,
  address_line2 VARCHAR(255) NULL,
  city VARCHAR(100) NOT NULL,
  state VARCHAR(100) NOT NULL,
  country VARCHAR(100) NOT NULL,
  pincode VARCHAR(20) NOT NULL,
);



15. engineer_skills: Many-to-many relationship to support multiple skills per engineer
CREATE TABLE engineer_skills (
  engineer_id BIGINT NOT NULL,
  skill ENUM('network_engineer','hardware_technician') NOT NULL,
  PRIMARY KEY (engineer_id, skill),
  FOREIGN KEY (engineer_id) REFERENCES engineers(id) ON DELETE CASCADE
);



16. engineers 

CREATE TABLE engineers (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(100) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  phone VARCHAR(50) NOT NULL,
  email VARCHAR(255) NOT NULL,
  date_of_birth DATE NULL,
  gender ENUM('male','female') NULL,
 
  address_line1 VARCHAR(255) NOT NULL,
  address_line2 VARCHAR(255) NULL,
  city VARCHAR(100) NOT NULL,
  state VARCHAR(100) NOT NULL,
  country VARCHAR(100) NOT NULL,
  pincode VARCHAR(20) NOT NULL,

  bank_holder_name VARCHAR(255) NOT NULL,
  bank_account_number VARCHAR(100) NOT NULL,
  bank_name VARCHAR(255) NOT NULL,
  ifsc_code VARCHAR(20) NOT NULL,

  police_verified BOOLEAN DEFAULT FALSE,
  police_verification_status ENUM('pending','completed') DEFAULT 'pending',
  police_verification_document VARCHAR(500) NULL,

  designation ENUM('network_engineer','hardware_technician') NOT NULL,
  department ENUM('installation','maintenance','support') NOT NULL,
  joining_date DATE NOT NULL,

  profile_picture VARCHAR(500) NULL,
  skill_id BIGINT NOT NULL,

);



17. Delivery Man 

-- 1. delivery_men: Core personal, contact, work, and status info
CREATE TABLE delivery_men (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(100) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  phone VARCHAR(50) NOT NULL,
  email VARCHAR(255) NOT NULL,
  date_of_birth DATE NOT NULL,
  gender ENUM('male','female','other') NOT NULL,

  address_line1 VARCHAR(255) NOT NULL,
  address_line2 VARCHAR(255) NULL,
  city VARCHAR(100) NOT NULL,
  state VARCHAR(100) NOT NULL,
  country VARCHAR(100) NOT NULL,
  pincode VARCHAR(20) NOT NULL,

  employment_type ENUM('full_time','part_time') NOT NULL,
  joining_date DATE NOT NULL,
  assigned_zone VARCHAR(100) NOT NULL,          -- referenced from 'zones' table 

  vehicle_type ENUM('bike','scooter','car','van') NOT NULL,
  vehicle_number VARCHAR(100) NOT NULL,
  driving_license_number VARCHAR(100) NOT NULL,
  driving_license_file VARCHAR(500) NOT NULL,
  
  police_verified BOOLEAN DEFAULT FALSE,
  police_verification_status ENUM('pending','completed') DEFAULT 'pending',
  police_verification_file VARCHAR(500) NULL,
  
  gov_id_type VARCHAR(100) NOT NULL,
  gov_id_number VARCHAR(100) NOT NULL,
  gov_id_file VARCHAR(500) NOT NULL,
  
  bank_account_number VARCHAR(100) NOT NULL,
  bank_name VARCHAR(255) NOT NULL,
  ifsc_code VARCHAR(20) NOT NULL,
  bank_document VARCHAR(500) NULL,
  status ENUM('active','inactive') DEFAULT 'active',
    
);


18. Leads Requirements 
CREATE TABLE leads_requirements ( 
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL, 
  description VARCHAR(100) NOT NULL, 
  status ENUM('active','inactive') DEFAULT 'active',
);




19. Leads 
-- Table: leads
CREATE TABLE leads (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(100) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  phone VARCHAR(50) NOT NULL,
  email VARCHAR(255) NOT NULL,
  date_of_birth DATE NULL,
  gender ENUM('male','female') NULL,
  company_name VARCHAR(255) NULL,
  designation VARCHAR(255) NULL,
  industry_type ENUM('pharma','school','manufacturing') NULL,
  source ENUM('referral','website','walk_in','event') NULL,
  requirement_type ENUM('servers','cctv','biometric','networking') NULL, -- referenced from 'leads_requirements' table
  budget_range VARCHAR(100) NULL,
  urgency ENUM('low','medium','high') NULL,
  lead_status ENUM('new','contacted','qualified','quoted','converted','lost') DEFAULT 'new',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



20. Follow ups

-- 1. Table: follow_ups
CREATE TABLE follow_ups (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  lead_id BIGINT NOT NULL,
  follow_up_date DATETIME NOT NULL,
  follow_up_time DATETIME NOT NULL,
  follow_up_mode ENUM('phone','email','meeting','sms','whatsapp') NULL,
  notes TEXT NULL,
  next_follow_up_date DATETIME NULL,
  status ENUM('pending','completed','scheduled','cancelled') DEFAULT 'pending',
);


21. Meets 

-- 1. meetings: Stores meeting info
CREATE TABLE meetings (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  lead_id BIGINT NOT NULL,
  meeting_title VARCHAR(255) NOT NULL,
  meeting_type ENUM('onsite_demo','virtual_meeting','technical_visit','business_meeting') NOT NULL,
  meeting_date DATE NOT NULL,
  meeting_time TIME NOT NULL,
  agenda TEXT NOT NULL,
  follow_up_task TEXT NULL,
  location_link VARCHAR(500) NOT NULL,
  status ENUM('scheduled','confirmed','completed','cancelled') NOT NULL DEFAULT 'scheduled',
);


22. Quotations 

-- 1. quotations:
CREATE TABLE quotations (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  lead_id BIGINT NOT NULL,
  quotation_id VARCHAR(50) NOT NULL,  -- auto generate
  quotation_date DATE NOT NULL,
  expiration_date DATE NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (lead_id) REFERENCES leads(id)
);

23. Quotations Items 
-- 2. quotation_items: 
CREATE TABLE quotation_items (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  quotation_id BIGINT NOT NULL, 
  item_description VARCHAR(255) NOT NULL,
  hsn_code VARCHAR(10) NOT NULL,
  quantity INT NOT NULL,
  unit_price DECIMAL(10,2) NOT NULL,
  tax_percentage DECIMAL(5,2) NOT NULL, 
  total_value DECIMAL(10,2) NOT NULL, -- calculated
  FOREIGN KEY (quotation_id) REFERENCES quotations(id) ON DELETE CASCADE
);



24. AMC Plans Items 
CREATE TABLE plans_items (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL, 
    status ENUM('active','inactive') DEFAULT 'active',
);


25.  AMC Plans 
-- 1. plans: Core plan information
CREATE TABLE plans (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  plan_name VARCHAR(255) NOT NULL,
  plan_code VARCHAR(100) NOT NULL UNIQUE,
  plan_type ENUM('hardware','networking','software','comprehensive') NOT NULL, 
  description TEXT NULL,

  contract_duration ENUM('6_months','1_year','2_years','custom') NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  visits_included INT NOT NULL,

  plan_cost DECIMAL(12,2) NOT NULL,
  tax_percent DECIMAL(5,2) NOT NULL,
  total_cost DECIMAL(12,2) NOT NULL,
  payment_terms ENUM('full_payment','installments') NOT NULL,

  support_type ENUM('onsite','remote','both') NOT NULL,
  replacement_policy TEXT NULL,

  brochure_path VARCHAR(500) NULL,
  terms_conditions TEXT NULL,
  status ENUM('active','inactive') NOT NULL DEFAULT 'active',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


26. AMC Plans Covered Items 
-- 2. plan_covered_items: Tracks covered items per plan (many-to-many)
CREATE TABLE plan_covered_items (
  plan_id BIGINT NOT NULL,
  plans_items_id Integer NOT NULL, -- referenced from 'plans_items' table
);





-- customer 
    -- create customer
-- branches 
    -- create customer branches
-- products 
    -- create customer branches
-- amc details 
    -- create amc plans details
27. AMC Services Products 
CREATE TABLE services_products ( 
  product_name VARCHAR(255) NOT NULL, 
  product_type VARCHAR(255) NOT NULL, 
  brand VARCHAR(255) NOT NULL, 
  model_number VARCHAR(255) NOT NULL, 
  serial_no VARCHAR(255) NOT NULL, 
  purchase_date VARCHAR(255) NOT NULL, 
  image VARCHAR(255) NOT NULL, 
  issue_type VARCHAR(255) NOT NULL, 
  issue_description VARCHAR(255) NOT NULL, 
  customer_branches_id Integer NOT NULL, -- referenced from 'customer_branches' table
);


28. AMC Plans Details 
CREATE TABLE services_plans ( 
  plan_id Integer NOT NULL, -- referenced from 'plans' table
  plan_duration VARCHAR(255) NOT NULL, 
  start_date VARCHAR(255) NOT NULL, 
  priority VARCHAR(255) NOT NULL, 
  additional_notes VARCHAR(255) NOT NULL, 
);


29. AMC Services 
CREATE TABLE services (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  service_type VARCHAR(255) NOT NULL,
  customer_type VARCHAR(255) NOT NULL, 
  customer_id Integer NOT NULL, -- referenced from 'customers' table
  customer_branches_id Integer NOT NULL, -- referenced from 'customer_branches' table
  services_products_id Integer NOT NULL, -- referenced from 'services_products' table
);



30. Manage Pincodes 

CREATE TABLE services (
    pincode VARCHAR(255) NOT NULL,
    delivery_status ENUM('active','inactive') NOT NULL DEFAULT 'active',
    installation_status ENUM('active','inactive') NOT NULL DEFAULT 'active',
);

31. Case Transfers 

CREATE TABLE services (
    service_id Integer NOT NULL, -- referenced from 'services' table
    engineer_id Integer NOT NULL, -- referenced from 'engineers' table
);



