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
                    echo '<i class="fas fa-check"></i>&nbsp;Following';
                  }
                  else {
                    echo '<i class="fas fa-times"></i>&nbsp;Not following';
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
            <h2>
                Username:
                <?php echo $data['username'] ?> <br>
                Date of registration:
                <?php echo $data['DoR'] ?>
            </h2>
            <?php
              $rated =  $this->User_model->checkRating($_GET['username'], $_SESSION['username']);
              $showUpButton = $rated == 'up' ? 'none' : 'inline-block';
              $showDownButton = $rated == 'down' ? 'none' : 'inline-block';
            ?>
            <a style="display: <?php echo $showUpButton; ?>;" href="<?php echo site_url('user/rate').'/'.$data['username'].'/up' ?>">Upvote</a>
            <a style="display: <?php echo $showDownButton; ?>;" href="<?php echo site_url('user/rate').'/'.$data['username'].'/down' ?>">Downvote</a>
        </div>
    </div>
</div>
<hr>
