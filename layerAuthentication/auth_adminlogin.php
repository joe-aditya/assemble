	<?php

	session_start();
	if(isset($_POST['a_name'])) {
	    include 'config.php';
	    $a_name = $_POST['a_name'];
	    $a_pwd = $con->real_escape_string( $_POST['a_pwd']);

	    $query = 'SELECT * FROM admin WHERE admin_name="'.$a_name .'";';
	    if ($result = $con->query($query)) {
	        $row = $result->fetch_assoc();
	        if ($row && ($a_pwd == $row['admin_pwd'])) {
	            $_SESSION['admin_id'] = $row['admin_id'];
	            echo "<script>
	                    window.location.href='../layerAdmin/adminpage.php';
	                </script>";

								} else {
				          echo 'Incorrect Credential(s)';
				        }
	    } else {
	        echo $con->error;
	    }
	}else{
	    echo "NOT VIEWABLE";
	}
