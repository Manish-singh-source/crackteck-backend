<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0"></h4>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Send Mail To Subscribers</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div>
                                        <label for="Subject" class="form-label"> Subject
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" value="" name="subject" id="Subject" placeholder="Enter subject" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-editor-area">
                                        <div class="text-editor-area">
                                            <label for="mail-composer" class="form-label"> Body
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea id="mail-composer" class="form-control text-editor" name="details" rows="5" placeholder="Enter Description"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="text-start">
                                        <button class="btn btn-sm btn-primary">
                                            Send
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php include('layouts/footer.php') ?>