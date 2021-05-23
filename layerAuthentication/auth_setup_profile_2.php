<?php
#insert signup data in db/redirects accordingly
include 'config.php';
session_start();
$uname=$_SESSION['uname'];
$userid=$_SESSION['userid'];

if(isset($_POST['works'])){
$works=$con->real_escape_string($_POST["works"]);
$experience=$con->real_escape_string($_POST["experience"]);
$skills=$con->real_escape_string($_POST["skills"]);
$interest=$con->real_escape_string($_POST["interest"]);

$qry = $con->prepare("INSERT INTO skill (works, experience, skills, interest, userid)
						VALUES (?,?,?,?,?) ;");
$qry->bind_param("ssssi",$works, $experience, $skills, $interest, $userid);


if($qry->execute()){
	echo "Records inserted successfully. ";
	header("Location:../layerUser/dashboard.php");
}
else{
	echo "Error in inserting data. ".mysqli_error($con);
	header("Location:invalidsetup2.html");
}

mysqli_close($con);
}else{
echo "NOT VIEWABLE";
}
?>
