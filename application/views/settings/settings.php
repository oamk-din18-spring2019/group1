
<div class="container">
    <div class="row">
        <h1>
            Change you profile picture here :
           
            <?php echo form_open_multipart('user/do_upload');?>

<input type="file" name="userfile" size="20" />
<br /><br />
<input type="submit" value="upload" />

</form>
        </h1>
    </div>
</div>
