<?php
#checks login credentials/redirects accordingly
include 'config.php';

$uname=$_POST["luname"];//username from login.html
$pwd=$_POST["lpwd"];//password from login.html
$query="SELECT * FROM assemble WHERE uname='$uname' AND pwd='$pwd'";
$result=mysqli_query($con, $query);
$count=mysqli_num_rows($result);

if($count>0){
	header("Location:dashboard.html");
}//redirects to dashboard.html page if login credentials are authenticated
// BRO - this should go to dashboard of user with uname=luname/$uname
//localhost/assemble/dashboard.html pota it shldnt go to any page
//sessions smthng use pannanum which idk so later clarify how it works
//if first time login... shld go to setup_profile_1.html for the respective user
else{
	header("Location:invalidlogin.html");
}//redirects to login page after error msg

mysqli_close($con);

?>
