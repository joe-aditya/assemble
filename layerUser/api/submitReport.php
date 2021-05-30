<?php
session_start();
include '../../layerAuthentication/config.php';

if(isset($_POST['teamid'])){

      $report = $_POST['report'];
      $teamid = $con->real_escape_string($_POST['teamid']);
      $userid = $_SESSION['userid'];
      $admin = 1989;
      $i = 0; /*Report pending*/

      $qry = $con->prepare("INSERT INTO report (report_from, reported_on, reason, status, reviewed_by)
                VALUES (?,?,?,?,?);");
      $qry->bind_param("iisii", $userid, $teamid, $report, $i, $admin);

                    if($qry->execute()){
                      $query = $con->prepare("UPDATE team_member SET
                                              status = 3  /*Left the team*/
                                              WHERE userid = ?
                                              AND teamid = ?;");
                      $query->bind_param("ii", $userid, $teamid);

                      $query2 = $con->prepare("DELETE FROM team_request
                                               WHERE userid = ?
                                               AND teamid = ?;");
                      $query2->bind_param("ii", $userid, $teamid);

                      $query3 = $con->prepare("UPDATE team SET
                                              members_in_team = members_in_team - 1
                                              WHERE teamid = ?;");
                      $query3->bind_param("i", $teamid);

                                if(($query->execute())&&($query2->execute())&&($query3->execute())){
                                  echo "Reported and Left the team successfully.
                                  <script>
                                    window.location.href='teamsJoined.php';
                                  </script>";

                                }
                                else{
                                  echo "Couldn't leave the team. ".mysqli_error($con);
                              echo "<script>
                                    window.location.href='teamsJoined.php';
                                  </script>";
                                }
                    }
                    else{
                    	echo "Couldn't Report. ".mysqli_error($con);
                    }
      mysqli_close($con);
}
else{
    echo "NOT VIEWABLE";
}
?>
