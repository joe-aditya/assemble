<?php
session_start();
$adminid = $_SESSION['admin_id'];
include '../../layerAuthentication/config.php';
if(isset($_POST['adminid'])){

    $qry = 'SELECT * FROM report
            WHERE status = 1 /*Dissmissed*/
            ORDER BY reportid DESC;';

    if($result = $con->query($qry)){
        $count = mysqli_num_rows($result);
        if(!($count)){
?>
          <div class=" col-sm-12 nothing">
            <img src="../layerAuthentication/img1/happy.png">
            <p>Currently no reports to review
          </div>
<?php
        }
        else{
            while($row = $result->fetch_assoc()){

                  $res1 = $con->query('SELECT * FROM user
                          WHERE userid = "'.$row["report_from"].'" ;');
                  $row1 = $res1->fetch_assoc();

                  $res2 = $con->query('SELECT * FROM team
                          WHERE teamid = "'.$row["reported_on"].'" ;');
                  $row2 = $res2->fetch_assoc();

?>
            <div class="col-md-5 reportbox">
              <form action="api/view_review.php" method="POST">
                <h5>
                  <center>@<?php echo $row1['uname']; ?> <i class="fas fa-arrow-right" style="font-size:22px;"></i> <?php echo $row2['team_name']; ?></center>
                </h5>

                <p class="form-control txtscroll report_purpose" style="height:52px; margin-bottom: 7px;">
                  Reason: <?php echo $row['reason']; ?>
                </p>
                <input type="hidden" name="reportid" value="<?php echo $row['reportid']; ?>"/>
                <input type="hidden" name="from" value="1"/>
                <input type="submit" class="report_btn" value="View">
              </form>
            </div>
<?php
            }
        }
    }
    else{
      echo $con->error;
    }
}
else{
    echo "NOT VIEWABLE";
}
