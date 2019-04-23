<div class="container mt-4">
  <h4>You are connected with:</h4>
    <?php
    $following=$this->User_model->getFollowing($_SESSION['username']);
    if ($following!=NULL && isset($following[1])) {
      foreach ($following as $key) {
        if ($key=="") {} else {
        $data=$this->User_model->getUserInfo($key);
        echo '<a style="color: black;" href="'.site_url('user/others_profile?username=').$data->username.'">';
        echo '<img src="';
        if(!is_null($data->picture)&&$data->picture!=''){
          echo base_url("./images/").$this->User_model->getPictureName($data->username);
        }
        else {
          echo base_url("./images/empty-avatar.jpg");
        }
        echo '" class="mr-3 z-depth-0 " alt="avatar image" style="width:25px; height:25px;">';
        echo $data->username."<br><br></a>";
      }}
    }
    else {
      echo 'You have not connections.';
    }
    ?>

</div>
