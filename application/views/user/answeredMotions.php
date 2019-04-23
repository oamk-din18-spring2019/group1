<?php
        echo '<div class="col-9 col-lg-10 text-left mx-auto mt-2 mb-4">';
            if ($answeredMotions)
            {
                    echo '<h2 class="">Answers</h2>';
                    echo '<h6 class="">Click on the motions to find opponents</h6> <br>';
                    echo '<ul class="list-unstyled">';
                    for ($i=0;$i<count($answeredMotions);$i++){
                        // echo '<h4><strong>'.$answeredMotions[$i]['content'].':</strong></h4> ';
                        if ($answeredMotions[$i]['agree']==1){
                                echo '<li>';
                                    echo '<a href="'.site_url('motion/changeTheOpinion/').$answeredMotions[$i]['idMotion'].'"><i class="fas fa-1x fa-check"></i></a> </input> <a href="'.site_url('motion/listOfOpponents/').$answeredMotions[$i]['idMotion'].'">'.$answeredMotions[$i]['content'].'</a>';
                                echo '</li>';
                        } else {
                                echo '<li>';
                                    echo '<a href="'.site_url('motion/changeTheOpinion/').$answeredMotions[$i]['idMotion'].'"> <i class="fas fa-1x fa-times"></i></a> </input> <a href="'.site_url('motion/listOfOpponents/').$answeredMotions[$i]['idMotion'].'"> '.$answeredMotions[$i]['content'].'</a>';
                                echo '</li>';
                        }
                    };
                    echo '</ul>';
            }
        echo '</div>';
    echo '</div>';
echo '</div>';
?>