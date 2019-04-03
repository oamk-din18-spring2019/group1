<?php include("headerProfile.php") ?>
    <!-- Your profile is here
Hello  -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="https://im0-tub-ru.yandex.net/i?id=f863e4b6e729c52c6d2c53e8428ff71f&n=13&exp=1" alt="avatar">
            </div>
            <div class="col-md-6 text-left">
                <h2>
                    Username: 
                    <?php echo $_SESSION["username"] ?> <br>
                    Date of registration:
                    <?php echo $time?>

                </h2>
            </div>
        </div>
    </div>
    <hr>
  
<?php include("footerProfile.php") ?>