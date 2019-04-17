<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('bst/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href=" <?php echo base_url('bst/css/mdb.min.css') ?>" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?php echo base_url('bst/css/style.css') ?>" rel="stylesheet">
    <style>
        body {
            background: url(https://images.unsplash.com/photo-1525642351754-db88d9142dee?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1764&q=80) no-repeat center fixed;
            background-size: 100% 100%;
        }
    </style>
</head>

<body>
    <!-- Material form register -->
    <div class="container-fluid col-lg-5 col-md-8 col-sm-12">
    <div class="card centered mt-4 rounded-30" >
        <h5 class="card-header white-text text-center py-4" style="background-color:black;">
            <strong>Sign up</strong>
        </h5>

        <!--Card content-->
        <div class=" card-body px-sm-5  pt-0">

            <!-- Form -->
            <form class="text-center" method="POST" action="add_user" style="color: #757575;">

                <div class="form-row">
                    <div class="col">
                        <!-- First name -->
                        <div class="md-form">
                            <input type="text" id="materialRegisterFormFirstName" class="form-control" name="un" required>
                            <label for="materialRegisterFormFirstName">Username</label>
                        </div>
                    </div>
                </div>

                <!-- E-mail -->
                <div class="md-form mt-0">
                    <input type="email" id="materialRegisterFormEmail" class="form-control" name="em" required>
                    <label for="materialRegisterFormEmail">E-mail</label>
                </div>

                <!-- Password -->
                <div class="md-form">
                    <input type="password" required id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" name="pw1" onkeyup="passwordChecker()">
                    <label for="materialRegisterFormPassword">Password</label>
                </div>


                <!-- Confirm -->
                <div class="md-form">
                    <input type="password" id="materialRegisterFormConfirmPassword" required class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" name="pw2">
                    <label for="materialRegisterFormConfirmPassword">Confirm Password</label>
                    <?php
                    if (isset($message)) {
                        echo " <div class='col-md-12 text-center text-white bg-danger'>" . $message . " </div>";
                    };
                    ?>
                    <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-1">
                        The password has to be at least 8 characters long with at least 1 digit 
                    </small>
                </div>
        
                <!-- Sign up button -->
                <button id="signUp" class="btn btn-success btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" disabled>Sign up</button>
            </form>
            <!-- Social register -->
            <!--
            <p>or sign up with:</p>

            <a type="button" class="btn-floating btn-fb btn-sm">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a type="button" class="btn-floating btn-tw btn-sm">
                <i class="fab fa-twitter"></i>
            </a>
            <a type="button" class="btn-floating btn-li btn-sm">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a type="button" class="btn-floating btn-git btn-sm">
                <i class="fab fa-github"></i>
            </a>
            -->

            <hr>

            <!-- Terms of service -->
            <p>By clicking
                <em>Sign up</em> you agree to our
                <a href="" target="_blank" style="color:#2d72e2;"><strong>terms of service</strong></a>


                <!-- Form -->

        </div>

    </div>
    <script type="text/javascript" src="<?php echo base_url('bst/js/jquery-3.3.1.min.js') ?>"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url('bst/js/popper.min.js') ?>"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('bst/js/bootstrap.min.js') ?>"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('bst/js/mdb.js') ?>"></script>
    <!-- Material form register -->
    <script>
        var myInput = document.getElementById("materialRegisterFormPassword");
        var button = document.getElementById("signUp")
        var passingCharacters = /[A-Za-z]/g;
        var numbers = /[0-9]/g;
        function passwordChecker()
        {
            if (myInput.value.length >= 8 && myInput.value.match(passingCharacters) && myInput.value.match(numbers) )
            {
                button.disabled = false;
                document.getElementById("materialRegisterFormPasswordHelpBlock").innerHTML = "That's right, what a good boy you are";
                document.getElementById("materialRegisterFormPasswordHelpBlock").className = "form-text text-muted mb-1" ;
            }
            else 
            {
                document.getElementById("materialRegisterFormPasswordHelpBlock").className = "col-md-4 text-center text-white bg-danger";
                document.getElementById("materialRegisterFormPasswordHelpBlock").innerHTML = "                        The password has to be at least 8 characters long with at least 1 digit";
            }
        }
        
    </script>
    </div>