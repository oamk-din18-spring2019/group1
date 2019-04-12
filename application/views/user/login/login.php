<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('bst/css/bootstrap.min.css')?>" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href=" <?php echo base_url('bst/css/mdb.min.css')?>" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?php echo base_url('bst/css/style.css')?>" rel="stylesheet">
  <style>
    body {
      background: url(https://images.unsplash.com/photo-1525642351754-db88d9142dee?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1764&q=80) no-repeat center fixed;
      background-size: 100% 100%;
    }
  </style>
</head>

<body>
<!-- Material form login -->
<div class="card centered mt-4 rounded-30 " style="width:40%; margin:auto;">

  <h5 class="card-header white-text text-center py-4" style="background-color:black;">
    <strong>Sign in</strong>
  </h5>

  <!--Card content-->
  <div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form class="text-center" method="POST" action="log_in_procedure" style="color: #757575;">

      <!-- Email -->
      <div class="md-form">
        <input type="text" id="materialLoginFormEmail" name="username" class="form-control">
        <label for="materialLoginFormEmail">Username</label>
      </div>

      <!-- Password -->
      <div class="md-form">
        <input type="password" id="materialLoginFormPassword" name="password" class="form-control">
        <label for="materialLoginFormPassword">Password</label>
      </div>

      <!-- Remember me -->
      <div class="custom-control custom-checkbox ">
        <input type="checkbox" id="customCheck1" name="rememberMe" class="custom-control-input">
        <label  class="custom-control-label" for="customCheck1">Remember me</label> 
      </div>
      <?php 
                if(isset($message)){
                   echo" <div class='col-md-12 text-center text-white bg-info mb-0'>".$message." </div>";
                };
                ?>
      <div class="d-flex justify-content-around">
      
        <div>
        </div>
      </div>

      <!-- Sign in button -->
      <button class="btn btn-success btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>
      <?php 
                    if (isset($messagePassword)) {
                        echo " <div class='col-md-12 text-center text-white bg-danger my-3'>" . $messagePassword . " </div>";
                    };
                  
                    ?>
      <!-- Register -->
      <p>Not a member?
        <a href="<?php echo site_url('LoginRegistration/register'); ?>" style="color:#2d72e2;">Sign Up</a>
      </p>

      <!-- Social login
      <p>or sign in with:</p>
      <a type="button" class="btn-floating btn-fb btn-sm">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a type="button" class="btn-floating btn-tw btn-sm">
        <i class="fab fa-twitter"></i>
      </a>
      <a type="button" class="btn-floating btn-li btn-sm">
        <i class="fab fa-linkedin-in"></i>
      </a>
      <a type="button" class="btn-floating btn-git btn-sm">
        <i class="fab fa-github"></i>
      </a>
      -->
    </form>
    <!-- Form -->

  </div>

</div>
<script type="text/javascript" src="<?php echo base_url('bst/js/jquery-3.3.1.min.js')?>"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url('bst/js/popper.min.js')?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url('bst/js/bootstrap.min.js')?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url('bst/js/mdb.js')?>"></script>
<!-- Material form login -->
