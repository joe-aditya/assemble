<?php
session_start();
$userid = $_SESSION["userid"];
include '../../layerAuthentication/config.php';
if(isset($_FILES)){
    //print_r($_FILES);
    $file = $_FILES['file'];
    if(isset($file)) {
        $filename = $_FILES['file']['name'];
        $filetmp = $_FILES['file']['tmp_name'];
        $filesize = $_FILES['file']['size'];
        $fileerror = $_FILES['file']['error'];
        $filetype = $_FILES['file']['type'];

        $fileext = explode('.', $filename);
        $fileactualext = strtolower(end($fileext));

        if ($fileerror === 0){

            $filedestination = '../img2/' . $filename;
            if(move_uploaded_file($filetmp, $filedestination)){
                $_SESSION["dp"] = $filename;
                $qry = "UPDATE user SET
                        dp = '".$filename."'
                        WHERE userid = '".$userid."';";
                $res = mysqli_query($con, $qry);

                if(!$res){
                  echo $con->error;
                }
                else {
                  echo 'uploaded';
                }
            }
            else{
                echo '0';
            }
        }
        else{
            echo '0';
        }

    }
}
else{
    echo "<script>";
    echo "alert('Access Denied');";
    echo "window.location.href = 'index.php';";
    echo "</script>";
}
?>
