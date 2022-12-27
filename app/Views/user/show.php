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

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <?php if (session()->get('success')) :?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->get('success');?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="fs-3">User</h1>
                    <button  class="btn btn-outline-secondary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#usermodal">New User <span><i class="bi bi-plus-lg"></i></span></button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-">
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
                                        <td><span class="badge text-bg-<?php 
                                            if($u['userstat'] == 'active')
                                            {
                                                echo 'success';
                                            }
                                            else
                                            {
                                                echo 'secondary';
                                            }                                          
                                            ?>"><?=$u['userstat'];?></span></td>
                                        <td>
                                            <button  class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal<?=$u['id'];?>"><span><i class="fa-regular fa-pen-to-square"></i></span></button>
                                            <button  class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalstat<?=$u['id'];?>"><span><i class="fa-regular fa-user"></i></span></button>  
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                        </tbody>
                    </table>  
                </div>
            </div>
        </div>
    </div>
    

    <div class="modal fade" id="usermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <form action="/user" method="post">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="" class="form-label">Role</label>
                                    <select class="form-select" class="form-control" name="role">
                                        <option value="admin">Admin</option>
                                    </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="" class="form-label">Status</label>
                                    <select class="form-select" class="form-control" name="userstat">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                            </div>
                        </div>
                    
                </div>
                    <div class="modal-footer">                    
                            <button type="submit" class="btn btn-primary">Submit</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php foreach($user as $u):?>
        <div class="modal fade" id="modal<?=$u['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <form action="/user/<?=$u['id'];?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="" value="<?=$u['email'];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="" value="<?=$u['username'];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="" value="<?=$u['password'];?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="" class="form-label">Role</label>
                                    <select class="form-select" class="form-control" name="role">
                                        <option value="admin">Admin</option>
                                    </select>
                            </div>
                        </div>                  
                </div>
                    <div class="modal-footer">                    
                            <button type="submit" class="btn btn-primary">Save Change</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach;?>

    <?php foreach($user as $u):?>
        <div class="modal fade" id="modalstat<?=$u['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <form action="/user/status/<?=$u['id'];?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="" class="form-label">Status</label>
                                    <select class="form-select" class="form-control" name="userstat">
                                        <option value="active" <?php if ($u['userstat'] == "active") echo "selected"?>>Active</option>
                                        <option value="inactive" <?php if ($u['userstat'] == "inactive") echo "selected"?>>Inactive</option>
                                    </select>
                            </div>
                        </div>                  
                </div>
                    <div class="modal-footer">                    
                            <button type="submit" class="btn btn-primary">Save User Status</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach;?>

    
</div>


<?= $this->endSection(); ?>
