<?= $this->extend('layout/template');?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="my-3 py-2">Welcome Back!</h3>
            <hr>
        </div>
    </div>
</div>

<!-- <div class="container-fluid">
    <div class="col-md-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div> -->

<div class="container-fluid">
    <div class="row">
    <div class="col-xl-3 col-sm-6 col-md-3 mb-2">
                <div class="card border-1 shadow text-white bg-danger mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between px-md-1">
                            <div>
                                <h3 class="text-white">257</h3>
                                <p class="mb-0">Total Customer</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fa fa-user text-white fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-md-3 mb-2">
                <div class="card border-1 shadow text-white bg-primary mb-3">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between px-md-1">
                            <div>
                                <h3 class="text-white">63</h3>
                                <p class="mb-0">Total Therapist</p>
                            </div>
                            <div class="align-self-center">
                            <i class="fa fa-address-book text-white fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-md-3 mb-2">
                <div class="card border-1 shadow text-white bg-success mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between px-md-1">
                            <div>
                                <h3 class="text-white">10</h3>
                                <p class="mb-0">Total Treatment</p>
                            </div>
                            <div class="align-self-center">
                            <i class="fa fa-address-card text-white fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-md-3 mb-2">
                <div class="card border-1 shadow text-white bg-secondary mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between px-md-1">
                            <div>
                                <h3 class="text-white">RM 8488</h3>
                                <p class="mb-0">Total Sales 2022</p>
                            </div>
                            <div class="align-self-center">
                            <i class="fa fa-line-chart text-white fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<?= $this->endSection(); ?>