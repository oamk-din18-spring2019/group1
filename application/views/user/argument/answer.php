<!-- <div class=""></div> -->

<?php
// echo "Your question is " . print_r($question); 
if ($question)
{
    echo '<div class="container px-5 ">';
        echo '<div class="row">';
            echo '<div class="col-9 mx-auto my-5">';
                echo "<h2 class=''>Motions on " . $category . "</h2> <br>";
                for ($i=0;$i<count($question);$i++){
                    echo '<div class="card my-4">';
                        echo '<div class="card-body px-4 mx-3">';
                            echo '<h3 class="card-title">'.$question[$i]["content"].'</h4>';
                            echo '<br>'; 
                            echo "<form class='text-left' method='POST' action=".site_url('Motion/getAnswer/').$question[$i]['idMotion'].">";

                                echo "<div class='custom-control custom-radio'>";
                                    echo "<input type='radio' class='custom-control-input' id='defaultChecked".$i."'value=1                            name='defaultExampleRadios' checked>";
                                    echo "<label class='custom-control-label' for='defaultChecked".$i."'>Yes, I agree<label>";
                                echo "</div>";
                                echo "<div class='custom-control custom-radio'>";
                                    echo "<input type='radio' class='custom-control-input' id='defaultUnchecked".$i."'      value='0' name='defaultExampleRadios'>";
                                    echo "<label class='custom-control-label' for='defaultUnchecked".$i."'>No, I disagree</     label>";
                                echo "</div>";
                                // echo "<div class='float-left'>";
                                    echo "<button type='submit' class='btn btn-outline-dark rounded waves-effect' id='BoxSelect'        value='Submit'>Submit</button>";
                                // echo "</div>";
                            echo "</form>";
                        echo '</div>';
                    echo '</div>';
                }
            echo '</div>';
        echo '</div>';
    // echo '</div>';

} else {
 //   echo " <h2 class='container'>You answered all the questions</h2>";
}

// echo '<div class="container px-5>';
    echo '<div class="row">';
        echo '<div class="col-9 text-center mx-auto mb-4">';
            if ($answeredMotions){
                echo "<h2 class='text-left pt-2'>Your opinions:</h2> <br> ";
                echo "<hr>";
                for ($i=0;$i<count($answeredMotions);$i++){
                    echo '<h4><strong>'.$answeredMotions[$i]['content'].':</strong></h4> ';
                    if ($answeredMotions[$i]['agree']==1){
                        echo '<div class="col-12">';
                             echo '<h5 class="text-success pt-4">You agree</h5> <br>';
                        echo '</div>';
                        echo '<div class="w-100"></div>';
                        echo '<div class="col-12">';
                            echo '<a href="'.site_url('motion/listOfOpponents/').$answeredMotions[$i]['idMotion'].'"><button type="button" class="btn btn-lg btn-outline-dark"><h6 class="mb-0">Argue</h6></button></a><br>';
                        echo '</div>';
                    } else {
                        echo '<div class="col-12">';
                            echo '<h5 class="text-danger pt-4">You disagree</h5> <br>';
                        echo '</div>';
                        echo '<div class="w-100"></div>';
                        echo '<div class="col-12">';
                            echo '<a href="'.site_url('motion/listOfOpponents/').$answeredMotions[$i]['idMotion'].'"><button type="button" class="btn btn-lg btn-outline-dark"><h6 class="mb-0">Argue</h6></button></a><br>';
                        echo '</div>';
                    }
                    echo '<hr>';
                };
            }
        echo '</div>';
    echo '</div>';
echo '</div>';

?>
