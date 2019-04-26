<div class="container mt-4">

<?php //echo base_url("./images/ban-user.png"); ?>



<div class="row">
  <!--Card-->
  <div class="card m-3" style="width: 22rem;">

    <!--Card image
    <div class="view overlay">
      <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%287%29.jpg" class="img-fluid" alt="">
      <a href="#">
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>-->

    <!--Card content-->
    <div class="card-body">
      <div class="row">
        <div class="col">
          Ban Users
        </div>
        <!--Title
        <h4 class="card-title">Card title</h4>
        -->
        <!--Text
        <p class="card-text"></p>
        -->
        <div class="col">
          <a href="<?php echo site_url('user/ban'); ?>" class="btn" style="background-color:red;">Manage</a>
        </div>
      </div>
    </div>

  </div>
  <!--/.Card-->
</div>

<div class="row">
  <div class="card m-3" style="width: 22rem;">
    <div class="card-body">
      <div class="row">
        <div class="col">
          Change/add motions
        </div>
        <div class="col">
          <a href="<?php echo site_url('user/changeAddMotion')?>" class='btn btn-primary' >Button</a>
        </div>
      </div>
    </div>
  </div>
</div>


</div>
