<?php
session_start();
include '../../layerAuthentication/config.php';

if(isset($_POST['reportid'])){

    $reportid = $_POST['reportid'];

    $qry = $con->query("UPDATE report SET status = 1 WHERE reportid = '".$reportid."';");

    if($qry){
      echo "Report Dismissed.";
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
