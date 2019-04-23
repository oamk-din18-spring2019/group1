<?php
include("./config.php");

$uname = $_GET['username'];
$umessage = mysqli_real_escape_string($con, $_GET['umessage']);
echo $umessage;


$query="INSERT INTO ".$_GET['idChat']." (username,content,time) VALUES ('$uname','$umessage',current_time())";
$run = mysqli_query($con,$query);
?>

