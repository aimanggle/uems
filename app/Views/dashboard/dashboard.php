<?php $this->session = \Config\Services::session(); ?>

<?= $this->extend('layout/template');?>
<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-md-12">
                <h3>Welcome Back, <span class="fw-normal"><?=$this->session->get('user_name');?></span>!</h3>
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

    <div class="container-fluid">
        <div class="row" rowspan="4">
            <div class="col-md-12">
                <h3 class="">Graphical Information</h3>
                <!-- <hr> -->
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card rounded shadow-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="text-center">Top 5 Popular Event</h5>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Event Name</td>
                                                <td>Detail</td>                                         
                                            </tr>
                                        </thead>
                                        <tbody>                                         
                                            <tr>
                                                <td>1</td></td>
                                                <td>etst1</td>
                                                <td><a href="/event/detail/" class="btn btn-outline-primary btn-sm text-dark" id="">Detail</a></td>
                                            </tr>
                                            <tr>
                                                <td>2</td></td>
                                                <td>etst2</td>
                                                <td><a href="/event/detail/" class="btn btn-outline-primary btn-sm text-dark" id="">Detail</a></td>
                                            </tr>
                                            <tr>
                                                <td>3</td></td>
                                                <td>etst1</td>
                                                <td><a href="/event/detail/" class="btn btn-outline-primary btn-sm text-dark" id="">Detail</a></td>
                                            </tr>
                                            <tr>
                                                <td>4</td></td>
                                                <td>etst1</td>
                                                <td><a href="/event/detail/" class="btn btn-outline-primary btn-sm text-dark" id="">Detail</a></td>
                                            </tr>
                                            <tr>
                                                <td>5</td></td>
                                                <td>etst1</td>
                                                <td><a href="/event/detail/" class="btn btn-outline-primary btn-sm text-dark" id="">Detail</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-1 shadow text-dark mb-3">
                            <div class="card-header">
                                <h5 class="text-center">Total Event</h5>
                            </div>
                            <div class="card-body">
                                <div id="testchart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-1 shadow text-dark mb-3">
                            <div class="card-header">
                                <h5 class="text-center">Total Event</h5>
                            </div>
                            <div class="card-body">
                                <div id="testchart2"></div>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
              <div class="col-md-6">
                        <div class="card border-1 shadow text-dark mb-3">
                            <div class="card-header">
                                <h5 class="text-center">Total Event</h5>
                            </div>
                            <div class="card-body">
                                <div id="testchart3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-1 shadow text-dark mb-3">
                            <div class="card-header">
                                <h5 class="text-center">Total Event</h5>
                            </div>
                            <div class="card-body">
                                <div id="testchart4"></div>
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

<script>
    var options = {
  chart: {
    type: 'line'
  },
  series: [{
    name: 'sales',
    data: [30,40,35,50,49,60,70,91,125]
  }],
  xaxis: {
    categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
  }
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
</script>

<script>
    var options = {
  chart: {
      height: 300,
      type: 'radialBar',
  },
  series: [98],
  colors: ["#9645ff"],
  labels: ['Progress'],
}

var chart = new ApexCharts(document.querySelector("#progresschart"), options);

chart.render();
</script>

<script>
    var options = {
  chart: {
      height: 300,
      type: 'radialBar',
  },
  series: [98],
  colors: ["#9645ff"],
  labels: ['Progress'],
}

var chart = new ApexCharts(document.querySelector("#progchart"), options);

chart.render();
</script>

<script>
    var options = {
  chart: {
      height: 300,
      type: 'radialBar',
  },
  series: [98],
  colors: ["#9645ff"],
  labels: ['Progress'],
}

var chart = new ApexCharts(document.querySelector("#testchart"), options);

chart.render();
</script>

<script>
    var options = {
  chart: {
      height: 300,
      type: 'radialBar',
  },
  series: [98],
  colors: ["#9645ff"],
  labels: ['Progress'],
}

var chart = new ApexCharts(document.querySelector("#testchart2"), options);

chart.render();
</script>

</script>

<script>
    var options = {
  chart: {
      height: 300,
      type: 'radialBar',
  },
  series: [98],
  colors: ["#9645ff"],
  labels: ['Progress'],
}

var chart = new ApexCharts(document.querySelector("#testchart3"), options);

chart.render();
</script>

<script>
    var options = {
  chart: {
      height: 300,
      type: 'radialBar',
  },
  series: [98],
  colors: ["#9645ff"],
  labels: ['Progress'],
}

var chart = new ApexCharts(document.querySelector("#testchart4"), options);

chart.render();
</script>

<?= $this->endSection(); ?>