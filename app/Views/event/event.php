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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="fs-3">Event</h1>
                        <div class="btn-group float-end" role="group" aria-label="Basic outlined example">
                            <a href="<?=url_to('event.create')?>" class="btn btn-outline-primary">New Event</a>
                            <a href="<?=url_to('event.retrieve')?>" class="btn btn-outline-primary">Retrieve Delete Event</a>                  
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <form action="" method="post">
                            <?= csrf_field();?>
                            <select class="form-select float-start" name="attendance" id="attend" onchange="submit()">
                                <option value>Select Event Type</option>
                                <option value="">Reset</option>
                                <option value="Physical">Physical</option>
                                <option value="Online">Online</option>
                            </select>
                        </form>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="nama_penuh" id="filter" class="form-control"
                            placeholder="Search event name" value="" onkeyup="searchfunct()">
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped" id="table">
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
                            <?php $bil = 1 +(15 * ($currentpage -1));?>
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
                                    <a href="/event/detail/<?= $e['eventid'];?>" class="btn btn-secondary"><span><i class="bi bi-chevron-right"></i></span></a>
                                    <a href="/event/edit/<?= $e['eventid'];?>" class="btn btn-primary"><span><i class="fa-regular fa-pen-to-square"></i></span></a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletemodal<?=$e['eventid'];?>"><span><i class="fa-regular fa-trash-alt"></i></span></button>
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

    <?= $pager->links('event', 'pagination')?>

    <?php foreach($event as $e):?>
    <div class="modal fade" id="deletemodal<?=$e['eventid'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Event</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="small text-muted">Are you sure to delete this event ? This action will delete all the related data to this event.</h1>
                    <form action="event/delete/<?= $e['eventid'];?>" method="post" class="d-inline"
                        data-bs-toggle="tooltip">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete Event</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>

</div>

<script>
//live search
function searchfunct() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("filter");
    filter = input.value.toUpperCase();
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}





</script>

<?= $this->endSection(); ?>