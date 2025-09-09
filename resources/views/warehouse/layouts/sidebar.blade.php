<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a class='logo logo-light' href="{{ route('warehouse/index') }}">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-light.png') }}" alt="">
                    </span>
                </a>
                <a class='logo logo-dark' href="{{ route('warehouse/index') }}">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <!-- <li class="menu-title">Dashboard</li>

                <li>
                    <a class='tp-link' href='../e-commerce/index.php'>
                        <img width="" height="20" src="https://img.icons8.com/ios/50/1A1A1A/e-commerce.png" alt="e-commerce" />
                        <span class="ps-1"> E-commerce Dashboard </span>
                    </a>
                </li>

                <li>
                    <a class='tp-link' href='../crm/index.php'>
                        <img width="" height="20" src="https://img.icons8.com/external-outline-design-circle/66/1A1A1A/external-Crm-customer-service-outline-design-circle.png" alt="external-Crm-customer-service-outline-design-circle" />
                        <span class="ps-1"> CRM Dashboard </span>
                    </a>
                </li>
                <li>
                    <a class='tp-link' href='index.php'>
                        <img width="" height="20" src="https://img.icons8.com/ios/50/1A1A1A/warehouse-1.png" alt="warehouse-1" />
                        <span class="ps-1"> Warehouse Dashboard </span>
                    </a>
                </li> -->

                <li class="menu-title mt-2">Manage Products</li>

                <!-- <li>
                    <a class='tp-link' href='add-product.php'>
                        <i data-feather="columns"></i>
                        <span>Add Product</span>
                    </a>
                </li> -->
                <li>
                    <a class='tp-link' href="{{ route('products.index') }}">
                        <!-- <i class="fas fa-plus"></i>
                        <span class="ps-1">Add Product</span> -->
                       <i class="fas fa-list"></i>
                        <span class="ps-1">Product List</span>
                    </a>
                </li>
                <li>
                    <a class='tp-link' href="{{ route('product-list.scrap-items') }}">
                        <i class="fas fa-trash"></i>
                        <span class="ps-1"> Scrap items </span>
                    </a>
                </li>
                <li>
                    <a class='tp-link' href="{{ route('track-product.index') }}">
                        <i class="fas fa-shipping-fast"></i>
                        <span class="ps-1">Track Product</span>
                    </a>
                </li>
                <li>
                    <a class='tp-link' href="{{ route('spare-parts.index') }}">
                        <i class="fas fa-tools"></i>
                        <span class="ps-1">Spare Parts Request </span>
                    </a>
                </li>
                <li class="menu-title mt-2">Manage Warehouse</li>
                <li>
                    <a class='tp-link' href="{{ route('warehouses-list.index') }}">
                        <i class="fas fa-warehouse"></i>
                        <span class="ps-1">Warehouses</span>
                    </a>
                </li>
                <li>
                    <a class='tp-link' href="{{ route('rack.index') }}">
                        <i class="fas fa-th"></i>
                        <span class="ps-1">Warehouse Rack</span>
                    </a>
                </li>
                
                
                <li class="menu-title mt-2">Manage Stock Alerts</li>
                <li>
                    <a class='tp-link' href="{{ route('vendor.index') }}">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span class="ps-1"> Vendor Purchase Bills </span>
                    </a>
                </li>
                <li>
                    <a class='tp-link' href="{{ route('stock-request.index') }}">
                        <i class="fas fa-chart-bar"></i>
                        <span class="ps-1"> Stock Reports </span>
                    </a>
                </li>
                <li>
                    <a class='tp-link' href="{{ route('low-stock.index') }}">
                        <i class="fas fa-exclamation-triangle"></i> 
                        <span class="ps-1"> Low Stock Reports </span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>