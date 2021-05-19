<!DOCTYPE html>
<!-- profile setup 1 | only for first time Login into acc untill the fields are filled-->
<html>
<!-- if this setup is done, redirect to setup_profile_2.html -->
<head>
  <meta charset="utf-8">
  <title>Sign Up</title>
  <meta name="viewpoint" content="width=device-width;initial-scale=1.0">
  <link rel="stylesheet" href="style1.css">
  <script>
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

  </script>
</head>

<body>

  <div class="setHead">
    <a href="logout.html"><input type="button" class="outbtn" value="Logout"></a>
    <!--BRO - should logout the proper user -luname got from login.html/$uname as used in login.php-->
  </div>
  <div>
    <form class="setform signform"><!--action="setup_profile_1.php" class="setform signform" method="POST">-->
      <h1>Lets setup your profile!</h1>

      <div class="txtb">Organisation Name:
        <input type="text" id="org_name" name="org_name" placeholder="School/College/University/Workplace" />
      </div>

      <div class="txtb">Bio:<br>
        <textarea maxlength=50 id="bio" name="bio" rows="5" cols="10" wrap="soft" placeholder="Tell others about yourself!" >
        </textarea><!-- CSS - placeholder text isnt visible by default-->
      </div>

      <div class="txtb">Social-media links:
        <input type="text" id="sm_link" name="sm_link" placeholder="Help others find you on other platforms!" />
      </div>

      <input type="submit" class="logbtn" onclick=datacheck() value="Next">
      <!--cancel button works if window.alert is in func orelse it works as submit which still kinda works-->
    </form>
  </div>
</body>

</html>
