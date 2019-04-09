
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4"> 
            Change you profile picture here :
        </div>
            <div class="col-md-4">  
            <?php echo form_hidden('user/do_upload');?>
            <input type="file" class="" name="userfile" size="20" > 
            </div>          
            <div class="col-md-4">   
            <input type="submit" class="btn btn-elegant" value="upload" >
            </div>
            <hr>
        </div>
            <button><a href="<?php echo site_url('user/changePassword') ?>">Change password</a></button>
          </form>
        
   
</div>

<!-- <table class="table table-hover container">
  <thead>
    <tr>
      <th scope="col">Change </th>
      <th scope="col">Your</th>
      <th scope="col">Live</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
    </tr>
  </tbody>
</table> -->
<?php if(isset($messageSettings)){ echo" <div class='col-md-4 text-center text-white bg-danger rounded my-2'>".$messageSettings." </div>";}?>
