<hr>
    <h3>Search results</h3>

        <?php
        if(count($cari)>0)
        {
            foreach ($cari as $data) {
              echo '<a class="" style="color: black;" href="'.site_url('user/others_profile?username=').$data->username.'">';
              echo '
              <div class="col-lg-6 border border-dark rounded p-2 my-4 mx-lg-0 mx-auto row" >
              <div class="col-4 text-center"><img src="';
              if(!is_null($data->picture)&&$data->picture!=''){
                echo base_url("./images/").$this->User_model->getPictureName($data->username);
              }
              else {
                echo base_url("./images/empty-avatar.jpg");
              }
              echo '" class="z-depth-0" alt="avatar image" style="width:100px; height:100px;"></div><div class="my-auto col"><h4>';
              echo $data->username;
              if ($data->username==$_SESSION['username']) {echo ' (yourself)';}
              echo '</h4><i class="far fa-comment-alt pr-2"></i>';
              if ($data->motto!="") {echo $data->motto;} else {echo 'This person is shy so he/she hasn\'t added any motto yet.';}
              echo '</div></div></a>';
            }
        }
        else
        {
            echo "No result found.";
        }
    ?>
    </div>
