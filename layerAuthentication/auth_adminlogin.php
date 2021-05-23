	<?php

	session_start();
	if(isset($_POST['a_name'])) {
	    include 'config.php';
	    $a_name = $_POST['a_name'];
	    $a_pwd = $con->real_escape_string( $_POST['a_pwd']);

	    $query = 'SELECT * FROM admin WHERE admin_name="'.$a_name .'";';
	    if ($result = $con->query($query)) {
	        $row = $result->fetch_assoc();
	        if ($a_pwd == $row['admin_pwd']) {
	            $_SESSION['a_name'] = $row['admin_name'];
	            $_SESSION['a_pwd'] = $row['admin_pwd'];
	            echo "<script>
	                    window.location.href='../layerAdmin/adminpage.php';
	                </script>";

	        } else {
	          echo "<script>
	                  alert('Incorrect Password');
	              </script>";
	        }
	    } else {
	        echo $con->error;
	    }
	}else{
	    echo "NOT VIEWABLE";
	}
