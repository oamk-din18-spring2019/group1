<div class="container mt-4">
  <div class="row no-gutters" style="height:80vh;">
    <iframe class="col-2 border border-dark rounded-left" style="box-sizing:border-box;" src="<?php echo site_url('user/allConversations').'/'.$_SESSION['username'] ?>"></iframe>
    <iframe class="col-10 border border-dark rounded-right" style="box-sizing:border-box;" src="<?php echo site_url('user/chat/'.$username) ?>" name=chatScreen></iframe>
  </div>
</div>
