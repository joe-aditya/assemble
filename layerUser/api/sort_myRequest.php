<?php
session_start();
$userid = $_SESSION['userid'];
include '../../layerAuthentication/config.php';
if(isset($_POST['domain'])){

    $domain = $con->real_escape_string($_POST['domain']);

    $qry = 'SELECT T.teamid, T.team_name, T.purpose, T.domain, R.request_msg, R.status, T.members_needed, T.members_in_team
            FROM team_request R
            INNER JOIN team T
            ON T.teamid = R.teamid
            WHERE R.userid = "'. $userid .'"
            AND T.domain = "'. $domain .'"
            AND R.status != 2
            ORDER BY R.requestid DESC;';

    if($domain=='All Requests'){
      $qry = 'SELECT T.teamid, T.team_name, T.purpose, T.domain, R.request_msg, R.status, T.members_needed, T.members_in_team
              FROM team_request R
              INNER JOIN team T
              ON T.teamid = R.teamid
              WHERE R.userid = "'. $userid .'"
              AND R.status != 2
              ORDER BY R.requestid DESC;';
    }
    else if($domain=='Global'){
      $qry = "SELECT T.teamid, T.team_name, T.purpose, T.domain, R.request_msg, R.status, T.members_needed, T.members_in_team
              FROM team_request R
              INNER JOIN team T
              ON T.teamid = R.teamid
              WHERE R.userid = '". $userid ."'
              AND T.domain NOT IN ('Music','Programming','Sports','FilmMaking','COVID-19')
              AND R.status != 2
              ORDER BY R.requestid DESC;";
    }

    if($result = $con->query($qry)){
        $count = mysqli_num_rows($result);
        if(!($count)){
?>
          <div class=" col-sm-12 nothing">
            <img src="../layerAuthentication/img1/facepalm.png">
            <p>You have not sent any Join-Requests in this domain
            <br>Send join request via
            <a href="dashboard.php"><i class="fas fa-house-user" style="font-size:25px;"> Dashboard</i></a>
            & view your requests in this tab
          </div>
<?php
        }
        else{
            while($row = $result->fetch_assoc()){
?>
          <div class="col-md-3 requestbox">
            <form action="myRequests_delete.php" method="POST">
              <h5>
                <center><?php echo $row['domain']; ?> | <?php echo $row['team_name']; ?></center>
              </h5>
              <p class="form-control txtscroll request_purpose" style="height:52px; margin-bottom: 0px;">
                Purpose: <?php echo $row['purpose']; ?> <br>
                My request message: <br> <?php echo $row['request_msg']; ?>
              </p>
              <p style="margin-bottom: 8px;">Status:<span style="color:white;">
  <?php
  if($row['status']==0){
  echo " Pending";
  }
  if($row['status']==1){
  echo " Rejected";
  }
  if($row['status']==3){
  echo " Removed from team";
  }
  if($row['members_in_team']==$row['members_needed']){
  echo " (Team ASSEMBLED)";
  }
  ?>
              </span></p>
              <input type="hidden" name="teamid" value="<?php echo $row['teamid']; ?>"/>
              <input type="submit" id="unsend_request" class="request_btn" onclick=myRequests_delete() value="Unsend">
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
