<?php
/*
session_start();
if(!isset($_SESSION['uname'])){
echo "<script>window.location.href='login.php';</script>";//BRO
}else{
  $uname=$_SESSION['uname'];
*/
?>

<!DOCTYPE html>
<!-- profile setup 1 | only for first time Login into acc untill the fields are filled-->
<html>

<head>
  <meta charset="utf-8">
  <title>Sign Up</title>
  <meta name="viewpoint" content="width=device-width;initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="dashboard.css">
</head>

<body>

  <div class="headerrr">
    <p class="header_textt glow">SKILL BASED TEAM MANAGMENET SYSTEM</p>
  </div>

  <div class="bs-example">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
        <div class="navbar-nav; style:bottom">
          <input type="button" class="btn btn-info" value="Music">
          <input type="button" class="btn btn-info" value="Programming">
          <input type="button" class="btn btn-info" value="Sports">
          <input type="button" class="btn btn-info" value="Filmaking">
          <input type="button" class="btn btn-info" value="Artwork">
          <input type="button" class="btn btn-info" value="Global">
        </div>
      </div>

      <div class="navbar-nav">
        <a href="../layerAuthentication/logout.html"><input type="button" class="outbtn" value="Logout"></a>
      </div>
    </nav>
  </div>

  <div class="container" id="sidebar">
    <div class="row">
      <h1>HELLO</h1>
      <ul>
        <div class="d-flex justify-content-center">
          <div class="brand_logo_container">
            <img src="img2/avatar.png" height="150px" width="150px">
          </div>

        </div>
        <a href="editProfile.html">
          <li>EDIT PROFILE</li>
        </a>
        <a href="editSkills.html">
          <li>EDIT SKILLS</li>
        </a>
        <a href="createTeam.html">
          <li>CREATE A TEAM</li>
        </a>
      <a href="myTeams.html">
          <li>MY TEAMS</li>
        </a>
        <a href="myRequests.html">
          <li>MY REQUESTS</li>
        </a>
        <a href="teamsJoined.html">
          <li>TEAMS JOINED</li>
        </a>
      </ul>
    </div>
  </div>

  <div class="container" id="sidebar-right">
    <div class="row">
      <div class="cardd-r">
        <h2>TEAM DETAILS</h2>


          <!--<h5>ADD TEAM</h5>-->
<div style="padding:0px 40px 10px 40px;">
          <div class="input-group">
            <div class="input-group">
              <span class="input-group"></span>
            </div>
            <p>Vacancy: 3/8</p>
          </div>

          <div class="input-group">
            <div class="input-group">
              <span class="input-group">Criteria:</span>
            </div>

          <p class="form-control txtscroll" style="height:100px;" >skills from sssssssssssssssssssssssssssss dddddddddddddddddddddddddddddd dddddddddddddddddddddddddddd dddddddddddddddddddddddddddddd dddddddddddddddddddddddddddddddddd ddddddddddddddddddddddddd ssssssssssssssssssssssssss sssssssssssssssssssssssssssssssssssssssssssssssssss </p>
          </div>

          <div class="input-group" style="padding:10px 0px 0px 0px;">
            <div class="input-group">
              <span class="input-group">Team members:</span>
            </div>

          <p class="form-control txtscroll" style="height:60px;" >skills from sssssssssssssssssssssssssssss ddddddddddddddddddddddddddddddddddddddddddd ssssssssssssssssssssssssssssssssssss sssssssssssssssssssssssssssssssssssssssss </p>
          </div>

          <div class="input-group" style="padding:10px 0px 0px 0px;">
            <div class="input-group">
              <span class="input-group">My Request Message:</span>
            </div>
            <input type="text" class="form-control input_pass" value="" placeholder="Hey! I'd like to join your team.">
          </div>

      </div>

      <div class="d-flex justify-content-center  login_container">
        <input type="submit" class="logbtn1" value="JOIN">
      </div>

    </div>
  </div>
</div>



    <div class="grid-container" >
      <div class="grid-item" >
        <div class="card" style="background-color: inherit; padding: 33px 60px 37px 60px;">
          <div class=" cardd container">
            <div class="row">
              <div class="col-sm-12">
                <div class="d-flex justify-content-center">
                  <div class="brand_logo_container">

                  </div>
                </div>

              <h3 style="display:inline">TEAM:</h3> <h4 style="display:inline">Team_Name</h4>

        <!--        <div class="d-flex justify-content-center form_container">
                  <form> -->

                    <div class="input-group">
                      <div class="input-group-append">
                        <span class="input-group-text">Purpose:</span>
                      </div>
                      <p class="form-control txtscroll" style="height:62px;" > 62px for 2 lines n anything more will be scrollable sssssssssssssssssssssssssssss dddddddddd sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss </p>
                    </div>

                    <div class="input-group">
                      <div class="input-group-append">
                        <span class="input-group-text">Looking for:</span>
                      </div>
                      <p class="form-control txtscroll" style="height:86px;" > 86px for 2 lines n anything more will be scrollable skills from ssdd qqqqqqqqqqqqqqqqqqqqqqqqerfgvbhnjhgfdszxcvbnmjhgfdsasdfghjkmnbvcxzsxdcfghujikopoiuytrewertyuj </p>
                    </div>
        <!--          </form>
        </div>  -->
<hr>

                  <h5 style="display:inline">CREATOR:</h5> <h5 style="display:inline">creator_name</h5>

                  <div class="input-group">
                    <div class="input-group-append">
                      <span class="input-group-text">About:</span>
                    </div>
                    <p class="form-control txtscroll" style="height:86px;" >
                      Bio: <br> skills from sssssssssssssssssssssssssssss ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
                      <br>Skills:<br> dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
                      <br>Previous Works:<br> dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
                    </p>
                  </div>

                  <div class="input-group">
                    <div class="input-group-append">
                      <span class="input-group-text">Contact:</span>
                    </div>
                    <p class="form-control txtscroll" style="height:62px;" >Phone Number: 9876543210 <br> Mail-ID: creator@mail.com  </p>
                  </div>
              </div>
            </div>
            <br>
            <div class="row d-flex justify-content-center">
            <input type="button" class="logbtn1" onclick=prvs() value="Prvs">
            <input type="button" class="logbtn2" onclick=next() value="Next">
          </div>
          </div>

        </div>
      </div>
    </div>
</body>

</html>

<?php
/*
}
*/
?>
