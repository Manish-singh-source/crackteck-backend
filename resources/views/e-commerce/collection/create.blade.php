@extends('e-commerce/layouts/master')

@section('content')

<style>
    .productUl {
        padding-left: 0;
        margin-bottom: 0;
    }

    .product-scroll {
        margin: 0;
    }

    .product-scroll {
        max-height: 400px;
        overflow-y: auto;
    }

    .productUl-sub {
        padding-left: 0rem !important;
    }

    .productUl-sub .select-product {
        border-bottom: 1px dashed #eee;
        border-radius: 3px;
        margin-bottom: 4px;
    }

    .productUl-sub>li {
        list-style-type: none !important;
    }

    .pointer {
        cursor: pointer;
    }

    .append-product {
        padding-left: 0 !important;
    }

    .product-scroll-2 {
        max-height: 455px;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .append-product li {
        list-style-type: none !important;
    }

    .btn {
        --ig-btn-padding-y: 0.6rem;
        --ig-btn-line-height: 1.4;
    }
</style>
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="pb-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0"></h4>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Create Collection</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <form action="#" method="POST" enctype="multipart/form-data">
                                <div class="row g-3">

                                    <div class="col-lg-6">
                                        @include('components.form.input', [
                                        'label' => 'Title',
                                        'name' => 'title',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Collection Title',
                                        ])
                                    </div>

                                    <div class="col-lg-6">
                                        @include('components.form.input', [
                                        'label' => 'Description',
                                        'name' => 'description',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Collection Description',
                                        ])
                                    </div>

                                    <div class="col-lg-6">
                                        @include('components.form.input', [
                                        'label' => 'Image',
                                        'name' => 'image',
                                        'type' => 'file',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.select', [
                                        'label' => 'Status',
                                        'name' => 'status',
                                        'options' => ["0" => "--Select--", "1" => "Active", "2" => "Inactive"]
                                        ])
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">
                            Collection Products Sections
                        </h5>
                    </div>

                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-xxl-4 col-xl-5">
                                <div class="border rounded p-2 position-relative">
                                    <div class="position-absolute top-0 start-0 w-100">
                                        <input id="searchProduct" class="form-control border-0 border-bottom" type="search" placeholder="Search here">
                                    </div>

                                    <ul id="productUl" class="product-scroll productUl mt-5">
                                        <li class="mb-2">
                                            <div class="d-flex justify-content-start align-items-center gap-1">
                                                <h5 class="cate-title">Category 1</h5>
                                            </div>

                                            <ul class="productUl-sub">
                                                <li class="pointer py-1 px-2 select-product"
                                                    id='selected-product-1'
                                                    data-id="product-1" data-name="Product 1">
                                                    Product 1
                                                </li>
                                                <li class="pointer py-1 px-2 select-product"
                                                    id='selected-product-2'
                                                    data-id="product-2" data-name="Product 2">
                                                    Product 2
                                                </li>
                                                <li class="pointer py-1 px-2 select-product"
                                                    id='selected-product-3'
                                                    data-id="product-3" data-name="Product 3">
                                                    Product 3
                                                </li>
                                                <li class="pointer py-1 px-2 select-product"
                                                    id='selected-product-4'
                                                    data-id="product-4" data-name="Product 4">
                                                    Product 4
                                                </li>
                                            </ul>

                                        </li>
                                        <li class="mb-2">
                                            <div class="d-flex justify-content-start align-items-center gap-1">
                                                <h5 class="cate-title">Category 2</h5>
                                            </div>

                                            <ul class="productUl-sub">

                                                <li class="pointer py-1 px-2 select-product"
                                                    id='selected-product-1'
                                                    data-id="product-1" data-name="Product 1">
                                                    Product 1
                                                </li>
                                                <li class="pointer py-1 px-2 select-product"
                                                    id='selected-product-2'
                                                    data-id="product-2" data-name="Product 2">
                                                    Product 2
                                                </li>
                                                <li class="pointer py-1 px-2 select-product"
                                                    id='selected-product-3'
                                                    data-id="product-3" data-name="Product 3">
                                                    Product 3
                                                </li>
                                                <li class="pointer py-1 px-2 select-product"
                                                    id='selected-product-4'
                                                    data-id="product-4" data-name="Product 4">
                                                    Product 4
                                                </li>
                                            </ul>

                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-xxl-8 col-xl-7">
                                <ul class="append-product product-scroll-2">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 pb-2">
                    <a href="{{ route('collection.index') }}" class="btn btn-md btn-success btn-xl px-4 fs-6 text-light waves ripple-light">Update</a>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->
<script>
    (function($) {
        "use strict"

        $('#discount').on('keyup', function() {
            var discount = $(this).val();
            var type = $("#discount_type").val();

            if (type && type == '1' && discount > 100) {
                $(this).val('');
                toaster("Discount Can Not Be Greater Than 100", 'danger');
            }
            if (type == "") {
                $(this).val('');
                toaster("Select Discount Type First", 'danger');
            }

        });

        $('#discount_type').on('change', function() {
            var type = $(this).val();
            var discount = $("#discount").val();
            if ((type == '1' && discount > 100) || type == '') {
                $('#discount').val('');
            }
        });

        $('#searchProduct').keyup(function() {
            var value = $(this).val().toLowerCase();
            $('#productUl li').each(function() {
                var lcval = $(this).text().toLowerCase();
                if (lcval.indexOf(value) > -1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        $('.select-product').click(function() {
            let id = $(this).attr('data-id');
            let name = $(this).attr('data-name');

            if ($(`.append-product #product-${id}`).length) {
                toaster("Already Added", 'danger');
            } else {
                $('.append-product').append(
                    `
                <li class='mb-2 border p-2 rounded' id='product-${id}'>
                    <div class="row g-2 align-items-end">
                        <div class="col-xxl-5">
                            <div>
                                <label for="ptitle" class="form-label">Product title</label>
                                <input disabled   type="text" id="ptitle" class="input-disabled form-control" value="${name}">
                            </div>
                            <input hidden   type="text" name='product[${id}][product_id]' class="form-control" value="${id}">
                        </div>

                        <div class="col-xxl-4 col-md-6">
                                <div>
                                <label for="product_discount_type" class="form-label">Discount</label>
                                <select class="form-select" name="product[${id}][discount_type]" id="product_discount_type" >
                                    <option value =''>Discont Type</option>
                                    <option {{old('product_discount_type') == 'percentage' ? 'selected' : ''}} value="1">%</option>
                                    <option {{old('product_discount_type') == 'flat' ? 'selected' : ''}} value="0">&#2547;</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xxl-2 col-md-4 col-10">
                                <div>
                                <label for="quantity" class="form-label">price</label>
                                <input type="number" id="quantity"  class="form-control" value='0' type="text" name="product[${id}][discount]">
                            </div>
                        </div>

                        <div class="col-xxl-1 col-md-2 col-2">
                            <div class ="h-100 d-flex align-items-center justify-content-center mt-4">
                                <button type="button" class="btn btn-sm btn-danger w-100 delete-li" data-id= '${id}'><i class="mdi mdi-delete"></i></button>
                            </div>
                        </div>
                    </div>
                </li>
                `
                )
                $(this).addClass('disabled')
                $(this).removeClass('pointer')
            }
        });


        $(document).on('click', '.delete-li', function(e) {
            var id = $(this).attr('data-id');
            $(`#selected-product-${id}`).removeClass('disabled')
            $(`#selected-product-${id}`).addClass('pointer')

            $(`#product-${id}`).remove()
            e.preventDefault()
        })


    })(jQuery);
</script>

@endsection