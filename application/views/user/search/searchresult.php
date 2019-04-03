<hr>
    <h3>Search results</h3>

        <?php
        if(count($cari)>0)
        {
            foreach ($cari as $data) {
            echo $data->username."<br>";
            }
        }
        else
        {
            echo "No result found.";
        }
    ?>
    </div>
    </body>
</html>
