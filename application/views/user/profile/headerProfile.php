<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Project D</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('bst/css/bootstrap.min.css')?>" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href=" <?php echo base_url('bst/css/mdb.min.css')?>" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?php echo base_url('bst/css/style.css')?>" rel="stylesheet">

</head>

<body>
<nav class="navbar navbar-inverse">
<div class="container mt-0">
<!--Navbar -->
<nav class="w-100 mb-1 navbar navbar-expand-lg navbar-dark black lighten-1">
  <a class="navbar-brand font-italic" href="#">Project D</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
    aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link " href="<?php echo site_url('user/index'); ?>">Dashboard</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="<?php echo site_url('user/profile'); ?>">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('user/search'); ?>">Search</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('/user/following'); ?>">Following
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">Dropdown
        </a>
        <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">1
          <i class="fas fa-envelope"></i>
        </a>
      </li>
      <li class="nav-item avatar dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          <img src="<?php if(isset($_SESSION['image'])&&($_SESSION['image']!='')){ echo base_url("./images/".$_SESSION['image']) ;} else{echo base_url("./images/empty-avatar.jpg");} ?>"
          class="rounded-circle z-depth-0 " alt="avatar image" style="width:25px; height:25px;">
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-55">
          <a class="dropdown-item" href="#">Some Action</a>
          <a class="dropdown-item" href="<?php echo site_url('user/settings'); ?>">Settings</a>
          <a class="dropdown-item" href="<?php echo site_url('LoginRegistration/logout') ?>">Log out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
</nav>
<!--/.Navbar -->
</div>
