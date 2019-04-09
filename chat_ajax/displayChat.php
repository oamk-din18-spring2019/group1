<?php
include ("./config.php");
$query = "SELECT * FROM ".$_GET['idChat'];
$run = mysqli_query($con,$query);
while ($row = mysqli_fetch_array($run)){
?>
<style>
.name{
    float:left;
    margin-left: 10px;
    color:red;
    font-size:140%;
}
.message{
    float:left;
    color:blue;
    margin-left:3%;
    font-size:120%;
}
.time{
    margin-left:50%;
}
</style>
<p>
<span class="name"> <?php echo $row['username']." :      "; ?></span>
<span class="message"><?php echo $row['content']; ?></span>
<span class="time text-right"> <?php echo $row['time']; ?></span>
</p>
 <?php }
?>
