<hr>
    <h3>Search results</h3>

        <?php
        if(count($cari)>0)
        {
            foreach ($cari as $data) {
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
            }
        }
        else
        {
            echo "No result found.";
        }
    ?>
    </div>
