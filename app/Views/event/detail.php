<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid py-4 px-4">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb border px-2 py-2 bg-dark bg-opacity-10">
                        <li class="breadcrumb-item active text-dark text-muted" aria-current="page">Dashboard</li>
                        <li class="breadcrumb-item "><a href="/event" class="text-dark text-underline-hover">Event</a></li>
                        <li class="breadcrumb-item active text-dark text-muted" aria-current="page"><?=$event['eventname'];?></li>
                    </ol>
                </nav>
            </div>
        </div>

<?php if (session()->get('error')) :?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                alert
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php endif;?>

    <form class="row g-3" action="/event/detail/<?=$event['eventid'];?>" method="post">
        <?=csrf_field();?>       
        <div class="col-md-6">
            <label for="eventname" class="form-label">Event Name</label>
            <input type="text" class="form-control" id="eventname" name="eventname" value="<?=$event['eventname'];?>">
        </div>
        <div class="col-md-6">
            <label for="eventname" class="form-label">Event Description</label>
            <input type="textarea" class="form-control" id="eventdesc" name="eventdesc" value="<?=$event['eventdesc'];?>">
        </div>
        <div class="col-md-6">
            <label for="startdate" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="startdate" name="eventdate" value="<?=$event['eventdate'];?>">
        </div>
        <div class="col-md-6">
            <label for="eventtype" class="form-label">Event Type</label>
                <select id="eventtype" class="form-select" name="eventtype">
                    <option selected>Choose...</option>
                    <option>Physical</option>
                    <option>Online</option>
                </select>
        </div>
        <div class="col-md-6">
            <label for="starttime" class="form-label">Start time</label>
            <input type="time" class="form-control" id="starttime" name="eventtime" value="<?=$event['eventtime'];?>" >
        </div>
        <div class="col-md-6">
            <label for="eventstat" class="form-label">Event Status</label>
            <select id="evenstat" class="form-select" name="eventstat">
                <option>On Going</option>
                <option>Completed</option>
                <option>Close</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="tqlink" class="form-label">Event Scorun</label>
            <input type="text" class="form-control" id="tqlink" name="eventscorun" value="<?=$event['eventscorun'];?>">
        </div>
        <div class="col-md-6">
            <label for="tqlink" class="form-label">Registration</label>
            <select id="evenstat" class="form-select" name="register">
                <option value="Open">Open</option>
                <option value="Close">Close</option>
            </select>
        </div>
   
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary float-end"><i class="bi bi-save pr-2"></i> Save Change</button>
        </div>
    </form>

    </div>

</div>

<?= $this->endSection(); ?>