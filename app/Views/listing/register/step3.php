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
                        <div class="row my-3">
                            <div class="col">
                                <div class="progress" style="height: 20px;">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Example 20px high" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h1 class="fs-3">Your Detail :</h1>
                                    <div class="row">
                                        <div class="col my-1">
                                            <label for="notel" class="form-label">Student ID </label>
                                            <input type="text" class="form-control" id="studentid" name="studentid" placeholder="eg:DC97XXX, DM98XXX" value="<?=$student->studentid;?>" readonly> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col my-1">
                                            <label for="notel" class="form-label">Full Name </label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="eg:John Doe" value="<?=$student->fullname;?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col my-1">
                                            <label for="notel" class="form-label">Program </label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="eg:John Doe" value="<?=$student->programname;?>" readonly>
                                        </div>
                                    </div>
                            </div>
                        </div>
                            <form action="/event/listing/register/14/step1" method="post" class="needs-validation" novalidate>
                                <?= csrf_field(); ?> 
                                <!-- <label for="notel" class="form-label">Student ID </label>
                                <input type="text" class="form-control" id="studentid" name="studentid" placeholder="eg:DC97XXX, DM98XXX" required>
                                <div class="row mt-3"> -->
                                    <div class="d-grid my-1">
                                        <button type="submit" class="btn btn-secondary float-end">Register Now</button>
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