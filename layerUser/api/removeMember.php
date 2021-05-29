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
                            status = 3 /*Removed from team*/
    				                WHERE userid = ?
                            AND teamid = ?;");
    $query->bind_param("ii", $uid, $teamid);

    $query2 = $con->prepare("DELETE FROM team_member
                             WHERE userid = ?
                             AND teamid = ?;");
    $query2->bind_param("ii", $uid, $teamid);

    $query3 = $con->prepare("UPDATE team SET
                            members_in_team = members_in_team - 1
                            WHERE teamid = ?;");
    $query3->bind_param("i", $teamid);

    if(($query->execute())&&($query2->execute())&&($query3->execute())){
    	echo "Member Removed.";
    }
    else{
    	echo "Couldn't Remove Member. ".mysqli_error($con);
    }

    mysqli_close($con);
}else{
echo "NOT VIEWABLE";
}
?>
