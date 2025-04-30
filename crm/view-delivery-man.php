<?php include('layouts/header.php') ?>

<div class="content">
    <div class="container-fluid">

        <div class="row pt-3">

            <div class="col-xxl-3 col-xl-4 col-lg-5">
                <div class="card sticky-side-div">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">
                                Delivery Man Details
                            </h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="px-3">
                            <div class="profile-section-image">
                                <img src="./assets/images/users/user.jpg" alt="Customer Profile Image" style="width: 150px; height:150px" class="img-thumbnail">
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-0">Technofra</h6>
                                <p>Joining Date 26 Mar, 2025 04:24 PM</p>
                            </div>
                        </div>

                        <div class="p-3 bg-body rounded">
                            <h6 class="mb-3 fw-bold">Delivery Man Information</h6>

                            <ul class="list-group">
                                <li class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                    <span class="fw-semibold">
                                        Username
                                    </span>
                                    <span class="font-weight-bold">John</span>
                                </li>

                                <li class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                    <span class="fw-semibold">
                                        Email
                                    </span>
                                    <span class="font-weight-bold text-break">example@gmail.com</span>
                                </li>

                                <li class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                    <span class="fw-semibold">
                                        Phone
                                    </span>
                                    <span class="font-weight-bold">9988557755</span>
                                </li>

                                <li class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                    <span class="fw-semibold">
                                        Status
                                    </span>

                                    <span class="badge badge-pill bg-success">Active</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                    <span class="fw-semibold">
                                        Number of Orders
                                    </span>
                                    <span>1</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                    <span class="fw-semibold">
                                        Deliveryman Balance
                                    </span>
                                    <span>₹1,500.0</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-9 col-xl-8 col-lg-7">
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">
                                Other Information
                            </h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <div>
                            <h6 class="fw-bold mb-3">Balance Information</h6>
                            <div class="row mb-3">
                                <div class="col-xxl-6 col-xl-8">
                                    <div class="card card-animate bg-soft-green h-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start justify-content-between gap-2">
                                                <div class="flex-shrink-0">
                                                    <span class="overview-icon">
                                                        <i class="las la-money-bill-wave"></i>
                                                    </span>
                                                </div>

                                                <div class="text-end">
                                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                                        <span>₹0.0
                                                        </span>
                                                    </h4>


                                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                                        Order Balance
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="text-center mt-4">
                                                <button class="btn btn-danger waves ripple-light" data-bs-toggle="modal" data-bs-target="#cashCollect">
                                                    <span>Cash Collect</span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-xl-8">
                                    <div class="card card-animate bg-soft-gray h-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start justify-content-between gap-2">
                                                <div class="flex-shrink-0">
                                                    <span class="overview-icon">
                                                        <i class="las la-shopping-bag"></i>
                                                    </span>
                                                </div>

                                                <div class="text-end">
                                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                                        <span>
                                                            2
                                                        </span>
                                                    </h4>


                                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                                        Total Order
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="text-center mt-4">
                                                <div class="text-center mt-4">
                                                    <a href="" class="btn btn-primary waves ripple-light">
                                                        View All

                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div>
                            <h6 class="fw-bold mb-3">Withdraw Information</h6>
                            <div class="row">
                                <div class="col-xxl-4 col-xl-6">
                                    <div class="card card-animate bg-soft-green">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start justify-content-between gap-2">
                                                <div class="flex-shrink-0">
                                                    <span class="overview-icon">
                                                        <i class="las la-check-double"></i>
                                                    </span>
                                                </div>

                                                <div class="text-end">
                                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                                        <span>₹0.0
                                                        </span>
                                                    </h4>


                                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                                        Total Success Withdraw
                                                    </p>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-4 col-xl-6">
                                    <div class="card card-animate bg-soft-gray">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start justify-content-between gap-2">
                                                <div class="flex-shrink-0">
                                                    <span class="overview-icon">
                                                        <i class="las la-hourglass"></i>
                                                    </span>
                                                </div>

                                                <div class="text-end">
                                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                                        <span>₹0.0
                                                        </span>
                                                    </h4>


                                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                                        Total Pending Withdraw
                                                    </p>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-4 col-xl-6">
                                    <div class="card card-animate bg-soft-orange">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start justify-content-between gap-2">
                                                <div class="flex-shrink-0">
                                                    <span class="overview-icon">
                                                        <i class="las la-ban"></i>
                                                    </span>
                                                </div>

                                                <div class="text-end">
                                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                                        <span>₹0.0
                                                        </span>
                                                    </h4>


                                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                                        Total Rejected Withdraw
                                                    </p>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">


                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex align-items-center">


                                        <h4 class="card-title mb-0 flex-grow-1">

                                            Latest Earning log
                                        </h4>
                                        <div class="flex-shrink-0">
                                            <a href="" class="text-decoration-underline">
                                                View All
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body pt-0">

                                    <div class="table-responsive table-card mt-3">
                                        <table class="table table-hover table-nowrap align-middle mb-0">
                                            <thead class="text-muted table-light">
                                                <tr class="text-uppercase">

                                                    <th>
                                                        Date
                                                    </th>
                                                    <th>
                                                        Order
                                                    </th>

                                                    <th>
                                                        Amount
                                                    </th>
                                                    <th>
                                                        Details
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody class="list form-check-all">
                                                <tr>
                                                    <td data-label="Date">
                                                        <span class="fw-bold">3 weeks ago</span><br>
                                                        2025-04-04 06:07 PM
                                                    </td>
                                                    <td data-label="Order">
                                                        <div class="justify-content-center">
                                                            <a href="" class="fw-bold text-dark">
                                                                <span>#1001</span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td data-label="Amount">
                                                        <span class="text-success fw-bold">
                                                            500
                                                            INR</span>
                                                    </td>
                                                    <td data-label="Details">
                                                        Order charge added for order #1001
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>


                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title mb-0 flex-grow-1">
                                            Latest Withdraw Log
                                        </h4>
                                        <div class="flex-shrink-0">
                                            <a href="" class="text-decoration-underline">
                                                View All
                                            </a>
                                        </div>
                                    </div>

                                </div>


                                <div class="card-body">

                                    <div class="table-responsive table-card">
                                        <table class="table table-hover table-nowrap align-middle mb-0">
                                            <thead class="text-muted table-light">
                                                <tr class="text-uppercase">
                                                    <th>
                                                        Time
                                                    </th>
                                                    <th>Method
                                                    </th>
                                                    <th>
                                                        Amount
                                                    </th>
                                                    <th>
                                                        Charge
                                                    </th>
                                                    <th>
                                                        Receivable
                                                    </th>
                                                    <th>
                                                        Status
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody class="list form-check-all">
                                                <tr>
                                                    <td class="border-bottom-0" colspan="100">
                                                        <div class="tab-pane" id="productnav-draft" role="tabpanel">
                                                            <div class="py-4 text-center">
                                                                <lord-icon src="" trigger="loop" colors="primary:#405189,secondary:#0ab39c" class="loader-icon">
                                                                </lord-icon>
                                                                <h5 class="mt-4">
                                                                    Sorry! No Result Found
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex align-items-center">


                                        <h4 class="card-title mb-0 flex-grow-1">

                                            Latest Transaction log
                                        </h4>
                                        <div class="flex-shrink-0">
                                            <a href="" class="text-decoration-underline">
                                                View All
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body pt-0">

                                    <div class="table-responsive table-card mt-3">
                                        <table class="table table-hover table-nowrap align-middle mb-0">
                                            <thead class="text-muted table-light">
                                                <tr class="text-uppercase">

                                                    <th>
                                                        Date
                                                    </th>

                                                    <th>
                                                        Transaction ID
                                                    </th>
                                                    <th>
                                                        Amount
                                                    </th>

                                                    <th>
                                                        Post Balance
                                                    </th>

                                                    <th>
                                                        Details
                                                    </th>

                                                </tr>
                                            </thead>

                                            <tbody class="list form-check-all">

                                                <tr>
                                                    <td data-label="Date">
                                                        <span class="fw-bold">3 weeks ago</span><br>
                                                        2025-04-04 06:09 PM
                                                    </td>

                                                    <td data-label="TRX ID">
                                                        CGSYOUGOG4XHTM
                                                    </td>

                                                    <td data-label="Amount">
                                                        <span class="text-danger fw-bold">
                                                            -2890
                                                            INR</span>

                                                    </td>
                                                    <td data-label="Post Balance">
                                                        <span class="fw-bold text-primary">0
                                                            INR</span>
                                                    </td>

                                                    <td data-label="Details">
                                                        ₹2,890.0 Cash out by admin
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td data-label="Date">
                                                        <span class="fw-bold">3 weeks ago</span><br>
                                                        2025-04-04 06:07 PM
                                                    </td>

                                                    <td data-label="TRX ID">
                                                        JT6I0SE3WQ82NI
                                                    </td>

                                                    <td data-label="Amount">
                                                        <span class="text-success fw-bold">
                                                            +2890
                                                            INR</span>

                                                    </td>
                                                    <td data-label="Post Balance">
                                                        <span class="fw-bold text-primary">0
                                                            INR</span>
                                                    </td>

                                                    <td data-label="Details">
                                                        Order balance added for order number #1001
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td data-label="Date">
                                                        <span class="fw-bold">3 weeks ago</span><br>
                                                        2025-04-04 06:07 PM
                                                    </td>

                                                    <td data-label="TRX ID">
                                                        R4XPKBN9TATWO1
                                                    </td>

                                                    <td data-label="Amount">
                                                        <span class="text-success fw-bold">
                                                            +500
                                                            INR</span>

                                                    </td>
                                                    <td data-label="Post Balance">
                                                        <span class="fw-bold text-primary">1000
                                                            INR</span>
                                                    </td>

                                                    <td data-label="Details">
                                                        Order charge added for order #1001
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td data-label="Date">
                                                        <span class="fw-bold">3 weeks ago</span><br>
                                                        2025-04-01 06:30 PM
                                                    </td>

                                                    <td data-label="TRX ID">
                                                        KHO2TP7SBG5KPQ
                                                    </td>

                                                    <td data-label="Amount">
                                                        <span class="text-success fw-bold">
                                                            +1000
                                                            INR</span>

                                                    </td>
                                                    <td data-label="Post Balance">
                                                        <span class="fw-bold text-primary">1000
                                                            INR</span>
                                                    </td>

                                                    <td data-label="Details">
                                                        Balance Added by admin
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header border-bottom-dashed">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-sm">
                                            <h5 class="card-title mb-0">
                                                Review list
                                            </h5>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                            <thead class="text-muted table-light">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">
                                                        Customer name
                                                    </th>

                                                    <th scope="col">
                                                        Order ID
                                                    </th>

                                                    <th scope="col">
                                                        Rating
                                                    </th>

                                                    <th scope="col">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td class="border-bottom-0" colspan="100">
                                                        <div class="tab-pane" id="productnav-draft" role="tabpanel">
                                                            <div class="py-4 text-center">
                                                                <lord-icon src="" trigger="loop" colors="primary:#405189,secondary:#0ab39c" class="loader-icon">
                                                                </lord-icon>
                                                                <h5 class="mt-4">
                                                                    Sorry! No Result Found
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="pagination-wrapper d-flex justify-content-end mt-4">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div> <!-- content -->

<?php include('layouts/footer.php') ?>