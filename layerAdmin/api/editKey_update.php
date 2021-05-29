<?php
include '../../layerAuthentication/config.php';
session_start();
if(isset($_POST['pwd'])){

$pwd=$con->real_escape_string($_POST["pwd"]);

$qry = $con->query("UPDATE admin SET pwd= '".$pwd."'
				WHERE admin_id = '{$_SESSION['admin_id']}' ;");

if($qry){
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
