<?php
include '../layerAuthentication/config.php';
session_start();
$userid=$_SESSION['userid'];
$uname=$_SESSION['uname'];
/*Procedural
$qry = "SELECT * FROM user WHERE sex = 'M';";
$res = mysqli_query($con, $qry);
*/

/*Object oriented*/
$sex = 'M';
$qry = "SELECT * FROM user WHERE sex = ?;";
$qry = $con->prepare($qry);
//$qry = $con->prepare("SELECT * FROM user WHERE sex = ?;");
$qry->bind_param("s", $sex);
$qry->execute();
$res = $qry->get_result();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Sign Up</title>
  <meta name="viewpoint" content="width=device-width;initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="dashboard.css">

</head>
<body>
  <div class="headerrr">
    <p class="header_textt glow">ASSEMBLE</p>
  </div>
  <div class="bs-example">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">

      <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
        <div class="navbar-nav; style:bottom">
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>

      <div class="navbar-nav">
        <a href="../layerAuthentication/logout.html">
          <input type="button" class="outbtn" value="Logout">
        </a>
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
        <br>
        <a href="dashboard.php">
          <li><i class="fas fa-house-user" style="font-size:25px;"> Dashboard</i></li>
        </a>
      </ul>
    </div>
  </div>

    <div style="padding:15px 30px 0px 30px; margin-top: 18px;  height: 540px; width: 800px;" class="editform txtscroll" method="POST">
      <h1>USERS</h1>
  <!--<h3>procedural</h3>-->
      <h3>object-oriented</h3>

      <table border="2">
        <tr>
          <td>UserName</td>
          <td>Name</td>
          <td>Ph_no</td>
          <td>Sex</td>
          <td>DOB</td>
          <td>Bio</td>
          <td>DP</td>
        </tr>

     <?php
  //     while($row = mysqli_fetch_row($res)){ //assoc,array-col_name || row,array-index
         while($row = $res->fetch_row()){
     ?>
       <tr>
         <td><?php echo $row[1]; ?></td>
         <td><?php echo $row[3]; ?></td>
         <td><?php echo $row[4]; ?></td>
         <td><?php echo $row[5]; ?></td>
         <td><?php echo $row[7]; ?></td>
         <td><?php echo $row[8]; ?></td>
         <td><?php echo $row[12]; ?></td>
       </tr>
     <?php
     }
     ?>
      </table>

    </div>

</body>
</html>
