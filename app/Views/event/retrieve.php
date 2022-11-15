<?=$this->extend('layout/template')?>

<?=$this->section('content')?>

<div class="container-fluid py-4 px-4">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb border px-2 py-2 bg-dark bg-opacity-10">
                        <li class="breadcrumb-item active text-dark text-muted" aria-current="page">Dashboard</li>
                        <li class="breadcrumb-item"><a href="/event" class="text-dark text-underline-hover">Event</a></li>
                        <li class="breadcrumb-item active text-dark text-muted" aria-current="page">Retrieve Event</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Event Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php $bil=1?>
                            <?php foreach($event as $e):?>
                            <?php $eventdate = date('d-M-Y',strtotime($e['eventdate']));?>
                            <tr>
                                <td><?=$bil++?></td>
                                <td><?=$e['eventname'];?></td>
                                <td>
                                    <a href="<?=url_to('event.restore', $e['eventid'])?>" class="btn btn-outline-warning text-dark btn-sm">Retrieve Event</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            <?php if(empty($event)) : ?>
                            <tr>
                                <td colspan="3" class="text-center">No Event To Retrieve</td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


<?=$this->endSection()?>