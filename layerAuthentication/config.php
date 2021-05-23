<?php
#connects to server/database
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="assemble";

$con=new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($con->connect_error){
	echo "Could not connect to database. ".$con->connect_error;
}
?>