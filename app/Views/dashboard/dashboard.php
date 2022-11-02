<?= $this->extend('layout/template');?>
<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-md-12">
                <h3>Welcome Back, <span class="fw-normal"><?=$username;?></span>!</h3>
                <!-- <hr> -->
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row pt-1">
            <div class="col-xl-3 col-sm-6 col-md-3">
                <div class="card border-1 shadow text-dark mb-3 rounded ">
                    <div class="card-body">
                        <div class="d-flex justify-content-between px-md-1">
                            <div>
                                <p class="mb-0">Total Event</p>
                                <h3 class="text-dark"><?=$event?></h3>
                            </div>
                            <div class="align-self-center">
                                <i class="text-gradient bi bi-calendar-range fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-md-3">
                <div class="card border-1 shadow text-dark mb-3">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between px-md-1">
                            <div>
                                <p class="mb-0">Total Register Today</p>
                                <h3 class="text-dark"><?=$regtoday['total'];?></h3>
                            </div>
                            <div class="align-self-center">
                                <i class="text-gradient bi bi-person-check fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-md-3">
                <div class="card border-1 shadow text-dark mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between px-md-1">
                            <div>
                                <p class="mb-0">Total On Going Event</p>
                                <h3 class="text-dark"><?=$ongoing?></h3>
                            </div>
                            <div class="align-self-center">
                                <i class="text-gradient bi bi-calendar-minus fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-md-3">
                <div class="card border-1 shadow text-dark mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between px-md-1">
                            <div>
                                <p class="mb-0">Total Complete Event</p>
                                <h3 class="text-dark"><?=$complete?></h3>
                            </div>
                            <div class="align-self-center">
                            <i class="text-gradient bi bi-calendar2-check fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- <div class="container-fluid">
        <div class="row" rowspan="4">
            <div class="col-md-12">
                <h3 class="">Graphical Information</h3>
                <hr> 
            </div>
        </div>
    </div> -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card rounded shadow-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="text-center">Trend Registration Per Day</h5>
                                <div id="sevendayschart" class="w-auto" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card rounded shadow-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="text-center">Student Registration By College</h5>
                                <div id="chart" class="w-auto"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-md-12">
                <h3 class="">Event For This Month</h3>
                <!-- <hr> -->
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- <div class="card rounded shadow-lg"> -->
            <!-- <div class="container-fluid"> -->
                <div class="row pt-1">
                    <div class="col-md-12">
                        <div class="table-reponsive ">
                            <table class="table table-striped">
                                <thead class="th-text">
                                    <tr>
                                        <th scope="col" class="fw-normal">#</th>
                                        <th scope="col" class="fw-normal">Event</th>
                                        <th scope="col" class="fw-normal">Date</th>
                                        <th scope="col" class="fw-normal">Status</th>
                                        <th scope="col" class="fw-normal">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <?php $bil=1;?>
                                    <?php foreach($eventforthismonth as $eve):?>
                                    <tr>
                                        <th scope="row"><?=$bil++;?></th>
                                        <td><?=$eve['eventname'];?></td>
                                        <td>Otto</td>
                                        <td><?=$eve['eventstatus'];?></td>
                                        <td>
                                            <a href="/event/detail/<?=$eve['eventid'];?>" class="btn btn-outline-primary btn-sm text-dark" id="">Detail</a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                    <?php if(empty($eventforthismonth)): ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No Event Available</td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        <!-- </div> -->
    </div>



</div>

<!-- 7 Days Chart -->
<script>


    var options = {
  chart: {
    type: 'area',
    height: '290px'
    
  },
  series: [{
    name: 'Register per day',
    data: [<?=$regfirstdate['total']?>,<?=$regseconddate['total']?>,<?=$regthirddate['total']?>,<?=$regfourthdate['total']?>,<?=$regfifthdate['total']?>,<?=$regsixthdate['total']?>,<?=$regseventhdate['total']?>]
  }],
  colors:['RGB(150 69 255)'],
  xaxis: {
    categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun',]
  }
  
}

var chart = new ApexCharts(document.querySelector("#sevendayschart"), options);

chart.render();
</script>


<!-- Line Chart -->
<script>
    var options = {
  chart: {
    type: 'bar',
    height: '290px'
  },
  series: [{
    name: 'Register By College',
    data: [30,40,35,50,49,]
  }],
  colors:['RGB(150 69 255)'],
  xaxis: {
    categories: ['COE', 'CCI', 'COBA', 'COGS', 'TEST2']
  }
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
</script>







<?= $this->endSection(); ?>