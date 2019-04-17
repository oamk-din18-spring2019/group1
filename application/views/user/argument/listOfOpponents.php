<div class="container">
<h2>Your possible opponents:</h2>
<?php if (isset($opponents[0])){
        foreach ($opponents as $value){
          echo '<h4>'.$value['username'].'</h4>';
        }
      } else {
        echo "<h2>Unfortunately there is no opponent for you :(</h2>";
      }
 ?>
</div>
