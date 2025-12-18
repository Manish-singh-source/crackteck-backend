# Crackteck Database Schema & Migrations

## CRITICAL: Copy all migrations to `database/migrations/` directory

---

## Migration 1: Core Authentication Tables

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Users table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('avatar_path')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->tinyInteger('status')->default(1); // 1: Active, 0: Inactive
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('status');
            $table->index('created_at');
        });

        // Personal Access Tokens (Sanctum)
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 80)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });

        // JWT Tokens (Token management)
        Schema::create('jwt_tokens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('token', 500)->unique();
            $table->string('token_type'); // 'access' or 'refresh'
            $table->text('payload')->nullable();
            $table->timestamp('expires_at');
            $table->timestamp('revoked_at')->nullable();
            $table->ipAddress('issued_from')->nullable();
            $table->string('device_id')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index(['user_id', 'token_type']);
            $table->index('expires_at');
        });

        // OTP Verification
        Schema::create('otp_verifications', function (Blueprint $table) {
            $table->id();
            $table->string('identifier'); // phone or email
            $table->string('otp', 6);
            $table->integer('attempts')->default(0);
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('expires_at');
            $table->string('ip_address')->nullable();
            $table->timestamps();
            
            $table->index(['identifier', 'expires_at']);
        });

        // Social Logins
        Schema::create('social_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('provider'); // google, facebook, linkedin
            $table->string('provider_id')->unique();
            $table->string('email')->nullable();
            $table->string('avatar_url')->nullable();
            $table->json('provider_data')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['provider', 'provider_id']);
        });

        // Password Resets
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('expires_at');
            
            $table->index('token');
        });
    }

    public function down(): void {
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('social_accounts');
        Schema::dropIfExists('otp_verifications');
        Schema::dropIfExists('jwt_tokens');
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('users');
    }
};
```

---

## Migration 2: Roles & Permissions (Spatie)

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Roles
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('guard_name')->default('web');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Model Has Roles
        Schema::create('model_has_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
            $table->primary(['role_id', 'model_id', 'model_type']);
            
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->index(['model_id', 'model_type']);
        });

        // Model Has Permissions
        Schema::create('model_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
            $table->primary(['permission_id', 'model_id', 'model_type']);
            
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->index(['model_id', 'model_type']);
        });

        // Role Has Permissions
        Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['permission_id', 'role_id']);
            
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions');
    }
};
```

---

## Migration 3: Warehouse Management

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Warehouses
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('type'); // primary, secondary, regional
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country')->default('India');
            $table->string('pincode');
            
            // Contact
            $table->string('contact_person_name');
            $table->string('phone_number');
            $table->string('alternate_phone_number')->nullable();
            $table->string('email');
            
            // Operations
            $table->string('working_hours'); // JSON: {"start": "09:00", "end": "18:00"}
            $table->string('working_days'); // JSON array
            $table->decimal('max_store_capacity', 15, 2); // in units
            $table->text('supported_operations')->nullable(); // JSON: ["storage", "packing", "shipping"]
            $table->json('zone_conf')->nullable();
            
            // Compliance
            $table->string('gst_no')->unique();
            $table->string('licence_no')->unique();
            $table->string('licence_doc')->nullable();
            $table->string('licence_expiry')->nullable();
            
            // Status
            $table->tinyInteger('verification_status')->default(0); // 0: Pending, 1: Verified, 2: Rejected
            $table->boolean('default_warehouse')->default(false);
            $table->boolean('status')->default(true);
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['status', 'verification_status']);
            $table->index('pincode');
        });

        // Warehouse Racks
        Schema::create('warehouse_racks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warehouse_id')->constrained('warehouses')->onDelete('cascade');
            $table->string('rack_name');
            $table->string('zone_area'); // Zone identification
            $table->string('rack_no');
            $table->integer('level_no');
            $table->integer('position_no');
            $table->integer('floor');
            $table->integer('quantity'); // Total capacity
            $table->integer('filled_quantity')->default(0);
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
            $table->unique(['warehouse_id', 'rack_name', 'level_no', 'position_no']);
        });

        // Vendors
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country')->default('India');
            $table->string('pincode');
            
            $table->string('pan_no')->unique();
            $table->string('gst_no')->unique();
            
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('created_by')->references('id')->on('users')->onDelete('setNull');
            $table->index('status');
        });

        // Vendor Purchase Orders
        Schema::create('vendor_purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained('vendors')->onDelete('cascade');
            $table->string('po_number')->unique();
            $table->string('invoice_number')->unique();
            $table->string('invoice_pdf')->nullable();
            $table->date('purchase_date');
            $table->date('po_amount_due_date');
            $table->decimal('po_amount', 15, 2);
            $table->tinyInteger('po_status')->default(1); // 0: Pending, 1: Approved, 2: Rejected, 3: Cancelled
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['vendor_id', 'po_status']);
            $table->index('created_at');
        });
    }

    public function down(): void {
        Schema::dropIfExists('vendor_purchase_orders');
        Schema::dropIfExists('vendors');
        Schema::dropIfExists('warehouse_racks');
        Schema::dropIfExists('warehouses');
    }
};
```

---

## Migration 4: Product Management

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Categories
        Schema::create('parent_categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('status_ecommerce')->default(true);
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_category_id')->constrained('parent_categories')->onDelete('cascade');
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('icon_image')->nullable();
            $table->boolean('status_ecommerce')->default(true);
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('parent_category_id');
        });

        // Brands
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('image')->nullable();
            $table->boolean('status_ecommerce')->default(true);
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        // Product Variants Attributes
        Schema::create('product_variant_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('product_variant_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attribute_id')->constrained('product_variant_attributes')->onDelete('cascade');
            $table->string('value');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['attribute_id', 'value']);
        });

        // Products (Warehouse)
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained('vendors')->onDelete('restrict');
            $table->foreignId('vendor_purchase_order_id')->nullable()->constrained('vendor_purchase_orders')->onDelete('setNull');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('restrict');
            $table->foreignId('parent_category_id')->constrained('parent_categories')->onDelete('restrict');
            $table->foreignId('sub_category_id')->constrained('sub_categories')->onDelete('restrict');
            $table->foreignId('warehouse_id')->constrained('warehouses')->onDelete('restrict');
            
            // Product Details
            $table->string('name');
            $table->string('hsn_code');
            $table->string('sku')->unique();
            $table->string('model_no')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->longText('technical_specification')->nullable();
            
            // Warranty
            $table->string('brand_warranty')->nullable();
            $table->string('company_warranty')->nullable();
            
            // Pricing
            $table->decimal('cost_price', 15, 2);
            $table->decimal('selling_price', 15, 2);
            $table->decimal('discount_price', 15, 2)->nullable();
            $table->decimal('tax', 5, 2)->default(0);
            $table->decimal('final_price', 15, 2);
            
            // Stock
            $table->integer('stock_quantity')->default(0);
            $table->string('stock_status')->default('in_stock'); // in_stock, low_stock, out_of_stock, scrap
            
            // Media
            $table->string('main_product_image')->nullable();
            $table->json('additional_product_images')->nullable();
            $table->string('datasheet_manual')->nullable();
            
            // Variants (Future)
            $table->json('variations')->nullable();
            
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['warehouse_id', 'status']);
            $table->index(['parent_category_id', 'sub_category_id']);
            $table->fullText(['name', 'sku', 'model_no']);
        });

        // Product Serials
        Schema::create('product_serials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('auto_generated_serial')->unique();
            $table->string('manual_serial')->nullable();
            
            // Price (inherited from product, can be overridden)
            $table->decimal('cost_price', 15, 2)->nullable();
            $table->decimal('selling_price', 15, 2)->nullable();
            $table->decimal('discount_price', 15, 2)->nullable();
            $table->decimal('tax', 5, 2)->nullable();
            $table->decimal('final_price', 15, 2)->nullable();
            
            // Media (inherited from product, can be overridden)
            $table->string('main_product_image')->nullable();
            $table->json('additional_product_images')->nullable();
            
            $table->string('status')->default('active'); // active, inactive, sold, scrap
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['product_id', 'status']);
            $table->index('auto_generated_serial');
        });

        // E-commerce Products
        Schema::create('ecommerce_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warehouse_product_id')->constrained('products')->onDelete('cascade');
            $table->string('sku')->unique();
            
            // Meta
            $table->string('meta_title');
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_product_url_slug')->unique();
            
            // Product info (optional overrides)
            $table->string('company_warranty')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->longText('technical_specification')->nullable();
            
            // Ordering
            $table->integer('min_order_qty')->default(1);
            $table->integer('max_order_qty')->nullable();
            
            // Shipping
            $table->decimal('shipping_charges', 15, 2)->default(0);
            $table->string('shipping_class')->nullable(); // light, heavy, fragile
            
            // With Installation
            $table->json('with_installation')->nullable();
            
            // Features
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_best_seller')->default(false);
            $table->boolean('is_suggested')->default(false);
            $table->boolean('is_todays_deal')->default(false);
            
            $table->json('product_tags')->nullable();
            
            // Status: 0 - Inactive, 1 - Active, 2 - Draft
            $table->tinyInteger('status')->default(1);
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['status', 'is_featured']);
            $table->fullText('meta_title');
        });
    }

    public function down(): void {
        Schema::dropIfExists('ecommerce_products');
        Schema::dropIfExists('product_serials');
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_variant_attribute_values');
        Schema::dropIfExists('product_variant_attributes');
        Schema::dropIfExists('brands');
        Schema::dropIfExists('sub_categories');
        Schema::dropIfExists('parent_categories');
    }
};
```

---

## Migration 5: Staff Management

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Staff
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('staff_role'); // admin, sales_person, field_executive, delivery_man, engineer
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            
            $table->enum('employment_type', ['full_time', 'part_time'])->default('full_time');
            $table->date('joining_date');
            $table->string('assigned_area')->nullable(); // For field executives
            
            // OTP for engineers
            $table->string('otp')->nullable();
            $table->timestamp('otp_expiry')->nullable();
            
            // Status
            $table->string('status')->default('active'); // active, inactive, resigned, terminated, blocked, suspended, pending
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['staff_role', 'status']);
            $table->index('assigned_area');
        });

        // Staff Address
        Schema::create('staff_address', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country')->default('India');
            $table->string('pincode');
            
            $table->timestamps();
            $table->softDeletes();
        });

        // Staff Aadhar Details
        Schema::create('staff_aadhar_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade');
            $table->string('aadhar_number', 12)->unique();
            $table->string('aadhar_front_path');
            $table->string('aadhar_back_path');
            
            $table->timestamps();
            $table->softDeletes();
        });

        // Staff PAN Details
        Schema::create('staff_pan_card_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade');
            $table->string('pan_number', 10)->unique();
            $table->string('pan_card_front_path');
            $table->string('pan_card_back_path');
            
            $table->timestamps();
            $table->softDeletes();
        });

        // Staff Bank Details
        Schema::create('staff_bank_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade');
            $table->string('bank_acc_holder_name');
            $table->string('bank_acc_number', 20)->unique();
            $table->string('bank_name');
            $table->string('ifsc_code');
            $table->string('passbook_pic')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });

        // Staff Vehicle Details
        Schema::create('staff_vehical_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade');
            $table->string('vehicle_type');
            $table->string('vehical_no')->unique();
            $table->string('driving_license_no')->unique();
            $table->string('driving_license');
            $table->timestamp('license_expiry')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });

        // Staff Police Verification
        Schema::create('staff_police_verification', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade');
            $table->string('police_verification');
            $table->string('police_verification_status'); // pending, approved, rejected
            $table->string('police_certificate')->nullable();
            $table->timestamp('verification_date')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });

        // Staff Work Skills
        Schema::create('staff_work_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade');
            $table->json('primary_skills');
            $table->json('certifications')->nullable();
            $table->integer('experience'); // in years
            $table->json('languages_known')->nullable();
            $table->longText('employment_history')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('staff_work_skills');
        Schema::dropIfExists('staff_police_verification');
        Schema::dropIfExists('staff_vehical_details');
        Schema::dropIfExists('staff_bank_details');
        Schema::dropIfExists('staff_pan_card_details');
        Schema::dropIfExists('staff_aadhar_details');
        Schema::dropIfExists('staff_address');
        Schema::dropIfExists('staff');
    }
};
```

---

## Migration 6: Customer Management

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Customers
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            
            $table->string('customer_type')->default('both'); // e-commerce, crm, both, offline
            $table->string('source_type')->default('website'); // website, app, call, walkin, other
            
            $table->string('password')->nullable();
            $table->string('status')->default('active'); // active, inactive, blocked, suspended
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('created_by')->references('id')->on('users')->onDelete('setNull');
            $table->index(['status', 'customer_type']);
        });

        // Customer Company Details
        Schema::create('customer_company_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->string('company_name')->unique();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country')->default('India');
            $table->string('pincode');
            $table->string('gst_no')->unique();
            
            $table->timestamps();
            $table->softDeletes();
        });

        // Customer Address Details
        Schema::create('customer_address_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->string('branch_name');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country')->default('India');
            $table->string('pincode');
            $table->boolean('is_primary')->default(false);
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['customer_id', 'is_primary']);
        });

        // Customer Aadhar Details
        Schema::create('customer_aadhar_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->string('aadhar_number', 12)->unique();
            $table->string('aadhar_front_path');
            $table->string('aadhar_back_path');
            
            $table->timestamps();
            $table->softDeletes();
        });

        // Customer PAN Details
        Schema::create('customer_pan_card_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->string('pan_number', 10)->unique();
            $table->string('pan_card_front_path');
            $table->string('pan_card_back_path');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('customer_pan_card_details');
        Schema::dropIfExists('customer_aadhar_details');
        Schema::dropIfExists('customer_address_details');
        Schema::dropIfExists('customer_company_details');
        Schema::dropIfExists('customers');
    }
};
```

---

## Migration 7: CRM Module (Leads, Quotes, Tickets)

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Leads
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('staff')->onDelete('cascade'); // Sales Person
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('company_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('industry_type')->nullable();
            $table->string('source');
            $table->string('requirement_type');
            $table->string('budget_range')->nullable();
            $table->string('urgency'); // low, medium, high, critical
            $table->string('status')->default('new');
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['user_id', 'status']);
            $table->index('created_at');
        });

        // Follow Ups
        Schema::create('follow_ups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained('leads')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('staff')->onDelete('cascade'); // Sales Person
            $table->date('followup_date');
            $table->time('followup_time')->nullable();
            $table->string('status')->default('pending'); // pending, completed, rescheduled
            $table->text('remarks')->nullable();
            $table->string('next_action')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['lead_id', 'status']);
        });

        // Meetings
        Schema::create('meets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained('leads')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('staff')->onDelete('cascade'); // Sales Person
            $table->string('meet_title');
            $table->string('meeting_type'); // in-person, virtual, phone
            $table->date('date');
            $table->time('time');
            $table->string('location')->nullable();
            $table->string('attachment')->nullable();
            $table->text('meetAgenda')->nullable();
            $table->text('followUp')->nullable();
            $table->string('status')->default('pending'); // pending, completed, cancelled
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['lead_id', 'status']);
        });

        // Quotations
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained('leads')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('staff')->onDelete('cascade'); // Sales Person
            $table->string('quote_id')->unique();
            $table->date('quote_date');
            $table->date('expiry_date');
            $table->string('status')->default('draft'); // draft, sent, accepted, rejected, expired
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['lead_id', 'status']);
        });

        // Quotation Products
        Schema::create('quotation_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_id')->constrained('quotations')->onDelete('cascade');
            $table->string('product_name');
            $table->string('hsn_code')->nullable();
            $table->string('sku')->nullable();
            $table->decimal('price', 15, 2);
            $table->integer('quantity');
            $table->decimal('tax', 5, 2)->default(0);
            $table->decimal('total', 15, 2);
            
            $table->timestamps();
            $table->softDeletes();
        });

        // Tickets (Support)
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->string('ticket_number')->unique();
            $table->string('title');
            $table->text('description');
            $table->string('category'); // product, service, billing, other
            $table->string('priority')->default('medium'); // low, medium, high, urgent
            $table->string('status')->default('open'); // open, in_progress, pending, resolved, closed
            $table->unsignedBigInteger('assigned_to')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('assigned_to')->references('id')->on('staff')->onDelete('setNull');
            $table->index(['customer_id', 'status']);
            $table->index('priority');
        });
    }

    public function down(): void {
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('quotation_products');
        Schema::dropIfExists('quotations');
        Schema::dropIfExists('meets');
        Schema::dropIfExists('follow_ups');
        Schema::dropIfExists('leads');
    }
};
```

**[CONTINUE TO NEXT SECTION - Database migrations continue with Field Service, E-commerce, and more...]**

This migration file is comprehensive and covers:
- Authentication & Authorization
- Warehouse Management
- Product Management  
- Staff Management
- Customer Management
- CRM Modules

Each migration includes:
✅ Proper foreign key constraints
✅ Soft delete tracking
✅ Status enumerations
✅ Audit timestamps
✅ Security considerations
✅ Optimized indexes
✅ Data validation at database level
