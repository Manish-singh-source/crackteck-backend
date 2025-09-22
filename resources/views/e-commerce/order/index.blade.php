@extends('e-commerce/layouts/master')

@section('content')

<div class="content">
    <div class="container-fluid">
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Order Management</h4>
            </div>
            <div>
                <a href="{{ route('order.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Create Order
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">Orders List</h5>
                    </div>
                    <div class="card-body">
                        @if($orders->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Product Name</th>
                                            <th>Customer Name</th>
                                            <th>Amount</th>
                                            <th>Invoice</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>
                                                    <span class="fw-semibold">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if($order->product && $order->product->warehouseProduct && $order->product->warehouseProduct->main_product_image)
                                                            <img src="{{ asset('storage/' . $order->product->warehouseProduct->main_product_image) }}"
                                                                 alt="Product" class="rounded me-2" width="40" height="40">
                                                        @else
                                                            <div class="bg-light rounded me-2 d-flex align-items-center justify-content-center"
                                                                 style="width: 40px; height: 40px;">
                                                                <i class="fas fa-image text-muted"></i>
                                                            </div>
                                                        @endif
                                                        <div>
                                                            <div class="fw-medium">
                                                                {{ $order->product->warehouseProduct->product_name ?? 'N/A' }}
                                                            </div>
                                                            <small class="text-muted">
                                                                SKU: {{ $order->product->warehouseProduct->sku ?? 'N/A' }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <div class="fw-medium">{{ $order->customer->first_name ?? 'N/A' }} {{ $order->customer->last_name ?? '' }}</div>
                                                        <small class="text-muted">{{ $order->customer->email ?? 'N/A' }}</small>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="fw-semibold text-success">₹{{ number_format($order->amount, 2) }}</span>
                                                </td>
                                                <td>
                                                    @if($order->invoice_file)
                                                        <a href="{{ asset('storage/' . $order->invoice_file) }}"
                                                           target="_blank" class="btn btn-sm btn-outline-primary">
                                                            <i class="fas fa-file-alt me-1"></i> View
                                                        </a>
                                                    @else
                                                        <span class="text-muted">No file</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div>{{ $order->created_at->format('d M Y') }}</div>
                                                    <small class="text-muted">{{ $order->created_at->format('h:i A') }}</small>
                                                </td>
                                                <td>
                                                    <a href="{{ route('order.view', $order->id) }}"
                                                       class="btn btn-sm btn-outline-primary" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('order.edit', $order->id) }}"
                                                           class="btn btn-sm btn-outline-primary" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-sm btn-outline-danger delete-order"
                                                                data-id="{{ $order->id }}" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    <p class="text-muted mb-0">
                                        Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of {{ $orders->total() }} results
                                    </p>
                                </div>
                                <div>
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <div class="mb-3">
                                    <i class="fas fa-shopping-cart fa-3x text-muted"></i>
                                </div>
                                <h5 class="text-muted">No Orders Found</h5>
                                <p class="text-muted">There are no orders to display at the moment.</p>
                                <a href="{{ route('order.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-1"></i> Create First Order
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this order? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    let orderToDelete = null;

    // Delete order functionality
    $('.delete-order').on('click', function() {
        orderToDelete = $(this).data('id');
        $('#deleteModal').modal('show');
    });

    $('#confirmDelete').on('click', function() {
        if (orderToDelete) {
            $.ajax({
                url: `/e-commerce/order/${orderToDelete}`,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        $('#deleteModal').modal('hide');
                        location.reload();
                    }
                },
                error: function(xhr) {
                    const message = xhr.responseJSON?.message || 'An error occurred while deleting the order.';
                    alert(message);
                }
            });
        }
    });
});
</script>

@endsection