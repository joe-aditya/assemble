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
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="../layerUser/dashboardd.css">

<style>
  .m{
      margin-top: 5px;
    margin-bottom: 0px;
  }
  .h{
    height:70px;
  }
</style>

  <script>

    function showPass() {
      var x = document.getElementById("pwd");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

    function dataCheck(){

/*Error message field is cleared*/
        $('#erName').html("");
        $('#erUname').html("");
        $('#erPhno').html("");
        $('#erDob').html("");
        $('#erMail').html("");
        $('#erSex').html("");
        $('#erPwd').html("");
        $('#erPwdc').html("");

/*Getting entered data*/
        var flag = 1;
        var uname = $('#uname').val();
        var name = $('#name').val();
        var phno = $('#phno').val();
        var mail = $('#mail').val();
        var dob = $('#dob').val();
        var sex;
        var sexF = $('#sexF').is(':checked');
        var sexM = $('#sexM').is(':checked');
        var pwd = $('#pwd').val();
        var pwdc = $('#pwdc').val();

/*UserName*/
        var xyz = /^([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\.(?!\.))){0,28}(?:[A-Za-z0-9_]))?)$/.exec(uname);
        if(!(xyz)) {flag = 0;
             $('#erUname').html('Only Alpha-numerics, Period(.) and Underscore(_) are accepted. Should NOT have consecutive Periods/Underscores. Should NOT Start and End with spl. characters');
        }
        if(!(uname)) {flag = 0;
             $('#erUname').html('Please Enter an Username');
        }
/*Name*/
        var abc = /^[A-Za-z ]+$/.exec(name);
        if(!(abc)) {flag = 0;
             $('#erName').html('Only Alphabets and Spaces are accepted');
        }
        if(!(name)) {flag = 0;
             $('#erName').html('Please Enter your Name');
        }
/*Phone Number*/
        var obj = /^[0-9]+$/.exec(phno);
        if(!(obj)) {flag = 0;
             $('#erPhno').html('Only Numbers are accepted');
        }
        if(phno.length < 10) {flag = 0;
          $('#erPhno').html('Please enter 10 digit Phone Number');
        }
        if(!(phno)) {flag = 0;
             $('#erPhno').html('Please Enter your Phone Number');
        }
/*Mail ID*/
        var atpos = mail.indexOf("@");
        var dotpos = mail.lastIndexOf(".");
        if (atpos < 1 || ( dotpos - atpos < 2 ) || dotpos == mail.length-1){flag = 0;
          $('#erMail').html('Mail-ID format mismatch');
        }
        if(!(mail)) {flag = 0;
             $('#erMail').html('Please Enter your Mail-ID');
        }
/*DOB*/
        if(!(dob)) {flag = 0;
             $('#erDob').html('Please Enter your Date of Birth');
        }
/*Sex*/
        if(!(sexF || sexM)){flag = 0;
             $('#erSex').html('This field is required');
        }
        else{
          if(sexM){
            sex = 'M';
          }else{
            sex = 'F';
          }
        }
/*Pwd*/
        if(pwd.length < 5) {flag = 0;
          $('#erPwd').html('Password must be atleast 5 characters');
        }
        if(!(pwd)) {flag = 0;
             $('#erPwd').html('Please Enter a Password');
        }
/*Pwd confirmation*/
        if(pwd != pwdc) {flag = 0;
             $('#erPwdc').html('Confirmation password does not match');
        }

/*Valid Data to php by POST*/
        if(flag) {
              $.post('auth_signup.php', {
                  uname: uname,
                  name: name,
                  phno: phno,
                  mail: mail,
                  dob: dob,
                  sex: sex,
                  pwd: pwd
              }, function (result){
                  $('#erUname').html(result);
                  console.log(status);
              })
        }
      }

    function goback() {  window.location.href = "../home/home.php";  }

  </script>
</head>

<body>
  <div class="headerrr">
    <p class="header_textt glow">ASSEMBLE</p>
  </div>

  <form class="signform" style="margin-top:40px;">
    <h1>Sign Up</h1>
    <div class="scroll">

<div style="height:70px;">
      <div class="txtb m">
        <input type="text" id="name" name="name" maxlength="20" placeholder="Name" />
      </div>
      <p id='erName' style="color:red;"></p>
</div>

<div class="h">
      <div class="txtb m">
        <input type="text" id="uname" name="uname" maxlength="20" placeholder="Username" />
      </div>
      <p id='erUname' style="color:red;"></p>
</div>

<div class="h">
      <div class="txtb m">
        <input type="text" id="phno" name="phno" maxlength="10" placeholder="Phone number" />
      </div>
      <p id='erPhno' style="color:red;"></p>
</div>

<div class="h">
      <div class="txtb m">
        <input type="date" id="dob" name="dob" max='2005-01-01' min='1900-01-01' placeholder="dd-mm-yyyy" />
      </div>
      <p id='erDob' style="color:red;"></p>
</div>

<div class="h">
      <div class="txtb m">
        <input type="email" id="mail" name="mail" maxlength="30" placeholder="mailID@mail.com" />
      </div>
      <p id='erMail' style="color:red;"></p>
</div>

<div style="height:40px;">
      <p style="display:inline; position:relative; float:left; color:#808080; padding: 0px 5px 0px 5px;">
        Gender:
      <div style="color:#333;">
        <input type="radio" id="sexM" name="sex" value="M"> Male
        <input type="radio" id="sexF" name="sex" value="F"> Female
      </div>
      </p>
      <p id='erSex' style="color:red;"></p>
</div>

<div class="h">
      <div class="txtb m">
        <input type="password" id="pwd" name="pwd" placeholder="Password" />
      </div>
      <input type="button" onclick='showPass()' value="Show Password" style="display:inline; float:left;">
      <p id='erPwd' style="color:red; display:inline; float:left;"></p>
</div>

<div class="h">
      <div class="txtb m">
        <input type="password" id="pwdc" name="pwdc" placeholder="Confirm Password" />
      </div>
      <p id='erPwdc' style="color:red;"></p>
</div>

    </div>

    <input type="button" class="logbtn1" onclick='goback()' value="Cancel">
    <input type="button" class="logbtn2" onclick='dataCheck()' value="Submit">

  </form>
</body>

</html>

<?php
}
 ?>
