<?php
#insert signup data in db/redirects accordingly
include 'config.php';
$name=$_POST["name"];
$roll=$_POST["roll"];
$user=$_POST["user"];
$pwd=$_POST["pwd"];

$sql=1;//	"INSERT INTO try1table ( name, roll, user, pwd) VALUES ('$name','$roll','$user','$pwd')";
//SQL- Change the query above after creating the database n user table
// And change the form datatype in setup_profile_1.html to match the fields in table

if(mysqli_query($con, $sql)){
	echo "Records inserted successfully. ";
	header("Location:/layerUser/dashboard.html");
	//BRO- on proper setups, it should open the dashboard of respective user tat is received from
	//setup_profile_1.php
}
else{
	echo "Error in inserting data. ".mysqli_error($con);
	header("Location:invalidsetup2.html");
}//redirects to setup_profile_2.html page if credentials arent inserte
// BRO - this should go to dashboard of user with uname=luname/$uname
//localhost/assemble/setup_profile_1.html pota it shldnt go to any page
//sessions smthng use pannanum which idk so later clarify how it works


mysqli_close($con);

?>
