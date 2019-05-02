<!-- Nav bar goes here -->
        <div class="col-11 col-sm-8 col-lg-9 text-left mt-2 mb-4" id="main">
            <h2>News</h2> <br>
            <?php 
                for ($i=0; $i<count($allNews); $i++)
                {
                    echo '<div class="card mt-2 rounded-0">';
                        echo '<div class="card-header ">';
                            echo '<h5 class="font-weight-bold card-title mb-0">'.$allNews[$i]['title'].'</h5>';
                        echo '</div>';
                        echo '<div class="card-body px-3 py-2">';
                            echo '<div class="card-text" id="'.$i.'" style="overflow:hidden; max-height: 40px;">';
                                echo '<p class="newsContent " id="paragraph'.$i.'">'.$allNews[$i]['content'].'</p>';
                            echo '</div>';
                            echo '<p class="show-hide mb-0" name="'.$i.'" id="myBtn"><a class="button">Show More</a></p>';
                        echo '</div>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>    
</div>