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
  <div class="container-fluid px-0 h-100 overflow-hidden">
    <div class="d-flex flex-column-reverse h-100">

      <div style="height:90%;">
        <div id="chatScreen" class="no-gutters" style="width:100%; height:100%"></div>
        <script type=text/JavaScript>
            document.getElementById('chatScreen').innerHTML='<object class="w-100 h-100" type="text/html" data=<?php echo base_url('chat_ajax').'?idChat='.$idChat.'&username='.$_SESSION['username'] ?> ></object>'
            window.onload = () =>{
                if ('<?php echo $idChat ?>'=='c') {
                    window.location.reload();
                }
            }
        </script>
      </div>

      <div class="text-center flex-grow-1 border border-dark rounded-bottom text-white black">
        <div class="row justify-content-center h-100">
          <div id="avatar_col" class="col-1 my-auto">
            <?php
            $userPicture=$this->User_model->getPictureName($username);
            echo '<img id="avatar" src="';
            if(!is_null($userPicture)&&$userPicture!=''){
              echo base_url("./images/").$this->User_model->getPictureName($username);
            }
            else {
              echo base_url("./images/empty-avatar.jpg");
            }
            echo '" class="mr-3 z-depth-0 rounded-circle" alt="avatar image" style="width:100%; height:100%;">';
            ?>
          </div>
          <div class="col-auto my-auto">
            <div class="row">Debating with&nbsp; <strong><?php echo $username?></strong></div>
            <div class="row">ID conversation:&nbsp;<?php echo $idChat ?></div>
          </div>
        </div>
      </div>

      <script type="text/javascript">
      var screen_width = screen.width;
      if (screen_width<991) {
        document.getElementById("avatar_col").classList.remove('col-1');
        document.getElementById("avatar_col").classList.add('col-auto');
        document.getElementById("avatar").style.width = "10vh";
        document.getElementById("avatar").style.height = "10vh";
      }
      </script>
    </div>
  </div>



<script type="text/javascript" src="<?php echo base_url('bst/js/jquery-3.3.1.min.js')?>"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?php echo base_url('bst/js/popper.min.js')?>"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?php echo base_url('bst/js/bootstrap.min.js')?>"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo base_url('bst/js/mdb.js')?>"></script>
<script type="text/javascript">
  var url = window.location;
  // Will only work if string in href matches with location
  $('ul.navbar-nav a[href="'+ url +'"]').parent().addClass('active');
  // Will also work for relative and absolute hrefs
  $('ul.navbar-nav a').filter(function() {
    return this.href == url;
  }).parent().addClass('active');
</script>
</body>
</html>
