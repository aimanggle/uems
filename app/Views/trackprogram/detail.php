<?= $this->extend('layout/template2'); ?>

<?= $this->section('content'); ?>


<div class="container-fluid">

    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
                <h1 class="mt-3 fs-2 text-center">Find Your Event Record</h1>
            </div>
        </div>
        <div class="row">
        <?php if (session()->get('message')) :?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?=session()->get('message');?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
<?php endif;?>
        </div>
        <div class="row">
            <div class="col-md-12 mt-4">
                <form action="/event/track" method="post">
                <div class="input-group mb-3">
                    <?=csrf_field();?>
                    <input type="text" class="form-control" id="studentid" name="studentid" placeholder="Enter your student id" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="btn">Search</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Event Time</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php $bil=1;?>
                <?php foreach ($registrant as $r) : ?>
                <tr>
                    <td><?=$bil++;?></td>
                    <td><?= $r['eventname']; ?></td>
                    <td><?= $r['eventdate']; ?></td>
                    <td><?= $r['eventtime']; ?></td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($registrant)):?>
                  <tr>
                    <td class="text-center" colspan="4">No Record Found</td>
                  </tr>
                <?php endif;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  

</div>

<script>
    $(document).ready(function () {
    $("#btn").on("click", function() {
        $("#searchtab").show()
        doWork();
    });
});

function doWork() {
    setTimeout('$("#$searchtab").hide()', 5000);
    setTimeout('$("#btn").show()', 5000);
}
</script>

<!-- <div class="container-fluid"> -->
    
<!-- </div> -->
             

<?= $this->endSection(); ?>