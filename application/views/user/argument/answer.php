<?php
echo "You choosed " . $category . " <br>";
echo "Your question is " . $question;
?>
<h2> Do you agree?</h2>
<form class="text-left" method="POST" action="<?php echo site_url('user/getAnswer')?>">
    <input type="submit" class="btn btn-success" id="BoxSelect" value="Submit">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="defaultChecked" value="1" name="defaultExampleRadios" checked>
        <label class="custom-control-label" for="defaultChecked">Yes,I agree</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="defaultUnchecked" value="0" name="defaultExampleRadios">
        <label class="custom-control-label" for="defaultUnchecked">No, I disagree</label>
    </div>  
</form>