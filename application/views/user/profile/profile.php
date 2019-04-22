
<!-- Your profile is here
Hello  -->
<div class="container ">
    <div class="row">
    <div class="col-md-1"></div>
        <div class="col-md-4 col-sm-4">
            <img class="img-fluid rounded z-depth-1 my-3" src="<?php if(isset($_SESSION['image'])&&($_SESSION['image']!='')){ echo base_url("./images/".$_SESSION['image']) ;} else{echo base_url("./images/empty-avatar.jpg");} ?>" alt="avatar">
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6 text-left mt-4">
           
            
                <h1><strong><?php echo $_SESSION["username"] ?></strong></h1>  
               <br>
               <h2>
               
                <?php echo $_SESSION['time'] ?><br>
                <i class="fas fa-star my-3"></i>
                <?php echo $this->User_model->getRating($_SESSION['username']); ?>
            </h2>
        </div>
    </div>
</div>
<hr>
<div class="container mb-3">
    <div class="card-group ">
        <div class="col-md-4">
            <div class="card ">
                <i class="fas fa-user-friends fa-5x text-center mt-4"></i>
                <div class="card-body text-center">
                    <h5 class="card-title">Followings</h5>
                    Find people you want to follow here
                    <br> <br><a href="<?php echo site_url('user/search'); ?>" class="btn btn-primary text-center">Interesting!</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card ">
                <i class="fas fas fa-trophy fa-5x text-center mt-4"></i>
                <div class="card-body text-center">
                    <h5 class="card-title">Statistics</h5>
                    Statistics we have about you
                    <br> <br><a href="<?php echo site_url("user/achievements") ?>" class="btn btn-primary text-center">Let's go!</a>

                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <i class="fas fa-cog fa-5x text-center mt-4"></i>
                <div class="card-body text-center">
                    <h5 class="card-title">Settings</h5>
                    Change your life here!
                    <br> <br> <a href="<?php echo site_url("user/settings") ?>" class="btn btn-primary text-center ">Inexpressible!</a>
                </div>

            </div>
        </div>
    </div>
</div>
