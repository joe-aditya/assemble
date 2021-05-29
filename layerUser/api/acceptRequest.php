<?php
include '../../layerAuthentication/config.php';
session_start();

if(isset($_POST['uname'])){

    $uname = $con->real_escape_string($_POST['uname']);
    $teamid = $con->real_escape_string($_POST['teamid']);

    $qry = 'SELECT * FROM team WHERE teamid = "'. $teamid .'"; ';
    $result = $con->query($qry);
    $row = $result->fetch_assoc();

    if($row['members_in_team']==$row['members_needed']){
          echo "Team is ASSEMBLED! <br>Increase \"Members Needed\" via \"Edit Details\" <br>to add new members.";
    }
    else{
          $res1 = mysqli_query($con,"SELECT * FROM user U WHERE uname = '".$uname."';");
          $row1 = $res1->fetch_assoc();
          $uid = $row1["userid"];

          $res = $con->query("SELECT userid
                              FROM team_member
                              WHERE status = 3 /*Left the team*/
      				                AND userid = '".$uid."'
                              AND teamid = '".$teamid."';");
          $count = mysqli_num_rows($res);


          if($count>0){
            $query = "UPDATE team_member
                      SET status = 1  /*Current member*/
                      WHERE userid = '".$uid."'
                      AND teamid = '".$teamid."';";
          }
          else{
            $query = "INSERT INTO team_member (teamid, userid, status)
                      VALUES ('".$teamid."','".$uid."',1)";
          }


          $query2 = $con->prepare("UPDATE team_request SET
                                  status = 2 /*Accept request*/
          				                WHERE userid = ?
                                  AND teamid = ?;");
          $query2->bind_param("ii", $uid, $teamid);


          $query3 = $con->prepare("UPDATE team SET
                                  members_in_team = members_in_team + 1
                                  WHERE teamid = ?;");
          $query3->bind_param("i", $teamid);


          if(($result = $con->query($query))&&($query2->execute())&&($query3->execute())){
          	echo "Request Accepted.";
          }
          else{
          	echo "Couldn't Accept Request. ".mysqli_error($con);
          }
    }
    mysqli_close($con);
}else{
echo "NOT VIEWABLE";
}
?>
