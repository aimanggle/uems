<?=$this->extend('layout/template2');?>
<?=$this->section('content');?>

<div class="container-fluid">
    
    <div class="container-fluid mb-3">
        <div class="row mt-4">
            <div class="col-md-12">
                <h1 class="mt-3 fs-2 text-center">Event Announcement</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <?php foreach($announce as $a):?>
            <div class="col-md-12">
                <div class="card mb-3">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $a['announcetitle'];?></h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
            
</div>
<?=$this->endSection();?>