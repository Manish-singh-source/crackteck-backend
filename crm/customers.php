<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Customers List</h4>
            </div>
            <div>
                <a href="add-customer.php" class="btn btn-primary">Add New Customer</a>
                <!-- <button class="btn btn-primary">Add New Customer</button> -->
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body pt-0">
                        <ul class="nav nav-underline border-bottom pt-2" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active p-2" id="all_customer_tab" data-bs-toggle="tab"
                                    href="#all_customer" role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-information"></i></span>
                                    <span class="d-none d-sm-block">All Customer</span>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link p-2" id="active_customer_tab" data-bs-toggle="tab" href="#active_customer"
                                    role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Active Customer</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2" id="banned_customers_tab" data-bs-toggle="tab"
                                    href="#banned_customers" role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Banned Customer</span>
                                </a>
                            </li> -->
                        </ul>

                        <div class="tab-content text-muted">

                            <div class="tab-pane active show pt-4" id="all_customer" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Username</th>
                                                            <th>Email</th>
                                                            <th>Contact Number</th>
                                                            <th>Number of Orders</th>
                                                            <th>Status</th>
                                                            <th>Joined At</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Sarah Wilson</td>
                                                            <td>sarah</td>
                                                            <td>sarah@gmail.com</td>
                                                            <td>9876543211</td>
                                                            <td>2</td>
                                                            <td>
                                                                <div class="form-check form-switch mb-2">
                                                                    <input class="form-check-input"
                                                                        type="checkbox" role="switch"
                                                                        id="flexSwitchCheckChecked" checked>
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckChecked"></label>
                                                                </div>
                                                            </td>
                                                            <td>2022-09-15</td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-customer.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Michael Brown</td>
                                                            <td>michael</td>
                                                            <td>michael@gmail.com</td>
                                                            <td>9876543210</td>
                                                            <td>1</td>
                                                            <td>
                                                                <div class="form-check form-switch mb-2">
                                                                    <input class="form-check-input"
                                                                        type="checkbox" role="switch"
                                                                        id="flexSwitchCheckChecked" checked>
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckChecked"></label>
                                                                </div>
                                                            </td>
                                                            <td>2022-09-15</td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-customer.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Emily Davis</td>
                                                            <td>emily</td>
                                                            <td>emily@gmail.com</td>
                                                            <td>9876543210</td>
                                                            <td>3</td>
                                                            <td>
                                                                <div class="form-check form-switch mb-2">
                                                                    <input class="form-check-input"
                                                                        type="checkbox" role="switch"
                                                                        id="flexSwitchCheckChecked">
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckChecked"></label>
                                                                </div>
                                                            </td>
                                                            <td>2022-09-15</td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-customer.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>John Smith</td>
                                                            <td>john</td>
                                                            <td>john@gmail.com</td>
                                                            <td>9876543210</td>
                                                            <td>2</td>
                                                            <td>
                                                                <div class="form-check form-switch mb-2">
                                                                    <input class="form-check-input"
                                                                        type="checkbox" role="switch"
                                                                        id="flexSwitchCheckChecked" checked>
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckChecked"></label>
                                                                </div>
                                                            </td>
                                                            <td>2023-10-30</td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-customer.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end Experience -->

                            <div class="tab-pane pt-4" id="active_customer" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Username</th>
                                                            <th>Email</th>
                                                            <th>Contact Number</th>
                                                            <th>Number of Orders</th>
                                                            <th>Status</th>
                                                            <th>Joined At</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td>Emma Martinez</td>
                                                            <td>UX/UI Designer</td>
                                                            <td>Portland</td>
                                                            <td>29</td>
                                                            <td>2023-09-05</td>
                                                            <td>29</td>
                                                            <td>2023-09-05</td>
                                                            <td>$90,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>William Clark</td>
                                                            <td>Software Developer</td>
                                                            <td>Boston</td>
                                                            <td>28</td>
                                                            <td>2023-05-28</td>
                                                            <td>28</td>
                                                            <td>2023-05-28</td>
                                                            <td>$115,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ava Taylor</td>
                                                            <td>Content Writer</td>
                                                            <td>Philadelphia</td>
                                                            <td>26</td>
                                                            <td>2022-10-22</td>
                                                            <td>26</td>
                                                            <td>2022-10-22</td>
                                                            <td>$70,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Joseph White</td>
                                                            <td>Project Coordinator</td>
                                                            <td>Dallas</td>
                                                            <td>31</td>
                                                            <td>2023-02-15</td>
                                                            <td>31</td>
                                                            <td>2023-02-15</td>
                                                            <td>$85,000</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end Experience -->

                            <div class="tab-pane pt-4" id="banned_customers" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <!-- <div class="card-header">
                                                            <h5 class="card-title mb-0">Tables</h5>
                                                        </div>
                                                        -->
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Username</th>
                                                            <th>Email</th>
                                                            <th>Contact Number</th>
                                                            <th>Number of Orders</th>
                                                            <th>Status</th>
                                                            <th>Joined At</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td>Jessica Thompson</td>
                                                            <td>HR Specialist</td>
                                                            <td>Miami</td>
                                                            <td>30</td>
                                                            <td>2023-01-25</td>
                                                            <td>30</td>
                                                            <td>2023-01-25</td>
                                                            <td>$80,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Matthew Lee</td>
                                                            <td>Data Scientist</td>
                                                            <td>Denver</td>
                                                            <td>34</td>
                                                            <td>2022-11-08</td>
                                                            <td>34</td>
                                                            <td>2022-11-08</td>
                                                            <td>$130,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Olivia Garcia</td>
                                                            <td>Graphic Designer</td>
                                                            <td>Atlanta</td>
                                                            <td>27</td>
                                                            <td>2023-07-20</td>
                                                            <td>27</td>
                                                            <td>2023-07-20</td>
                                                            <td>$75,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>James Hernandez</td>
                                                            <td>Business Analyst</td>
                                                            <td>Phoenix</td>
                                                            <td>32</td>
                                                            <td>2023-03-12</td>
                                                            <td>32</td>
                                                            <td>2023-03-12</td>
                                                            <td>$100,000</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end education -->

                            <div class="tab-pane pt-4" id="technicians" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <!-- <div class="card-header">
                                                            <h5 class="card-title mb-0">Tables</h5>
                                                        </div>
                                                        -->
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Position</th>
                                                            <th>Office</th>
                                                            <th>Age</th>
                                                            <th>Start date</th>
                                                            <th>Salary</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Chloe Nguyen</td>
                                                            <td>Product Designer</td>
                                                            <td>Minneapolis</td>
                                                            <td>28</td>
                                                            <td>2023-02-20</td>
                                                            <td>$120,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>William Kim</td>
                                                            <td>HR Manager</td>
                                                            <td>Orlando</td>
                                                            <td>33</td>
                                                            <td>2022-09-25</td>
                                                            <td>$100,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Emily King</td>
                                                            <td>Data Engineer</td>
                                                            <td>Salt Lake City</td>
                                                            <td>30</td>
                                                            <td>2023-04-10</td>
                                                            <td>$125,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nicholas Thomas</td>
                                                            <td>Business Development Manager</td>
                                                            <td>Tampa</td>
                                                            <td>27</td>
                                                            <td>2023-11-28</td>
                                                            <td>$95,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Oliver Martinez</td>
                                                            <td>Software Tester</td>
                                                            <td>Austin</td>
                                                            <td>34</td>
                                                            <td>2023-08-15</td>
                                                            <td>$115,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sophia Brown</td>
                                                            <td>UX/UI Developer</td>
                                                            <td>Washington D.C.</td>
                                                            <td>31</td>
                                                            <td>2022-07-10</td>
                                                            <td>$90,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Liam Wilson</td>
                                                            <td>Content Manager</td>
                                                            <td>San Jose</td>
                                                            <td>28</td>
                                                            <td>2023-12-22</td>
                                                            <td>$75,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Charlotte Garcia</td>
                                                            <td>Project Analyst</td>
                                                            <td>Detroit</td>
                                                            <td>33</td>
                                                            <td>2023-05-05</td>
                                                            <td>$110,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ethan Wright</td>
                                                            <td>Technical Writer</td>
                                                            <td>Indianapolis</td>
                                                            <td>30</td>
                                                            <td>2023-01-20</td>
                                                            <td>$80,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Isabella Baker</td>
                                                            <td>Systems Administrator</td>
                                                            <td>Charlotte</td>
                                                            <td>27</td>
                                                            <td>2023-09-18</td>
                                                            <td>$105,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>James Hall</td>
                                                            <td>Marketing Coordinator</td>
                                                            <td>San Francisco</td>
                                                            <td>34</td>
                                                            <td>2022-06-15</td>
                                                            <td>$95,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Emma Young</td>
                                                            <td>Product Owner</td>
                                                            <td>Denver</td>
                                                            <td>29</td>
                                                            <td>2022-11-30</td>
                                                            <td>$120,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Aiden Evans</td>
                                                            <td>Business Consultant</td>
                                                            <td>Seattle</td>
                                                            <td>32</td>
                                                            <td>2023-04-05</td>
                                                            <td>$100,000</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end education -->


                        </div> <!-- Tab panes -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php include('layouts/footer.php') ?>