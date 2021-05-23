<?php
/*
#checks login credentials/redirects accordingly
include 'config.php';

$uname=$_POST["luname"];//username from login.html
$pwd=$_POST["lpwd"];//password from login.html
$query="SELECT * FROM user WHERE uname='$uname' AND pwd='$pwd'";
$result=mysqli_query($con, $query);
$count=mysqli_num_rows($result);

if(1||$count>0){//FLAG
	header("Location:check.php");
}//redirects to dashboard.html page if login credentials are authenticated
// BRO - this should go to dashboard of user with uname=luname/$uname
//localhost/assemble/dashboard.html pota it shldnt go to any page
//sessions smthng use pannanum which idk so later clarify how it works
//if first time login... shld go to setup_profile_1.html for the respective user
else{
	header("Location:invalidlogin.html");
}//redirects to login page after error msg

mysqli_close($con);
*/

session_start();
if(isset($_POST['uname'])) {
    include 'config.php';
    $uname = $_POST['uname'];
    $pwd = $con->real_escape_string( $_POST['pwd']);

    $query = 'SELECT * FROM user WHERE uname="'.$uname .'";';
    if ($result = $con->query($query)) {
        $row = $result->fetch_assoc();
        if ($pwd == $row['pwd']) {
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['uname'] = $row['uname'];
            echo "<script>
                    alert('Hello ".$row['name'] .", logged in Successfully.');
                    window.location.href='check.php';
                </script>";
        } else {
            echo 'Incorrect Password';
        }
    } else {
        echo $con->error;
    }
}else{
    echo "NOT VIEWABLE";
}
