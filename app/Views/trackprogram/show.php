<?= $this->extend('layout/template2'); ?>

<?= $this->section('content'); ?>

<style>
    #searchtab{
        visibility : hidden;
    }
</style>

<div class="container-fluid">

    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
                <h1 class="mt-3 fs-2 text-center">Find Your Event Record</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-4">
                <form action="/event/track/" method="post">
                <div class="input-group mb-3">
                        
                    <input type="text" class="form-control" id="studentid" name="studentid" placeholder="Enter your student id" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="btn">Search</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        
    <table class="table" id="searchtab">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
        
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