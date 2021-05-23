<?php
#checks login credentials/redirects to dashboard or to setup profile
session_start();
if(isset($_SESSION['uname'])){
    echo "<script>window.location.href='../layerUser/dashboard.php';</script>";
}else{
include 'config.php';

$query="SELECT * FROM skill WHERE userid='" . $userid ."';";
/*checks if data exists in skill table i.e.setup_profile_2 is done or not*/

$result=mysqli_query($con, $query);
$count=mysqli_num_rows($result);

if(1 || ($count>0)){
	echo "<script>window.location.href='../layerUser/dashboard.php';</script>";
}
else{
	echo '<script>window.location.href="setup_profile_1.php";</script>';
}

mysqli_close($con);
}
?>
