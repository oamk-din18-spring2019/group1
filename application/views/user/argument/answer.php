<?php
echo "You choosed " . $category . " <br>";
echo "Your question is " . $question;
?>
<h2> Do you agree?</h2>
<form class="text-left" method="POST" action="user/getAnswer">
    <input type="submit" class="btn btn-success" id="BoxSelect" value="Submit">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="defaultChecked" name="defaultExampleRadios" checked>
        <label class="custom-control-label" for="defaultChecked">Yes,I agree</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="defaultUnchecked" name="defaultExampleRadios">
        <label class="custom-control-label" for="defaultUnchecked">No, I disagree</label>
    </div>  
</form>