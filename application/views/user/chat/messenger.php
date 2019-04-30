<div class="container-fluid mt-4">
  <div class="row no-gutters justify-content-center" style="height:80vh;">
    <!-- Display chat list -->
    <iframe id="chatList" class="col-lg-2 border border-dark rounded-left" style="box-sizing:border-box;" src="<?php echo site_url('user/allConversations').'/'.$_SESSION['username'] ?>"></iframe>
    <!-- Display chat screen on the same view with chat list -->
    <iframe class="col-10 border border-dark rounded-right d-none d-lg-block" style="box-sizing:border-box;" src="<?php echo site_url('user/chat/'.$username) ?>" name=chatScreen></iframe>
  </div>
  </div>
</div>
