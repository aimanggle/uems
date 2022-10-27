<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid py-4 px-4">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb border px-2 py-2 bg-dark bg-opacity-10">
                        <li class="breadcrumb-item "><a href="/dashboard" class="text-dark text-underline-hover">Dashboard</a></li>
                        <li class="breadcrumb-item active text-dark text-muted" aria-current="page">User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <?php if (session()->get('error')) :?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                alert
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif;?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="fs-3">User</h1>
                    <button  class="btn btn-outline-secondary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">New User <span><i class="bi bi-plus-lg"></i></span></button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-reponsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php $bil = 1; ?>
                            <?php foreach($user as $u):?>
                                <tr>
                                    <td><?=$bil++?></td>
                                    <td><?=$u['username'];?></td>
                                    <td><?=$u['email'];?></td>
                                    <td><?=$u['role'];?></td>
                                    <td><span class="badge text-bg-success"><?=$u['userstat'];?></span></td>
                                    <td>
                                        <a href="/user/edit/<?=$u['id'];?>" class="btn btn-outline-secondary btn-sm">Edit</a>
                                        <a href="/user/delete/<?=$u['id'];?>" class="btn btn-outline-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                    </tbody>
                </table>  
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                ...
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
            </div>
        </div>
    </div>

</div>


<?= $this->endSection(); ?>
