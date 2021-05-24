<?php
#insert signup data in db/redirects accordingly
include '../layerAuthentication/config.php';
if(isset($_POST['team_name'])){
session_start();
$creatorid=$_SESSION['userid'];

$team_name=$con->real_escape_string($_POST["team_name"]);
$purpose=$con->real_escape_string($_POST["purpose"]);
$skills_needed=$con->real_escape_string($_POST["skills_needed"]);
$criteria=$con->real_escape_string($_POST["criteria"]);
$members_needed=$con->real_escape_string($_POST["members_needed"]);

$query="SELECT interest FROM skill WHERE userid= '" . $creatorid . "';";
$res=mysqli_query($con, $query);
$row=$res->fetch_row();
$domain=$row[0];

$qry = $con->prepare("INSERT INTO team (team_name, domain, creatorid, purpose, skills_needed, criteria, members_needed)
						VALUES (?,?,?,?,?,?,?) ;");
$qry->bind_param("ssisssi",$team_name, $domain, $creatorid, $purpose, $skills_needed, $criteria, $members_needed);

if($qry->execute()){
	echo "Team created successfully under ".$domain." domain. ";
	header("Location:createTeam.php");
}
else{
	echo "Error in inserting data. ".mysqli_error($con);
	header("Location:invalidsignup.html");
}

mysqli_close($con);
}else{
echo "NOT VIEWABLE";
}
?>
