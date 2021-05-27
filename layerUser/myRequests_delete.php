<?php
include '../layerAuthentication/config.php';
session_start();
$uname=$_SESSION['uname'];
$userid=$_SESSION['userid'];

if(isset($_POST['teamid'])){
$teamid=$con->real_escape_string($_POST["teamid"]);


$query = $con->prepare("DELETE FROM team_request
				 WHERE uname = ?
         AND teamid = ?;");
$query->bind_param("si", $uname, $teamid);


if($qry->execute()){
	echo "Unsent the request successfully. ";
	header("Location:myRequests.php");
}
else{
	echo "Couldn't unsend the request. ".mysqli_error($con);
	header("Location:myRequests.php");
}

mysqli_close($con);
}else{
echo "NOT VIEWABLE";
}
