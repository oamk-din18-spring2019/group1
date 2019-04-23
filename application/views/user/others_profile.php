<!-- Another person's profile -->
<div class="container mt-4">
    <div class="row">
    <div class="col-md-1"></div>
        <div class="col-md-4 col-sm-4 text-center">
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
              <div class="row justify-content-center">
                <div class="col-auto border border-dark rounded-pill rgba-stylish-light ">
                  <?php if($this->User_model->checkIfFollowing($data['idUser'])) {
                    echo '<i class="fas fa-check"></i>&nbsp;Connected';
                  }
                  else {
                    echo '<i class="fas fa-times"></i>&nbsp;Not connected';
                  }
                  ?>
                </div>
              </div>
              <form class="" action="<?php echo site_url("user/toggleFollow");?>" method="post">
                <input type="number" name="id" value="<?php echo $data['idUser']; ?>" hidden>
                <input type="submit" name="" value="
                <?php
                if($this->User_model->checkIfFollowing($data['idUser'])) {echo 'Click to unfollow';}
                else {echo 'Click to follow';}
                ?>"
                class="btn btn-sm mt-2" style="color:black;">
              </form>
              <a class="btn btn-sm btn-info"target=_blank href="<?php echo site_url('user/social').'/'.$_GET['username'] ?>">Open conversation  <i class="far fa-envelope"></i></a>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6 text-left mt-4">
            <h1>
                <strong> <?php echo $data['username'] ?></strong>
               
                </h1>
                <h3>
                <?php 
                if($this->User_model->getRating($data['username'])>=0 and $this->User_model->getRating($data['username'])<4){
                    echo "<i class='fas fa-user-graduate my-3'></i> Usual user <br>";
                }
                if($this->User_model->getRating($data['username'])<0){
                    echo "<i class='far fa-angry'></i> Agressive user <br>";
                }
                if($this->User_model->getRating($data['username'])>4 and $this->User_model->getRating($data['username'])<10){
                    echo "<i class='fas fa-user-tie my-3'></i> Polite user <br>";
                }
                if($this->User_model->getRating($data['username'])>=10){
                    echo "<i class='fas fa-user-astronaut my-3'></i> Cosmically polite user <br>";
                }
                ?>
                <i class="far fa-calendar-check my-3"></i>
                <?php echo $data['DoR'] ?>
                </h3>
                
                
            
            <?php
              $rated =  $this->User_model->checkRating($_GET['username'], $_SESSION['username']);
              $showUpButton = $rated == 'up' ? 'none' : 'inline-block';
              $showDownButton = $rated == 'down' ? 'none' : 'inline-block';
            ?>
            <hr>
            <h2 class="mt-3 text-info"> Rate the person</h2> 
            
            <a style="display: <?php echo $showUpButton; ?>;" href="<?php echo site_url('user/rate').'/'.$data['username'].'/up' ?>"><i class="far mx-2 fa-3x fa-thumbs-up"></i></a>
            <a style="display: <?php echo $showDownButton; ?>;" href="<?php echo site_url('user/rate').'/'.$data['username'].'/down' ?>"><i class="far fa-3x fa-thumbs-down"></i></a>
            <hr>
          </div>
    </div>
</div>
<hr>
