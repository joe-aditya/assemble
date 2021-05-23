
<?php
session_start();
if(!isset($_SESSION['uname'])){
echo "<script>window.location.href='login.php';</script>";//BRO
}else{
  $uname=$_SESSION['uname'];

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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="dashboard.css">

  <script>
    function viewMyTeam() {
      window.location.href = "viewMyTeam.html";
    }
  </script>

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
          <!--
          <input type="button" class="btn btn-info" value="All Teams">
          <input type="button" class="btn btn-info" value="Music">
          <input type="button" class="btn btn-info" value="Programming">
          <input type="button" class="btn btn-info" value="Sports">
          <input type="button" class="btn btn-info" value="Filmaking">
          <input type="button" class="btn btn-info" value="Artwork">
          <input type="button" class="btn btn-info" value="Global">
          -->
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
            <img src="img2/avatar.png">
          </div>
        </div>

        <p class="uname_box" style="height:31px; width:220px; margin-bottom: 12px;">
          @<?php echo $uname;?>
        </p>

        <a href="dashboard.php">
            <li><i class="fas fa-house-user" style="font-size:25px;"> Dashboard</i></li>
          </a>
          <a href="createTeam.html">
            <li><i class="fas fa-plus" style="font-size:25px;"> Create Team</i></li>
          </a>
          <a href="teamsJoined.html">
            <li><i class="fas fa-project-diagram" style="font-size:25px;"> Teams Joined</i></li>
          </a>
          <a href="myRequests.html">
            <li><i class="fas fa-envelope" style="font-size:25px;"> Sent Requests</i></li>
          </a>
          <a href="editSkills.html">
            <li><i class="fas fa-edit" style="font-size:25px;"> Update Skills</i></li>
          </a>
          <a href="editProfile.html">
            <li><i class="fas fa-user-cog" style="font-size:25px;"> My Profile</i></li>
          </a>
      </ul>
    </div>
  </div>

  <div class="grid-container">
    <div class="grid-item">
      <div class="card" style="background-color: inherit; padding: 33px 60px 37px 60px;">
        <div class=" cardd container">
          <div class="row">
            <div class="col-sm-12">
              <div class="d-flex justify-content-center">
                <div class="brand_logo_container">

                </div>
              </div>

              <h2 style="display:inline; padding-left: 13px;"><img src="../home/logoooo.png" height="50px" width="50px">SSEMBLED | <a href="myTeams.html">My Teams</a> </h2>
              <hr>

              <div class="txtscroll" style="height:381px;">

                <div class="container-fluid p-0" id="enrolledcourses">
                  <div class="container">
                    <div class="row">

                      <div class="col-md-3 myteambox">
                        <form>
                          <h5>
                            <center>Team_Name</center>
                          </h5>
                          <p class="form-control txtscroll myteam_purpose" style="height:80px; margin-bottom: 8px;">
                            62px for 2 lines n anything more will be scrollable sssssssssssssssssssssssssssss dddddddddd sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
                          </p>
                              <input type="button" id="view_my_team" class="myteam_btn" onclick=viewMyTeam() value="View Team">
                        </form>
                      </div>

                      <div class="col-md-3 myteambox">
                        <form>
                          <h5>
                            <center>Team_Name</center>
                          </h5>
                          <p class="form-control txtscroll myteam_purpose" style="height:80px; margin-bottom: 8px;">
                            62px for 2 lines n anything more will be scrollable sssssssssssssssssssssssssssss dddddddddd sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
                          </p>
                          <i class="fas fa-eye" style="font-size:30px;"></i>
                        </form>
                      </div>

                    </div>
                  </div>

                </div>
                <!-- asdfghjklsdfghjklsdfghjm,.dfghjkcvbnm-->
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