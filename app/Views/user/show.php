<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid py-4 px-4">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb border px-2 py-2 bg-dark bg-opacity-10">
                        <li class="breadcrumb-item "><a href="/dashboard" class="text-dark text-underline-hover">Dashboard</a></li>
                        <li class="breadcrumb-item active text-dark text-muted" aria-current="page">User</li>
                    </ol>
                </nav>
            </div>
        </div>

    <?php if (session()->get('error')) :?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                alert
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </div>
    <?php endif;?>

</div>


<?= $this->endSection(); ?>
