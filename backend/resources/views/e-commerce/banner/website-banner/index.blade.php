@extends('e-commerce/layouts/master')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Banner List</h4>
                </div>
                <div>
                    <a href="{{ route('website.banner.create') }}" class="btn btn-primary">Add New Banner</a>
                    <!-- <button class="btn btn-primary">Add New Brand</button> -->
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pt-0">
                            <div class="tab-content text-muted">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Image</th>
                                                            <th>Title</th>
                                                            <th>Description</th>
                                                            <th>Button URL</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($website as $website)
                                                            <tr>
                                                                <td>{{ $website->id }}</td>
                                                                <td>
                                                                    <div class="profile-section-image">
                                                                        <img src={{ $website->website_banner ? asset($website->website_banner) : asset('images/default-profile.png') }}
                                                                            alt="Banner Image"
                                                                            style="width: 80px"
                                                                            class="img-thumbnail">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    {{ $website->banner_title }}
                                                                </td>
                                                                <td>
                                                                    <div
                                                                        style="max-width:500px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                        {{ $website->banner_description }}
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ $website->banner_url }}" target="_blank">
                                                                        {{ $website->banner_url }}
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <span
                                                                        class="badge bg-{{ $website->status == 'Active' ? 'success' : 'danger' }}-subtle text-{{ $website->status == 'Active' ? 'success' : 'danger' }} fw-semibold">
                                                                        {{ ucfirst($website->status) }}
                                                                    </span>
                                                                </td>

                                                                <td>
                                                                    <a aria-label="anchor"
                                                                        href="{{ route('website.banner.edit', $website->id) }}"
                                                                        class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-original-title="Edit">
                                                                        <i
                                                                            class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                    </a>
                                                                    <form style="display: inline-block"
                                                                        action="{{ route('website.banner.delete', $website->id) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('Are you sure?')">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Delete"><i
                                                                                class="mdi mdi-delete fs-14 text-danger"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- Tab panes -->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div> <!-- content -->
@endsection
