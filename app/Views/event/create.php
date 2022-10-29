<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<div class="container-fluid py-4 px-4">

<div class="container-fluid">

     <!-- <div class="container-fluid"> -->

      <div class="row">
          <div class="col-md-12 pt-3">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb border px-2 py-2 bg-dark bg-opacity-10">
                      <li class="breadcrumb-item "><a href="/dashboard" class="text-dark text-underline-hover">Dashboard</a></li>
                      <li class="breadcrumb-item active text-dark text-muted" aria-current="page">Event</li>
                  </ol>
              </nav>
          </div>
      </div>

      <div class="row mb-2">
        <div class="col-md-12 col-xl-12">
            <h1 class="h2">Create New Event</h1>
            <hr>
        </div>
    </div>

  
    <form class="row g-3" action="/event/create" method="post">
        <?=csrf_field();?>       
        <div class="col-md-6">
            <label for="eventname" class="form-label">Event Name</label>
            <input type="text" class="form-control" id="eventname" name="eventname">
        </div>
        <div class="col-md-6">
            <label for="eventname" class="form-label">Event Description</label>
            <textarea class="form-control" id="eventdesc" name="eventdesc"></textarea>
        </div>
        <div class="col-md-6">
            <label for="startdate" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="startdate" name="eventdate" >
        </div>
        <div class="col-md-6">
            <label for="eventtype" class="form-label">Event Type</label>
                <select id="eventtype" class="form-select" name="eventtype">
                    <option selected>Choose...</option>
                    <option>Physical</option>
                    <option>Online</option>
                </select>
        </div>
        <div class="col-md-6">
            <label for="starttime" class="form-label">Start time</label>
            <input type="time" class="form-control" id="starttime" name="eventtime"  >
        </div>
        <div class="col-md-6">
            <label for="eventstat" class="form-label">Event Status</label>
            <select id="evenstat" class="form-select" name="eventstat">
                <option>On Going</option>
                <option>Completed</option>
                <option>Close</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="tqlink" class="form-label">Event Scorun</label>
            <input type="text" class="form-control" id="tqlink" name="eventscorun" >
        </div>
        <div class="col-md-6">
            <label for="tqlink" class="form-label">Registration</label>
            <select id="evenstat" class="form-select" name="register">
                <option value="Open">Open</option>
                <option value="Close">Close</option>
            </select>
        </div>
   
   
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary float-end"><i class="bi bi-save pr-2"></i> Submit</button>
        </div>
    </form>

</div>

   
    </div>



<?= $this->endSection(); ?>