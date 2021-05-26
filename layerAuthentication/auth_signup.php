<?php
#insert signup data in db/redirects accordingly
include 'config.php';
if(isset($_POST['name'])){
$name=$con->real_escape_string($_POST["name"]);
$phno=$con->real_escape_string($_POST["phno"]);
$uname=$con->real_escape_string($_POST["uname"]);
$dob=$con->real_escape_string($_POST["dob"]);
$pwd=$con->real_escape_string($_POST["pwd"]);
$mail=$con->real_escape_string($_POST["mail"]);
$sex=$con->real_escape_string($_POST["sex"]);

$query = $con->prepare("SELECT uname FROM user WHERE uname = ?;");
$query->bind_param("s",$uname);
$query->execute();
$res = $query->get_result();
$count = mysqli_num_rows($res);

if($count>0){
		echo 'Username is NOT available';
}
else{
		$qry = "INSERT INTO user (name, phno, pwd, uname, dob, mail, sex)
						VALUES (?,?,?,?,DATE(?),?,?) ;";
		$qry = $con->prepare($qry);
		$qry->bind_param("sisssss",$name, $phno, $pwd, $uname, $dob, $mail, $sex);


		if($qry->execute()){
			echo "Records inserted successfully. ";
			echo "<script>window.location.href = 'ivalidsignup.html';</script>";
		}
		else{
			echo "Error in inserting data. ".mysqli_error($con);
			echo "<script>window.location.href = 'invalidsignup.html';</script>";
		}
}

mysqli_close($con);
}else{
echo "NOT VIEWABLE";
}
?>
