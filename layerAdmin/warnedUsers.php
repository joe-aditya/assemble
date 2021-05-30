<?php
session_start();
include '../layerAuthentication/config.php';
if(!isset($_SESSION['admin_id'])){
echo "<script>window.location.href='../layerAuthentication/login.php';</script>";//BRO
}else{
  $adminid=$_SESSION['admin_id'];
?>

<?php
    $res2 = $con->query('SELECT * FROM user
                          WHERE warning > 0
                         ORDER BY warning DESC;');
    $count = mysqli_num_rows($res2);
?>
<!DOCTYPE html>
<!-- profile setup 1 | only for first time Login into acc untill the fields are filled-->
<html>

<head>
  <meta charset="utf-8">
  <title>Admin | Review Report</title>
  <meta name="viewpoint" content="width=device-width;initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../layerUser/dashboard.css">
  <script>

  function viewU(uname){
    $('#modalTitle').html("User Profile");
    var teamid = 1;
    $.post('../layerUser/api/view_WarnedUser.php', {
        uname: uname,
        teamid: teamid
    }, function (result){
        $('#modalBody').html(result);
        console.log(status);
    })
  }

  </script>

  <style>
  .carddd {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.5);
    max-width: 300px;
    margin: auto;
    text-align: center;
    font-family: arial;
  }
  </style>

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

  <div class="container" id="sidebar" style="width:300px;">
    <div class="row">

      <ul>
        <div class="d-flex justify-content-center" style="padding:20px 0px 10px 0px;">
          <div class="brand_logo_container">
            <img src="admin_logo.png" style="border-radius:0%; height:200px; width:200px;">
          </div>
        </div>



        <div class="row" style="margin-left:15px;">
          <p class="uname_box" style="height:31px; width:220px; margin-bottom: 12px;">
            ADMIN
          </p>
                            <div class="flex-fill">
                <a href="warnedReports.php">
                  <li><i class="fas fa-book-dead" style="font-size:23px;"> Warned reports</i></li>
                </a>
        </div>
                            <div class="flex-fill">
                <a href="dismissedReports.php">
                  <li><i class="fas fa-trash" style="font-size:23px;"> Dismissed report</i></li>
                </a>
              </div>
              <div class="flex-fill">
  <a href="adminpage.php">
    <li><i class="fas fa-home" style="font-size:23px;"> Dashboard</i></li>
  </a>
</div>
                                  <div class="flex-fill">
                <a href="editKey.php">
                  <li><i class="fas fa-key" style="font-size:23px;"> Key Settings</i></li>
                </a>
              </div></div>
              </ul>
            </div>
          </div>

  <div class="grid-container">
    <div class="grid-item">
      <div class="card" style="background-color: inherit; padding: 33px 60px 37px 60px;">
        <div class=" cardd container">
          <div class="row">
            <div class="col-sm-12">


              <h2 style="display:inline; padding-left: 13px;">Warned Users</h2>
              <hr>

              <div class="txtscroll" style="height:393px;">
<?php
        if(!($count)){
?>
          <div class=" col-sm-12 nothing">
            <img src="../layerAuthentication/img1/happy.png">
            <p>Currently no reports to review
          </div>
<?php
        }
        else{
            while($row2 = $res2->fetch_assoc()){
?>
                      <h3></h3>
                      <div class="row" style="margin-left:15px; margin-bottom:5px; padding:8px; border-radius:20px; background-color:#d8d8d8; width:800px;">
                        <div class="input-group">
                          <div class="input-group-append">

                              <a data-toggle="modal" data-target="#myModal" href="#">
                                <img src="../layerUser/img2/<?php echo $row2['dp']; ?>" onclick="viewU('<?php echo $row2['uname']; ?>')" height="75px" width="75px" style="border-radius: 50%;">
                              </a>
                          </div>
                          <p class="form-control py-1" style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis; height:43px; width:385px;  border-radius:15px; margin-left: 7px; margin-right: 7px; margin-top: 15px; font-size:21px;">
              						  	<i class="fas fa-skull-crossbones" style="font-size:23px;"> - <?php echo $row2['warning']; ?></i>
                              @<?php echo $row2["uname"]; ?> <i class="fa fa-comment"></i>
                              <span style="font-size:15px;"><?php echo $row2["bio"]; ?></span>
                          </p>
                        </div>
                      </div>
<?php
            }
        }
?>


              </div>

            </div>
            <br>
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
