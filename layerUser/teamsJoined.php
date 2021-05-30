<?php
session_start();
include '../layerAuthentication/config.php';
if(!isset($_SESSION['uname'])){
echo "<script>window.location.href='../layerAuthentication/login.php';</script>";//BRO
}else{
  $uname=$_SESSION['uname'];
  $userid=$_SESSION['userid'];
  $dp=$_SESSION['dp'];
?>

<!DOCTYPE html>
<!-- profile setup 1 | only for first time Login into acc untill the fields are filled-->
<html>

<head>
  <meta charset="utf-8">
  <title>@<?php echo $uname; ?> | Teams Joined</title>
  <meta name="viewpoint" content="width=device-width;initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="dashboard.css">

  <script>

    function sort(domain){
      $.post('api/sort_teamsJoined.php', {
          domain: domain
      }, function (result){
          $('#joinedboxes').html(result);
          console.log(status);
      })
    }

    $(document).ready(function(){
      sort("All Teams");
    })

    function viewTeamDetails() { window.location.href = "viewTeamDetails.php"; }
  </script>

</head>

<body>

  <div class="headerrr">
    <p class="header_textt glow">ASSEMBLE</p>
  </div>

  <div class="bs-example">
    <nav class="navbar navbar-expand-md droop navbar-dark">
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
        <div class="navbar-nav; style:bottom">
          <input type="button" class="btn btn-info" value="All Teams" onclick="sort(this.value)">
          <input type="button" class="btn btn-info" value="Music" onclick="sort(this.value)">
          <input type="button" class="btn btn-info" value="Programming" onclick="sort(this.value)">
          <input type="button" class="btn btn-info" value="Sports" onclick="sort(this.value)">
          <input type="button" class="btn btn-info" value="FilmMaking" onclick="sort(this.value)">
          <input type="button" class="btn btn-info" value="COVID-19" onclick="sort(this.value)">
          <input type="button" class="btn btn-info" value="Global" onclick="sort(this.value)">
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

        <a href="myTeams.php">
          <li><i class="fas fa-users" style="font-size:25px;"> My Teams</i></li>
        </a>

        <a href="createTeam.php">
          <li><i class="fas fa-plus" style="font-size:25px;"> Create Team</i></li>
        </a>
        <a href="dashboard.php">
          <li><i class="fas fa-house-user" style="font-size:25px;"> Dashboard</i></li>
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

              <h2 style="display:inline; padding-left: 13px;">Teams Joined</h2>
              <hr>

              <div class="txtscroll" style="height:393px;">

                <div class="container-fluid p-0" id="enrolledcourses">
                  <div class="container">
                    <div class="row" id="joinedboxes">

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
