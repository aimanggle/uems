<?= $this->extend('layout/template');?>
<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-md-12">
                <h3>Dashboard</h3>
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

    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-md-12">
                <h3 class="">Event For This Month</h3>
                <!-- <hr> -->
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card rounded shadow-lg">
            <div class="container-fluid">
                <div class="row pt-1">
                    <div class="col-md-12">
                        <div class="table-reponsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Event</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <?php $bil=1;?>
                                    <?php foreach($eventforthismonth as $eve):?>
                                    <tr>
                                        <th scope="row"><?=$bil++;?></th>
                                        <td><?=$eve['eventname'];?></td>
                                        <td>Otto</td>
                                        <td><?=$eve['eventstatus'];?></td>
                                        <td>
                                            <a href="/event/detail/<?=$eve['eventid'];?>" class="btn btn-nav btn-sm text-white" id="detailbtn">Detail</a>
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
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="my-3 py-2">Graphical Information</h3>
                <hr>
            </div>
        </div>
    </div>


</div>

<?= $this->endSection(); ?>