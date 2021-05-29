<?php
session_start();
if ((isset($_SESSION['uname']))||(isset($_SESSION['a_name'])))
    session_destroy();
    header('Location: ../home/home.php');
?>
