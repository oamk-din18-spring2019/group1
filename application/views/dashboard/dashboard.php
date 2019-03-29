<!-- Nav bar goes here -->

<!-- side bar -->
<div id=sidebar> 
    <ul>
        <li><a href="#">Conversations</a></li>
        <li><a href="#">Friend requests</a></li>
        <li><a href="#">Trending</a></li> 
        <li><a href="#">Explore</a></li>
        <li><a href="#">Settings</a></li> 
        <li><a href="#">How this works</a></li>
        <li><a href="#">About us</a></li>
    </ul> 
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
        activeFriends.map(f => document.getElementById('activeFriends').innerHTML += `<li>${f.username}</li>`);
    </script>
    </ul>
</div>