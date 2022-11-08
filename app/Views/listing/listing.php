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
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="fs-4">Filter By</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">              
                <select name="query" id="filtereventtype" class="form-select" onchange="">
                    <option value="">--Event Type--</option>
                    <option value="Physical">Physical</option>
                    <option value="Online">Online</option>
                </select>                   
            </div>
            <div class="col-md-4">
                <select name="query" id="filtereventscorun" class="form-select" onchange="">
                    <option value="">--Event Scorun--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
            <div class="col-md-4">
                <select name="query" id="filtereventcategory" class="form-select" onchange="">
                    <option value="">--Event Category--</option>
                    <option value="Sports">Sports</option>
                    <option value="Music">Music</option>
                    <option value="Food">Food</option>
                    <option value="Art">Art</option>
                    <option value="Others">Others</option>
                </select>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mt-2 mb-4">
            <?php foreach($event as $e):?>
            <div class="col-md-4 mt-3 mb-3 shadow-md" id="listing">
                <div class="card border border-secondary border-opacity-50">
                    <div class="card-body">
                        <h5 class="card-title"><?=$e['eventname'];?>  <span class="badge text-bg-warning"><?=$e['eventstatus'];?></span></h5>
                        <hr>
                            <p class="card-text" id="desc"><?=mb_strimwidth($e['eventdesc'], 0, 35, "...")?></p>
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
            <?php if(empty($event)):?>
                <div class="col-md-12 mt-3 mb-3 shadow-md" id="listing">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">No Event Found!</h4>
                        <p>Sorry, we can't find any event that match your search. Please try again with different keywords.</p>
                        <hr>
                        <p class="mb-0">If you think this is a system error, please contact us.</p>
                    </div>
                </div>
            <?php endif; ?>
            
        </div>
        
    </div>

</div>

<script>

    //sort by category
    $(document).ready(function(){
        $('#filtereventtype').change(function(){
            var category = $(this).val();
            $.ajax({
                url: "/event/listing/search/"+category,
                method: "get",
                data: {category:category},
                success: function(data){
                    window.history.pushState("", "", "/event/listing/search/"+category);
                    location.reload();                
                },
                error: function(data){
                    console.log('error');
                }
            });
        });
    });

    //sort by scorun
    $(document).ready(function(){
        $('#filtereventscorun').change(function(){
            var scorun = $(this).val();
            $.ajax({
                url: "/event/listing/search/"+scorun,
                method: "get",
                data: {scorun:scorun},
                success: function(data){
                    window.history.pushState("", "", "/event/listing/search/"+scorun);
                    location.reload();                
                },
            });
        });
    });

    //sort by category
    $(document).ready(function(){
        $('#filtereventcategory').change(function(){
            var category = $(this).val();
            $.ajax({
                url: "/event/listing/search/"+category,
                method: "get",
                data: {category:category},
                success: function(data){
                    window.history.pushState("", "", "/event/listing/search/"+category);
                    location.reload();                
                },
            });
        });
    });

</script>
<?= $this->endSection(); ?>