<?php
        echo '<div class="col-9 col-lg-10 text-left mx-auto mt-2 mb-4">';
            if ($answeredMotions)
            {
                    echo '<h2 class="">Answers</h2>';
                    echo '<h6 class="">Click on the motions to find opponents</h6>';
                    echo '<div class="col-md-4 my-2 bg-light border-left rounded"><strong>Note!</strong> If you want to change your opinion just press the cross/check </div>';
                    echo '<ul class="list-unstyled">';
                    for ($i=0;$i<count($answeredMotions);$i++){
                        // echo '<h4><strong>'.$answeredMotions[$i]['content'].':</strong></h4> ';
                        if ($answeredMotions[$i]['agree']==1){
                                echo '<li>';
                                    echo '<h5><a href="'.site_url('motion/changeTheOpinion/').$answeredMotions[$i]['idMotion'].'"><i class="fas fa-1x fa-check"></i></a> </input> <a href="'.site_url('motion/listOfOpponents/').$answeredMotions[$i]['idMotion'].'">'.$answeredMotions[$i]['content'].'</a> </h5>';
                                echo '</li>';
                        } else {
                                echo '<li>';
                                    echo '<h5><a href="'.site_url('motion/changeTheOpinion/').$answeredMotions[$i]['idMotion'].'"> <i class="fas  fa-times"></i></a> </input> <a href="'.site_url('motion/listOfOpponents/').$answeredMotions[$i]['idMotion'].'"> '.$answeredMotions[$i]['content'].'</a></h5>';
                                echo '</li>';
                        }
                    };
                    echo '</ul>';
            }
        echo '</div>';
    echo '</div>';
echo '</div>';
?>