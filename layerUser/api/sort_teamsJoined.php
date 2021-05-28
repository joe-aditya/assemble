<?php
session_start();
$userid = $_SESSION['userid'];
include '../../layerAuthentication/config.php';
if(isset($_POST['domain'])){

    $domain = $con->real_escape_string($_POST['domain']);

    $qry = 'SELECT T.teamid, T.team_name, T.purpose
            FROM team_member M
            INNER JOIN team T
            ON T.teamid = M.teamid
            WHERE M.userid = "'. $userid .'"
            AND T.domain = "'. $domain .'";';

    if($domain=='All Teams'){
      $qry = 'SELECT T.teamid, T.team_name, T.purpose
              FROM team_member M
              INNER JOIN team T
              ON T.teamid = M.teamid
              WHERE M.userid = "'. $userid .'"';
    }
    else if($domain=='Global'){
      $qry = "SELECT T.teamid, T.team_name, T.purpose
              FROM team_member M
              INNER JOIN team T
              ON T.teamid = M.teamid
              WHERE M.userid = '". $userid ."'
              AND T.domain NOT IN ('Music','Programming','Sports','Filmaking','Artwork')";
    }

    if($result = $con->query($qry)){
        $count = mysqli_num_rows($result);
        if(!($count)){
?>
          <div class=" col-sm-12 nothing">
            <img src="../layerAuthentication/img1/shrug.png">
            <p>You are not a part of any team in this domain
            <br>Join a team via
            <a href="dashboard.php"><i class="fas fa-house-user" style="font-size:25px;"> Dashboard</i></a>
            & view the Teams Joined in this tab
            </p>
          </div>
<?php
        }
        else{
            while($row = $result->fetch_assoc()){
?>
            <div class="col-md-3 joinedbox">
              <form action="viewTeamDetails.php" method="POST">
                <h5>
                  <center><?php echo $row1['team_name']; ?></center>
                </h5>
                <p class="form-control txtscroll joined_purpose" style="height:80px; margin-bottom: 8px;">
                  <?php echo $row1['purpose']; ?>
                </p>
                <input type="hidden" name="teamid" value="<?php echo $row1['teamid']; ?>"/>
                <input type="submit" id="view_team_details" class="joined_btn" onclick=viewTeamDetails() value="View Team">
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
