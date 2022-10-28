<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid py-4 px-4">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb border px-2 py-2 bg-dark bg-opacity-10">
                        <li class="breadcrumb-item active text-dark text-muted" aria-current="page">Dashboard</li>
                        <li class="breadcrumb-item "><a href="/registrant" class="text-dark text-underline-hover">Registrant</a></li>
                        <li class="breadcrumb-item active text-dark text-muted" aria-current="page"><?=$event['eventname'];?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card border-1 shadow">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between px-md-1">
                            <div>
                                <h3 class="text-dark" id="ttlreg"><?=$ttlreg['total'];?></h3>
                                <p class="mb-0 text-primary fw-bold">Total Register</p>
                            </div>
                            <div class="align-self-center">
                            <i class="bi bi-cash-coin text-dark fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card border-1 shadow">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between px-md-1">
                            <div>
                                <h3 class="text-dark" id="ttlreg"><?=$ttlregtoday['total'];?></h3>
                                <p class="mb-0 text-primary fw-bold">Total Register Today</p>
                            </div>
                            <div class="align-self-center">
                            <i class="bi bi-cash-coin text-dark fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>




    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <hr>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>StudentID</th>
                                <th>Register Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php $bil = 1; ?>
                                <?php foreach($regis as $r):?>
                                    <?php $eventdate = date('d-M-Y',strtotime($r['regdate']));?>
                                        <tr>
                                            <td><?=$bil++?></td>
                                            <td><?=$r['fullname'];?></td>
                                            <td><?=$r['studentid'];?></td>
                                            <td><?=$eventdate;?></td>
                                            <td>
                                                <a href="/registrant/detail/view/<?= $r['sid'];?>" class="btn btn-secondary" ><span><i class="bi bi-chevron-right"></i></span></a>
                                            </td>
                                        </tr>
                                <?php endforeach;?>
                                    <?php if(empty($regis)):?>
                                        <tr>
                                            <td colspan="5" class="text-center">No Data</td>
                                        </tr>
                                    <?php endif?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>
