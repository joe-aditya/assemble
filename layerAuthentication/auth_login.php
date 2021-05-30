<?php

session_start();
if(isset($_POST['uname'])) {
    include 'config.php';
    $uname = $_POST['uname'];
    $pwd = $con->real_escape_string( $_POST['pwd']);

    $query = 'SELECT * FROM user WHERE uname="'.$uname .'";';

    if ($result = $con->query($query)) {
        $row = $result->fetch_assoc();
        if ($row && ($pwd == $row['pwd']) ) {
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['uname'] = $row['uname'];
            $_SESSION['dp'] = $row['dp'];
            echo "<script>
                    window.location.href='check.php';
                </script>";

        } else {
          echo "<script>
                  window.location.href='invalidlogin.html';
              </script>";
        }
    } else {
        echo $con->error;
    }
}else{
    echo "NOT VIEWABLE";
}
