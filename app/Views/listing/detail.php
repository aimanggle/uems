<?= $this->extend('layout/template2'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid py-4 px-4">

    <div class="container-fluid">
    
        <div class="row">
            <div class="col-md-12 pt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb border px-2 py-2 bg-dark bg-opacity-10">
                        <li class="breadcrumb-item "><a href="/event/listing" class="text-dark text-underline-hover">Listing</a></li>
                        <li class="breadcrumb-item active text-dark text-muted" aria-current="page">Detail</li>
                        <li class="breadcrumb-item active text-dark text-muted" aria-current="page"><?=$event['eventname'];?></li>
                    </ol>
                </nav>
            </div>
        </div>
    
            <div class="row">
                <div class="col-md-12 mt-3 mb-3 shadow-md">
                    <div class="card border border-secondary border-opacity-50">
                        <div class="card-body">
                            <h5 class="card-title"><?=$event['eventname'];?>  <span class="badge text-bg-warning"><?=$event['eventstatus'];?></span></h5>
                            <hr>
                                <p class="card-text"><?=$event['eventdesc'];?></p>
                                <p class="card-text">
                                    <h1 class="fs-6">Detail </h1>
                                        <div class="row">
                                            <small class="text ms"> <i class="bi bi-calendar2-range pe-2"></i> <?=$event['eventdate'];?></small>
                                        </div>
                                        <div class="row">
                                            <small class="text"><i class="bi bi-clock pe-2"></i> <?=$event['eventtime'];?></small>
                                        </div>
                                        <div class="row">
                                            <small class="text"><i class="bi bi-bookmark-check pe-2"></i> <?=$event['eventtype'];?></small>
                                        </div> 
                                        <div class="row">
                                            <small class="text"><i class="bi bi-stars pe-2"></i> <?=$event['eventscorun'];?> Scorun</small>
                                        </div> 
                                </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- <div class="col-md-12">
                    <h3>Register Form</h3>
                    <hr>
                </div> -->
                <div class="d-grid">
                    <a href="/event/listing/register/<?=$event['eventid'];?>" class="btn btn-primary btn-block">Register Me<span><i class="bi bi-arrow-right ps-2"></i></span> </a>
                </div>
                <!-- <a href="/event/listing/<?=$event['eventid'];?>/register" class="btn btn-primary btn-block">Register</a> -->
            </div>


    </div>

</div>



<?= $this->endSection(); ?>