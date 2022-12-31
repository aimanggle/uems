<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<div class="container-fluid py-4 px-4">

    <div class="container-fluid">

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

        <form class="row g-3" action="<?=url_to('event.create')?>" method="post" enctype="multipart/form-data">
            <?=csrf_field();?>       
            <div class="col-md-6">
                <label for="eventname" class="form-label">Event Name</label>
                <input type="text" class="form-control <?=  ($validation->hasError('eventname')) ? 'is-invalid' : 'invalid'?>" id="eventname" name="eventname" value="<?=old('eventname')?>">
                <div class="invalid-feedback"><?= $validation->getError('eventname');?></div>
            </div>
            <div class="col-md-6">
                <label for="eventname" class="form-label">Event Description</label>
                <textarea class="form-control <?=  ($validation->hasError('eventdesc')) ? 'is-invalid' : 'invalid'?>" id="eventdesc" name="eventdesc"><?=old('eventdesc')?></textarea>
                <div class="invalid-feedback"><?= $validation->getError('eventdesc');?></div>
                <div class="text-muted float-end" id="count_message">500 word remaining</div>
            </div>
            <div class="col-md-6">
                <label for="startdate" class="form-label">Start Date</label>
                <input type="date" class="form-control <?=  ($validation->hasError('eventdate')) ? 'is-invalid' : 'invalid'?>" id="eventdate" name="eventdate" value="<?=old('eventdate')?>" >
                <div class="invalid-feedback"><?= $validation->getError('eventdate');?></div>
            </div>
            <div class="col-md-6">
                <label for="eventtype" class="form-label">Event Type</label>
                    <select id="eventtype" class="form-select <?=  ($validation->hasError('eventtype')) ? 'is-invalid' : 'invalid'?>" name="eventtype">
                        <option value="">Choose...</option>
                        <option value="Physical" <?php if (old('eventtype') == "Physical") echo "selected";?>>Physical</option>
                        <option value="Online" <?php if (old('eventtype') == "Online") echo "selected";?>>Online</option>
                    </select>
                    <div class="invalid-feedback"><?= $validation->getError('eventtype');?></div>
            </div>
            <div class="col-md-6">
                <label for="starttime" class="form-label">Start time</label>
                <input type="time" class="form-control <?= ($validation->hasError('eventtime')) ? 'is-invalid' : 'invalid'?>" id="starttime" name="eventtime"  value="<?=old('eventtime')?>">
                <div class="invalid-feedback"><?= $validation->getError('eventtime');?></div>
            </div>
            <div class="col-md-6">
                <label for="eventstat" class="form-label">Event Status</label>
                <select id="evenstat" class="form-select <?=  ($validation->hasError('eventstat')) ? 'is-invalid' : 'invalid'?>" name="eventstat">
                    <option value="">Choose...</option>
                    <option value="On Going" <?php if (old('eventstat') == "On Going") echo "selected";?>>On Going</option>
                    <option value="Completed" <?php if (old('eventstat') == "Completed") echo "selected";?>>Completed</option>
                    <option value="Cancel" <?php if (old('eventstat') == "Cancel") echo "selected";?>>Cancel</option>
                    <option value="Close" <?php if (old('eventstat') == "Close") echo "selected";?>>Close</option>
                </select>
                <div class="invalid-feedback"><?= $validation->getError('eventstat');?></div>
            </div>
            <div class="col-md-4">
                <label for="eventscorun" class="form-label">Event Scorun</label>
                <input type="text" class="form-control <?=  ($validation->hasError('eventscorun')) ? 'is-invalid' : 'invalid'?>" id="eventscorun" name="eventscorun" value="<?=old('eventscorun')?>">
                <div class="invalid-feedback"><?= $validation->getError('eventscorun');?></div>
            </div>
            <div class="col-md-4">
                <label for="tqlink" class="form-label">Event Category</label>
                <select id="evenstat" class="form-select <?=  ($validation->hasError('eventcategory')) ? 'is-invalid' : 'invalid'?>" name="eventcategory">
                    <option value="">Choose...</option>
                    <?php foreach($eventcategory as $ec) : ?>
                        <option value="<?=$ec['eventcatname']?>" <?php if (old('eventcategory') == $ec['eventcatname']) echo "selected";?>> <?=$ec['eventcatname']?> </option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback"><?= $validation->getError('eventcategory');?></div>
            </div>
            <div class="col-md-4">
                <label for="tqlink" class="form-label">Registration</label>
                <select id="evenstat" class="form-select <?=  ($validation->hasError('register')) ? 'is-invalid' : 'invalid'?>" name="register">
                    <option value="">Choose...</option>
                    <option value="Open" <?php if (old('register') == "Open") echo "selected";?>>Open</option>
                    <option value="Close" <?php if (old('register') == "Close") echo "selected";?>>Close</option>
                </select>
                <div class="invalid-feedback"><?= $validation->getError('register');?></div>
            </div>
            <div class="col-md-12">
                <label for="eventimg" class="form-label">Event Poster <span class="text-muted fs-6">(Optional)</span></label>
                <input type="file" class="form-control <?=  ($validation->hasError('image')) ? 'is-invalid' : 'invalid'?>" id="eventimage" name="image" value="<?=old('image')?>">
                <div class="invalid-feedback"><?= $validation->getError('image');?>
            </div>
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary float-end"><i class="bi bi-save pr-2"></i> Submit</button>
            </div>
        </form>
    </div>
</div>


<script>

    $(document).ready(function(){
        var text_max = 500;
        $('#count_message').html(text_max + ' word remaining');

        $('#eventdesc').keyup(function() {
            var text_length = $('#eventdesc').val().length;
            var text_remaining = text_max - text_length;
            
            if(text_remaining < 0)
            {
                $('#count_message').html('Word limit exceed');
                $('button[type="submit"]').prop('disabled', true);
            }
            else
            {
                $('#count_message').html(text_remaining + ' word remaining');
                $('button[type="submit"]').prop('disabled', false);
            }
            $('#count_message').html(text_remaining + ' word remaining');
        });
    });

</script>


<?= $this->endSection(); ?>