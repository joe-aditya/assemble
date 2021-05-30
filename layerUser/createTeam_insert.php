<?php
session_start();
include '../layerAuthentication/config.php';
if(isset($_POST['team_name'])){

$creatorid=$_SESSION['userid'];

$team_name=$con->real_escape_string($_POST["team_name"]);
$purpose=$_POST["purpose"];
$skills_needed=$_POST["skills_needed"];
$criteria=$_POST["criteria"];
$members_needed=$con->real_escape_string($_POST["members_needed"]);

$query="SELECT interest FROM skill WHERE userid= '" . $creatorid . "';";
$res=mysqli_query($con, $query);
$row=$res->fetch_row();
$domain=$row[0];

$qry = $con->prepare("INSERT INTO team (team_name, domain, creatorid, purpose, skills_needed, criteria, members_needed)
						VALUES (?,?,?,?,?,?,?) ;");
$qry->bind_param("ssisssi",$team_name, $domain, $creatorid, $purpose, $skills_needed, $criteria, $members_needed);

if($qry->execute()){
	echo "Team created successfully under '".$domain."' domain. ";
}
else{
	echo "Couldn't create Team. ".mysqli_error($con);
}

mysqli_close($con);
}else{
echo "NOT VIEWABLE";
}
?>
