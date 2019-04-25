<div class="container">
<form action="<?php echo site_url('user/updateMotionProcedure')?>" method="post">
<label for="idMotion">
<h3> Motion ID <input type="text" name="id" value="<?php echo $motion['0']['idMotion']?>" readonly>  </h3>
</label><br>
<label for="content">
<h3> Content <input type="text" name="content" value="<?php echo $motion['0']['content']?>"> </h3>
</label> <br>
<label for="category">
    <h2> Category
<select id="mounth" name="category"  class="">
    <option value="<?php echo $motion['0']['category'] ?>"><?php echo $motion['0']['category'] ?></option>
    <?php for ($i=0;$i<count($categories);$i++){
    foreach ($categories[$i] as $cat => $value ){
        if ($cat!='idUser' && $cat!=$motion['0']['category'])
        echo '<option value='.$cat.'>'.$cat.'</option>;';
    }
}
?>
</select> </h2>
</label> <br>
<button type="submit" class="btn btn-success">Submit</button>
</form>
</div>
