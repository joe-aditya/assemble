<?php
session_start();
include '../layerAuthentication/config.php';

$uname=$_SESSION['uname'];
$userid=$_SESSION['userid'];

if(isset($_POST['teamid'])){
$teamid=$con->real_escape_string($_POST["teamid"]);


$query = $con->prepare("DELETE FROM team_request
				 WHERE userid = ?
         AND teamid = ?
				 AND status != 2;");/*cant unsend if accepted*/
$query->bind_param("ii", $userid, $teamid);


if($query->execute()){
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
