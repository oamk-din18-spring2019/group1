<div class="container">
<h2>Your possible opponents:</h2>
<?php if (isset($opponents[0])){
        foreach ($opponents as $value){
          echo ' <div class="card my-4">
          <div class="card-body  px-4 mx-3">';
          echo '<div class="">
          <div class="container-fluid "> 
          <div class="row">';
          
          echo ' <img  style="width:70px; height:70px;" class="img-fluid rounded mb-2 " src="';
          if(!is_null($value['picture'])&&$value['picture']!=''){
            echo base_url("./images/").$value['picture'];
          }
          else {
            echo base_url("./images/empty-avatar.jpg");
          }
          echo '">';
          echo   '<h1 class="pl-3">'.$value['username'].'</h1> ';
          echo '</div>
          </div> ';

        
              
           echo   'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita mollitia quam soluta culpa, doloribus nesciunt. Ipsa corrupti voluptate ad, ut earum, voluptatem atque, impedit iure vitae sunt molestiae veritatis quod.
              <br>
              <a href="#"><button class="btn btn-info"> Go</button></a>
          </div>
      </div> </div>';
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
