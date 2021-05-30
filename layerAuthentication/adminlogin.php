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
  <title>Admin Login</title>
  <meta name="viewpoint" content="width=device-width;initial-scale=1.0">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="style2.css">

  <script>
  function verifyLogin(){
    $('#error').html("");
    $('#result').html("");
      if(!($('#a_name').val() && $('#a_pwd').val())){
           $('#error').html('Please Enter BOTH Username & Password');
      }else{
          var a_name = $('#a_name').val();
          var a_pwd = $('#a_pwd').val();

          $.post('auth_adminlogin.php', {
              a_name: a_name,
              a_pwd: a_pwd
          }, function (result, status){
              $('#result').html(result);
              console.log(status);
          })
      }
  }
  </script>
</head>

<body>
  <div>
    <form class="logform">
      <h1> Admin Login</h1>

      <div class="txtb">
        <input type="text" id="a_name" name="a_name" placeholder="Admin-ID" />
      </div>

      <div class="txtb">
        <input type="password" id="a_pwd" name="a_pwd" placeholder="Password" />
      </div>

      <div style="height:70px;;">
            <input style="padding: 20px;" type="button" class="logbtn" onclick='verifyLogin()' value="Login">

            <p id='error' style="color:red;"></p>
            <p id='result' style="color:red;"></p>
      </div>

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
