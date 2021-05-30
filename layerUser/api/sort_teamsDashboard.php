<?php
session_start();
$userid = $_SESSION['userid'];
include '../../layerAuthentication/config.php';
if(isset($_POST['domain'])){

    $domain = $con->real_escape_string($_POST['domain']);


    $qry = 'SELECT * FROM team
            WHERE creatorid != "'.$userid.'"
            AND domain = "'. $domain .'"
            AND members_in_team < members_needed
            AND teamid NOT IN (SELECT teamid FROM team_request
            WHERE userid = "'.$userid.'")
            ORDER BY teamid DESC;';

    if($domain=='All Teams'){
        $qry = 'SELECT * FROM team
                WHERE creatorid != "'.$userid.'"
                AND members_in_team < members_needed
                AND teamid NOT IN (SELECT teamid FROM team_request
                WHERE userid = "'.$userid.'")
                ORDER BY teamid DESC;';
    }
    else if($domain=='Global'){
      $qry = 'SELECT * FROM team
              WHERE creatorid != "'.$userid.'"
              AND members_in_team < members_needed
              AND domain NOT IN ("Music","Programming","Sports","FilmMaking","COVID-19")
              AND teamid NOT IN (SELECT teamid FROM team_request
              WHERE userid = "'.$userid.'")
              ORDER BY teamid DESC;';
    }

    if($result = $con->query($qry)){
        $count = mysqli_num_rows($result);
        if(!($count)){
?>
          <div class=" col-sm-12 nothing">
            <img src="../layerAuthentication/img1/shrug.png">
            <p>Currently no team is created under this domain
            <br>Search for teams to join in other domains!
          </div>
<?php
        }
        else{
            while($row = $result->fetch_assoc()){
?>
            <div class="col-md-5 dashbox">
              <form action="dashboard_view.php" method="POST">
                <h5>
                  <center><?php echo $row['domain']; ?> | <?php echo $row['team_name']; ?></center>
                </h5>
                <p class="form-control txtscroll dash_purpose" style="height:28px; margin-bottom: 0px;">
                  Purpose: <?php echo $row['purpose']; ?>
                </p>
                <p class="form-control txtscroll dash_purpose" style="height:52px; margin-bottom: 7px;">
                  Looking for: <?php echo $row['skills_needed']; ?>
                </p>
                <input type="hidden" name="teamid" value="<?php echo $row['teamid']; ?>"/>
                <input type="submit" class="dash_btn" value="View & Join">
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
