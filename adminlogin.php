<?php
#checks login credentials/redirects accordingly
include 'config.php';

$a_uname=$_POST["a_uname"];//username from adminlogin.html
$a_pwd=$_POST["a_pwd"];//password from adminlogin.html
$query="SELECT * FROM assemble WHERE uname='$a_uname' AND pwd='$a_pwd'";
$result=mysqli_query($con, $query);
$count=mysqli_num_rows($result);

if($count>0){
	header("Location:adminpage.html");
}//redirects to adminpage.html page if login credentials are authenticated
// BRO - this should go to dashboard of user with uname=luname/$uname
// and this page shouldn't be accessed using its url
//localhost/assemble/adminpage.html nu pota page ku poga koodadhu
else{
	//alert("Invalis credential"); //BRO - but error coming
	header("Location:adminlogin.html");
}//redirects to login page after error msg

mysqli_close($con);

?>
