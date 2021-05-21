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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
        <a href="#">
          <li>MY TEAMS</li>
        </a>
        <a href="#">
          <li>MY REQUESTS</li>
        </a>
        <a href="#">
          <li>TEAMS JOINED</li>
        </a>
      </ul>
    </div>
  </div>

  <div class="container" id="sidebar-right">
    <div class="row">
      <div class="cardd-r">
        <h2>TEAM DETAILS</h2>


          <h5>ADD TEAM</h5>
          <div class="input-group">
            <div class="input-group">
              <span class="input-group"></span>
            </div>
            <input type="text" class="form-control input_pass" value="" placeholder="">
          </div>
          <div class="input-group">
            <div class="input-group">
              <span class="input-group"></span>
            </div>
            <input type="text" class="form-control input_pass" value="" placeholder="">
          </div>
          <div class="d-flex justify-content-center  login_container">
            <input type="submit" class="logbtn1" value="SEND REQUEST">

          </div>
    </div>
  </div>
</div>

    <br><br>

    <div class="grid-container" >
      <div class="grid-item" >
        <div class="card" style="padding: 60px 60px 60px 60px;">
          <div class=" cardd container">
            <div class="row">
              <div class="col-sm-12">
                <div class="d-flex justify-content-center">
                  <div class="brand_logo_container">

                  </div>
                </div>

              <h3 style="display:inline">TEAM:</h3> <h4 style="display:inline">Team_Name from DB</h4>

                <div class="d-flex justify-content-center form_container">
                  <form>
<br>
                    <div class="input-group">
                      <div class="input-group-append">
                        <span class="input-group-text">Motive:</span>
                      </div>
                      <p class="form-control " >Purpose from DB<br>sdafghj</p>
                    </div>

                    <div class="input-group">
                      <div class="input-group-append">
                        <span class="input-group-text">Looking for:</span>
                      </div>
                      <p class="form-control " >Skills_needed from DB</p>
                    </div>

                  </form>
                </div>

                  <h3 style="display:inline">CREATOR:</h3> <h4 style="display:inline">creator_name from DB</h4>

                  <div class="input-group">
                    <div class="input-group-append">
                      <span class="input-group-text">skill-set:</span>
                    </div>
                    <p class="form-control " >skills from DB</p>
                  </div>

                  <div class="input-group">
                    <div class="input-group-append">
                      <span class="input-group-text">Contact:</span>
                    </div>
                    <p class="form-control " >skills from ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss </p>
                  </div>
              </div>
            </div>

          </div>
          <div class="row d-flex justify-content-center">
          <input type="button" class="logbtn1" onclick=prvs() value="Prvs">
          <input type="button" class="logbtn2" onclick=next() value="Next">
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
