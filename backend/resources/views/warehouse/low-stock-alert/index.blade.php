@extends('warehouse/layouts/master')

@section('content')

<div class="content">

    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Low Stock Alert</h4>
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
                                    <span class="d-none d-sm-block">All Invoices</span>
                                </a>
                            </li>
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
                                                            <th>Item Name</th>
                                                            <th>Current Stock</th>
                                                            <th>Min. Threshold</th>
                                                            <th>Suggested Reorder Qty</th>
                                                            <th>Last Purchase Date</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="align-middle">
                                                            <td>ABC Paper</td>
                                                            <td>5</td>
                                                            <td>10</td>
                                                            <td>15</td>
                                                            <td>2025-06-01</td>
                                                            <td>
                                                                <button class="btn btn-sm bg-primary-subtle me-1">
                                                                    Add Purchase
                                                                </button>
                                                                <button class="btn btn-sm bg-primary-subtle me-1">
                                                                    Create Request
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr class="align-middle">
                                                            <td>Laser Printer</td>
                                                            <td>1</td>
                                                            <td>2</td>
                                                            <td>3</td>
                                                            <td>2025-06-03</td>
                                                            <td>
                                                                <button class="btn btn-sm bg-primary-subtle me-1">
                                                                    Add Purchase
                                                                </button>
                                                                <button class="btn btn-sm bg-primary-subtle me-1">
                                                                    Create Request
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 


@endsection