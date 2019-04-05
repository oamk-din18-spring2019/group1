<?php
include("./config.php");
$uname = $_POST['uname'];
$umessage = $_POST['umessage'];
echo $umessage;
$query="INSERT INTO chatroom (name,message,time) VALUES ('$uname','$umessage',current_time())";
$run = mysqli_query($con,$query);
?>