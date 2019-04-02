<!-- TopNavbar goes here -->
<!-- SideNavBar -->


<div class="container">
    <h2>Your Friends:</h2>
</div>
<div class="container friendList">
    <table>
        <?php 
            foreach ($friends as $row)
            {
                echo '<tr>';
                    echo '<td>'.'<a href="<?php echo site_url(#)"'.$row['username'].'</a>'.'</td>';
                    echo '<td><a href="'.site_url('#').$row['idUser'].'">DELETE</a></td>';
                echo '</tr>';
            }
        ?>
    </table>
    <ul>
        <li> <a href=" <?php echo site_url('#'); ?>">Someone</a> </li>
        <li> <a href=" <?php echo site_url('#'); ?>">Someone1</a> </li>
        <li> <a href=" <?php echo site_url('#'); ?>">Someone2</a> </li>
        <li> <a href=" <?php echo site_url('#'); ?>">Someone3</a> </li>
        <li> <a href=" <?php echo site_url('#'); ?>">Someone4</a> </li>
        <li> <a href=" <?php echo site_url('#'); ?>">Someone5</a> </li>
    </ul>

</div>

<!-- footer -->