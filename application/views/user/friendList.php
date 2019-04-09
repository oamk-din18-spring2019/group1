<!-- TopNavbar goes here -->
<!-- SideNavBar -->


<div class="container">
    <h2>Your Friends:</h2>
</div>
<div class="container" id="friendList">
    <ul>
        <script>
            let friends = <?php echo json_encode($friends);?>;
            friends.map(f => document.getElementById('friendList').innerHTML += `<li><a target=_blank href="<?php  echo site_url('user/profile/profileHeader')?>/${f.username}" >${f.username}</a></li>`);
        </script>
    </ul>
</div>
<div id=activeFriends>
    <ul>
    <script>
        let activeFriends = <?php echo json_encode($activeFriends);?>;
        activeFriends.map(f => document.getElementById('activeFriends').innerHTML += `<li><a target=_blank href="<?php echo site_url('user/chat')?>/${f.username}" >${f.username}</a></li>`);
    </script>
    </ul>
</div>

<!-- footer -->