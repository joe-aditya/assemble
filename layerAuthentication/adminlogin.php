<?php
session_start();
if(isset($_SESSION['uname'])){
echo "<script>window.location.href='../layerUser/dashboard.php';</script>";//BRO
}else{

?>

<!DOCTYPE html>
<!-- admin login page | redirects to adminlogin.php to check login credentials-->
<html>

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewpoint" content="width=device-width;initial-scale=1.0">
  <link rel="stylesheet" href="style2.css">
  <script>

    function empty() {
      //if (document.getElementById("a_uname").value == "" || document.getElementById("a_pwd").value == "") {
    //    window.location.href = "adminlogin.html";
    //    window.alert("Enter BOTH AdminID and Password.");//TS
        //TS- send above msg to invalidlogin.html instead of alert
      }
    }
  </script>
</head>

<body>
  <div>
    <form action="adminlogin.php" class="logform" method="POST">
      <h1> Admin Login</h1>

      <div class="txtb">
        <input type="text" id="a_uname" name="a_uname" placeholder="Admin-ID" />
      </div>
      <!-- username is sent to adminlogin.php as auname for authentication-->

      <div class="txtb">
        <input type="password" id="a_pwd" name="a_pwd" placeholder="Password" />
      </div>
      <!--password is sent to adminlogin.php as apwd for authentication-->

      <input type="submit" class="logbtn" onclick=empty() value="Login">
      <!--Checks if the uname & pwd fiels are empty before submiting-->

      <div class="bottom-text">
        <!--<a href="home.html">HOME</a>-->
        <div class="halo">
          <a href="../home/home.php">
            <img border="0" alt="home" src="img1/hm.png" width="48" height="48">
          </a>
        </div>
        <br><br>
        This is NOT the login portal for users<br>
        Only for authorised personnel<br>
      </div>

    </form>
  </div>
</body>

</html>

<?php
}
 ?>