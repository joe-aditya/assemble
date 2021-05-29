<?php
session_start();
include '../../layerAuthentication/config.php';

if(isset($_POST['reportid'])){

    $reportid = $_POST['reportid'];

    $qry = $con->query("UPDATE report SET status = 2 WHERE reportid = '".$reportid."';");

    if($qry){
      echo "Gave warning.";
    }
    else{
      echo "Couldn't take action.".mysqli_error($con);
    }

mysqli_close($con);
}
else{
echo "NOT VIEWABLE";
}
?>
