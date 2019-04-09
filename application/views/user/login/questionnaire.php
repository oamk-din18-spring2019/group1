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
    <strong>Questionnaire</strong>
  </h5>
  <p class="text-center">
      Choose the categories you are interested in
  </p>

  <!--Card content-->
  <div class="card-body px-lg-5 pt-0">

    <!-- Form starts-->
    <form class="text-left" method="POST" action="chooseCategories"> 
        <?php
            for ($i=1;$i<count($categories); $i++)
              {
                echo "<div class='custom-control custom-checkbox'>";              
                echo '<input name="'.$categories[$i].'" id="customCheck" class="custom-control-input" type="hidden" value=0 checked>';
                echo '<input name="'.$categories[$i].'" id="customCheck'.$i.'" class="custom-control-input" type="checkbox" value=1>';
                
                echo '<label for="customCheck'.$i.'" class="custom-control-label">'.$categories[$i].'</label> <br>';
                echo '</div>';
              }          
              echo 'current user Id: '.$_SESSION['idUser'];
        ?> 
        <input type="submit" class="btn btn-success">
    </form>
    <!-- Form ends-->

  </div>
      <!-- <?php 
      if(isset($message))
      {
         echo" <div class='col-md-12 text-center text-white bg-info mb-0'>".$message." </div>";
      };
    ?> -->

</div>
<script type="text/javascript" src="<?php echo base_url('bst/js/jquery-3.3.1.min.js')?>"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url('bst/js/popper.min.js')?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url('bst/js/bootstrap.min.js')?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url('bst/js/mdb.js')?>"></script>
<!-- Material form login -->
