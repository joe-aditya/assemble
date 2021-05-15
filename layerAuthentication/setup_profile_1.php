<?php
#insert signup data in db/redirects accordingly
include 'config.php';
$name=$_POST["name"];
$roll=$_POST["roll"];
$user=$_POST["user"];
$pwd=$_POST["pwd"];

$sql="INSERT INTO try1table ( name, roll, user, pwd) VALUES ('$name','$roll','$user','$pwd')";
//SQL- Change the query above after creating the database n user table
// And change the form datatype in setup_profile_1.html to match the fields in table
$sql2=1;//query to check if profile page setup is done
if( 1 || mysqli_query($con, $sql) || mysqli_query($con, $sql2)){ //FLAG - always true
	echo "Records inserted successfully. ";
	header("Location:setup_profile_2.html");
}
//BRO - tis should go to setup2 for the respective user carrying their uname
else{
	echo "Error in inserting data. ".mysqli_error($con);
	header("Location:invalidsetup1.html");
}//redirects to setup_profile_2.html page if credentials are inserted
// BRO - this should go to dashboard of user with uname=luname/$uname
//localhost/assemble/setup_profile_1/2.html pota it shldnt go to any page
//sessions smthng use pannanum which idk so later clarify how it works


mysqli_close($con);

?>
