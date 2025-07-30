@extends('crm/layouts/master')

@section('content')

<div class="content">
    <div class="container-fluid">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Quotation</h4>
            </div>


        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="float-start d-flex justify-content-center">
                                    <img src="{{ asset('assets/images/favicon.png') }}" class="me-2" alt="logo" height="24">
                                    <h4 class="mb-0 caption fw-semibold fs-18">Crackteck</h4>
                                </div>
                                <div class="float-end">
                                    <h4 class="fs-18">Quotation ID: QTN-1006
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 bg-primary rounded-2 mb-3">
                                    <div class="float-start mt-3 text-white">
                                        <address>
                                            <strong>Quotation To:</strong><br>
                                            Sanjay Nagar lalji Pada<br>
                                            Kandivali West M-400067<br>
                                            <abbr title="Phone">P: </abbr>+91 9607 78 8836
                                        </address>
                                    </div>
                                    <div class="float-end mt-3 text-white">
                                        <address>
                                            <strong>Bill To:</strong><br>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="pe-4">Client Name:</td>
                                                        <td class="fw-medium">Manish</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-4">Email:</td>
                                                        <td>crackteck@gmail.com</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-4">Phone:</td>
                                                        <td>+91 9607 78 8836</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </address>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive rounded-2">
                                        <table class="table mt-4 mb-4 table-centered border">
                                            <thead class="rounded-2">


                                                <tr>
                                                    <th>#</th>
                                                    <th>Item</th>
                                                    <th>HSN</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Tax %</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>1</td>
                                                    <td>Dell Inspiron Laptop</td>
                                                    <td>8471</td>
                                                    <td>1</td>
                                                    <td>₹50,000</td>
                                                    <td>18%</td>
                                                    <td>₹1,18,000</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>HP Desktop Computer</td>
                                                    <td>9983</td>
                                                    <td>2</td>
                                                    <td>₹10,000</td>
                                                    <td>18%</td>
                                                    <td>₹21,800</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"></td>
                                                    <td colspan="2">
                                                        <table class="table table-sm text-nowrap mb-0 table-borderless">
                                                            <tbody>

                                                                <tr>
                                                                    <td>
                                                                        <p class="mb-0">Sub-total :</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="mb-0 fw-medium fs-15">₹1,28,000</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">
                                                                        <p class="mb-0">GST :</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="mb-0 fw-medium fs-15">₹23,040</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">
                                                                        <p class="mb-0 fs-14">Total :</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="mb-0 fw-medium fs-16 text-success">₹1,51,040</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="d-print-none">
                                <div class="float-end">
                                    <a href="javascript:window.print()" class="btn btn-dark border-0"><i class="mdi mdi-printer me-1"></i>Print</a>
                                    <a href="{{ route('quotation.index') }}" class="btn btn-primary">Submit</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection