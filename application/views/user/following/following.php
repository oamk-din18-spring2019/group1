<div class="container mt-4">
  <h4>You are connected with:</h4>
    <?php

    if ($following!=NULL && isset($following[0])) {
      foreach ($following as $value) {
        if ($value=="") {} else {
        echo '<div class="container">';
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
        echo '<div class="col-lg-12 text-center">'.$value->motto.'</div>
             </div>
             </div>
             </div>
             </div> ';
        echo '</div></div>
        </div> </div> </a>';
        /*$data=$this->User_model->getUserInfo($key);
        echo '<a style="color: black;" href="'.site_url('user/others_profile?username=').$data->username.'">';
        echo '<img src="';
        if(!is_null($data->picture)&&$data->picture!=''){
          echo base_url("./images/").$this->User_model->getPictureName($data->username);
        }
        else {
          echo base_url("./images/empty-avatar.jpg");
        }
        echo '" class="mr-3 z-depth-0 " alt="avatar image" style="width:25px; height:25px;">';
        echo $data->username."<br><br></a>";*/
      }}
    }
    else {
      echo 'You have not connections.';
    }
    ?>

</div>
