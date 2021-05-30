<?php
session_start();
if(isset($_SESSION['uname'])){
echo "<script>window.location.href='../layerUser/dashboard.php';</script>";
}else{

?>

<!DOCTYPE html>
<!-- login page/links signup page/redirects to logcheck.php to check login credentials-->
<html>

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewpoint" content="width=device-width;initial-scale=1.0">
  <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="../layerUser/dashboardd.css">

  <script>
     function verifyLogin(){
       $('#error').html("");
       $('#result').html("");
         if(!($('#luname').val() && $('#lpwd').val())){
              $('#error').html('Please Enter BOTH Username & Password');
         }else{
             var uname = $('#luname').val();
             var pwd = $('#lpwd').val();

             $.post('auth_login.php', {
                 uname: uname,
                 pwd: pwd
             }, function (result){
                 $('#result').html(result);
                 console.log(status);
             })
         }
     }

  </script>
</head>

<body>
  <div class="headerrr">
    <p class="header_textt glow">ASSEMBLE</p>
  </div>

  <div>
    <form class="logform" style="margin-top:40px;"><!-- action="auth.php" class="logform" method="POST">-->
      <h1>Login</h1>

      <div class="txtb">
        <input type="text" id="luname" name="luname" placeholder="Username" />
      </div>

      <div class="txtb">
        <input type="password" id="lpwd" name="lpwd" placeholder="Password" />
      </div>

<div style="height:70px;">
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
        New here? <a href="signup.php">Create an account</a>
      </div>

    </form>
  </div>
</body>

</html>

<?php
}
 ?>
