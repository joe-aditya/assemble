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

  $res1 = mysqli_query($con, "SELECT * FROM user U
                              INNER JOIN skill S
                              ON U.userid = S.userid
                              WHERE U.userid = '".$row["creatorid"]."';");
  $row1 = mysqli_fetch_assoc($res1);
?>

<!DOCTYPE html>
<!-- profile setup 1 | only for first time Login into acc untill the fields are filled-->
<html>

<head>
  <meta charset="utf-8">
  <title>@<?php echo $uname; ?> | View Team Details</title>
  <meta name="viewpoint" content="width=device-width;initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="dashboard.css">

<script>

  function viewU(uname){
    $('#modalTitle').html("User Profile");
    var teamid = "<?php echo $teamid; ?>";
    $.post('api/view_UserProfile.php', {
        uname: uname,
        teamid: teamid,
    }, function (result){
        $('#modalBody').html(result);
        console.log(status);
    })
  }

  function reportT(uname){
    $('#modalTitle').html("Report Team");
    var teamid = "<?php echo $teamid; ?>";
    $.post('api/reportTeam.php', {
        uname: uname,
        teamid: teamid,
    }, function (result){
        $('#modalBody').html(result);
        console.log(status);
    })
  }

  function submitReport(){
    var report = $('#reportMsg').val();
    $('#modalTitle').html("Report Team");
    var teamid = "<?php echo $teamid; ?>";

    if(!(report)){
      $('#modalMsg').html("Reason must not be empty");
    }
    else{
        $.post('api/submitReport.php', {
            report: report,
            teamid: teamid,
        }, function (result){
            $('#modalMsg').html(result);
            console.log(status);
        })
      }
  }

  function leaveTeam(){
    var teamid = "<?php echo $teamid; ?>";
    $.post('viewTeamDetails_leaveTeam.php', {
        teamid: teamid
    }, function (result){
        $('').html(result);
        console.log(status);
    })
    window.location.href='teamsJoined.php';
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
        <a href="teamsJoined.php">
          <li><i class="fas fa-arrow-left" style="font-size:25px;"> Back</i></li>
        </a>
        <br>
        <a data-toggle="modal" data-target="#myModal" href="#">
          <li><i class="fas fa-bookmark" onclick="reportT('<?php echo $row1["uname"]; ?>')" style="font-size:25px;"> Report Team</i></li>
        </a>
        <br>
        <button onclick='document.getElementById("leaveOption").style.display= "block";' class="leave">
          <i class="fas fa-running" style="font-size:25px;"> Leave Team</i>
        </button>

        <div id="leaveOption" style="display:none;">
        <button onclick='document.getElementById("leaveOption").style.display= "none";' class="halfl">
          <i class="fas fa" style="font-size:25px;"> Cancel</i>
        </button>
        <button onclick="leaveTeam()" class="halfl">
          <i class="fas fa" style="font-size:25px;"> Leave</i>
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

                          <h4 style="display:inline">TEAM:</h4>
                          <h4 style="display:inline"><?php echo $row['team_name']; ?></h4>

                          <div class="input-group">
                            <div class="input-group-append">
                              <span class="input-group-text" style="width:100px;">Purpose:</span>
                            </div>
                            <p class="form-control txtscroll" style="height:62px; width:510px;">
                                <?php echo $row['purpose']; ?>
                            </p>
                          </div>

                          <div class="input-group">
                            <div class="input-group-append">
                              <span class="input-group-text" style="width:100px;">Looking for:</span>
                            </div>
                            <p class="form-control txtscroll" style="height:86px; width:493px;">
                                <?php echo $row['skills_needed']; ?>
                            </p>
                          </div>

                        </div>
                      </div>

                      <div class="row" style="margin-top: 10px;">
                        <h4 style="text-align:center;">ANNOUNCEMENTS:</h4>
                        <div class="input-group">
                          <p class="form-control txtscroll" style="display:inline; height:165px;">
                                <?php echo $row['announcement']; ?>
                          </p>
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
                <h2>TEAM MEMBERS</h2>
                <hr>
                <div class="txtscroll" style="height:393px;">
                  <div class="container-fluid p-0" id="enrolledcourses">
                    <div class="container">
                      <div class="row">

                        <h5 style="display:inline">CREATOR:</h5>
                        <h5 style="display:inline">@<?php echo $row1["uname"]; ?></h5>

                        <div class="input-group">
                          <div class="input-group-append">
                            <span class="input-group-text">
                            <a data-toggle="modal" data-target="#myModal" href="#">
                              <img src="img2/<?php echo $row1['dp']; ?>" onclick="viewU('<?php echo $row1['uname']; ?>')" height="70px" width="70px" style="border-radius: 50%;">
                            </a>
                            </span>
                          </div>
                          <p class="form-control txtscroll" style="display:inline; height:86px;">
                            Bio: <br> <?php echo $row1["bio"]; ?>
                            <br>Skills:<br> <?php echo $row1["skills"]; ?>
                            <br>Previous Works:<br> <?php echo $row1["works"]; ?>
                          </p>
                        </div>

                        <div class="input-group">
                          <div class="input-group-append">
                            <span class="input-group-text" style="width:96px;">Contact:</span>
                          </div>
                          <p class="form-control txtscroll" style="height:62px;">
                            Phone Number: <?php echo $row1["phno"]; ?>
                            <br> Mail-ID: <?php echo $row1["mail"]; ?>
                          </p>
                        </div>

                      </div>

                      <div class="row" style="margin-top: 10px;">

                        <h5 style="display:inline">MEMBERS :  (<?php echo $row['members_in_team']; ?> / <?php echo $row['members_needed']; ?>)</h5>
                        <p> </p>
<?php
$res2 = mysqli_query($con,"SELECT *
                           FROM user U
                           INNER JOIN team_member M
                           ON U.userid = M.userid
                           WHERE M.teamid = '".$teamid."'
                           AND M.status = 1;");

while($row2 = $res2->fetch_assoc()){
?>
                        <div class="input-group">
                          <div class="input-group-append">
                            <span class="input-group-text">
                            <a data-toggle="modal" data-target="#myModal" href="#">
                              <img src="img2/<?php echo $row2['dp']; ?>" onclick="viewU('<?php echo $row2['uname']; ?>')" height="70px" width="70px" style="border-radius: 50%;">
                            </a>
                            </span>
                          </div>
                          <p class="form-control txtscroll" style="height:86px;">
              						  	Username: @<?php echo $row2["uname"]; ?> <br>
              						  	Phone Number: <?php echo $row2["phno"]; ?> <br>
              						  	Mail-ID: <?php echo $row2["mail"]; ?>
              						</p>
                        </div>
<?php
}
?>
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

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modalTitle">User Profile</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div id="modalBody">

          </div>
        </div>

        <!-- Modal footer -->

      </div>
    </div>
  </div>


</body>

</html>
<?php
}
?>
