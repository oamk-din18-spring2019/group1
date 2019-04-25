<div class="container mt-2 text-center">
  <h2>Your possible opponents:</h2>
  <?php if (isset($opponents[0])) {
    foreach ($opponents as $value) {
       echo '<div class="container">';
      echo '<a style="" href="' . site_url('user/others_profile?username=') . $value['username'] . '">';
     
      echo ' <div class="card col-md-10 my-3">
          <div class="card-body  px-4 mx-3">';
      echo '<div class=" text-center">
          <div class="container-fluid "> 
          <div class="row">';
      echo "<div class='col-md-3'>";
      echo ' <img  style="" class="img-fluid rounded mb-2 " src="';
      if (!is_null($value['picture']) && $value['picture'] != '') {
        echo base_url("./images/") . $value['picture'];
      } else {
        echo base_url("./images/empty-avatar.jpg");
      }
      echo '">';
      echo '</div>';
      echo '<div class="col-md-9">';
      echo '<div class="row">';
      echo '<div class="col-md-12 text-center">';
      echo   '<h2  class="pl-3">' . $value['username'] . '</h2> ';
      echo '</div>';
      echo '<div class="row mx-2"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita mollitia quam soluta culpa. </div>
          </div>
          </div>
          </div>
          </div> ';
      echo '</div></div>
      </div> </div> </a>';
    }
  } else {
  
    echo "<h2 class='text-center'>Unfortunately there is no opponent for you :(</h2>";
    echo '<div class="col-md-12 text-center">';
    echo '<div class="col-md-5 mx-auto my-3">';
    echo '<img src="https://nakleikashop.ru/images/detailed/22/CAT-070.png" class="img-fluid " alt="">';
    echo "</div>";
    echo "<h2 class='text-center'>But we are working on it!</h2>";
    echo '</div>';
  }
  ?>
</div>