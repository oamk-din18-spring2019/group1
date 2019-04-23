<div class="container">
    <h1 class="text-center my-4">There are your achievements</h1>
    <div class="row">
    <div class="col-md-4">
            <div class="card">
                <i class="fas fa-stopwatch fa-5x text-center mt-4"></i>
                <div class="card-body text-center">
                    <h2 class="card-title"> <?php if($statistics['time']==1){echo $statistics['time'].' day';} else {echo $statistics['time'].' days';} ?> </h2>
                    You have spent with us
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <i class="fas fa-users fa-5x text-center mt-4"></i>
                <div class="card-body text-center">
                    <h2 class="card-title">  <?php echo ($statistics['following']);?> people<br></h2>
                    are followed by you
                </div>

            </div>
        </div>
  
        <div class="col-md-4">
            <div class="card">
                <i class="fas fa-question fa-5x text-center mt-4"></i>
                <div class="card-body text-center">
                    <h2 class="card-title">  <?php echo ($statistics['numberOfAnsweredOpinions']) ?>  answers <br></h2>
                   were given by you
                </div>

            </div>
        </div>
        </div>
        <div class="row pt-3">
        <div class="col-md-4">
            <div class="card">
                <i class="fas fa-check fa-5x text-center mt-4"></i>
                <div class="card-body text-center">
                    <h2 class="card-title">  <?php echo ($statistics['numberOfChosenCategories']) ?>  categories <br></h2>
                   were chosen by you
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <i class="fas fa-star fa-5x text-center mt-4"></i>
                <div class="card-body text-center">
                    <h2 class="card-title">  <?php echo ($statistics['rating']) ?>  points <br></h2>
                   you got
                </div>

            </div>
        </div>
        </div>
</div>
