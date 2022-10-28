<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid py-4 px-4">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb border px-2 py-2 bg-dark bg-opacity-10">
                        <li class="breadcrumb-item "><a href="/dashboard" class="text-dark text-underline-hover">Dashboard</a></li>
                        <li class="breadcrumb-item active text-dark text-muted" aria-current="page">Event</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

<?php if (session()->get('success')) :?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?=session()->get('success');?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif;?>

<?php if (session()->get('error')) :?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?=session()->get('error');?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif;?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="fs-3">Event</h1>
                    <a href="/event/create" class="btn btn-outline-secondary btn-sm float-end">New Event <span><i class="bi bi-plus-lg"></i></span></a>
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
                                                <a href="/event/detail/<?= $e['eventid'];?>" class="btn btn-secondary" ><span><i class="bi bi-chevron-right"></i></span></a>
                                                <a href="/event/edit/<?= $e['eventid'];?>" class="btn btn-primary" ><span><i class="fa-regular fa-pen-to-square"></i></span></a>
                                                <form action="event/delete/<?= $e['eventid'];?>" method="post" class="d-inline" data-bs-toggle="tooltip" >
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE" >
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this event ?')" ><span><i class="fa-solid fa-trash"></i></span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                        <?php if(empty($event)) : ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No Event Found</td>
                                        </tr>
                                        <?php endif;?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>
