<?php
session_start();
include '../../layerAuthentication/config.php';
if(!isset($_SESSION['admin_id'])){
echo "<script>window.location.href='../layerAuthentication/login.php';</script>";//BRO
}else{
  $adminid=$_SESSION['admin_id'];
  $reportid = $_POST['reportid'];
?>

<?php
    $res = $con->query('SELECT * FROM report
            WHERE reportid = "'.$reportid.'" ;');
    $row = $res->fetch_assoc();

    $res1 = $con->query('SELECT * FROM user U
                         INNER JOIN skill S
                         ON U.userid = S.userid
                         WHERE U.userid = "'.$row["report_from"].'" ;');
    $row1 = $res1->fetch_assoc();

    $res2 = $con->query('SELECT * FROM team T
                         INNER JOIN user U
                         ON T.creatorid = U.userid
                         INNER JOIN skill S
                         ON U.userid = S.userid
                         WHERE teamid = "'.$row["reported_on"].'" ;');
    $row2 = $res2->fetch_assoc();
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

  <link rel="stylesheet" href="../../layerUser/dashboard.css">
  <script>

  $(window).on('load', function() {
      $('#myModal').modal('show');
  });

  function dismiss(reportid){
    $.post('dismiss.php', {
        reportid: reportid
    }, function (result){
        $('#actionTaken').html(result);
        console.log(status);
    })
  }

  function warn(reportid){
    $.post('warn.php', {
        reportid: reportid
    }, function (result){
        $('#actionTaken').html(result);
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
        <input type="button" class="outbtn" value="assemble">
      </div>
    </nav>
  </div>

  <div class="container" id="sidebar" style="width:300px;">
    <div class="row">

      <ul>
        <div class="d-flex justify-content-center" style="padding:20px 0px 10px 0px;">
          <div class="brand_logo_container">
            <img src="../admin_logo.png" style="border-radius:0%; height:200px; width:200px;">
          </div>
        </div>



<div class="row" style="margin-left:15px;">
  <p class="uname_box" style="height:31px; width:220px; margin-bottom: 12px;">
    ADMIN
  </p>

                          <div class="flex-fill">
        <a href="../adminpage.php">
          <li><i class="fas fa-arrow-left" style="font-size:24px;"> Back</i></li>
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


              <h2 style="display:inline; padding-left: 13px;">Report #<?php echo $reportid; ?></h2>
              <hr>

              <div class="txtscroll" style="height:393px;">

                      <h3>Reported By:</h3> <h4 style="margin-left:160px;">@<?php echo $row1['uname']; ?></h4><hr>

                      <h3>Reported On:</h3> <h4 style="margin-left:160px;"><?php echo $row2['team_name']; ?></h4><hr>

                      <h3>Team Creator:</h3> <h4 style="margin-left:160px;">@<?php echo $row2['uname']; ?></h4><hr>

                      <h3>Action Taken:</h3> <h4 style="margin-left:160px;" id="actionTaken">No Action Taken</h4><hr>

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
            <h4 class="modal-title" id="modalTitle">Report #<?php echo $reportid; ?></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div id="modalBody">
              <div class="col-lg-12">



              <div class="row">


                <div class="col-lg-2">
                    <div class="carddd">
          <h4>REPORTED BY</h4>
                        <img src="../../layerUser/img2/<?php echo $row1['dp']; ?>" height="100px" width="100px" style=" margin-top:20px; border-radius: 50%;">
                        <h3>@<?php echo $row1['uname']; ?></h3>
                        <h5 class="title"><?php echo $row1['name']; ?></h5>

                        <div style="align: center; padding-left:10px; padding-right:10px;">
                          <?php echo $row1['bio']; ?>
                        </div>
                        <hr>
                        <div style="margin: 15px 0; padding-left:5px; font-size:18px; text-align:left;">

                          <a href="<?php echo $row1['sm_link']; ?>" style="font-size:18px;">
                            <i class="fa fa-link" style="font-size:18px;"></i>
                            <?php echo $row1['sm_link']; ?>
                          </a><br>

                          <i class="fa fa-phone-alt" style="font-size:18px;"> -</i><?php echo $row1['phno']; ?><br>

                          <?php echo $row1['mail']; ?><br>

                        </div>
                        <hr>
                        <div>
                        <?php $i=0; for($i=0; $i<$row1['warning']; $i++){ ?>
                                    <i class="fa fa-skull-crossbones" style="font-size:18px;"> </i>
                        <?php } ?>
                        </div>

                    </div>
                </div>

              <div class="col-lg-4">
                        <table class="table table-striped table-dark" style="border-radius:20px;">
                          <thead>
                            <tr>
                              <th style="width: 10%"></th>
                              <th style="width: 90%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th>Interest:</th>
                              <td><?php echo $row1['interest']; ?></td>
                            </tr>
                            <tr>
                              <th></th>
                              <td></td>
                            </tr>
                            <tr>
                              <th>Skills:</th>
                              <td><?php echo $row1['skills']; ?></td>
                            </tr>
                            <tr>
                              <th></th>
                              <td></td>
                            </tr>
                            <tr>
                              <th>Experience:</th>
                              <td><?php echo $row1['experience']; ?></td>
                            </tr>
                            <tr>
                              <th></th>
                              <td></td>
                            </tr>
                            <tr>
                              <th>Works:</th>
                              <td>
                                <i class="fa fa-link" style="font-size:20px;"></i>
                                <a href="<?php echo $row1['works']; ?>" target="_blank" style="color:ghostwhite;">
                                  <?php echo $row1['works']; ?>
                                </a>
                              </td>
                            </tr>
                            <tr>
                              <th></th>
                              <td></td>
                            </tr>
                            <tr>
                              <th>Orgnanisation:</th>
                              <td><?php echo $row1['org_name']; ?></td>
                            </tr>
                            <tr>
                              <th></th>
                              <td></td>
                            </tr>
                            <tr>
                              <th></th>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
              </div>

              <div class="col-lg-2">
                  <div class="carddd">
          <h4>TEAM CREATOR</h4>
                      <img src="../../layerUser/img2/<?php echo $row2['dp']; ?>" height="100px" width="100px" style=" margin-top:20px; border-radius: 50%;">
                      <h3>@<?php echo $row2['uname']; ?></h3>
                      <h5 class="title"><?php echo $row2['name']; ?></h5>

                      <div style="align: center; padding-left:10px; padding-right:10px;">
                        <?php echo $row2['bio']; ?>
                      </div>
                      <hr>
                      <div style="margin: 15px 0; padding-left:5px; font-size:18px; text-align:left;">

                        <a href="<?php echo $row2['sm_link']; ?>" style="font-size:18px;">
                          <i class="fa fa-link" style="font-size:18px;"></i>
                          <?php echo $row2['sm_link']; ?>
                        </a><br>

                        <i class="fa fa-phone-alt" style="font-size:18px;"> -</i><?php echo $row2['phno']; ?><br>

                        <?php echo $row2['mail']; ?><br>

                      </div>
                      <hr>
                      <div>
                      <?php $i=0; for($i=0; $i<$row2['warning']; $i++){ ?>
                                  <i class="fa fa-skull-crossbones" style="font-size:18px;"> </i>
                      <?php } ?>
                      </div>

                  </div>
              </div>

            <div class="col-lg-4">
                      <table class="table table-striped table-dark" style="border-radius:20px;">
                        <thead>
                          <tr>
                            <th style="width: 10%"></th>
                            <th style="width: 90%"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th>Interest:</th>
                            <td><?php echo $row2['interest']; ?></td>
                          </tr>
                          <tr>
                            <th></th>
                            <td></td>
                          </tr>
                          <tr>
                            <th>Skills:</th>
                            <td><?php echo $row2['skills']; ?></td>
                          </tr>
                          <tr>
                            <th></th>
                            <td></td>
                          </tr>
                          <tr>
                            <th>Experience:</th>
                            <td><?php echo $row2['experience']; ?></td>
                          </tr>
                          <tr>
                            <th></th>
                            <td></td>
                          </tr>
                          <tr>
                            <th>Works:</th>
                            <td>
                              <i class="fa fa-link" style="font-size:20px;"></i>
                              <a href="<?php echo $row2['works']; ?>" target="_blank" style="color:ghostwhite;">
                                <?php echo $row2['works']; ?>
                              </a>
                            </td>
                          </tr>
                          <tr>
                            <th></th>
                            <td></td>
                          </tr>
                          <tr>
                            <th>Orgnanisation:</th>
                            <td><?php echo $row2['org_name']; ?></td>
                          </tr>
                          <tr>
                            <th></th>
                            <td></td>
                          </tr>
                          <tr>
                            <th></th>
                            <td></td>
                          </tr>
                        </tbody>
                      </table>
            </div>


              </div>

              <div class="row">

                <div class="col-lg-12">
                          <table class="table table-striped table-dark" style="border-radius:20px;">
                            <thead>
                              <tr>
                                <th style="width: 20%"></th>
                                <th style="width: 80%"></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th>Report Reason:</th>
                                <td><?php echo $row['reason']; ?></td>
                              </tr>
                              <tr>
                                <th></th>
                                <td></td>
                              </tr>
                              <tr>
                                <th>Team Domain:</th>
                                <td><?php echo $row2['domain']; ?></td>
                              </tr>
                              <tr>
                                <th></th>
                                <td></td>
                              </tr>
                              <tr>
                                <th>Purpose:</th>
                                <td><?php echo $row2['purpose']; ?></td>
                              </tr>
                              <tr>
                                <th></th>
                                <td></td>
                              </tr>
                              <tr>
                                <th>Looking for:</th>
                                <td><?php echo $row2['skills_needed']; ?></td>
                              </tr>
                              <tr>
                                <th></th>
                                <td></td>
                              </tr>
                              <th>Criteria:</th>
                              <td><?php echo $row2['criteria']; ?></td>
                            </tr>
                            <tr>
                              <th></th>
                              <td></td>
                            </tr>
                            <tr>
                              <th>Announcements made:</th>
                              <td><?php echo $row2['announcement']; ?></td>
                            </tr>
                            <tr>
                              <th></th>
                              <td></td>
                            </tr>
                              <tr>
                                <th></th>
                                <td></td>
                              </tr>
                            </tbody>
                          </table>
                </div>



              </div>

              </div>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <p id="modalMsg" style="align:left; font-size:25px; color:blue;"></p>
            <button type="button" class="btn btn-danger" onclick="dismiss('<?php echo $row["reportid"]; ?>')">
              <i class="fas fa-trash" style="font-size:25px;"> Dismiss Report</i>
            </button>
            <button type="button" class="btn btn-success" onclick="warn('<?php echo $row["reportid"]; ?>')">
              <i class="fas fa-skull-crossbones" style="font-size:25px;"> Give Warning</i>
            </button>
            <button type="button" class="btn btn-info" data-dismiss="modal">
              <i class="fas fa-times-circle" style="font-size:25px;"> Close</i>
            </button>
          </div>

        </div>
      </div>
    </div>


</body>

</html>

<?php

}

?>
