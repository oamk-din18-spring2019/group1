<div class="container my-3">
    <h2>Change the motion</h2>
    <!--Table-->
<table class="table table-hover table-fixed">

<!--Table head-->
<thead>
  <tr>
    <th>#</th>
    <th>Category</th>
    <th>Motion</th>
    <th>Update</th>
    <th>Delete</th>
  </tr>
</thead>

<tbody>
    <?php
    for ($i=0;$i<count($motions);$i++){
        echo "<tr>";
        echo "<th scope='row'>".$motions[$i]['idMotion']."</th>";
        echo  "<td> <strong>".$motions[$i]['category']."<strong></td>";
        echo  "<td>".$motions[$i]['content']."</td>";
        echo  "<td><a class='btn btn-success text-white' href='".site_url('user/updateMotion')."/".$motions[$i]['idMotion']."'> Update</a></td>";
        echo  "<td><a class='btn btn-danger text-white' href='".site_url('user/deleteMotion')."/".$motions[$i]['idMotion']."'> Delete</a></td>";
    }
    ?>
</tbody>
<!--Table body-->

</table>
</div>
<div class="container">
    <!-- <div class="row"> -->
        <h2>Add new motion</h2> 
    <form method="post" action="<?php echo site_url('user/addMotionProcedure')?>">
<select id="mounth" name="category" class="">
    <option value="culture">-- Choose category --</option>
    <?php for ($i=0;$i<count($categories);$i++){
    foreach ($categories[$i] as $cat => $value ){
        if ($cat!='idUser')
        echo '<option value='.$cat.'>'.$cat.'</option>;';
        
    }
}
?>
</select> 
<br>
<div class="col-md-4 my-2 bg-light border-left rounded"><strong>Note!</strong> If you want to add/change the motion don't use ' please </div>
<textarea type="text" col="10" cols="30" name="motionDescription"> </textarea> <br>
<button type="submit" class="btn btn-success">Submit</button>
    </form>
  
<!-- </div> -->
</div>