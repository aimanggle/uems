<?= $this->extend('layout/template2'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid py-4 px-4">

    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-md-12">
                <img src="/asset/finalunitenlogo.png" style="max-width:150px">
                <h3 class="my-3 py-2">Thank You | <?= $event['eventname'];?></h3>
                    <h4>Successfully register</h4> <span>You register Number is <?= $regno;?></span>
            </div>
        </div> 
    </div>


</div>


<?= $this->endSection(); ?>