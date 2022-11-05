<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid py-4 px-4">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb border px-2 py-2 bg-dark bg-opacity-10">
                        <li class="breadcrumb-item "><a href="/dashboard" class="text-dark text-underline-hover">Dashboard</a></li>
                        <li class="breadcrumb-item active text-dark text-muted" aria-current="page">Registrant</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="fs-3">Registrant</h1>
                </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Event Name</th>
                                    <th>Event Date</th>
                                    <th>Event Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php $bil = 1; ?>
                                    <?php foreach($event as $e):?>
                                        <?php $eventdate = date('d-M-Y',strtotime($e['eventdate']));?>
                                        <tr>
                                            <td><?=$bil++?></td>
                                            <td>
                                                <?=$e['eventname'];?> <span class="badge text-bg-<?php 
                                                    if($e['eventstatus'] == 'Completed')
                                                    {
                                                        echo 'success';
                                                    }
                                                    elseif($e['eventstatus'] == 'On Going')
                                                    {
                                                        echo 'primary';
                                                    }
                                                    else
                                                    {
                                                        echo 'secondary';
                                                    }                                          
                                                ?>">
                                                <?=$e['eventstatus'];?></span>
                                            </td>
                                            <td><?=$eventdate;?></td>
                                            <td><?=$e['eventtype'];?></td>
                                            <td>
                                                <!-- <a href="/registrant/detail/<?= $e['eventid'];?>" class="btn btn-secondary" ><span><i class="bi bi-chevron-right"></i></span></a> -->
                                                <a href="<?= url_to('registrant.detail', $e['eventid'])?>" class="btn btn-secondary" ><span><i class="bi bi-chevron-right"></i></span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>
