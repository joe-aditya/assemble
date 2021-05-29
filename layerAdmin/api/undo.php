<?php
session_start();
include '../../layerAuthentication/config.php';

if(isset($_POST['reportid'])){

    $reportid = $_POST['reportid'];

    $res = $con->query('SELECT * FROM report
            WHERE reportid = "'.$reportid.'" ;');
    $row = $res->fetch_assoc();

    $res1 = $con->query('SELECT * FROM team T
                         INNER JOIN user U
                         ON T.creatorid = U.userid
                         INNER JOIN skill S
                         ON U.userid = S.userid
                         WHERE teamid = "'.$row["reported_on"].'" ;');
    $row1 = $res1->fetch_assoc();

    if($row['status']==1){
        $qry2 = $con->query("UPDATE report SET status = 0 WHERE reportid = '".$reportid."';");

        if($qry2){
          echo 'Review Pending';
        }
        else{
          echo "Couldn't take action.".mysqli_error($con);
        }
    }
    else{
        $qry3 = $con->query("UPDATE report SET status = 0 WHERE reportid = '".$reportid."';");
        $qry4 = $con->query("UPDATE user SET warning = warning - 1 WHERE userid = '".$row1['creatorid']."' ;");

        if(($qry3)&&($qry4)) {
          echo "Review Pending.";
        }
        else{
          echo "Couldn't take action.".mysqli_error($con);
        }
    }


mysqli_close($con);
}
else{
echo "NOT VIEWABLE";
}
?>
