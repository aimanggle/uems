<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?=csrf_meta();?>
    

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet"> 

    <!-- CDN Boootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- CDN Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Page Title -->
    <title>Login | UEMS</title>

    <!-- Page Favicon -->
    <link rel="shortcut icon" href="/asset/unitensidebarlogo.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/uems.css">
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
    
  <div class="container px-4 py-4 mt-5 ">
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow-lg px-2 py-2 mt-5">
                <div class="card-header border-0 text-center">
                    <img src="/asset/finalunitenlogo.png" alt="" class="img">
                    <div class="row">
                        <h5 class="mt-3">Uniten Event Management System (UEMS)</h5>
                    </div>
                    <div class="row">
                        <h6 class="text-muted">Login to your account</h6>
                    </div>
<?php if (session()->get('error')) :?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
                                <?=session()->getFlashdata('error');?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
<?php endif;?>
                </div>
                
                <div class="card-body">
                    <form action="/login" method="post" autocomplete="off">
                        <?=csrf_field()?>
                        <div class="mb-3">
                            <!-- <label for="exampleInputEmail1" class="form-label">Username</label> -->
                            <input type="text" name="auth" class="form-control <?=  ($validation->hasError('auth')) ? 'is-invalid' : ''?>" value="<?=old('auth');?>" placeholder="Username" autofocus="on">
                            <div class="invalid-feedback"><?= $validation->getError('auth');?></div>
                        </div>
                        <div class="mb-3">
                            <!-- <label for="exampleInputPassword1" class="form-label">Password</label> -->
                            <input type="password" name="password" class="form-control <?=  ($validation->hasError('password')) ? 'is-invalid' : ''?>" value="<?=old('password');?>" placeholder="Password" id="pwd">
                            <div class="invalid-feedback"><?= $validation->getError('password');?></div>
                        </div>
                        <div class="mb-3">
                            <input class="form-check-input" type="checkbox"  id="showpw" onclick="showPw()">
                            <label class="form-check-label" for="flexCheckDefault">Show Password</label>
                        </div>
                        <div class="row mt-4">
                            <div class="d-grid">
                            <button type="submit" class="btn btn-block mb-3" id="btn">Log in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>

<script>
    function showPw() 
    {
        var x = document.getElementById("pwd");
        if (x.type === "password") 
        {
            x.type = "text";
        } 
        else 
        {
            x.type = "password";
        }
    }
</script>

    
    <!-- CDN Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- Font Awesome Kit -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- CDN jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </body>
</html>

