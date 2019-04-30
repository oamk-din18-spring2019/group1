<div class="container my-4">

    <div class="row no-gutters">
      <div class="card col-lg-4 m-4">
        <div class="card-head rounded-top black white-text p-2 pl-4">
          <i class="fas fa-user-circle"></i><strong class="ml-2">Profile picture</strong>
        </div>
        <div class="card-body px-4 pt-2">
            Change you profile picture here :

            <?php echo form_open_multipart('user/do_upload');?>
          
            <input id="uploadedImage" type="file" name="userfile" size="20" onchange="checkFileDetails()" /><br><br>
            <div id="warningSize"class='text-center text-white bg-danger rounded my-2' hidden>The image is too big</div>
            <div id="warningPortrait"class='text-center text-white bg-danger rounded my-2' hidden>The file should not be a portrait</div>
            <input id="imgSubmitBtn" type="submit" value="Upload" disabled />
            <?php if(isset($messageSettings)){ echo" <div class='text-center text-white bg-danger rounded my-2'>".$messageSettings." </div>";}?>
          </form>
        </div>
      </div>

      <div class="card col-lg-4 m-4">
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

    <div class="row no-gutters">
      <div class="card col-lg-4 m-4">
        <div class="card-head rounded-top black white-text p-2 pl-4">
          <i class="fas fa-key"></i><strong class="ml-2">Password</strong>
        </div>
        <div class="card-body px-4 pt-2">
          Change your password here:
          <button><a href="<?php echo site_url('user/changePassword') ?>">Change password</a></button>
        </div>
      </div>

      <div class="card col-lg-4 m-4">
        <div class="card-head rounded-top black white-text p-2 pl-4">
          <i class="fas fa-book"></i><strong class="ml-2">Preferred Categories</strong>
        </div>
        <div class="card-body px-4 pt-2">
          Change your preferred categories here:
          <button><a href="<?php echo site_url('user/getCategories') ?>">Change Preferred Categories</a></button>
        </div>
      </div>
    </div>

</div>

<script type="text/javascript">
function checkFileDetails() {
      var fi = document.getElementById('uploadedImage');
      if (fi.files.length > 0) {      // FIRST CHECK IF ANY FILE IS SELECTED.

          for (var i = 0; i <= fi.files.length - 1; i++) {
              var fileName, fileExtension, fileSize, fileType, dateModified;

              // FILE NAME AND EXTENSION.
              fileName = fi.files.item(i).name;
              fileExtension = fileName.replace(/^.*\./, '');

              // CHECK IF ITS AN IMAGE FILE.
              // TO GET THE IMAGE WIDTH AND HEIGHT, WE'LL USE fileReader().
              if (fileExtension == 'png' || fileExtension == 'jpg' || fileExtension == 'jpeg') {
                 readImageFile(fi.files.item(i));             // GET IMAGE INFO USING fileReader().
              }
              else {
                  // IF THE FILE IS NOT AN IMAGE.

                  fileSize = fi.files.item(i).size;  // FILE SIZE.
                  fileType = fi.files.item(i).type;  // FILE TYPE.
                  dateModified = fi.files.item(i).lastModifiedDate;  // FILE LAST MODIFIED.

                  document.getElementById('fileInfo').innerHTML =
                      document.getElementById('fileInfo').innerHTML + '<br /> ' +
                          'Name: <b>' + fileName + '</b> <br />' +
                          'File Extension: <b>' + fileExtension + '</b> <br />' +
                          'Size: <b>' + Math.round((fileSize / 1024)) + '</b> KB <br />' +
                          'Type: <b>' + fileType + '</b> <br />' +
                          'Last Modified: <b>' + dateModified + '</b> <br />';
              }
          }

          // GET THE IMAGE WIDTH AND HEIGHT USING fileReader() API.
          function readImageFile(file) {
              var reader = new FileReader(); // CREATE AN NEW INSTANCE.

              reader.onload = function (e) {
                  var img = new Image();
                  img.src = e.target.result;

                  img.onload = function () {
                      var w = this.width;
                      var h = this.height;

                      /*document.getElementById('fileInfo').innerHTML =
                          document.getElementById('fileInfo').innerHTML + '<br /> ' +
                              'Name: <b>' + file.name + '</b> <br />' +
                              'File Extension: <b>' + fileExtension + '</b> <br />' +
                              'Size: <b>' + Math.round((file.size / 1024)) + '</b> KB <br />' +
                              'Width: <b>' + w + '</b> <br />' +
                              'Height: <b>' + h + '</b> <br />' +
                              'Type: <b>' + file.type + '</b> <br />' +
                              'Last Modified: <b>' + file.lastModifiedDate + '</b> <br />';*/
                      if (h>w) {
                        document.getElementById('warningPortrait').hidden=false;
                        document.getElementById('imgSubmitBtn').disabled=true;
                      } else {
                        document.getElementById('warningPortrait').hidden=true;
                        document.getElementById('imgSubmitBtn').disabled=false;
                      }
                      if (h>1500 || w>1500) {
                        document.getElementById('warningSize').hidden=false;
                        document.getElementById('imgSubmitBtn').disabled=true;
                      } else {
                        document.getElementById('warningSize').hidden=true;
                        document.getElementById('imgSubmitBtn').disabled=false;
                      }
                  }
              };
              reader.readAsDataURL(file);
          }
      }
  }
</script>
