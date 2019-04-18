<?php
include ("./config.php");
$query = "SELECT * FROM ".$_GET['idChat'];
$run = mysqli_query($con,$query);
while ($row = mysqli_fetch_array($run)){
?>
<style>
.name_self{

}
.message_self{
    color:blue;
    font-size:120%;
}
.time_self{

}
</style>
  <?php
  if ($row['username']==$_GET['username']) {
    $flex='flex-row-reverse';
    $bg='lightblue';
  }
  else {
    $flex='flex-row';
    $bg='lightgray';
  }
  ?>
  <div class="d-flex my-2 mx-3 <?php echo $flex; ?>">
    <div class="card d-flex <?php echo $flex; ?>" style="background-color:<?php echo $bg; ?>">
      <?php if($row['username']!=$_GET['username']) {
        echo '<div class="mx-4 name" style="color:red; font-size:140%;">'.$row['username'].' :</div>';
      }
      ?>
      <div class="mx-4 message" style="color:blue; font-size:140%;"><?php echo $row['content']; ?></div>
      <div class="mx-4 time" style="color:black; font-size:90%;"> <?php echo $row['time']; ?></div>
    </div>
    <div class="flex-grow-1" style="background-color:white"></div>
  </div>
 <?php }
?>
