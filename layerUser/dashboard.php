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

<head>
  <meta charset="utf-8">
  <title>@<?php echo $uname; ?> | Dashboard</title>
  <meta name="viewpoint" content="width=device-width;initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="dashboard.css">
</head>

<body>

  <div class="headerrr">
    <p class="header_textt glow">ASSEMBLE</p>
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
      <!--  <h2 style="padding-top:8px;">DASHBOARD</h2> -->
      <ul>
        <div class="d-flex justify-content-center" style="padding:20px 0px 10px 0px;">
          <div class="brand_logo_container">
            <img src="img2/<?php echo $dp; ?>">
          </div>
        </div>

        <p class="uname_box" style="height:31px; width:220px; margin-bottom: 12px;">
          @<?php echo $uname;?>
        </p>

        <a href="myTeams.php">
          <li><i class="fas fa-users" style="font-size:25px;"> My Teams</i></li>
        </a>

        <a href="createTeam.php">
          <li><i class="fas fa-plus" style="font-size:25px;"> Create Team</i></li>
        </a>
        <a href="teamsJoined.php">
          <li><i class="fas fa-project-diagram" style="font-size:25px;"> Teams Joined</i></li>
        </a>
        <a href="myRequests.php">
          <li><i class="fas fa-envelope" style="font-size:25px;"> Sent Requests</i></li>
        </a>
        <a href="editSkills.php">
          <li><i class="fas fa-edit" style="font-size:25px;"> Update Skills</i></li>
        </a>
        <a href="editProfile.php">
          <li><i class="fas fa-user-cog" style="font-size:25px;"> My Profile</i></li>
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

            <p class="form-control txtscroll" style="height:100px;">skills from sssssssssssssssssssssssssssss dddddddddddddddddddddddddddddd dddddddddddddddddddddddddddd dddddddddddddddddddddddddddddd dddddddddddddddddddddddddddddddddd
              ddddddddddddddddddddddddd ssssssssssssssssssssssssss sssssssssssssssssssssssssssssssssssssssssssssssssss </p>
          </div>

          <div class="input-group" style="padding:10px 0px 0px 0px;">
            <div class="input-group">
              <span class="input-group">Team members:</span>
            </div>

            <p class="form-control txtscroll" style="height:60px;">skills from sssssssssssssssssssssssssssss ddddddddddddddddddddddddddddddddddddddddddd ssssssssssssssssssssssssssssssssssss sssssssssssssssssssssssssssssssssssssssss </p>
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

  <div class="grid-container">
    <div class="grid-item">
      <div class="card" style="background-color: inherit; padding: 33px 60px 37px 60px;">
        <div class=" cardd container" style="width: 742px;">
          <div class="row">
            <div class="col-sm-12">
              <div class="d-flex justify-content-center">
                <div class="brand_logo_container">

                </div>
              </div>

              <h3 style="display:inline">TEAM:</h3>
              <h4 style="display:inline">Team_Name</h4>

              <!--        <div class="d-flex justify-content-center form_container">
                  <form> -->

              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text" style="width:108px;">Purpose:</span>
                </div>
                <p class="form-control txtscroll" style="height:62px;"> 62px for 2 lines n anything more will be scrollable sssssssssssssssssssssssssssss dddddddddd sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss </p>
              </div>

              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text" style="width:108px;">Looking for:</span>
                </div>
                <p class="form-control txtscroll" style="height:86px;"> 86px for 2 lines n anything more will be scrollable skills from ssdd qqqqqqqqqqqqqqqqqqqqqqqqerfgvbhnjhgfdszxcvbnmjhgfdsasdfghjkmnbvcxzsxdcfghujikopoiuytrewertyuj </p>
              </div>
              <!--          </form>
        </div>  -->
              <hr>

              <h5 style="display:inline">CREATOR:</h5>
              <h5 style="display:inline">creator_name</h5>

              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text" style="width:108px;">About:</span>
                </div>
                <p class="form-control txtscroll" style="height:86px;">
                  Bio: <br> skills from sssssssssssssssssssssssssssss ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
                  <br>Skills:<br> dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
                  <br>Previous Works:<br> dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
                </p>
              </div>

              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text" style="width:108px;">Contact:</span>
                </div>
                <p class="form-control txtscroll" style="height:62px;">Phone Number: 9876543210 <br> Mail-ID: creator@mail.com </p>
              </div>
            </div>
          </div>
          <br>
          <div class="row d-flex justify-content-center">
            <input type="button" class="logbtn1" onclick=prvs() value="Prvs"> <pre>   </pre>
            <input type="button" class="logbtn2" onclick=next() value="Next">
          </div>
        </div>

      </div>
    </div>
  </div>
</body>

</html>

<?php

}

?>
