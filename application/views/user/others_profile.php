<!-- Another person's profile -->
<div class="container mt-4">
    <div class="row">
    <div class="col-md-1"></div>
        <div class="col-md-4 col-sm-4">
            <img class="img-fluid rounded z-depth-1 my-3" src="
            <?php
              $data=$this->User_model->profile($_GET['username']);
              if(!is_null($data['picture'])&&$data['picture']!=''){
                echo base_url("./images/").$this->User_model->getPictureName($data['username']);
              }
              else {
                echo base_url("./images/empty-avatar.jpg");
              }
            ?>
              " alt="avatar">
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6 text-left mt-4">
            <h2>
                Username:
                <?php echo $data['username'] ?> <br>
                Date of registration:
                <?php echo $data['DoR'] ?>

            </h2>
        </div>
    </div>
</div>
<hr>
