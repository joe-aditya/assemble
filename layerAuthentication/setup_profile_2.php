<!DOCTYPE html>
<!-- profile setup 1 | only for first time Login into acc untill the fields are filled-->
<html>

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
    <form action="setup_profile_2.php" class="setform signform" method="POST">
      <h1>The important part - your skills!</h1>

      <div class="txtb">Interest: <!-- CSS - work on apprearance-->
        <select name="interest" id="interest" required>
          <option value="Coding">Programming</option>
          <option value="Music">Music</option>
          <option value="Sports">Dance</option>
          <option value="Sports">Sports</option>
          <option value="Arts">Artwork</option>
          <option value="Arts">Cooking</option>
          <option value="Filming">Filming</option>
        </select>
      </div>

      <div class="txtb">Skills:<br>
        <textarea maxlength=50 id="skills" name="skills" rows="3" cols="10" wrap="soft" placeholder="Your expertise in the field" >
        </textarea><!-- CSS - placeholder text isnt visible by default-->
      </div>

      <div class="txtb">Experience:
        <textarea maxlength=50 id="experience" name="experience" rows="3" cols="10" wrap="soft" placeholder="Tell us about your niche!" >
        </textarea>
      </div>

      <div class="txtb">Project links/description:
        <textarea maxlength=50 id="works" name="works" rows="3" cols="10" wrap="soft" placeholder="Help others find your works!" >
        </textarea>
      </div>

      <input type="submit" class="logbtn" onclick=datacheck() value="Submit ">
      <!--cancel button works if window.alert is in func orelse it works as submit which still kinda works-->
    </form>
  </div>
</body>

</html>
