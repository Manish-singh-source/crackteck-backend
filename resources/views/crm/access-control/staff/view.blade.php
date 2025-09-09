@extends('crm/layouts/master')

@section('content')
    <div class="content py-4">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-8 mx-auto">

                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="d-flex">
                                <h5 class="card-title flex-grow-1 mb-0">
                                    Staff Details
                                </h5>
                                <div>
                                    <a href="{{ route('staff.edit') }}" class="btn btn-sm btn-primary">Edit</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="list-group list-group-flush">

                                <li
                                    class="list-group-item border-0 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">Name :
                                    </span>
                                    <span>
                                        {{ $users->name }}
                                    </span>
                                </li>

                                <li
                                    class="list-group-item border-0 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">Role :
                                    </span>
                                    <span>
                                        @if ($users->roles && $users->roles->isNotEmpty())
                                            {{ $users->roles[0]->name }}
                                        @else
                                            Not Assigned
                                        @endif
                                    </span>
                                </li>

                                <li
                                    class="list-group-item border-0 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">Status :
                                    </span>
                                    <span class="badge bg-success-subtle text-success fw-semibold">
                                        Active
                                    </span>
                                </li>

                                <li
                                    class="list-group-item border-0 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">Contact no :
                                    </span>
                                    <span>
                                        9004086582
                                    </span>
                                </li>

                                <li
                                    class="list-group-item border-0 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">E-mail :
                                    </span>
                                    <span>
                                        {{ $users->email }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="row g-4 align-items-center">
                                <div class="col-sm">
                                    <h5 class="card-title mb-0">
                                        Role Access
                                    </h5>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="card-body">
                            <div class="row g-3">
                                <div class="col">
                                    @foreach ($roles as $role)
                                    @include('components.form.select', [
                                        'label' => 'Role',
                                        'name' => 'name',
                                        'options' => {{ $role->name }},
                                        'model' => $roles,
                                    ])
                                     @endforeach
                                </div>
                            </div>
                        </div> --}}

                        <div class="card-body">
                            <form action="{{ route('assign.role', $users->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">
                                    <div class="col">
                                        @include('components.form.select', [
                                            'label' => 'Role',
                                            'name' => 'name',
                                            'options' => $roles->pluck('name', 'name'),
                                            'model' => old('name') ?? null,
                                        ])
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="text-end my-3">
                                        <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div> <!-- content -->
@endsection
