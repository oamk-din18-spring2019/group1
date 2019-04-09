<div class="container mt-4">
<?php echo form_open_multipart('user/ch_Passwd');?>
<label for="new_password">New password</label><br>
<input id="new_password" type="password" name="new_password" value="" onkeyup="validate()"><br><br>
<label for="confirm_password"></label>Confirm password<br>
<input id="confirm_password" type="password" name="confirm_password" value="" onkeyup="validate()"><br><br>
<div id="alert" class="" style="width:185px;"></div><br>
<script>
  function validate(){
    var alert=document.getElementById('alert');
    var password=document.getElementById("new_password").value;
    var confirm_password=document.getElementById("confirm_password").value;
    if(password!==confirm_password || password.length==0) {
      alert.innerHTML=("Passwords do not match");
      document.getElementById("alert").className="danger-color p-1";
      document.getElementById('submit_button').disabled="true";
    }
    else {
      alert.innerHTML=("Passwords accepted");
      document.getElementById("alert").className="success-color p-1";
      document.getElementById('submit_button').disabled="";
    }
  }
</script>
<input id="submit_button" type="submit" name="" value="Change Password" disabled >
</form>
</div>
