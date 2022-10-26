<?= $this->extend('layout/template2'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="/css/close.css">


<div class="container-fluid py-4 px-4">

    <div class="container-fluid">

        <div class="row">
        <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow-lg px-2 py-2 mt-5">
                <div class="card-header border-0 text-center">
                    <img src="/asset/finalunitenlogo.png" alt="" class="img">
                    <div class="row">
                        <h5 class="mt-3">Uniten Event Management System (UEMS)</h5>
                    </div>
                    <div class="row">
                        <h6 class="text-muted"></h6>
                    </div>
                </div>
                
                <div class="card-body">
                    <h1 class="text-center fs-4">Sorry the event you are requested to join is close!</h1>
                </div>
            </div>
        </div>
    </div>
        </div>

    </div>

</div>

<?= $this->endSection(); ?>