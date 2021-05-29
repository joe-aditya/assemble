<?php
include '../../layerAuthentication/config.php';
session_start();

if(isset($_POST['uname'])){

    $uname = $con->real_escape_string($_POST['uname']);
    $teamid = $con->real_escape_string($_POST['teamid']);

    $res1 = mysqli_query($con,"SELECT *
                               FROM user U
                               WHERE uname = '".$uname."';");

    $row1 = $res1->fetch_assoc();
    $uid = $row1["userid"];

    $query = $con->prepare("UPDATE team_request SET
                            status = 1 /*Request rejected*/
    				                WHERE userid = ?
                            AND teamid = ?;");
    $query->bind_param("ii", $uid, $teamid);

    if($query->execute()){
    	echo "Request Rejected.";
    }
    else{
    	echo "Couldn't Reject Request. ".mysqli_error($con);
    }

    mysqli_close($con);
}else{
echo "NOT VIEWABLE";
}
?>
