<div class="container">
    <div class="row">
        <div class="col-3 col-lg-2 mt-2 text-left" id="preferredCategories">
            <div class="sticky-top py-2 ">
                <ul class="border-right border-dark list-unstyled">
                    <ul class="mb-2 list-unstyled">
                        <li> <h5 class="mb-2"> <strong>Categories</strong> </h5> </li>
                        <ul class="list-unstyled">
                            <?php
                                for ($i=0;$i<count($unansweredCategories);$i++)
                                {
                                    echo ' <h6 class=""> <li> <a class="text-capitalize" href="' . site_url('Motion/answerTheQuestion/') . $unansweredCategories[$i]['category'] . '">'.$unansweredCategories[$i]['category'].'</a> </h6> </li>';
                                }
                            ?>
                        </ul>
                    </ul>
                    <ul class="my-3 list-unstyled">
                        <li> <h5 class="mb-2"> <strong>Answered</strong> </h5> </li>
                        <ul class="list-unstyled">
                            <?php
                                for ($i=0;$i<count($answeredCategories);$i++)
                                {
                                    echo ' <h6 class=""> <li> <a class="text-capitalize" href="' . site_url('Motion/answeredMotions/') . $answeredCategories[$i]['category'] . '">'.$answeredCategories[$i]['category'].'</a> </h6> </li>';
                                }
                            ?>
                        </ul>
                    </ul>
                </ul>
            </div>
        </div>