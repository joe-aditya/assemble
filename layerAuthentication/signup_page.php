<?php
session_start();
if(isset($_SESSION['uname'])){
echo "<script>window.location.href='../layerUser/dashboard.php';</script>";//BRO
}else{

?>

<!DOCTYPE html>
<!-- signup page/reloads after a prompt if improper data entry/redirects to signup.php to insert data in db-->
<html>

<head>
  <meta charset="utf-8">
  <title>Sign Up</title>
  <meta name="viewpoint" content="width=device-width;initial-scale=1.0">
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="../layerUser/dashboard.css">
  <script>
    function showPass() {
      var x = document.getElementById("pwd");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

    function datacheck() {
      var arr = document.getElementById("roll").value;
      var rolltype = Number(arr);
      var rolllen = arr.length;
      if (document.getElementById("name").value == "" || document.getElementById("user").value == "") {
        window.location.href = "signup.html";
        window.alert("Do NOT leave any field blank.");
      } else if (document.getElementById("pwd").value != document.getElementById("pwdc").value) {
        window.location.href = "signup.html";
        window.alert("Confirmation password does NOT match.\nPlease Re-enter your credentials.");
      } else if (rolltype != arr) {
        window.location.href = "signup.html";
        window.alert("Register number should contain ONLY numbers\nFormat: year of joining + dept. code + roll number\n(yycccrrr)");
      } else if (rolllen != 8) {
        window.location.href = "signup.html";
        window.alert("Enter a valid Register Number.\nFormat: year of joining + dept. code + roll number\n(yycccrrr)");
      }
    }

    function goback() {
      window.location.href = "../home/home.php";
      //window.alert("Get youself signed up to create your account.");
    }
  </script>
</head>

<body>

  <div class="headerrr">
    <p class="header_textt glow">ASSEMBLE</p>
  </div>

  <form action="signup.php" class="signform" method="POST" style="margin-top:40px;">
    <h1>Sign Up</h1>
    <div class="scroll">

      <div class="txtb">
        <input type="text" id="name" name="name" placeholder="Name" />
      </div>

      <div class="txtb">
        <input type="text" id="uname" name="uname" placeholder="Username" />
      </div>

      <div class="txtb">
        <input type="text" id="phno" name="phno" placeholder="Phone number" />
      </div>

      <div class="txtb">
        <input type="date" id="dob" name="dob" placeholder="dd-mm-yyyy" />
      </div>
      <!-- BRO CSS - if I change type="date", my format is 12/May/2021... DB la epdi store aagum
      or better I leave it as text input? And max date shld be todday's date -->
      <div class="txtb">
        <input type="email" id="mail" name="mail" placeholder="mailID@mail.com" />
      </div>

      <p style="display:inline; position:relative; float:left; color:#808080; padding: 0px 5px 0px 5px;">
        Gender:
      <div style="color:#333;">
        <input type="radio" name="sex" value="M"> Male
        <input type="radio" name="sex" value="F"> Female
        <!-- BRO - do we need id="sex" here? -->
      </div>
      </p>

      <p style="display:inline; position:relative; float:left;">
      <div class="txtb">
        <input type="password" id="pwd" name="pwd" placeholder="Password" />
      </div>
      <input type="button" onclick="showPass()" value="Show Password" />
      </p>

      <div class="txtb">
        <input type="password" id="pwdc" name="pwdc" placeholder="Confirm Password" />
      </div>
    </div>

    <input type="button" class="logbtn1" onclick=goback() value="Cancel">
    <input type="submit" class="logbtn2" onclick=datacheck() value="Submit">
    <!--cancel button works if window.alert is in func orelse it works as submit which still kinda works-->
  </form>
</body>

</html>

<?php
}
 ?>