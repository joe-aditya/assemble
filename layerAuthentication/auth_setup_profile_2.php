<?php
#insert signup data in db/redirects accordingly
include 'config.php';
session_start();
$uname=$_SESSION['uname'];
$userid=$_SESSION['userid'];

if(isset($_POST['works'])){
$works=$_POST["works"];
$experience=$_POST["experience"];
$skills=$_POST["skills"];
$interest=$con->real_escape_string($_POST["interest"]);

$qry = $con->prepare("INSERT INTO skill (works, experience, skills, interest, userid)
						VALUES (?,?,?,?,?) ;");
$qry->bind_param("ssssi",$works, $experience, $skills, $interest, $userid);


if($qry->execute()){
	echo "Records inserted successfully. ";
	header("Location:");
	echo "<script>
          window.location.href='../layerUser/dashboard.php';
        </script>";
}
else{
	echo "Error in inserting data. ".mysqli_error($con);
	echo "<script>
          window.location.href='invalidsetup2.html';
        </script>";
}

mysqli_close($con);
}else{
echo "NOT VIEWABLE";
}
?>
