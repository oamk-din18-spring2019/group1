<?php print_r($following); ?>
<div class="container mt-4">
  <?php
  if ($following!=NULL && isset($following[1])) {
    foreach ($following as $value) {
      if ($value=="") {} else {
      echo '<div class="container">';
      echo '<h4>You are connected with:</h4>';
      echo '<a style="" href="' . site_url('user/others_profile?username=') . $value->username . '">';

      echo '<div class="card col-lg-10 my-3 p-0">
            <div class="card-body px-2">';
      echo '<div class=" text-center">
            <div class="container-fluid ">
            <div class="row">';
      echo "<div class='col-auto'>";
      echo ' <img  style="width:100px; height:100px;" class="img-fluid rounded" src="';
      if (!is_null($value->picture) && $value->picture != '') {
        echo base_url("./images/") . $value->picture;
      } else {
        echo base_url("./images/empty-avatar.jpg");
      }
      echo '">';
      echo '</div>';
      echo '<div class="col">';
      echo '<div class="row">';
      echo '<div class="col-lg-12 text-center">';
      echo   '<h2  class="">' . $value->username . '</h2> ';
      echo '</div>';
      echo '<div class="col-lg-12 text-center">';
      if ($value->motto!="") {echo $value->motto;} else {echo 'This person is shy so he/she hasn\'t added any motto yet.';}
      echo '</div>
            </div>
            </div>
            </div>
            </div> ';
      echo '</div></div>
      </div> </div> </a>';
    }}
  }
  else {
    echo '<div class="container text-center">';
    echo '<h2>You have no connections.</h2>';
    echo '<img src="https://nakleikashop.ru/images/detailed/22/CAT-070.png" class="img-fluid w-25" alt="">';
    echo '<h2 class="my-4">You will have one when you follow some one.</h2  >';
    echo '</div>';
  }
  ?>
</div>
