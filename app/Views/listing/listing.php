<?= $this->extend('layout/template2'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
                <h1 class="mt-3 fs-2 text-center">Find Your Favourite Event</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Event" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                            <option value="On Going">On Going</option>
                            <option value="Complete">Complete</option>
                        </select>
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row mt-2 mb-4">
            <?php foreach($event as $e):?>
            <div class="col-md-4 mt-3 mb-3 shadow-md">
                <div class="card border border-secondary border-opacity-50">
                    <div class="card-body">
                        <h5 class="card-title"><?=$e['eventname'];?>  <span class="badge text-bg-warning"><?=$e['eventstatus'];?></span></h5>
                        <hr>
                            <p class="card-text"><?=$e['eventdesc'];?></p>
                            <p class="card-text">
                                <h1 class="fs-6">Detail </h1>
                                    <div class="row">
                                        <small class="text ms"> <i class="bi bi-calendar2-range pe-2"></i> <?=$e['eventdate'];?></small>
                                    </div>
                                    <div class="row">
                                        <small class="text"><i class="bi bi-clock pe-2"></i> <?=$e['eventtime'];?></small>
                                    </div>
                                    <div class="row">
                                        <small class="text"><i class="bi bi-bookmark-check pe-2"></i> <?=$e['eventtype'];?></small>
                                    </div> 
                                    <div class="row">
                                        <small class="text"><i class="bi bi-stars pe-2"></i> <?=$e['eventscorun'];?> Scorun</small>
                                    </div> 
                            </p>
                
                            <?php
                                if($e['register'] == 'Close')
                                {
                                    echo '<button href="#" class="btn btn-secondary">Registration Is Closed</button>';
                                }
                                else
                                {
                                    echo '<a href="/event/listing/detail/'.$e['eventid'].'" class="btn btn-primary">View More</a>';
                                } 
                            ?>
                            
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
    </div>

</div>

<!-- <div class="container-fluid"> -->
    
<!-- </div> -->
             

<?= $this->endSection(); ?>