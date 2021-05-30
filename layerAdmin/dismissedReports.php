<?php
session_start();
include '../layerAuthentication/config.php';
if(!isset($_SESSION['admin_id'])){
echo "<script>window.location.href='../layerAuthentication/login.php';</script>";//BRO
}else{
  $adminid=$_SESSION['admin_id'];

?>

<!DOCTYPE html>
<!-- profile setup 1 | only for first time Login into acc untill the fields are filled-->
<html>

<head>
  <meta charset="utf-8">
  <title>Admin | Dissmissed Reports</title>
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
    function reports(){

      var adminid = "<?php echo $adminid; ?>";
      $.post('api/reports_dismissed.php', {
          adminid: adminid
      }, function (result){
          $('#reportboxes').html(result);
          console.log(status);
      })
    }

    $(document).ready(function(){
      reports();
    })
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
        <a href="adminpage.php">
          <li><i class="fas fa-home" style="font-size:23px;"> Dashboard</i></li>
        </a>
      </div>
                          <div class="flex-fill">
                            <a href="warnedUsers.php">
                              <li><i class="fas fa-skull-crossbones" style="font-size:23px;"> Warned Users</i></li>
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
              <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                </div>
              </div>

              <h2 style="display:inline; padding-left: 13px;">Dismissed Reports</h2>
              <hr>

              <div class="txtscroll" style="height:393px;">

                <div class="container-fluid p-0" id="enrolledcourses">
                  <div class="container">
                    <div class="row" id="reportboxes">


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
    </div>
</body>

</html>

<?php

}

?>
