<!-- <div class=""></div> -->

<?php
// echo "Your question is " . print_r($question); 
if( $question)
{
    echo '<div class="container px-5 ">';
        echo '<div class="row">';
            echo '<div class="col-8 mx-auto">';
                echo "<h2 class='mt-4'>You chose " . $category . "</h2> <br>";
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
                                    echo "<input type='radio' class='custom-control-input' id='defaultUnchecked".$i."'      value='0'                    name='defaultExampleRadios'>";
                                    echo "<label class='custom-control-label' for='defaultUnchecked".$i."'>No, I disagree</     label>";
                                echo "</div>";
                                // echo "<div class='float-left'>";
                                    echo "<input type='submit' class='btn btn-success text-right' id='BoxSelect'        value='Submit'>";
                                // echo "</div>";
                            echo "</form>";
                        echo '</div>';
                    echo '</div>';
                }
            echo '</div>';
        echo '</div>';
    echo '</div>';

} else {
    echo " <h2>You answered all the questions</h2>";
}

echo '<div class="container px-5>';
    echo '<div class="row">';
        echo '<div class="col-8 mx-auto mb-4">';
            if ($answeredMotions){
                echo  " <h2>Your answers:</h2> <br> ";
                for ($i=0;$i<count($answeredMotions);$i++){
                    echo $answeredMotions[$i]['content'].': ';
                    if ($answeredMotions[$i]['agree']==1){
                        echo 'I agree <br>';
                        echo '<a href="'.site_url('motion/listOfOpponents/').$answeredMotions[$i]['idMotion'].'">GO</a><br>';
                    } else {
                        echo 'I disagree <br>';
                        echo '<a href="'.site_url('motion/listOfOpponents/').$answeredMotions[$i]['idMotion'].'">GO</a><br>';
                    }
                };
            }
        echo '</div>';
    echo '</div>';
echo '</div>';

?>
