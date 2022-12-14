<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Meta Csrf -->
    <?=csrf_meta();?>
    

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet"> 

    <!-- CDN jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- CDN Boootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- CDN Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Font Awesome Kit  -->
    <script src="https://kit.fontawesome.com/e5eb685012.js" crossorigin="anonymous"></script>

    <!-- Apex Chart -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Page Title -->
    <title><?=$title;?></title>

    <!-- Page Favicon -->
    <link rel="shortcut icon" href="/asset/unitensidebarlogo.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/uems.css">
  </head>
  <body>
    <?=$this->include('layout/navbar');?>
    <?=$this->renderSection('content');?>
    
    <!-- CDN Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- Font Awesome Kit -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


  </body>
</html>

