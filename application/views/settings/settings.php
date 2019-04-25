<div class="container mt-4">

    <div class="row no-gutters">
      <div class="card col-lg-4">
        <div class="card-head rounded-top black white-text p-2 pl-4">
          <i class="fas fa-user-circle"></i><strong class="ml-2">Profile picture</strong>
        </div>
        <div class="card-body px-4 pt-2">
            Change you profile picture here :

            <?php echo form_open_multipart('user/do_upload');?>

            <input type="file" name="userfile" size="20" />
            <br /><br />
            <input type="submit" value="Upload" />
            <?php if(isset($messageSettings)){ echo" <div class='col-md-4 text-center text-white bg-danger rounded my-2'>".$messageSettings." </div>";}?>
          </form>
        </div>
      </div>
    </div>
    <div class="row no-gutters">
      <div class="card col-lg-4 mt-4">
        <div class="card-head rounded-top black white-text p-2 pl-4">
          <i class="fas fa-key"></i><strong class="ml-2">Password</strong>
        </div>
        <div class="card-body px-4 pt-2">
          Change your password here:
          <button><a href="<?php echo site_url('user/changePassword') ?>">Change password</a></button>
        </div>
      </div>
    </div>

    <div class="row no-gutters">
      <div class="card col-lg-4 mt-4">
        <div class="card-head rounded-top black white-text p-2 pl-4">
          <i class="far fa-comment-alt"></i><strong class="ml-2">Motto</strong>
        </div>
        <div class="card-body px-4 pt-2">
          Change your <b>motto</b> here:
          <form class="" action="<?php echo site_url("user/changeMotto"); ?>" method="post">
            <textarea class="w-100" name="motto" rows="4" cols="" maxlength="500" placeholder="Enter your new motto here" ></textarea><br>
            <input type="submit" name="" value="Change motto">
          </form>

        </div>
      </div>
    </div>

</div>
