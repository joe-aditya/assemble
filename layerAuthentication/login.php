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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="../layerUser/dashboard.css">

  <script>
     function verifyLogin(){
         if(!($('#luname').val() && $('#lpwd').val())){
              $('#error').html('Please Enter Username and Password');
         }else{
             var uname = $('#luname').val();
             var pwd = $('#lpwd').val();

             $.post('auth_login.php', {
                 uname: uname,
                 pwd: pwd
             }, function (result){
                 $('#result').html(result);
             })
         }
     }

  </script>
</head>

<body>
  <div class="headerrr">
    <p class="header_textt glow">ASSEMBLE</p>
  </div>
  <p id='result'></p>
  <div>
    <form class="logform" style="margin-top:40px;"><!-- action="auth.php" class="logform" method="POST">-->
      <h1>Login</h1>

      <div class="txtb">
        <input type="text" id="luname" name="luname" placeholder="Username" />
      </div>

      <div class="txtb">
        <input type="password" id="lpwd" name="lpwd" placeholder="Password" />
      </div>
  <p id='error'></p>
      <input type="button" class="logbtn" onclick='verifyLogin()' value="Login">

      <div class="bottom-text">
        <div class="halo">
          <a href="../home/home.php">
            <img border="0" alt="home" src="img1/hm.png" width="48" height="48">
          </a>
        </div>
        <br><br>
        New here? <a href="signup_page.php">Create an account</a>
      </div>

    </form>
  </div>
</body>

</html>

<?php
}
 ?>
