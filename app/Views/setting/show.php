<?=$this->extend('layout/template')?>
<?=$this->section('content')?>
<style>
    .ctab{
        display: none;
    }
</style>
<div class="container-fluid py-4 px-4">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb border px-2 py-2 bg-dark bg-opacity-10">
                        <li class="breadcrumb-item "><a href="/dashboard" class="text-dark text-underline-hover">Dashboard</a></li>
                        <li class="breadcrumb-item active text-dark text-muted" aria-current="page">Setting</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php if (session()->get('success')) :?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?=session()->get('success');?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif;?>
                <?php if (session()->get('error')) :?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?=session()->get('error');?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="dash-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Semester</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="college-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">College</button>
                    </li>
                </ul>
                <div class="tab-content" id="d-tab">
                    <div class="tab-pane fade show active" id="tab" role="tabpanel" aria-labelledby="home-tab">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="fs-4 mt-3">Semester setting</h1>
                                    <h1 class="fs-5 mt-5">Semester 1 2022/2023</h1>
                                    <hr class="">
                                    <form action="/setting/semester" method="post" enctype="multipart/form-data">
                                        <?=csrf_field();?>
                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <label for="dashbaord" class="form-label">Start Date</label>
                                                <input type="date" class="form-control" value="<?=$semester['s1startdate'];?>" name="s1startdate">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <label for="dashbaord" class="form-label">Date</label>
                                                <input type="date" class="form-control" value="<?=$semester['s1enddate'];?>" name="s1enddate">
                                            </div>
                                        </div>
                                        <h1 class="fs-5 mt-5">Short Semester 2022/2023</h1>
                                        <hr class="">
                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <label for="dashbaord" class="form-label">Start Date</label>
                                                <input type="date" class="form-control" value="<?=$semester['shortstartdate'];?>" name="shortstartdate">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <label for="dashbaord" class="form-label">End Date</label>
                                                <input type="date" class="form-control" value="<?=$semester['shortenddate'];?>" name="shortenddate">
                                            </div>
                                        </div>
                                        <h1 class="fs-5 mt-5">Semester 2 2022/2023</h1>
                                        <hr class="">
                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <label for="dashbaord" class="form-label">Start Date</label>
                                                <input type="date" class="form-control" value="<?=$semester['s2startdate'];?>" name="s2startdate">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <label for="dashbaord" class="form-label">End Date</label>
                                                <input type="date" class="form-control" value="<?=$semester['s2enddate'];?>" name="s2enddate">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3 float-end">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content ctab" id="c-tab">
                    <div class="tab-pane fade show active" id="tab" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="fs-3 mt-3">College Setting</h1>
                                    <hr>
                                    <form action="/setting/update/1" method="post" enctype="multipart/form-data">
                                        <?=csrf_field();?>
                                        <input type="hidden" name="_method" value="PUT">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    //jquery to hide navtab when navtab is click
    $(document).ready(function() {
        $('#dash-tab').on('click', function(e) {
            console.log('dash tab is click');
            e.preventDefault();
            $('#d-tab').show();
            $('#c-tab').hide();
        });
    });

    $(document).ready(function() {
        $('#college-tab').on('click', function(e) {
            console.log('college tab is click');
            e.preventDefault();
            $('#c-tab').show();
            $('#d-tab').hide();
        });
    });
</script>

<?=$this->endSection()?>