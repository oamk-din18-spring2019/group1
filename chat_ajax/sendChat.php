<?php
include("./config.php");
$uname = $_POST['username'];
$umessage = $_POST['umessage'];
echo $umessage;
$query="INSERT INTO ".$idChat." (username,content,time) VALUES ('$uname','$umessage',current_time())";
$run = mysqli_query($con,$query);
?>
