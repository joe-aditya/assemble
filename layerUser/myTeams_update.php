<?php
session_start();
include '../layerAuthentication/config.php';

if(isset($_POST['team_name'])){

$teamid=$_POST['teamid'];

$team_name=$_POST["team_name"];
$purpose=$_POST["purpose"];
$skills_needed=$_POST["skills_needed"];
$criteria=$_POST["criteria"];
$announcement=$_POST["announcement"];
$members_needed=$con->real_escape_string($_POST["members_needed"]);


$qry = $con->prepare("UPDATE team SET
                      team_name=?, purpose=?, skills_needed=?, criteria=?, members_needed=?, announcement=?
          						WHERE teamid = '".$teamid."' ;");
$qry->bind_param("ssssis",$team_name, $purpose, $skills_needed, $criteria, $members_needed, $announcement);

if($qry->execute()){
	echo "Team details updated. ";
}
else{
	echo "Error in updating team details. ".mysqli_error($con);
}

mysqli_close($con);
}else{
echo "NOT VIEWABLE";
}
?>
