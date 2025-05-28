<?php include('layouts/header.php') ?>
<style>
    .kanban-column {
        background-color: #f8f9fa;
        border-radius: 8px;
        /* padding: 15px; */
        min-height: 500px;
        transition: background-color 0.3s ease;
    }

    .kanban-column.drag-over {
        background-color: #e2e6ea;
    }

    .kanban-card {
        background-color: white;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        margin-bottom: 10px;
        padding: 12px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        cursor: grab;
    }
</style>
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Kanban Board</h4>
            </div>
            <div>
                <a href="add-delivery-man.php" class="btn btn-primary">Add New</a>
                <!-- <button class="btn btn-primary">Add New Customer</button> -->
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="board row">
                    
                    <div class="tasks col-3">
                        <h5 class="mt-0 task-header">New Lead</h5>

                        <!-- <div id="task-list-one" class="task-list-items"> -->
                        <div id="task-list-todo" class="kanban-column">

                            <!-- Task Item -->
                            <div class="kanban-card mb-2" id="todo">
                                <div class="card-body p-3">
                                    <small class="float-end text-muted">18 Jul 2025</small>
                                    <span class="badge bg-danger">High</span>

                                    <h5 class="mt-2 mb-2">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">iOS App home page</a>
                                    </h5>

                                    <p class="mb-0">
                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                            iOS
                                        </span>
                                        <span class="text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                            <b>74</b> Comments
                                        </span>
                                    </p>

                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                        </div>
                                    </div>

                                    <p class="mb-0">
                                        <img src="assets/images/users/user-13.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                        <span class="align-middle">Robert Carlile</span>
                                    </p>
                                </div> <!-- end card-body -->
                            </div>
                            <!-- Task Item End -->

                            <!-- Task Item -->

                            <!-- Task Item End -->

                            <!-- Task Item -->
                            <div class="kanban-card mb-2">
                                <div class="card-body p-3">
                                    <small class="float-end text-muted">11 Jul 2025</small>
                                    <span class="badge bg-success">Low</span>

                                    <h5 class="mt-2 mb-2">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Invite user to a project</a>
                                    </h5>

                                    <p class="mb-0">
                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                            CRM
                                        </span>
                                        <span class="text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                            <b>68</b> Comments
                                        </span>
                                    </p>

                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                        </div>
                                    </div>

                                    <p class="mb-0">
                                        <img src="assets/images/users/user-13.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                        <span class="align-middle">Lucas Hardy</span>
                                    </p>
                                </div> <!-- end card-body -->
                            </div>
                            <!-- Task Item End -->

                            <div class="kanban-card mb-2">
                                <div class="card-body p-3">
                                    <small class="float-end text-muted">18 Jul 2025</small>
                                    <span class="badge text-bg-secondary">Medium</span>

                                    <h5 class="mt-2 mb-2">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Topnav layout design</a>
                                    </h5>

                                    <p class="mb-0">
                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                            Hyper
                                        </span>
                                        <span class="text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                            <b>28</b> Comments
                                        </span>
                                    </p>

                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                        </div>
                                    </div>

                                    <p class="mb-0">
                                        <img src="assets/images/users/user-13.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                        <span class="align-middle">Coder Themes</span>
                                    </p>
                                </div> <!-- end card-body -->
                            </div>
                        </div> <!-- end company-list-1-->
                    </div>

                    <div class="tasks col-3">

                        <h5 class="mt-0 task-header text-uppercase">Qualified</h5>

                        <div id="task-list-inprogress" class="task-list-items kanban-column">

                            <!-- Task Item -->
                            <div class=" kanban-card mb-2">
                                <div class="card-body p-3">
                                    <small class="float-end text-muted">22 Jun 2025</small>
                                    <span class="badge text-bg-secondary">Medium</span>

                                    <h5 class="mt-2 mb-2">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Write a release note</a>
                                    </h5>

                                    <p class="mb-0">
                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                            Hyper
                                        </span>
                                        <span class="text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                            <b>17</b> Comments
                                        </span>
                                    </p>

                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                        </div>
                                    </div>

                                    <p class="mb-0">
                                        <img src="assets/images/users/user-13.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                        <span class="align-middle">Sean White</span>
                                    </p>
                                </div> <!-- end card-body -->
                            </div>
                            <!-- Task Item End -->

                            <!-- Task Item -->
                            <div class="kanban-card mb-2">
                                <div class="card-body p-3">
                                    <small class="float-end text-muted">19 Jun 2025</small>
                                    <span class="badge bg-success">Low</span>

                                    <h5 class="mt-2 mb-2">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Enable analytics tracking</a>
                                    </h5>

                                    <p class="mb-0">
                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                            CRM
                                        </span>
                                        <span class="text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                            <b>48</b> Comments
                                        </span>
                                    </p>

                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                        </div>
                                    </div>

                                    <p class="mb-0">
                                        <img src="assets/images/users/user-13.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                        <span class="align-middle">Louis Allen</span>
                                    </p>
                                </div> <!-- end card-body -->
                            </div>
                            <!-- Task Item End -->

                        </div> <!-- end company-list-2-->
                    </div>


                    <div class="tasks col-3">
                        <h5 class="mt-0 task-header text-uppercase">Quoted</h5>
                        <div id="task-list-review" class="task-list-items kanban-column">

                            <!-- Task Item -->
                            <div class=" kanban-card mb-2">
                                <div class="card-body p-3">
                                    <small class="float-end text-muted">2 May 2025</small>
                                    <span class="badge bg-danger">High</span>

                                    <h5 class="mt-2 mb-2">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Kanban board design</a>
                                    </h5>

                                    <p class="mb-0">
                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                            CRM
                                        </span>
                                        <span class="text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                            <b>65</b> Comments
                                        </span>
                                    </p>

                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                        </div>
                                    </div>

                                    <p class="mb-0">
                                        <img src="assets/images/users/user-13.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                        <span class="align-middle">Coder Themes</span>
                                    </p>
                                </div> <!-- end card-body -->
                            </div>
                            <!-- Task Item End -->

                            <!-- Task Item -->
                            <div class="kanban-card mb-2">
                                <div class="card-body p-3">
                                    <small class="float-end text-muted">7 May 2025</small>
                                    <span class="badge text-bg-secondary">Medium</span>

                                    <h5 class="mt-2 mb-2">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Code HTML email template</a>
                                    </h5>

                                    <p class="mb-0">
                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                            CRM
                                        </span>
                                        <span class="text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                            <b>106</b> Comments
                                        </span>
                                    </p>

                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                        </div>
                                    </div>

                                    <p class="mb-0">
                                        <img src="assets/images/users/user-13.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                        <span class="align-middle">Zak Turnbull</span>
                                    </p>
                                </div> <!-- end card-body -->
                            </div>
                            <!-- Task Item End -->

                            <!-- Task Item -->
                            <div class="kanban-card mb-2">
                                <div class="card-body p-3">
                                    <small class="float-end text-muted">8 Jul 2025</small>
                                    <span class="badge text-bg-secondary">Medium</span>

                                    <h5 class="mt-2 mb-2">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Brand logo design</a>
                                    </h5>

                                    <p class="mb-0">
                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                            Design
                                        </span>
                                        <span class="text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                            <b>95</b> Comments
                                        </span>
                                    </p>

                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                        </div>
                                    </div>

                                    <p class="mb-0">
                                        <img src="assets/images/users/user-13.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                        <span class="align-middle">Lily Parkin</span>
                                    </p>
                                </div> <!-- end card-body -->
                            </div>
                            <!-- Task Item End -->

                            <!-- Task Item -->
                            <div class="kanban-card mb-2">
                                <div class="card-body p-3">
                                    <small class="float-end text-muted">22 Jul 2025</small>
                                    <span class="badge bg-danger">High</span>

                                    <h5 class="mt-2 mb-2">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Improve animation loader</a>
                                    </h5>

                                    <p class="mb-0">
                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                            CRM
                                        </span>
                                        <span class="text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                            <b>39</b> Comments
                                        </span>
                                    </p>

                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                        </div>
                                    </div>

                                    <p class="mb-0">
                                        <img src="assets/images/users/user-13.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                        <span class="align-middle">Riley Steele</span>
                                    </p>
                                </div> <!-- end card-body -->
                            </div>
                            <!-- Task Item End -->

                        </div> <!-- end company-list-3-->
                    </div>

                    <div class="tasks col-3">
                        <h5 class="mt-0 task-header text-uppercase">Closed</h5>
                        <div id="task-list-done" class="task-list-items kanban-column">

                            <!-- Task Item -->
                            <div class="kanban-card mb-2">
                                <div class="card-body p-3">
                                    <small class="float-end text-muted">16 Jul 2025</small>
                                    <span class="badge bg-success">Low</span>

                                    <h5 class="mt-2 mb-2">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">Dashboard design</a>
                                    </h5>

                                    <p class="mb-0">
                                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-briefcase-outline text-muted"></i>
                                            Hyper
                                        </span>
                                        <span class="text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                            <b>287</b> Comments
                                        </span>
                                    </p>

                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                        </div>
                                    </div>

                                    <p class="mb-0">
                                        <img src="assets/images/users/user-13.jpg" alt="user-img" class="avatar-xs rounded-circle me-1">
                                        <span class="align-middle">Harvey Dickinson</span>
                                    </p>
                                </div> <!-- end card-body -->
                            </div>
                            <!-- Task Item End -->

                        </div>
                    </div>

                </div> <!-- end .board-->
            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container -->

</div>

<script src="https://unpkg.com/dragula@3.7.2/dist/dragula.min.js"></script>
<script>
    dragula([
        document.getElementById('task-list-todo'),
        document.getElementById('task-list-inprogress'),
        document.getElementById('task-list-review'),
        document.getElementById('task-list-done')
    ]);
</script>
<?php include('layouts/footer.php') ?>