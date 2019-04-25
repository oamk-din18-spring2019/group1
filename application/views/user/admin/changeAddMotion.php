<form method="post" action="<?php echo site_url('user/addMotionProcedure')?>">
<select id="mounth" name="category" class="">
    <option value="hide">-- Choose category --</option>
    <?php for ($i=0;$i<count($categories);$i++){
    foreach ($categories[$i] as $cat => $value ){
        if ($cat!='idUser')
        echo '<option value='.$cat.'>'.$cat.'</option>;';
        
    }
}
?>
</select> 
<br>
<textarea type="text" col="10" cols="30" name="motionDescription"> </textarea>
<button type="submit" class="btn btn-success"></button>
<form>