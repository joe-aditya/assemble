<?php
session_start();
$uname=$_SESSION['uname'];
$userid=$_SESSION['userid'];

include '../../layerAuthentication/config.php';

if(isset($_POST['teamid'])){

$teamid=$con->real_escape_string($_POST["teamid"]);
$reqMsg=$con->real_escape_string($_POST["reqMsg"]);
$status=0;

$qry = "INSERT INTO team_request (teamid, userid, status, request_msg)
        VALUES (?,?,?,?);";

if(!($reqMsg)){
  $reqMsg = "Hey! I'd like to join your team.";
}

$qry = $con->prepare($qry);
$qry->bind_param("iiis", $teamid, $userid, $status, $reqMsg);


if($qry->execute()){
	echo "REQUEST SENT";
}
else{
	echo "JOIN".mysqli_error($con);

}

mysqli_close($con);
}else{
echo "NOT VIEWABLE";
}
?>
