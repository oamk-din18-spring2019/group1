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
  <style media="screen">
    html, body {
      margin:0px;
      padding: 0px;
    }
  </style>
</head>
<body>
  <div class="border-bottom border-dark rounded-bottom rounded-left text-center p-2">
    <i class="far fa-comments" style="font-size:300%;"></i>

  </div>
  <div class="container-fluid my-2">

    <?php
    foreach($test as $user){
        $userPicture=$this->User_model->getPictureName($user);
        echo '<div class="card my-2 p-1">';
        echo '<a target=chatScreen href='.site_url('user/chat').'/'.$user.' >';
        echo '<img src="';
        if(!is_null($userPicture)&&$userPicture!=''){
          echo base_url("./images/").$this->User_model->getPictureName($user);
        }
        else {
          echo base_url("./images/empty-avatar.jpg");
        }
        echo '" class="mr-3 z-depth-0 rounded-circle" alt="avatar image" style="width:25px; height:25px;">';
        echo $user.'</a></div>';
    }
    ?>
  </div>
</body>
