
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">

            Change you profile picture here :

            <?php echo form_open_multipart('user/do_upload');?>

            <input type="file" name="userfile" size="20" />
            <br /><br />
            <input type="submit" value="upload" />
            <hr>
            <button><a href="<?php echo site_url('user/changePassword') ?>">Change password</a></button>
          </form>
        </div>
    </div>
</div>
<?php if(isset($messageSettings)){ echo" <div class='col-md-4 text-center text-white bg-danger rounded my-2'>".$messageSettings." </div>";}?>
