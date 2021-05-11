<?php
#checks login credentials/redirects accordingly
include 'config.php';

$uname=$_POST["luname"];//username from login.html
$pwd=$_POST["lpwd"];//password from login.html
$query="SELECT * FROM assemble WHERE uname='$uname' AND pwd='$pwd'";
$result=mysqli_query($con, $query);
$count=mysqli_num_rows($result);

if($count>0){
	header("Location:home.html");
}//redirects to home page if login credentials are authenticated
// BRO - this should go to dashboard of user with uname=luname/$uname
//dashboard page is named as " .html"
else{
	header("Location:invalidlogin.html");
}//redirects to login page after error msg

mysqli_close($con);

?>
