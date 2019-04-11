<!-- Nav bar goes here -->

<div id=dashboard>
    <!-- side bar -->
<div id=sidebar> 
    <ul>
        <li><a href="#">Conversations</a></li>
        <li><a href="#">Friend requests</a></li>
        <li><a href="#">Trending</a></li> 
        <li><a href="#">Explore</a></li>
        <li><a href="<?php echo site_url('user/profile/nam') ?>">Profile</a></li> <!--TODO: make this dynamic-->
        <li><a href="#">How this works</a></li>
        <li><a href="#">About us</a></li>
    </ul> 
</div>

<div id="preferredCategories">
    <?php
        $chosenCategories=array();
        for ($i=1; $i<count($categories); $i++)
        {
            for ($k=0; $k<count($preferredCategories); $k++)
            {
                if ($preferredCategories[0][$categories[$i]]==1)
                {
                    // echo $categories[$i];
                    array_push($chosenCategories,$categories[$i]);
                }
            }
        }
        print_r($chosenCategories);

        
        // for ()
        // {

        // }
    ?>
</div>

<!-- news feed in the middle -->
<div id=newsfeed>
    <div>
        <img src="" alt="icon goes here"> <p>Pepsi is better than Cocacola because it has less sugar</p>
    </div>
    <div>
        <img src="" alt="icon goes here"> <p>You have a new match request pending!</p>
    </div>
    <div>
        <img src="" alt="icon goes here"> <p> <b>Update 1.01 notes: </b> <ul><li>Add users</li><li>Put something new</li></ul></p>
    </div>
</div>

<!-- online friends -->
<div id=activeFriends>
    <ul>
    <script>
        let activeFriends = <?php echo json_encode($activeFriends);?>;
        activeFriends.map(f => document.getElementById('activeFriends').innerHTML += `<li><a target=_blank href="<?php echo site_url('user/chat')?>/${f.username}" >${f.username}</a></li>`);
    </script>
    </ul>
</div>
</div>