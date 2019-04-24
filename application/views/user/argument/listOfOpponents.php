<div class="container">
<h2>Your possible opponents:</h2>
<?php if (isset($opponents[0])){
        foreach ($opponents as $value){
          
          echo '<a style="" href="'.site_url('user/others_profile?username=').$value['username'].'">';
          echo '<img src="';
          if(!is_null($value['picture'])&&$value['picture']!=''){
            echo base_url("./images/").$value['picture'];
          }
          else {
            echo base_url("./images/empty-avatar.jpg");
          }
          echo '" class="mr-3 z-depth-0 rounded " alt="avatar_image" style="width:25px; height:25px;">';
          echo $value['username']."</a>";
        }
      } else {
        echo "<h2>Unfortunately there is no opponent for you :(</h2>";
      }
 ?>
</div>
