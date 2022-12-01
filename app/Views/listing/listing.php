<?= $this->extend('layout/template2'); ?>

<?= $this->section('content'); ?>

    <div class="container-fluid bg-primary">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-3 fs-2 text-center text-light">Find Your Favourite Event</h1>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 offset-md-3 mt-4 mb-3">
                    <div class="input-group mb-3">
                        <input type="text" name="search" id="search"class="form-control" placeholder="Search event" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-light text-bg-light" type="submit" id="btn"><a href="/event/listing" class="text-dark pe-2"><i class="bi bi-x-lg"></i></a><i class="bi bi-search"></i></button>
                    </div>
                    <h1 class="fs-6 text-center text-light pe-2">Out Of ideas ? <span><button type="button" class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Click Here</button></span></h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Event</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h1 class="text-center fs-5">What event that you are looking for ?</h1>
                    <form action="" method="get">
                        <?= csrf_field();?>
                            <div class="row mt-2">
                                <label for="" class="form-label">Event Category</label>
                                <div class="col-md-12">
                                    <select name="" id="" class="form-select">
                                        <option value="">Select</option>
                                        <option value="">Music</option>
                                        <option value="">Sport</option>
                                        <option value="">Art</option>
                                        <option value="">Food</option>
                                        <option value="">Other</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            </div>
        </div>
    </div>

<div class="container-fluid">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="fs-4">Filter By</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">              
                <select name="query" id="filtereventtype" class="form-select" onchange="">
                    <option value="">--Event Type--</option>
                    <option value="Physical">Physical</option>
                    <option value="Online">Online</option>
                </select>                   
            </div>
            <div class="col-md-3">
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
            <div class="col-md-3">
                <select name="query" id="filtereventcategory" class="form-select" onchange="">
                    <option value="">--Event Category--</option>
                    <?php foreach($eventcat as $ec):?>
                        <option value="<?=$ec['eventcatname']?>"><?=$ec['eventcatname']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="col-md-3">              
                <select name="query" id="sort" class="form-select" onchange="">
                    <option value="">--Sort Scorun--</option>
                    <option value="ASC">Low To High</option>
                    <option value="DESC">High To Low</option>
                </select>                   
            </div>
        </div>
    </div>

    <div class="container-fluid" id="listing">
        <div class="row mt-2 mb-4">
            <?php foreach($event as $e):?>
            <div class="col-md-4 mt-3 mb-3 shadow-md" id="">
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
                                        <?php  if($e['eventscorun'] == 0 ): ?>
                                            <small class='text'><i class='bi bi-stars pe-2'></i> No Scorun Provided</small>
                                        <?php else: ?>
                                            <small class='text'><i class='bi bi-stars pe-2'></i> <?=$e['eventscorun'];?> Scorun</small>
                                        <?php endif; ?>
                                    </div> 
                            </p>
                
                            <?php if($e['register'] == 'Close'):?>
                                <button href="#" class="btn btn-secondary">Registration Is Closed</button>
                            <?php else:?>
                                <a href="/event/listing/detail/<?=$e['eventid'];?>" class="btn btn-primary">View More</a>
                            <?php endif;?>
                            
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

    //sort by eventtype
    $(document).ready(function(){
        $('#filtereventtype').change(function(){
            var eventtype = $(this).val();
            $.ajax({
                url:"/event/listing/search/"+eventtype,
                method:"get",
                data:{eventtype:eventtype},
                success:function(data){
                    window.history.pushState("", "", "/event/listing/search/"+eventtype);
                    $("#listing").load(" #listing");  
                    console.log("success reload");             
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
                    $("#listing").load(" #listing");  
                    console.log("success reload");             
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
                    $("#listing").load(" #listing");  
                    console.log("success reload");               
                },
            });
        });
    });

    //sort by orderby
    $(document).ready(function(){
        $('#sort').change(function(){
                var sort = $(this).val();
                var url = window.location.href;
                var lastsplit = url.split("/");
                var lastsplit2 = lastsplit[6].split("&");
                var combineurl = lastsplit[0] + "//" + lastsplit[2] + "/" + lastsplit[3] + "/" + lastsplit[4] + "/" + lastsplit[5] + "/" + lastsplit2[0];
                window.history.pushState("", "", combineurl + "/" +sort);
                $("#listing").load(" #listing");  
        });
    });

    //submit on click button
    $(document).ready(function(){
        $('#btn').click(function(){
            var search = $('#search').val();
            console.log(search);
            $.ajax({
                url: "/event/listing/search/"+search,
                method: "get",
                data: {search:search},
                success: function(data){
                    window.history.pushState("", "", "/event/listing/search/"+search);
                    $("#listing").load(" #listing");  
                    console.log("success reload");                
                },
            });
        });
    });

</script>
<?= $this->endSection(); ?>