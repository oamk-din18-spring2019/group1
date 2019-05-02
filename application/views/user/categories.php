<div class="container">
    <div class="row">
        <div class="col-1 col-sm-3 col-lg-2 pl-0 pr-0 text-left wrapper" id="preferredCategories">
        <div class="bg-white pt-1 px-2 ">
                <div class="sticky-top py-2 " id="categoriesBar" >
                    <ul class="invisibleBorder list-unstyled" >
                        <ul class="mb-2 list-unstyled pr-1">
                            <li> <h5 class="mb-2"> <strong>Unanswered</strong> </h5> </li>
                            <ul class="list-unstyled">
                                <?php
                                $chosenCategories = array();
                                $chosenUnansweredCategories = array();
                                for ($i = 1; $i < count($categories); $i++) 
                                {
                                    for ($k = 0; $k < count($preferredCategories); $k++) 
                                    {
                                        if ($preferredCategories[0][$categories[$i]] == 1) 
                                        {
                                            array_push($chosenCategories, $categories[$i]);
                                        }
                                    }
                                }
                                // print_r($chosenCategories);
                                // print_r($unansweredCategories);
                                for ($i=0; $i<count($chosenCategories); $i++)
                                {
                                    for ($k=0; $k<count($unansweredCategories); $k++)
                                    {
                                        if ($chosenCategories[$i] == $unansweredCategories[$k]["category"])
                                        {
                                            array_push($chosenUnansweredCategories, $chosenCategories[$i]);
                                        }
                                        // echo $chosenCategories[$k];
                                    }
                                }
                                foreach ($chosenUnansweredCategories as $value) 
                                {
                                    echo ' <h6 class=""> <li> <a class="text-capitalize" href="' . site_url('Motion/answerTheQuestion/') . $value . '">' . $value . '</a> </h6> </li>';
                                }
                                // for ($i=0;$i<count($unansweredCategories);$i++)
                                // {
                                    // echo ' <h6 class=""> <li> <a class="text-capitalize" href="' . site_url('Motion/answerTheQuestion/') . $unansweredCategories[$i]['category'] . '">'.$unansweredCategories[$i]['category'].'</a> </h6> </li>';
                                // }
                            ?>
                        </ul>
                    </ul>
                    <ul class="my-3 list-unstyled">
                        <li> <h5 class="mb-2"> <strong>Answered</strong> </h5> </li>
                        <ul class="list-unstyled">
                            <?php
                                $chosenCategories = array();
                                $chosenAnsweredCategories = array();
                                for ($i = 1; $i < count($categories); $i++) 
                                {
                                    for ($k = 0; $k < count($preferredCategories); $k++) 
                                    {
                                        if ($preferredCategories[0][$categories[$i]] == 1) 
                                        {
                                            array_push($chosenCategories, $categories[$i]);
                                        }
                                    }
                                }
                                // print_r($chosenCategories);
                                // print_r($answeredCategories);
                                for ($i=0; $i<count($chosenCategories); $i++)
                                {
                                    for ($k=0; $k<count($answeredCategories); $k++)
                                    {
                                        if ($chosenCategories[$i] == $answeredCategories[$k]["category"])
                                        {
                                            array_push($chosenAnsweredCategories, $chosenCategories[$i]);
                                        }
                                        // echo $chosenCategories[$k];
                                    }
                                }
                                foreach ($chosenAnsweredCategories as $value) 
                                { 
                                    echo ' <h6 class=""> <li> <a class="text-capitalize" href="' . site_url('Motion/answeredMotions/') . $value . '">' . $value . '</a> </h6> </li>';
                                }
                                // for ($i=0;$i<count($answeredCategories);$i++)
                                // {
                                //     echo ' <h6 class=""> <li> <a class="text-capitalize" href="' . site_url('Motion/answeredMotions/') . $answeredCategories[$i]['category'] . '">'.$answeredCategories[$i]['category'].'</a> </h6> </li>';
                                // }
                                ?>
                            </ul>
                        </ul>
                    </ul>
                </div>
            </div>
            <div class="my-auto d-block d-sm-none">
                <a type="" id="sidebarCollapse" class="text-center">
                    <i class="fas fa-angle-double-right fa-2x" id="openCloseIcon" style="opacity: 0.7;" onclick="openNav()"></i>
                            <!-- <span></span> -->
                </a>
            </div>

    </div>