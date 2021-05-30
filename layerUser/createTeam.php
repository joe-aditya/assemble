<?php

session_start();
if(!isset($_SESSION['uname'])){
echo "<script>window.location.href='../layerAuthentication/login.php';</script>";//BRO
}else{
  $uname=$_SESSION['uname'];
  $dp=$_SESSION['dp'];
?>

<!DOCTYPE html>
<!-- profile setup 1 | only for first time Login into acc untill the fields are filled-->
<html>
<!-- if this setup is done, redirect to setup_profile_2.html -->

<head>
  <meta charset="utf-8">
  <title>@<?php echo $uname; ?> | Create Team</title>
  <meta name="viewpoint" content="width=device-width;initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="dashboard.css">

  <script>
  function dataCheck(){
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

            if(flag) {

                  $.post('createTeam_insert.php', {
                      team_name: team_name,
                      skills_needed: skills_needed,
                      purpose: purpose,
                      criteria: criteria,
                      members_needed: members_needed
                  }, function (result){
                      $("#erTeamName").html(result);
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
          @<?php echo $uname;?>
        </p>
        <br>
        <a href="dashboard.php">
          <li><i class="fas fa-house-user" style="font-size:25px;"> Dashboard</i></li>
        </a>
      </ul>
    </div>
  </div>

  <div>

    <form style="padding:12px 30px 0px 30px; margin-top: 18px;  height: 540px;" class="editform">
      <h1>Create your Team</h1>
      <div class="scroll">
        <div class="txtb">Team Name:
          <input type="text" id="team_name" name="team_name" placeholder="Give a name to your team" />
        </div>

        <div class="txtb">Purpose:<br>
          <textarea maxlength=100 id="purpose" name="purpose" rows="2" cols="10" wrap="soft" placeholder="Reason to create this team"></textarea><!-- CSS - placeholder text isnt visible by default-->
        </div>

        <div class="txtb">Skillset needed:
          <textarea maxlength=100 id="skills_needed" name="skills_needed" rows="4" cols="10" wrap="soft" placeholder="What skillsets are you looking for!"></textarea>
      </div><!--BRO - Only 50 character is accepted in the form-->
        <div class="txtb">Criteria:
          <textarea maxlength=100 id="criteria" name="criteria" rows="4" cols="10" wrap="soft" placeholder="Mention the experience level you are looking for"></textarea>
        </div>
        <div class="txtb">Number of members needed:
          <input type="number" id="members_needed" name="members_needed" style="border-style: groove;" min="1" max="999" value="1">
        </div>
      </div>

      <input type="button" class="logbtn" onclick="dataCheck()" value="Create">
      <!--cancel button works if window.alert is in func orelse it works as submit which still kinda works-->
    </form>

  </div>


  <div class="container" id="sidebar-right" style="width:250px;">
    <div class="row">
      <div class="cardd-r" style="width:213px; margin-top:75px;">

        <div style="padding-left: 95px; margin-top: -5px;">
          <i class="fas fa-info-circle" style="font-size:25px;"></i>
        </div>
        <div style="margin-left:25px; margin-top:30px;">
            <p id='erTeamName' style="color:red;"></p>
            <p id='erPurpose' style="color:red;"></p>
            <p id='erSkills' style="color:red;"></p>
            <p id='erCriteria' style="color:red;"></p>
      </div>
      </div>
    </div>
  </div>

</body>

</html>

<?php
}
 ?>
