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
  <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/LetterD.svg/1200px-LetterD.svg.png">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
    <div class="container">
      <a href="#" class="navbar-brand text-weight-bolder">Project D</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="basicExampleNav">
        <ul class="navbar-nav mr-auto smooth-scroll">
          <li class="nav-item">
            <a href="#intro" class="nav-link waves-effect wawes-light">Home</a>
          </li>
          <li class="nav-item">
            <a href="#best-features" class="nav-link waves-effect wawes-light">Best features</a>
          </li>
          <li class="nav-item">
            <a href="#examples" class="nav-link waves-effect wawes-light">Examples</a>
          </li>
        </ul>
        <?php  if (empty($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
          echo
            '<div class="text-center">
              <a href="'.site_url("LoginRegistration/login").'" class="">
                <button  class="btn-sm btn waves-effect wawes-light px-3">
                  <div class="loginButtonText">Login</div>
                </button>
              </a>
            </div>
            <div class="text-center">
              <a href="'.site_url("LoginRegistration/register").'" class="">
                <button  class="btn-sm btn btn-outline-white px-3">
                  <div class="loginButtonText">Sign Up</div>
                </button>
              </a>
            </div>';
          }
          else {
            echo
            '<div class="text-center">
              <a href="';
              if ($_SESSION['admin']==false) {echo site_url('user/index');} else {echo site_url('user/admin/admin');}
            echo '" class="">
                <button  class="btn-sm btn btn-outline-white px-3">
                  <div class="loginButtonText">';
            if ($_SESSION['admin']==false) {echo 'Dashboard';} else {echo 'Admin';}
            echo '</div>
                </button>
              </a>
            </div>';

          }
          ?>
      </div>
    </div>
  </nav>
