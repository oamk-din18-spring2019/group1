<div class="container">
<h2>Your possible opponents:</h2>
<?php if (isset($opponents[0])){
        foreach ($opponents as $value){
          echo '<h4><a target=_blank href="'.site_url('user/others_profile').'?username='.$value['username'].'">'.$value['username'].'</a></h4>';
        }
      } else {
        echo "<h2>Unfortunately there is no opponent for you :(</h2>";
      }
 ?>
</div>
