<?php
#insert signup data in db/redirects accordingly
include 'config.php';
session_start();
  $uname=$_SESSION['uname'];
if(isset($_POST['bio'])){
$org_name=$con->real_escape_string($_POST["org_name"]);
$bio=$_POST["bio"];
$sm_link=$con->real_escape_string($_POST["sm_link"]);

$qry = $con->prepare("UPDATE user SET
        org_name = ?, bio = ?, sm_link = ?
				WHERE uname = '{$_SESSION['uname']}' ;");

$qry->bind_param("sss",$org_name, $bio, $sm_link);


if($qry->execute()){
	echo "Records inserted successfully. ";
  echo "<script>
          window.location.href='setup_profile_2.php';
        </script>";
}
else{
	echo "Error in inserting data. ".mysqli_error($con);
  echo "<script>
          window.location.href='invalidsetup1.html';
        </script>";
}

mysqli_close($con);
}else{
echo "<script>window.location.href='../layerUser/dashboard.php';</script>";
}
?>
