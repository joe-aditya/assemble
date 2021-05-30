<?php
session_start();
include '../layerAuthentication/config.php';
if(!isset($_SESSION['uname'])){
echo "<script>window.location.href='../layerAuthentication/login.php';</script>";//BRO
}else{
  $uname=$_SESSION['uname'];
  $dp=$_SESSION['dp'];
  $teamid = $_POST["teamid"];

  $res = mysqli_query($con, "SELECT * FROM team WHERE teamid = $teamid;");
  $row = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<!-- profile setup 1 | only for first time Login into acc untill the fields are filled-->
<html>

<head>
  <meta charset="utf-8">
  <title>@<?php echo $uname; ?> | Edit My Team Details</title>
  <meta name="viewpoint" content="width=device-width;initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="dashboard.css">

<script>

$(document).ready(function(){
    $(function() {
       $('#submit2').click(function(e) {
            e.preventDefault();
            $("#editPage").submit();
        });
    });
});

  function updateTeamDetails(){
            $('#erTeamName').html("");
            $('#erPurpose').html("");
            $('#erSkills').html("");
            $('#erCriteria').html("");

            var flag = 1;
            var team_name = $('#team_name').val();
            var purpose = $('#purpose').val();
            var skills_needed = $('#skills_needed').val();
            var criteria = $('#criteria').val();
            var members_needed = $('#members_needed').val();
            var teamid = "<?php echo $teamid; ?>";
            var announcement = $('#announcement').val();

            if(!(team_name)) {flag = 0;
                 $('#erTeamName').html('Please Enter Team Name');
            }
            if(!(purpose)) {flag = 0;
                 $('#erPurpose').html('Please Enter Purpose');
            }
            if(!(skills_needed)) {flag = 0;
                 $('#erSkills').html('Please Enter Skills you are looking for');
            }
            if(!(criteria)) {flag = 0;
                 $('#erCriteria').html('Please Enter Criteria');
            }
            if(!(announcement)) {
                 announcement="Further details will be shared soon in this section.";
            }

            if(flag) {
                  $.post('myTeams_update.php', {
                      announcement: announcement,
                      team_name: team_name,
                      teamid: teamid,
                      skills_needed: skills_needed,
                      purpose: purpose,
                      criteria: criteria,
                      members_needed: members_needed
                  }, function (result){
                      $("#erTeamName").html(result);
                  })
            }
  }

  <?php
      $ress = $con->query("SELECT * FROM report
                           WHERE reported_on = '".$teamid."'
                           AND status = 0;");
      $countt = mysqli_num_rows($ress);
  ?>

  function deleteTeam(){

      var countt = "<?php echo $countt; ?>";
      var count = "<?php echo $row['members_in_team']; ?>";

      if(count>0){
            $('#erDelete').html('Cannot Delete this Team!!! Remove all the members to delete this team.');
      }
      else if(countt>0){
            $('#erDelete').html('Cannot Delete this Team!!! Team is under review.');
      }
      else{
            var teamid = "<?php echo $teamid; ?>";
            $.post('api/deleteTeam.php', {
                teamid: teamid,
            }, function (result){
                $('#erDelete').html(result);
                console.log(status);
            })
        }
  }
</script>

</head>

<body>
  <div class="headerrr">
    <p class="header_textt glow">ASSEMBLE</p>
  </div>

  <div class="bs-example">
    <nav class="navbar navbar-expand-md droop navbar-dark">

      <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
        <div class="navbar-nav; style:bottom">
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>

      <div class="navbar-nav">
        <a href="../layerAuthentication/logout.html"><input type="button" class="outbtn" value="Logout"></a>
      </div>
    </nav>
  </div>

  <div class="container" id="sidebar">
    <div class="row">
      <ul>
        <div class="d-flex justify-content-center" style="padding:20px 0px 10px 0px;">
          <div class="brand_logo_container">
            <img src="img2/<?php echo $dp; ?>">
          </div>
        </div>

        <p class="uname_box" style="height:31px; width:220px; margin-bottom: 12px;">
          @<?php echo $uname; ?>
        </p>
        <br>

        <form action="myTeams_manage.php" method="POST" id="editPage">
          <input type="hidden" name="teamid" value="<?php echo $row['teamid']; ?>"/>
        </form>

        <a href="#" id="submit2">
          <li><i class="fas fa-arrow-left" style="font-size:25px;"> Back</i></li>
        </a>
        <br>
        <button onclick='document.getElementById("leaveOption").style.display= "block";' class="leave">
          <i class="fas fa-users-slash" style="font-size:25px;"> Delete Team</i>
        </button>

        <div id="leaveOption" style="display:none;">
        <button onclick='document.getElementById("leaveOption").style.display= "none";' class="halfl">
          <i class="fas fa" style="font-size:25px;"> Cancel</i>
        </button>
        <button onclick="deleteTeam()" class="halfl">
          <i class="fas fa" style="font-size:25px;"> Delete</i>
        </button>


      </div>

      </ul>
    </div>
  </div>


  <div class="grid-container">
    <div class="grid-item">
      <div class="card" style="background-color: inherit; padding: 33px 60px 12px 60px;">
        <div class="col-sm-12">
          <div class="row">

            <div class="col-sm-7">
              <div class=" cardd container">
                <h2>TEAM DETAILS</h2>
                <hr>
                <div class="txtscroll" style="height:393px;">
                  <div class="container-fluid p-0" id="enrolledcourses">
                    <div class="container">

                      <div class="row">
                        <div class="txtscroll">

                          <div class="input-group">
                            <div class="input-group-append">
                              <span class="input-group-text" style="width:100px;">Team Name:</span>
                            </div>
                            <textarea class="form-control txtscroll" id="team_name" name="team_name" placeholder="Give a name to your team" style="height:38px; width:510px;"><?php echo $row['team_name']; ?></textarea>
                          </div>

                          <div class="input-group">
                            <div class="input-group-append">
                              <span class="input-group-text" style="width:100px;">Purpose:</span>
                            </div>
                            <textarea class="form-control txtscroll" maxlength=100 id="purpose" name="purpose" rows="4" cols="10" wrap="soft" placeholder="Reason to create this team" style="height:62px; width:510px;"><?php echo $row['purpose']; ?></textarea>
                          </div>

                          <div class="input-group">
                            <div class="input-group-append">
                              <span class="input-group-text" style="width:100px;">Looking for:</span>
                            </div>
                            <textarea class="form-control txtscroll" maxlength=100 id="skills_needed" name="skills_needed" rows="4" cols="10" wrap="soft" placeholder="What skillsets are you looking for!" style="height:85px; width:493px;"><?php echo $row['skills_needed']; ?></textarea>
                          </div>

                          <div class="input-group">
                            <div class="input-group-append">
                              <span class="input-group-text" style="width:100px;">Criteria:</span>
                            </div>
                            <textarea class="form-control txtscroll" maxlength=100 id="criteria" name="criteria" rows="4" cols="10" wrap="soft" placeholder="Mention the experience level you are looking for" style="height:90px; width:493px;"><?php echo $row['criteria']; ?></textarea>
                          </div>

                          <div class="input-group">
                            <div class="input-group-append">
                              <span class="input-group-text" style="width:100px;">Members <br>Needed:</span>
                            </div>
  <?php
    if(!($row['members_in_team'])){
      $min=1;
    }
    else{
      $min=$row['members_in_team'];
    }
  ?>
                              <input type="number" id="members_needed" name="members_needed" style="height:62px; width:510px;" min="<?php echo $min; ?>" max="999" value="<?php echo $row['members_needed']; ?>">
                          </div>

                          <div class="input-group">
                            <input type="button" class="logbtn" onclick='updateTeamDetails()' value="Save Changes">
                          </div>

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- asdfghjklsdfghjklsdfghjm,.dfghjkcvbnm-->

            <div class="col-sm-5">
              <div class=" cardd container">
                <h2>ANNOUNCEMENT</h2>
                <hr>
                <div class="txtscroll" style="height:393px;">
                  <div class="container-fluid p-0" id="enrolledcourses">
                    <div class="container">
                      <div class="row">

                        <div class="input-group">
                          <textarea class="form-control txtscroll" maxlength=100 id="announcement" name="announcement" rows="4" cols="10" wrap="soft" placeholder="Further details will be shared soon in this section." style="height:185px; width:510px;"><?php echo $row['announcement']; ?></textarea>
                        </div>

                        </div>
                        <br>
                                            <p id='erTeamName' style="color:red;"></p>
                                            <p id='erPurpose' style="color:red;"></p>
                                            <p id='erSkills' style="color:red;"></p>
                                            <p id='erCriteria' style="color:red;"></p>
                                            <p id='erDelete' style="color:red;"></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<?php
}
?>
