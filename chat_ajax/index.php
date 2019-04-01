<?php
include ("./config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
</head>
<body>
<style> #chatBox{
    width:80%;
    height:100%;
    margin-left:auto;
    margin-right:auto;
    background-color: #dcf1fa;
    
}
input[type="text"]{
    width: 80%;
}
textarea{
    width:80%;
}
</style>
<script>
$(document).ready(function(e){
    function displayChat(){

    
    $.ajax({
        url:'displayChat.php',
        type: 'POST',
        success: function(data){
            $("#chatDisplay").html(data);
        }
    });
}
displayChat();
setInterval(function(){displayChat();},1000);
    $('#sendMessageBtn').click(function(e){
        var name = $("#user_name").val();
        var message = $("#message").val();
        $("#myChatForm")[0].reset();
        $.ajax({
            url:'sendChat.php',
            type:'POST',
            data:{
                uname:name,
                umessage:message
            }

        });
    });
});
</script>
<h3 class="text-center">Live Chat Room</h3>
<div class="conteiner-fluid">
<div class="text-center well" id="chatBox">
<div id="chatDisplay"></div>
</div>
<div class=" text-center">
<div class="col-md-12">
<form id="myChatForm" action="" method="get">
<input type="text" id="user_name" name="username" placeholder="Enter your name"><br>
<textarea name="message" id="message" cols="30" rows="2" id="message" placeholder="Enter your message"></textarea> <br>
<button type="button" class="btn btn-success btn-lg" id="sendMessageBtn"> Send message</button>
</form>
<?php if(isset($message)){
    echo $message;
}
?>

</div>
</div>

</div>
    
</body>
</html>