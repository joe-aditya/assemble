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

$qry = $con->prepare("INSERT INTO user (name, phno, pwd, uname, dob, mail, sex) 
						VALUES (?,?,?,?,DATE(?),?,?) ;");
$qry->bind_param("sisssss",$name, $phno, $pwd, $uname, $dob, $mail, $sex);

//SQL- Change the query above after creating the database n user table
// And change the form datatype in signup.html to match the fields in table

if($qry->execute()){
	echo "Records inserted successfully. ";
	header("Location:validsignup.html");
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
