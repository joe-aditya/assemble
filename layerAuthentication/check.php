<?php
#checks login credentials/redirects to dashboard or to setup profile
session_start();
if(!isset($_SESSION['uname'])){
    echo "NOT VIEWABLE";
}else{
include 'config.php';

$userid=$_SESSION['userid'];
$query="SELECT * FROM skill WHERE userid='" . $userid ."';";
$name ="SELECT name FROM user WHERE userid='" . $userid ."';";

$result=mysqli_query($con, $query);
$count=mysqli_num_rows($result);

$res=mysqli_query($con, $name);
$row=$res->fetch_row();

if($count>0){/*
  echo "<script>
          alert('Hello ".$row[0] .", logged in Successfully.');
      </script>";*/
	echo "<script>
          window.location.href='../layerUser/dashboard.php';
        </script>";
}
else{
  echo "<script>
          alert('Hey! ".$row[0] .", seems like you are a new user. Lets set up your profile!');
          window.location.href='setup_profile_1.php';
      </script>";
}

mysqli_close($con);
}
?>
