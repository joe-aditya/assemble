<?php
include '../layerAuthentication/config.php';
session_start();

if(isset($_POST['teamid'])){

    $userid=$_SESSION['userid'];
    $teamid=$con->real_escape_string($_POST["teamid"]);

    $query = $con->prepare("UPDATE team_member SET
                            status = 3
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
    	echo "Left the team successfully.
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

    mysqli_close($con);
}else{
echo "NOT VIEWABLE";
}
?>
