<?= $this->extend('layout/template');?>
<?= $this->section('content'); ?>

<div class="container-fluid">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="my-3 py-2">Dashboard</h3>
            <hr>
        </div>
    </div>
</div>

<!-- <div class="container-fluid">
    <div class="col-md-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div> -->

<div class="container-fluid">
    <div class="row">

        <div class="col-xl-3 col-sm-6 col-md-3 mb-2">
            <div class="card border-1 shadow text-white bg-gradient-1 mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <p class="mb-0">Total Event</p>
                            <h3 class="text-white"><?=$event?></h3>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-calendar-range fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-md-3 mb-2">
            <div class="card border-1 shadow text-white bg-gradient-3 mb-3">
                <div class="card-body ">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <p class="mb-0">Total Register Today</p>
                            <h3 class="text-white"><?=$regtoday['total'];?></h3>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-person-check fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-md-3 mb-2">
            <div class="card border-1 shadow text-white bg-gradient-2 mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <p class="mb-0">Total On Going Event</p>
                            <h3 class="text-white"><?=$ongoing?></h3>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-calendar-minus fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-md-3 mb-2">
            <div class="card border-1 shadow text-white bg-gradient-4 mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <p class="mb-0">Total Complete Event</p>
                            <h3 class="text-white"><?=$complete?></h3>
                        </div>
                        <div class="align-self-center">
                        <i class="bi bi-calendar2-check fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="my-3 py-2">Event For This Month</h3>
            <hr>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
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
                            <a href="/event/detail/<?=$eve['eventid'];?>" class="btn btn-primary btn-sm">Detail</a>
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