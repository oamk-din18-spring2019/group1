<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include ("./config.php");
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Project D</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../bst/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href=" ../bst/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../bst/css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

  <style>
    html,body {
      height: 100%;
      margin:0px;
    }
    #chatBox{
        width:100%;
        height:95%;
        margin-left:auto;
        margin-right:auto;
        background-color: #dcf1fa;

    }
    input[type="text"]{
        width: 100%;
    }
    textarea{
        width:80%;
    }
  </style>

  <script>
  $(document).ready(function(e){
      function displayChat(){
          $.ajax({
              url:'displayChat.php?idChat=<?php echo $_GET['idChat'] ?>&username=<?php echo $_GET['username'] ?>',
              type: 'GET',
              success: function(data){
                $("#chatDisplay").html(data == '' ? "You haven't had any messages with this person yet. Start by saying Hi!" : data );
              }
          });
      }
      displayChat();
      setInterval(function(){displayChat();},1000);

      $('#sendMessageBtn').click(function(e){
          var message = $("#message").val();
          var username = '<?php echo $_GET['username'] ?>';
          var idChat = '<?php echo $_GET['idChat'] ?>'
          $("#myChatForm")[0].reset();
          $.ajax({
              url:'sendChat.php',
              type:'GET',
              data:{
                  umessage:message,
                  username:username,
                  idChat: idChat,
              }
          });
          // Auto scroll down when enter a new maessage
          setTimeout(function(){
            var scrollbar = document.getElementById('chatDisplay');
            scrollbar.scrollTop = scrollbar.scrollHeight; }, 2000
          );
      });
  });
  </script>
</head>

<body class="d-flex flex-column-reverse h-100">



    <div class="text-center flex-grow-1">
        <form class="h-100" id="myChatForm" action="" method="get">
          <div class="d-flex flex-row h-100">
            <textarea class="w-85 my-auto" name="message" id="message" cols="30" rows="2" id="message" placeholder="Enter your message"></textarea>
            <script>
                addEventListener('keypress', e => {
                    if(e.keyCode === 13 && !e.shiftKey) $('#sendMessageBtn').click();
                })
                // Auto scroll down when loaded
                window.onload = function() {
                  setTimeout(function(){
                    var scrollbar = document.getElementById('chatDisplay');
                    scrollbar.scrollTop = scrollbar.scrollHeight; }, 2000
                  );
              };
            </script>
            <button type="button" class="flex-grow-1 btn btn-primary my-auto" id="sendMessageBtn"> Send message</button>
          </div>
        </form>
        <?php if(isset($message)){
            echo $message;
        }
        ?>
    </div>

    <div class="" id="chatBox" style="height:89%">
      <div class="my-auto" id="chatDisplay" style="width: 100%; height: 100%; overflow-y: scroll; background-color:white;">Your messages are being loaded...</div>
    </div>

</body>
</html>
