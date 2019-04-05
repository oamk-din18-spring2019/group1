<?php
include("./config.php");
$uname = $_SESSION['uname'];
$umessage = $_POST['umessage'];
echo $umessage;
$query="INSERT INTO c4 (username,content,time) VALUES ('$uname','$umessage',current_time())";
$run = mysqli_query($con,$query);
?>