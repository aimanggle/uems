<?= $this->extend('layout/template2'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">

<div class="container-fluid text-center">
        <div class="row">
            <div class="col-md-12">
                <img src="/asset/finalunitenlogo.png" style="max-width:150px">
                <h3 class="my-3 py-2">New Student</h3>

            </div>
        </div> 
    </div>
</div>

<div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-sm-3 mt-3">
                <div class="card shadow">
                    <div class="card-body">  
                        <?php if (session()->get('error')) :?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?=session()->get('error');?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif;?>

                        <div class="row">
                            <div class="col">
                                    <div class="row">
                                        <form action="<?=url_to('student.store', $event['eventid'])?>" method="post" class="needs-validation" novalidate>
                                            <?= csrf_field(); ?> 
                                        <div class="col my-1">
                                            <label for="notel" class="form-label">Student ID </label>
                                            <input type="text" class="form-control" id="studentid" name="studentid" placeholder="Enter your Student ID" value="<?=$studentid?>"> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col my-1">
                                            <label for="notel" class="form-label">Full Name </label>
                                            <input type="text" class="form-control" id="name" name="fullname" placeholder="Enter Your Full Name" value="" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col my-1">
                                            <label for="notel" class="form-label">College </label>
                                            <select name="college" id="college" class="form-select">
                                                <option value="">--Select College--</option>
                                                <?php foreach($college as $c) : ?>
                                                    <option value="<?= $c['collegeid']; ?>"><?= $c['collegename']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col my-1">
                                            <label for="notel" class="form-label">Program </label>
                                            <select name="program" id="program" class="form-select">
                                                <option value="">--Select Program--</option>
                                                <?php foreach($program as $p) : ?>
                                                    <option value="<?= $p['programid']; ?>"><?= $p['programname']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                        </div>
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

<script>
    //change select option when user select college
    $('#college').change(function(){
        var collegeid = $(this).val();
        $.ajax({
            url: "/program/search/" + collegeid,
            method: "get",
            dataType: "json",
            data: {collegeid:collegeid},
            success: function(data){
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value="' + data[i].programid + '">' + data[i].programname + '</option>';
                } 
                $('#program').html(html);
                console.log(collegeid);
            }
        });
    });
    

</script>
<?= $this->endSection(); ?>