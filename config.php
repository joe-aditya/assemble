<?php
#connects to server/database
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="assemble";

$con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$con){
	echo "Could not connect to database. ".mysqli_error($con);
}
else{
	echo "Connected to server. ";
}

?>

<!--$db=new mysqli(a,a,a,a) or die("Unable to connect to db");-->
