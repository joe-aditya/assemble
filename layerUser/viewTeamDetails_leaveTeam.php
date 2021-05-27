<?php
include '../layerAuthentication/config.php';
session_start();
$uname=$_SESSION['uname'];
$userid=$_SESSION['userid'];

if(isset($_POST['teamid'])){
$teamid=$con->real_escape_string($_POST["teamid"]);


$query = $con->prepare("UPDATE team_member SET
         status = 3
				 WHERE uname = ?
         AND teamid = ?;");
$query->bind_param("si", $uname, $teamid);


if($qry->execute()){
	echo "Left the team successfully. ";
	header("Location:teamsJoined.php");
}
else{
	echo "Couldn't leave the team. ".mysqli_error($con);
	header("Location:teamsJoined.php");
}

mysqli_close($con);
}else{
echo "NOT VIEWABLE";
}
?>
