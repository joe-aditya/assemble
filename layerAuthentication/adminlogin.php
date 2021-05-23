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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="style2.css">

  <script>
  function verifyLogin(){
      if(!($('#a_name').val() && $('#a_pwd').val())){
           $('#error').html('Please Enter Username and Password');
      }else{

          var a_name = $('#a_name').val();
          var a_pwd = $('#a_pwd').val();

          $.post('auth_adminlogin.php', {
              a_name: a_name,
              a_pwd: a_pwd
          }, function (result){
              $('#result').html(result);
          })
      }
  }
  </script>
</head>

<body>
    <p id='result'></p>//BRO-if removed, no alert from js func. n is wrong username, error at line 12 in auth.php
  <div>
    <form class="logform">
      <h1> Admin Login</h1>

      <div class="txtb">
        <input type="text" id="a_name" name="a_name" placeholder="Admin-ID" />
      </div>
      <!-- username is sent to adminlogin.php as auname for authentication-->

      <div class="txtb">
        <input type="password" id="a_pwd" name="a_pwd" placeholder="Password" />
      </div>
      <!--password is sent to adminlogin.php as apwd for authentication-->

      <input type="button" class="logbtn" onclick='verifyLogin()' value="Login">
      <!--Checks if the uname & pwd fiels are empty before submiting-->

      <div class="bottom-text">
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
