            <div class="col-9 col-lg-10 mx-auto text-left mt-2 py-2">
                <div class="form-group green-border-focus">
                    <?php #echo form_open_multipart('user/addNews');?> 
                    <form action="addNews" method="POST" > 
                        <label for="exampleFormControlTextarea3">Title</label>
                        <textarea class="form-control" id="titleNews" name="title" required rows="1" placeholder="Write the title"></textarea>
                        <label class="mt-2" for="exampleFormControlTextarea3">Content</label>
                        <textarea class="form-control" id="contentNews" required name="content" rows="2" placeholder="Write the news"></textarea>
                        <!-- <div class="input-default-wrapper mt-3">
                            <span class="input-group-text mb-3" id="input1">Upload</span>
                            <input type="file" id="fileContent" name="picture" size="20" class="input-default-js">
                            <label class="label-for-default-js rounded-right mb-3" for="fileContent">
                                <span class="span-choose-file">Choose file</span>
                                <div class="float-right span-browse">Browse</div>
                            </label> 
                        </div> -->
                        <input class="btn btn-sm btn-outline-dark" type="submit" value="Upload">
                    </form> 
                    <hr>
                </div>     
            </div>
            <!-- <div class="w-100"></div> -->
            <hr>
            <div class="col-9 col-lg-10 mx-5 text-justify mt-2 py-2">
                <?php 
                    for ($i=0; $i<count($allNews); $i++)
                    {
                        echo '<div class="card mt-2 rounded-0">';
                            echo '<div class="card-header ">';
                                echo '<h5 class="card-title mb-0 float-left">'.$allNews[$i]['title'].'</h5>';
                                echo '<a class="float-right" href="'.site_url("user/deleteNews").$allNews[$i]['ID']'"> <i class="fas fa-times"></i></a>';
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
</div>