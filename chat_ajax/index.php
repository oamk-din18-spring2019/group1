<?php
include ("./config.php");
?>
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