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

<html>

<head>
  <meta charset="utf-8">
  <title>@<?php echo $uname; ?> | Manage My Team</title>
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

  function viewR(uname){
    var teamid = "<?php echo $teamid; ?>";
    $.post('api/view_RequestUserProfile.php', {
        uname: uname,
        teamid: teamid,
    }, function (result){
        $('#modalBody').html(result);
        console.log(status);
    })
  }

  function viewM(uname){
    var teamid = "<?php echo $teamid; ?>";
    $.post('api/view_MemberUserProfile.php', {
        uname: uname,
        teamid: teamid,
    }, function (result){
        $('#modalBody').html(result);
        console.log(status);
    })
  }

  function viewU(uname){
    var teamid = "<?php echo $teamid; ?>";
    $.post('api/view_UserProfile.php', {
        uname: uname,
        teamid: teamid,
    }, function (result){
        $('#modalBody').html(result);
        console.log(status);
    })
  }

  function reject(uname){
    var teamid = "<?php echo $teamid; ?>";
    $.post('api/rejectRequest.php', {
        uname: uname,
        teamid: teamid,
    }, function (result){
        $('#modalMsg').html(result);
        console.log(status);
    })
  }

  function accept(uname){
    var teamid = "<?php echo $teamid; ?>";
    $.post('api/acceptRequest.php', {
        uname: uname,
        teamid: teamid,
    }, function (result){
        $('#modalMsg').html(result);
        console.log(status);
    })
  }

  function remove(uname){
    var teamid = "<?php echo $teamid; ?>";
    $.post('api/removeMember.php', {
        uname: uname,
        teamid: teamid,
    }, function (result){
        $('#modalMsg').html(result);
        console.log(status);
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
        <a href="myTeams.php">
          <li><i class="fas fa-arrow-left" style="font-size:25px;"> Back</i></li>
        </a>
        <br>

        <form action="myTeams_edit.php" method="POST" id="editPage">
          <input type="hidden" name="teamid" value="<?php echo $row['teamid']; ?>"/>
        </form>

        <a href="#" id="submit2">
          <li><i class="fas fa-pen" style="font-size:25px;"> Edit Details</i></li>
        </a>

      </div>

      </ul>
    </div>
  </div>


  <div class="grid-container">
    <div class="grid-item">
      <div class="card" style="background-color: inherit; padding: 33px 60px 12px 60px;">
        <div class="col-sm-12">
          <div class="row">
<?php
$res1 = mysqli_query($con,"SELECT *
                           FROM team_request R
                           INNER JOIN user U
                           ON R.userid = U.userid
                           WHERE R.teamid = '".$teamid."'
                           AND (R.status = 0 OR R.status = 3);");
$count = mysqli_num_rows($res1);
?>
            <div class="col-sm-6">
              <div class=" cardd container">
                <h5 style="text-align:center;"><?php echo $row['team_name']; ?></h5>
                <h3 style="text-align:center;">JOIN REQUESTS - (<?php echo $count; ?>)</h3>
                <hr style="margin-top:5px;">
                <div class="txtscroll" style="height:373px;">
                  <div class="container-fluid p-0" id="enrolledcourses">
                    <div class="container">
                      <div class="row">

<?php
if(!($count)){
?>
                    <div class=" col-sm-12 nothing">
                      <img src="../layerAuthentication/img1/shrug.png">
                      <p>No Requests</p>
                    </div>
<?php
}
else{
      while($row1 = $res1->fetch_assoc()){
?>
                      <div class="row" style="margin-left:15px; margin-bottom:5px; padding:8px; border-radius:20px; background-color:#d8d8d8;">
                        <div class="input-group">
                          <div class="input-group-append">

                              <a data-toggle="modal" data-target="#myModal" href="#">
                                <img src="img2/<?php echo $row1['dp']; ?>" onclick="viewR('<?php echo $row1['uname']; ?>')" height="75px" width="75px" style="border-radius: 50%;">
                              </a>
                          </div>
                          <p class="form-control py-1" style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis; height:43px; width:385px;  border-radius:15px; margin-left: 7px; margin-right: 7px; margin-top: 15px; font-size:21px;">
              						  	@<?php echo $row1["uname"]; ?> <i class="fa fa-comment"></i>
                              <span style="font-size:15px;"><?php echo $row1["request_msg"]; ?></span>
                          </p>
                        </div>
                      </div>
<?php
      }
}
?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- asdfghjklsdfghjklsdfghjm,.dfghjkcvbnm-->

            <div class="col-sm-6">
              <div class=" cardd container">
                <h5 style="text-align:center;"><?php echo $row['team_name']; ?></h5>
                <h3 style="text-align:center;">TEAM MEMBERS - (<?php echo $row['members_in_team']; ?> / <?php echo $row['members_needed']; ?>)</h3>
                <hr style="margin-top:5px;">
                <div class="txtscroll" style="height:373px;">
                  <div class="container-fluid p-0" id="enrolledcourses">
                    <div class="container">
                      <div class="row">

<?php
$res2 = mysqli_query($con,"SELECT *
                           FROM user U
                           INNER JOIN team_member M
                           ON U.userid = M.userid
                           WHERE M.teamid = '".$teamid."'
                           AND M.status = 1;");
 $count2 = mysqli_num_rows($res2);
 if(!($count2)){
 ?>
                     <div class=" col-sm-12 nothing">
                       <img src="../layerAuthentication/img1/shrug.png">
                       <p>No Members in Team</p>
                     </div>
 <?php
 }
 else{
       while($row2 = $res2->fetch_assoc()){
 ?>
                        <div class="row" style="margin-left:15px; margin-bottom:5px; padding:8px; border-radius:20px; background-color:#d8d8d8;">
                          <div class="input-group">
                            <div class="input-group-append">

                                <a data-toggle="modal" data-target="#myModal" href="#">
                                  <img src="img2/<?php echo $row2['dp']; ?>" onclick="viewM('<?php echo $row2['uname']; ?>')" height="75px" width="75px" style="border-radius: 50%;">
                                </a>
                            </div>
                            <p class="form-control py-1" style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis; height:43px; width:385px;  border-radius:15px; margin-left: 7px; margin-right: 7px; margin-top: 15px; font-size:21px;">
                                @<?php echo $row2["uname"]; ?> <i class="fa fa-comment"></i>
                                <span style="font-size:15px;"><?php echo $row2["bio"]; ?></span>
                            </p>
                          </div>
                        </div>
<?php
      }
}

$res3 = mysqli_query($con,"SELECT *
                           FROM user U
                           INNER JOIN team_member M
                           ON U.userid = M.userid
                           WHERE M.teamid = '".$teamid."'
                           AND M.status = 3;");

while($row3 = $res3->fetch_assoc()){
?>
                      <div class="row" style="margin-left:15px; margin-bottom:5px; padding:8px; border-radius:20px; background-color:#d8d8d8;">
                        <div class="input-group">
                          <div class="input-group-append">

                              <a data-toggle="modal" data-target="#myModal" href="#">
                                <img src="img2/<?php echo $row3['dp']; ?>" onclick="viewU('<?php echo $row3['uname']; ?>')" height="75px" width="75px" style="border-radius: 50%;">
                              </a>
                          </div>
                          <p class="form-control py-1" style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis; height:43px; width:385px;  border-radius:15px; margin-left: 7px; margin-right: 7px; margin-top: 15px; font-size:21px;">
                              @<?php echo $row3["uname"]; ?> <i class="fa fa-exclamation-triangle"></i>
                              <span style="font-size:15px; color:#F44336">Left The Team</span>
                          </p>
                        </div>
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
          <h4 class="modal-title">User Profile</h4>
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
