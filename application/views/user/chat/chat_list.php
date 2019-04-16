<?php
    foreach($test as $user){
        echo '<a target=chatScreen href='.site_url('user/chat').'/'.$user.' >'.$user.'</a><br>';
    }