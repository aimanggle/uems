<?= $this->extend('layout/template2'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid py-4 px-4">

    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-md-12">
                <img src="/asset/unitensidebarlogo.png" style="max-width:150px">
                <h3 class="my-3 py-2">Register | <?=$event['eventname'];?></h3>
            </div>
        </div> 
    </div>

 

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-sm-3">
                <div class="card shadow">
                    <div class="card-body">  
                        <?php if (session()->get('error')) :?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?=session()->get('error');?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif;?>
                            <form action="/event/listing/register/14/step1" method="post" class="needs-validation" novalidate>
                                <?= csrf_field(); ?> 
                                <label for="notel" class="form-label">Student ID </label>
                                <input type="text" class="form-control" id="studentid" name="studentid" placeholder="eg:DC97XXX, DM98XXX" required>
                                <div class="row mt-3">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-secondary float-end">Search my Student ID</button>
                                    </div>
                                </div>    
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>