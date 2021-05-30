<?php
include '../layerAuthentication/config.php';
session_start();
if(!isset($_SESSION['uname'])){
echo "<script>window.location.href='../layerAuthentication/login.php';</script>";//BRO
}else{

  $uname=$_SESSION['uname'];
  $dp=$_SESSION['dp'];

  $teamid = $_POST["teamid"];
  $qry = "SELECT * FROM team WHERE teamid = $teamid;";
  $res = mysqli_query($con, $qry);
  $row = mysqli_fetch_assoc($res);
  $creatorid = $row["creatorid"];

  $qry1 = "SELECT * FROM user WHERE userid = $creatorid;";
  $res1 = mysqli_query($con, $qry1);
  $row1 = mysqli_fetch_assoc($res1);

  $qry2 = "SELECT * FROM skill WHERE userid = $creatorid;";
  $res2 = mysqli_query($con, $qry2);
  $row2 = mysqli_fetch_assoc($res2);
?>

<!DOCTYPE html>
<!-- profile setup 1 | only for first time Login into acc untill the fields are filled-->
<html>

<head>
  <meta charset="utf-8">
  <title>@<?php echo $uname; ?> | Dashboard -View Team</title>
  <meta name="viewpoint" content="width=device-width;initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>-->
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

    function sendRequest(){
      var teamid = "<?php echo $teamid; ?>";
      var reqMsg = $('#request_msg').val();

      $.post('api/myRequest_insert.php', {
          teamid: teamid,
          reqMsg: reqMsg
      }, function (result){
          $('#joinbtn').val(result);
          console.log(result);
          $('#joinbtn').prop('disabled',true);

      })
    }
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

        <a href="dashboard.php">
          <li><i class="fas fa-house-user" style="font-size:25px;"> Dashboard</i></li>
        </a>
      </ul>
    </div>
  </div>

  <div class="container" id="sidebar-right">
    <div class="row">
      <div class="cardd-r">
        <h2>TEAM DETAILS</h2>

        <div style="padding:0px 40px 10px 40px;">
          <div class="input-group">
            <div class="input-group">
              <span class="input-group"></span>
            </div>
            <p>Slots available: <?php echo $row['members_needed']-$row['members_in_team']; ?> | Total members needed: <?php echo $row['members_needed']; ?></p>
          </div>

          <div class="input-group">
            <div class="input-group">
              <span class="input-group">Criteria:</span>
            </div>

            <p class="form-control txtscroll" id="erre" style="height:80px;">
              <?php echo $row['criteria']; ?>
            </p>
          </div>

          <div class="input-group" style="padding:10px 0px 0px 0px;">
            <div class="input-group">
              <span class="input-group">Team members:</span>
            </div>

            <div class="txtscroll" style="height:87px;">
<?php
      $qry3="SELECT * FROM user U
             INNER JOIN team_member M
             ON U.userid = M.userid
             WHERE M.teamid = '".$teamid."'
             AND M.status = 1;";
      $res3 = $con->query($qry3);
      $count3 = mysqli_num_rows($res3);
      if(!($count3)){
  ?>

            <div class="input-group">
              <div class="input-group-append">
                <span class="input-group-text">
                  <img src="../layerAuthentication/img1/happy.png" height="70px" width="70px" >
                </span>
              </div>
              <p class="form-control txtscroll" style="height:86px;">
                  Be the first to join this team!
              </p>
            </div>
  <?php
      }
      else{
        while($row3 = $res3->fetch_assoc()){
  ?>
            <div class="input-group">
              <div class="input-group-append">
                <span class="input-group-text">
                <a data-toggle="modal" data-target="#myModal" href="#">
                  <img src="img2/<?php echo $row3['dp']; ?>" onclick="viewU('<?php echo $row3['uname']; ?>')" height="70px" width="70px" style="border-radius: 50%;">
                </a>
                </span>
              </div>
              <p class="form-control txtscroll" style="height:86px; width:170px; font-size:22px; padding-top:22px;">
                  @<?php echo $row3["uname"]; ?><br>

              </p>
            </div>
  <?php
        }
      }
?>

</div>
          </div>

          <div class="input-group" style="padding:10px 0px 0px 0px;">
            <div class="input-group">
              <span class="input-group">Enter Request Message:</span>
            </div>
            <input maxlength=100 type="text" id="request_msg" name="request_msg" class="form-control input_pass" placeholder="Hey! I'd like to join your team.">
          </div>

        </div>
        <div class="d-flex justify-content-center  login_container">
          <input type="button" id="joinbtn" class="logbtn1" onclick='sendRequest()' value="JOIN">
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
              <h4 style="display:inline"><?php echo $row['team_name']; ?></h4>

              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text" style="width:108px;">Domain:</span>
                </div>
                <p class="form-control txtscroll" style="height:42px;">
                  <?php echo $row['domain']; ?>
                </p>
              </div>

              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text" style="width:108px;">Purpose:</span>
                </div>
                <p class="form-control txtscroll" style="height:82px;">
                  <?php echo $row['purpose']; ?>
                </p>
              </div>

              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text" style="width:108px;">Looking for:</span>
                </div>
                <p class="form-control txtscroll" style="height:110px;">
                  <?php echo $row['skills_needed']; ?>
                </p>
              </div>

              <hr>

              <h5 style="display:inline">CREATOR:</h5>
              <h5 style="display:inline">@<?php echo $row1["uname"]; ?></h5>

              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text" style="width:108px;">
                    <a data-toggle="modal" data-target="#myModal" href="#">
                      <img src="img2/<?php echo $row1['dp']; ?>" onclick="viewU('<?php echo $row1['uname']; ?>')" height="80px" width="80px" style="border-radius: 50%;">
                    </a>
                  </span>
                </div>
                  <p class="form-control txtscroll" style="height:138px;">
                    Bio: <?php echo $row1["bio"]; ?>
                    <br> CONTACT:
                    <br> Phone Number: <?php echo $row1["phno"]; ?>
                    <br> Mail-ID: <?php echo $row1["mail"]; ?>
                    <br> Social-Media: <?php echo $row1["sm_link"]; ?>
                </p>
              </div>

            </div>
          </div>

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
