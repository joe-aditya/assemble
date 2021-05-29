<?php
session_start();
include '../../layerAuthentication/config.php';

if(isset($_POST['teamid'])){

    $teamid = $_POST['teamid'];

    $qry = $con->query("DELETE FROM team WHERE teamid = '".$teamid."';");

    if($qry){
      echo "Team Deleted!.
      <script>
        window.location.href='myTeams.php';
      </script>";
    }
    else{
      echo "Couldn't leave the team. ".mysqli_error($con);
    }

mysqli_close($con);
}
else{
echo "NOT VIEWABLE";
}
?>
