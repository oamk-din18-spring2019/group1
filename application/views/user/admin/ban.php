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
          if ($counter%2==0) {$background_color=""; $counter++;} else {$background_color="lightgray"; $counter++;}
          echo '<div class="col-3" style="background-color:'.$background_color.';">';
            echo $key['username'].'<br>';
          echo '</div>';
          if ($key['active']==true) {
            echo '<div class="col-1" style="background-color:'.$background_color.';"><a href="'.site_url('user/ban_user').'?username='.$key['username'].'" style="color: green;">';
              echo 'Active';
            echo '</a></div>';
          }
          else {
            echo '<div class="col-1" style="background-color:'.$background_color.';"><a href="'.site_url('user/ban_user').'?username='.$key['username'].'" style="color: red;">';
              echo 'Banned';
            echo '</a></div>';
          }
        echo '</div>';
      }
    ?>

  </div>
</div>
