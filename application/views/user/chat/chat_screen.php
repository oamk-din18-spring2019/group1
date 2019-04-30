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
        <div id="chatScreen" class="no-gutters" style="width:100%; height:100%">Loading...</div>
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
        <div class="row h-100">
          <div class="col-11 my-auto">
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
                    echo '" class="mr-3 z-depth-0 rounded-circle" alt="avatar image" style="width:9vh; height:9vh;">';
                    ?>
                  </div>
                  <div class="col-auto my-auto">
                    <div class="row">Debating with&nbsp; <strong><?php echo $username?></strong></div>
                    <div class="row">ID conversation:&nbsp;<?php echo $idChat ?></div>
                  </div>
              </div>
          </div>
          <div class="col-1 m-auto">
            <a id="deletelink" class="black text-white" href="" title="Delete this conversation" onclick="deleteConfirm()"><i class="far fa-2x fa-times-circle"></i></a>
          </div>
        </div>
      </div>

      <script type="text/javascript">
      var screen_width = screen.width;
      if (screen_width<991) {
        document.getElementById("avatar_col").classList.remove('col-1');
        document.getElementById("avatar_col").classList.add('col-auto');
      }
      function deleteConfirm() {
        var r1=confirm("Are you sure to delete the conversation with <?php echo $username; ?>?");
        if (r1==true) {
          var r2=confirm("Are you really sure to delete the conversation with <?php echo $username; ?>?\nThe action cannot be undone.");
        }
        if (r2==true) {
          document.getElementById('deletelink').href="<?php echo site_url('user/deleteConversation?idChat=').$idChat; ?>";
          window.parent.location.reload(true);
      }
      }
      var screen_width = screen.width;
      if (screen_width<991) {
        document.getElementById("submitBtn").hidden = "true";
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
