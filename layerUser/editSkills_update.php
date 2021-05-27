<?php

include '../layerAuthentication/config.php';
session_start();
$uname=$_SESSION['uname'];
$userid=$_SESSION['userid'];

if(isset($_POST['works'])){
$works=$_POST["works"];
$experience=$_POST["experience"];
$skills=$_POST["skills"];
$interest=$con->real_escape_string($_POST["interest"]);

$qry = $con->prepare("UPDATE skill SET
        works = ?, experience = ?, skills = ?, interest = ?
				WHERE userid = ? ;");


$qry->bind_param("sssss", $works, $experience, $skills, $interest, $userid);


if($qry->execute()){
	echo "Skills updated successfully. ";
	header("Location:../layerUser/editSkills.php");
}
else{
	echo "Error in inserting data. ".mysqli_error($con);
	header("Location:../layerUser/editSkills.php");
}

mysqli_close($con);
}else{
echo "NOT VIEWABLE";
}
?>
