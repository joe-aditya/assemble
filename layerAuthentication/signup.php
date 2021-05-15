<?php
#insert signup data in db/redirects accordingly
include 'config.php';
$name=$_POST["name"];
$roll=$_POST["roll"];
$user=$_POST["user"];
$pwd=$_POST["pwd"];

$sql="INSERT INTO try1table ( name, roll, user, pwd) VALUES ('$name','$roll','$user','$pwd')";
//SQL- Change the query above after creating the database n user table
// And change the form datatype in signup.html to match the fields in table

if(mysqli_query($con, $sql)){
	echo "Records inserted successfully. ";
	header("Location:validsignup.html");
}
else{
	echo "Error in inserting data. ".mysqli_error($con);
	header("Location:invalidsignup.html");
}

mysqli_close($con);

?>
