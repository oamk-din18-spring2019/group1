<?php
include ("./config.php");
$query = "SELECT * FROM ".$_GET['idChat'];
$run = mysqli_query($con,$query);
while ($row = mysqli_fetch_array($run)){
?>
<style>
.time{
  display:none;
}
.message:hover > .time{
    display: block;
}
.time: hover{
    display: block;
}
</style>
  <?php
  if ($row['username']==$_GET['username']) {
    $flex='flex-row-reverse';
    $bg='rgb(32, 152, 249)';
    $color='white';
  }
  else {
    $flex='flex-row';
    $bg='lightgray';
    $color='black';
  }
  ?>
  <div class="d-flex my-2 mx-3 <?php echo $flex; ?>">
    <div class="card d-flex message <?php echo $flex; ?>" style="background-color:<?php echo $bg; ?>">
      <div class="mx-4" style="color:<?php echo $color; ?>; font-size:140%;"><?php echo $row['content']; ?></div>
      <div class="mx-4 time" style="color:black; font-size:90%;"> <?php echo $row['time']; ?></div>
    </div>
    <div class="flex-grow-1" style="background-color:white"></div>
  </div>
 <?php }
?>
