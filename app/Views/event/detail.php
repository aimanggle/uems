<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid py-4 px-4">

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 pt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb border px-2 py-2 bg-dark bg-opacity-10">
                        <li class="breadcrumb-item active text-dark text-muted" aria-current="page">Dashboard</li>
                        <li class="breadcrumb-item "><a href="/event" class="text-dark text-underline-hover">Event</a></li>
                        <li class="breadcrumb-item active text-dark text-muted" aria-current="page"><?=$event['eventname'];?></li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="row mb-2">
            <div class="col-md-12 col-xl-12">
                <h1 class="fs-4">View Event Detail</h1>
                <h1 class="text-muted fs-6">Last update at : <?=date('d-M-Y H:i:s', strtotime($event['updated_at']))?></h1>
                <hr>
            </div>
        </div>

        <form class="row g-3" action="/event/detail/<?=$event['eventid'];?>" method="post">
            <?=csrf_field();?>       
            <div class="col-md-6">
                <label for="eventname" class="form-label">Event Name</label>
                <input type="text" class="form-control" id="eventname" name="eventname" value="<?=$event['eventname'];?>" disabled readonly>
            </div>
            <div class="col-md-6">
                <label for="eventname" class="form-label">Event Description</label>
                <input type="textarea" class="form-control" id="eventdesc" name="eventdesc" value="<?=$event['eventdesc'];?>" disabled readonly>
            </div>
            <div class="col-md-6">
                <label for="startdate" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="startdate" name="eventdate" value="<?=$event['eventdate'];?>" disabled readonly>
            </div>
            <div class="col-md-6">
                <label for="eventtype" class="form-label">Event Type</label>
                    <select id="eventtype" class="form-select" name="eventtype" disabled readonly>
                        <option selected>Choose...</option>
                        <option <?php if ($event['eventtype'] == "Physical") echo "selected";?>>Physical</option>
                        <option <?php if ($event['eventtype'] == "Online") echo "selected";?>>Online</option>
                    </select>
            </div>
            <div class="col-md-6">
                <label for="starttime" class="form-label">Start time</label>
                <input type="time" class="form-control" id="starttime" name="eventtime" value="<?=$event['eventtime'];?>" disabled readonly>
            </div>
            <div class="col-md-6">
                <label for="eventstat" class="form-label">Event Status</label>
                <select id="evenstat" class="form-select" name="eventstat" disabled readonly>
                    <option <?php if ($event['eventstatus'] == "On Going") echo "selected";?> >On Going</option>
                    <option <?php if ($event['eventstatus'] == "Completed") echo "selected";?> >Completed</option>
                    <option <?php if ($event['eventstatus'] == "Close") echo "selected";?> >Close</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="tqlink" class="form-label">Event Scorun</label>
                <input type="text" class="form-control" id="tqlink" name="eventscorun" value="<?=$event['eventscorun'];?>" disabled readonly>
            </div>
            <div class="col-md-4">
                <label for="tqlink" class="form-label">Event Category</label>
                <select id="evenstat" class="form-select" name="eventcategory" disabled readonly>
                    <?php foreach($eventcategory as $ec) : ?>
                        <option value="<?= $ec['eventcatname']; ?>" <?php if ($ec['eventcatname'] == $event['eventcatname']) echo "selected";?>><?= $ec['eventcatname']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="tqlink" class="form-label">Registration</label>
                <select id="evenstat" class="form-select" name="register" disabled readonly>
                    <option value="Open" <?php if ($event['register'] == "Open") echo "selected";?>>Open</option>
                    <option value="Close" <?php if ($event['register'] == "Close") echo "selected";?>>Close</option>
                </select>
            </div>
        </form>

        <div class="row mt-3">
            <div class="col-md-12 col-xl-12">
                <h1 class="fs-4">Event Register Link</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <td scope="col">#</td>
                            <td>Type</td>
                            <td>Link</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Register</td>
                            <td><input type="text" id="reglink" class="form-control" value="<?= base_url('/event/listing/detail');?>/<?=$event['eventid'];?>" disabled readonly></td>
                            <td><button class="btn btn-secondary" onclick="copyreglink()"><i class="fa-regular fa-copy"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

<script>
    function copyreglink() {
  /* Get the text field */
  var copyText = document.getElementById("reglink");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

}
</script>

<?= $this->endSection(); ?>