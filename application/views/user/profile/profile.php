<!-- Your profile is here
Hello  -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-4 text-center">
            <div class="container">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-9">
                            <img class="img-fluid text-right rounded z-depth-0 mt-5 mb-5" style="" src="<?php if (isset($_SESSION['image']) && ($_SESSION['image'] != '')) {
                                                                                                            echo base_url("./images/" . $_SESSION['image']);
                                                                                                        } else {
                                                                                                            echo base_url("./images/empty-avatar.jpg");
                                                                       } ?>" alt="avatar"></div>
                    </div>
                    <!-- <div class="col-1"></div> -->
                </div>
            </div>
        </div>
        <!-- <div class="col-md-1"></div> -->
        <div class="col-md-6 text-left mt-4">
            <h1><strong><?php echo $_SESSION["username"] ?></strong></h1>

            <h3>
                <?php
                if ($this->User_model->getRating($_SESSION['username']) >= 0 and $this->User_model->getRating($_SESSION['username']) < 4) {
                    echo "<i class='fas fa-user-graduate my-3'></i> Usual user <br>";
                }
                if ($this->User_model->getRating($_SESSION['username']) < 0) {
                    echo "<i class='far fa-angry my-3'></i> Agressive user <br>";
                }
                if ($this->User_model->getRating($_SESSION['username']) > 4 and $this->User_model->getRating($_SESSION['username']) < 10) {
                    echo "<i class='fas fa-user-tie my-3'></i> Polite user <br>";
                }
                if ($this->User_model->getRating($_SESSION['username']) >= 10) {
                    echo "<i class='fas fa-user-astronaut my-3'></i> Cosmically polite user <br>";
                }
                ?>
                <i class="far fa-calendar-check my-3"></i>
                <?php echo $_SESSION['time'] ?><br>
                <i class="fas fa-star my-3"></i>
                <?php echo $this->User_model->getRating($_SESSION['username']); ?>
            </h3>
            <hr>
            <h2 class="m-2">
                <i class="far fa-comment-alt"></i>
                Motto
            </h2>
            <?php echo '<div class="px-2">' . $motto;
            if ($motto == '') {
                echo '<br>You can add your motto in Settings';
            }
            echo '</div>'; ?>
        </div>
        <div class="container mt-3">
            <hr>
            <div class="row">
                <div class="col-md-6 my-auto">
                    <div class="card-group ">
                        <div class="col-md-4">
                            <a href="<?php echo site_url('user/search'); ?>">
                                <div class="card  ">
                                    <i class="fas fa-user-friends fa-2x  text-center mt-4"></i>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Connect</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="<?php echo site_url("user/achievements") ?>">
                                <div class="card ">
                                    <i class="fas fas fa-trophy fa-2x text-center mt-4"></i>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Statistics</h5>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="<?php echo site_url("user/settings") ?>">
                                <div class="card">
                                    <i class="fas fa-cog fa-2x text-center mt-4"></i>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Settings</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class="m-2">
                        <i class="fas fa-trophy"></i>
                        Achivements
                    </h2>

                    <?php
                    if ($selectedAchievements[0] == "") {
                        echo '
              <div class="px-2">
              You can choose your achievements to show to other people in statistics tab below.
              </div>
            ';
                    }
                    ?>
                    <div class="row border border-dark m-2 rounded p-2" <?php
                                                                        if (array_search("time", $selectedAchievements) === false) {
                                                                            echo "hidden";
                                                                        }
                                                                        ?>>
                        <div class="col-2 my-auto text-center pr-0">
                            <i class="fas fa-stopwatch fa-2x"></i>
                        </div>
                        <div class="col-3 my-auto p-0">
                            <b><?php if ($statistics['time'] == 1) {
                                    echo $statistics['time'] . ' day';
                                } else {
                                    echo $statistics['time'] . ' days';
                                } ?></b>
                        </div>
                        <div class="col-7 my-auto ">
                            This person has joined
                        </div>
                    </div>

                    <div class="row border border-dark m-2 rounded p-2" <?php
                                                                        if (array_search("following", $selectedAchievements) === false) {
                                                                            echo "hidden";
                                                                        }
                                                                        ?>>
                        <div class="col-2 my-auto text-center pr-0">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <div class="col-3 my-auto p-0">
                            <b><?php echo ($statistics['following']); ?>&nbsp;people</b>
                        </div>
                        <div class="col-7 my-auto ">
                            Are stalked by this person
                        </div>
                    </div>

                    <div class="row border border-dark m-2 rounded p-2" <?php
                                                                        if (array_search("numberOfAnsweredOpinions", $selectedAchievements) === false) {
                                                                            echo "hidden";
                                                                        }
                                                                        ?>>
                        <div class="col-2 my-auto text-center pr-0">
                            <i class="fas fa-question fa-2x"></i>
                        </div>
                        <div class="col-3 my-auto p-0">
                            <b><?php echo ($statistics['numberOfAnsweredOpinions']) ?> &nbsp; answers</b>
                        </div>
                        <div class="col-7 my-auto ">
                            Were given by this person
                        </div>
                    </div>

                    <div class="row border border-dark m-2 rounded p-2" <?php
                                                                        if (array_search("numberOfChosenCategories", $selectedAchievements) === false) {
                                                                            echo "hidden";
                                                                        }
                                                                        ?>>
                        <div class="col-2 my-auto text-center pr-0">
                            <i class="fas fa-check fa-2x"></i>
                        </div>
                        <div class="col-3 my-auto p-0">
                            <b><?php echo ($statistics['numberOfChosenCategories']) ?> &nbsp;categories</b>
                        </div>
                        <div class="col-7 my-auto ">
                            Were chosen by this person
                        </div>
                    </div>

                    <div class="row border border-dark m-2 rounded p-2" <?php
                                                                        if (array_search("rating", $selectedAchievements) === false) {
                                                                            echo "hidden";
                                                                        }
                                                                        ?>>
                        <div class="col-2 my-auto text-center pr-0">
                            <i class="fas fa-check fa-2x"></i>
                        </div>
                        <div class="col-3 my-auto p-0">
                            <b><?php echo ($statistics['rating']) ?> &nbsp;points</b>
                        </div>
                        <div class="col-7 my-auto ">
                            This person got
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<hr>