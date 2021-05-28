<?php
include '../layerAuthentication/config.php';
session_start();
if(isset($_POST['name'])){

$bio=$_POST["bio"];
$phno=$con->real_escape_string($_POST["phno"]);
$mail=$con->real_escape_string($_POST["mail"]);
$smlink=$con->real_escape_string($_POST["smlink"]);
$name=$con->real_escape_string($_POST["name"]);
$dob=$con->real_escape_string($_POST["dob"]);
$orgname=$con->real_escape_string($_POST["orgname"]);
$sex=$con->real_escape_string($_POST["sex"]);
$pwd=$con->real_escape_string($_POST["pwd"]);

$qry = "UPDATE user SET
        bio=?, phno=?, mail=?, sm_link=?, name=?,
        dob=DATE(?), org_name=?, sex=?, pwd=?
				WHERE uname = '{$_SESSION['uname']}' ;";

$qry = $con->prepare($qry);
$qry->bind_param("sisssssss",$bio, $phno, $mail, $smlink, $name, $dob, $orgname, $sex, $pwd);


if($qry->execute()){
	echo "Profile updated successfully. ";
	header("Location:editProfile.php");
}
else{
	echo "Error in inserting data. ".mysqli_error($con);
	header("Location:editProfile.php");
}

mysqli_close($con);
}else{
echo "NOT VIEWABLE";
}
?>
