<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12 pt-3">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb border px-2 py-2 bg-dark bg-opacity-10">
                      <li class="breadcrumb-item "><a href="<?=url_to('dash')?>" class="text-dark text-underline-hover">Dashboard</a></li>
                      <li class="breadcrumb-item active text-dark text-muted" aria-current="page">Event</li>
                  </ol>
              </nav>
          </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="fs-3">Event</h1>
              <button class="btn btn-outline-secondary btn-sm float-end">New Event</button>
            </div>
              
              <hr>
              <table class="table">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Event Name</th>
                          <th>Event Date</th>
                          <th>Event Type</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody class="table-group-divider">
                      <tr>
                          <td>1</td>
                          <td>Astana Uniten</td>
                          <td>21/10/2022</td>
                          <td>Physical</td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
    </div>

</div>

<?= $this->endSection(); ?>
