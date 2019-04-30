<script type="text/javascript">
  function checkboxlimit(checkgroup, limit){
    var checkgroup=checkgroup;
    var limit=limit;
    for (var i=0; i<checkgroup.length; i++){
      checkgroup[i].onclick=function(){
      var checkedcount=0;
      for (var i=0; i<checkgroup.length; i++)
        checkedcount+=(checkgroup[i].checked)? 1 : 0;
      if (checkedcount>limit){
        alert("You can only select a maximum of "+limit+" achievements");
        this.checked=false;
        }
      }
    }
  }
</script>
<div class="container">
    <h1 class="text-center mt-4">There are your achievements</h1>
    <h5 class="text-center mb-4">Select 3 achievements you would like to show to the others by selecting the checkbox below them!</h5>
    <?php
    $hidden = array('username' => $_SESSION['username']);
    echo form_open(site_url('user/saveAchievements'), 'name="form_name" id="form_name"', $hidden); ?>
    <div class="row">
    <div class="col-md-4">
            <div class="card">
                <i class="fas fa-stopwatch fa-5x text-center mt-4"></i>
                <div class="card-body text-center">
                    <h2 class="card-title"> <?php if($statistics['time']==1){echo $statistics['time'].' day';} else {echo $statistics['time'].' days';} ?> </h2>
                    You have spent with us
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="time" class="custom-control-input" id="time" 
                        <?php foreach ($selectedAchievements as $key) {
                          if ($key=="time") {echo 'checked';}
                        }
                        ?>
                      />
                      <label class="custom-control-label" for="time"></label></br>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <i class="fas fa-users fa-5x text-center mt-4"></i>
                <div class="card-body text-center">
                    <h2 class="card-title">  <?php echo ($statistics['following']);?> people<br></h2>
                    are followed by you
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="following" class="custom-control-input" id="following"
                        <?php foreach ($selectedAchievements as $key) {
                          if ($key=="following") {echo 'checked';}
                        }
                        ?>
                      />
                      <label class="custom-control-label" for="following"></label></br>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <i class="fas fa-question fa-5x text-center mt-4"></i>
                <div class="card-body text-center">
                    <h2 class="card-title">  <?php echo ($statistics['numberOfAnsweredOpinions']) ?>  answers <br></h2>
                   were given by you
                   <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="numberOfAnsweredOpinions" class="custom-control-input" id="numberOfAnsweredOpinions"
                       <?php foreach ($selectedAchievements as $key) {
                         if ($key=="numberOfAnsweredOpinions") {echo 'checked';}
                       }
                       ?>
                     />
                     <label class="custom-control-label" for="numberOfAnsweredOpinions"></label></br>
                   </div>
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
                   <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="numberOfChosenCategories" class="custom-control-input" id="numberOfChosenCategories"
                       <?php foreach ($selectedAchievements as $key) {
                         if ($key=="numberOfChosenCategories") {echo 'checked';}
                       }
                       ?>
                     />
                     <label class="custom-control-label" for="numberOfChosenCategories"></label></br>
                   </div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <i class="fas fa-star fa-5x text-center mt-4"></i>
                <div class="card-body text-center">
                    <h2 class="card-title">  <?php echo ($statistics['rating']) ?>  points <br></h2>
                   you got
                   <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="rating" class="custom-control-input" id="rating"
                       <?php foreach ($selectedAchievements as $key) {
                         if ($key=="rating") {echo 'checked';}
                       }
                       ?>
                     />
                     <label class="custom-control-label" for="rating"></label></br>
                   </div>
                </div>

            </div>
        </div>
        </div>

        <div class="text-center my-4">
          <input type="submit" name="" class="btn btn-success " value="Save">
        </div>

      </form>
</div>
<script type="text/javascript">
  checkboxlimit(document.forms.form_name, 3);
</script>
