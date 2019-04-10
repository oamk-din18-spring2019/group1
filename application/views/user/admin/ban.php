<div class="container mt-4 my-2">
  <div class="">
    <div class="row justify-content-center">
      <div class="col-3" style="background-color:black; color:white;">
        <b>User name</b>
      </div>
      <div class="col-1" style="background-color:black; color:white;">
        <b>Status</b>
      </div>
    </div>
    <?php
      $data= $this->User_model->getUsersTable();
      $counter=0;
      foreach ($data as $key ) {
        echo '<div class="row justify-content-center">';
        if ($counter%2==0) {$color=""; $counter++;} else {$color="lightgray"; $counter++;}
        echo '<div class="col-3" style="background-color:'.$color.';">';
        echo $key['username'].'<br>';
        echo '</div>';
        echo '<div class="col-1" style="background-color:'.$color.'; color:green">';
        echo 'Active';
        echo '</div>';
        echo '</div>';
      }
    ?>
  </div>
</div>
