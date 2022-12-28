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

    <div class="container-fluid mb-2">
        <div class="row">
            <div class="col-md-12">
                <a href="<?=url_to('export.excel', $event['eventid'])?>" class="btn btn-outline-success float-end">Export to excel <i class="bi bi-file-earmark-spreadsheet-fill"></i></a>
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
                            <i class="fa-regular fa-address-card fa-3x"></i>
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
                            <i class="fa-regular fa-address-card fa-3x"></i>
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
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewdetailModal<?= $r['regid'];?>"><i class="bi bi-eye"></i></button>
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




<?php foreach($regis as $r):?>
<?php $date = date('d-M-Y',strtotime($r['regdate']));?>
<div class="modal fade" id="viewdetailModal<?=$r['regid']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Registrant Detail</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <h1 class="fs-4">Student Detail</h1>
                <hr>
                <div class="col-md-4">
                    <p class="fw-bold">Full Name : </p>
                    <p class="fw-bold">Student ID : </p>
                    <p class="fw-bold">College : </p>
                    <p class="fw-bold">Program :</p>
                </div>
                <div class="col-md-8">
                    <p><?=$r['fullname']?></p>
                    <p><?=$r['studentid']?></p>
                    <p><?=$r['collegename']?></p>
                    <p><?=$r['programname']?></p>
                </div>
                <h1 class="fs-4">Register Detail</h1>
                <hr>
                <div class="col-md-4">
                    <p class="fw-bold">Register Date : </p>
                    <p class="fw-bold">Ticket No : </p>
                </div>
                <div class="col-md-8">
                    <p><?=$date?></p>
                    <p><?=$r['regno']?></p>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
<?php endforeach;?>

</div>

<?= $this->endSection(); ?>
