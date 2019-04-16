<!-- Nav bar goes here -->

<div id=dashboard>
    <!-- side bar -->
<div id=sidebar> 
    <ul>
        <!-- <li><a href="#">Conversations</a></li> -->
        <!-- <li><a href="#">Friend requests</a></li> -->
        <!-- <li><a href="#">Trending</a></li>  -->
        <!-- <li><a href="#">Explore</a></li> -->
        <!-- <li><a href="<?php echo site_url('user/profile/nam') ?>">Profile</a></li> TODO: make this dynamic -->
        <!-- <li><a href="#">About us</a></li> -->
    </ul> 
</div>

<div id="preferredCategories">
<ul>
    <?php
        $chosenCategories=array();
        for ($i=1; $i<count($categories); $i++)
        {
            for ($k=0; $k<count($preferredCategories); $k++)
            {
                if ($preferredCategories[0][$categories[$i]]==1)
                {
                    array_push($chosenCategories,$categories[$i]);
                }
            }
        }
        // <a href="'.site_url('students/show_delete/').$row['idStudents'].'">DELETE</a></td>';
        foreach ($chosenCategories as $value){
            echo '<td> <li><a href="'.site_url('Motion/answerTheQuestion/').$value.'">'.$value.'</a></li>';
        }

        // print_r($chosenCategories);
    ?>
    </ul>
</div>

<!-- news feed in the middle -->
<div id=newsfeed class="container newsfeed px-5">
    <div class="container">
        
    </div>
</div>

<!-- temp link to test chat screen -->
<a href="<?php echo site_url('user/chat'); ?>"></a>
</div>