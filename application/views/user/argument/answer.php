<?php
if ($question)
{
    echo '<div class="col-9 col-lg-10 text-left  mt-2 mb-4" id="main">';
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
                            echo "<button type='submit' class='btn btn-outline-dark rounded waves-effect' id='BoxSelect'        value='Submit'>Submit</button>";
                    echo "</form>";
                echo '</div>';
            echo '</div>';
        }
    echo '</div>';
}
?>
