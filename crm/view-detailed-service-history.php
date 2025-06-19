<?php include('layouts/header.php') ?>
<style>
    #popupOverlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.8);
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    #popupOverlay img {
        max-width: 90%;
        max-height: 90%;
        box-shadow: 0 0 10px #fff;
    }

    #popupOverlay .closeBtn {
        position: absolute;
        top: 20px;
        right: 30px;
        font-size: 30px;
        color: white;
        cursor: pointer;
    }

    button {
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }
</style>
<div class="content">
    <div class="container-fluid">

        <div class="row pt-3">
            <div class="col-xl-12 mx-auto">

                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex">
                            <h5 class="card-title flex-grow-1 mb-0">
                                Service History Details
                            </h5>
                            <div class="fw-bold text-dark">
                                #1001
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">


                            <div class="col-lg-6">
                                <ul class="list-group list-group-flush ">

                                    <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                        <span class="fw-semibold text-break">Engineer Name :
                                        </span>
                                        <span>
                                            Shyam Jaiswal
                                        </span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                        <span class="fw-semibold text-break">Contact no :
                                        </span>
                                        <span>
                                            9004086582
                                        </span>
                                    </li>
                                    <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                        <span class="fw-semibold text-break"> Visit Date :
                                        </span>
                                        <span>
                                            2025-07-16 12:09 PM
                                        </span>
                                    </li>
                                    <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                        <span class="fw-semibold text-break"> Finalized Report :
                                        </span>
                                        <span>
                                            <a class="btn btn-sm btn-primary" href="./assets/files/CRM _ Dashboard.pdf" target="_blank">View Report</a>
                                        </span>
                                    </li>


                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-group list-group-flush ">

                                    <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                        <span class="fw-semibold text-break">Email :
                                        </span>
                                        <span>
                                            shyam@gmail.com
                                        </span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                        <span class="fw-semibold text-break"> Status :
                                        </span>
                                        <span>
                                            <span class="badge bg-warning-subtle text-warning fw-semibold">Upcoming</span>
                                        </span>
                                    </li>
                                    <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                        <span class="fw-semibold text-break">
                                            Next Visit Date:
                                        </span>
                                        <span>
                                            <span class="badge bg-warning-subtle text-warning fw-semibold">2025-07-16</span>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex">
                            <h5 class="card-title flex-grow-1 mb-0">
                                Product Details
                            </h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <table
                            class="table table-striped table-borderless dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Modal Number</th>
                                    <th>Product Serial Number</th>
                                    <th>Crackteck Serial Number</th>
                                    <th>Report</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="align-middle">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <img src="https://placehold.co/80x80" alt="Headphone" width="100px" class="img-fluid d-block">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            ZKTeco MB20 Biometric Attendance Device
                                        </div>
                                    </td>
                                    <td>
                                        Biometric
                                    </td>
                                    <td>
                                        Inspiron 3511
                                    </td>
                                    <td>B0BB7FQBBS</td>
                                    <td>
                                        B0BB7FQBBS
                                    </td>
                                    <td><a class="btn btn-sm btn-primary" href="./assets/files/CRM _ Dashboard.pdf" target="_blank">View Report</a></td>
                                </tr>

                                <tr class="align-middle">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <img src="https://placehold.co/80x80" alt="Headphone" width="100px" class="img-fluid d-block">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            ZKTeco MB20 Biometric Attendance Device
                                        </div>
                                    </td>
                                    <td>
                                        Biometric
                                    </td>
                                    <td>
                                        Inspiron 3511
                                    </td>
                                    <td>B0BB7FQBBS</td>
                                    <td>
                                        B0BB7FQBBQ
                                    </td>
                                    <td><a class="btn btn-sm btn-primary" href="./assets/files/CRM _ Dashboard.pdf" target="_blank">View Report</a></td>

                                </tr>

                                <tr class="align-middle">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <img src="https://placehold.co/80x80" alt="Headphone" width="100px" class="img-fluid d-block">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            ZKTeco MB20 Biometric Attendance Device
                                        </div>
                                    </td>
                                    <td>
                                        Biometric
                                    </td>
                                    <td>
                                        Inspiron 3511
                                    </td>
                                    <td>B0BB7FQBBS</td>
                                    <td>
                                        B0BB7FQBBR
                                    </td>
                                    <td><a class="btn btn-sm btn-primary" href="./assets/files/CRM _ Dashboard.pdf" target="_blank">View Report</a></td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- content -->


<?php include('layouts/footer.php') ?>