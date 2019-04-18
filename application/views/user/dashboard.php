<!-- Nav bar goes here -->
<div class="container">
    <div class="row">
        <div class="col-3 mt-2" id="preferredCategories">
            <h5>Categories:</h5>
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
                    echo '<a href="'.site_url('Motion/answerTheQuestion/').$value.'"><h6 class="">'.$value.'</h6></a>';
                }
            
                // print_r($chosenCategories);
            ?>
        </div>
            
        <!-- news feed in the middle -->
        <div id=newsfeed class="container newsfeed px-5">
            <div class="container">

            </div>
        </div>
        <!-- temp link to test chat screen -->
            <a href="<?php echo site_url('user/chat'); ?>"></a>
        </div>
    </div>
</div>