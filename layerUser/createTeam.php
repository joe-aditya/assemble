<?php

session_start();
if(!isset($_SESSION['uname'])){
echo "<script>window.location.href='../layerAuthentication/login.php';</script>";//BRO
}else{
  $uname=$_SESSION['uname'];

?>

<!DOCTYPE html>
<!-- profile setup 1 | only for first time Login into acc untill the fields are filled-->
<html>
<!-- if this setup is done, redirect to setup_profile_2.html -->

<head>
  <meta charset="utf-8">
  <title>Sign Up</title>
  <meta name="viewpoint" content="width=device-width;initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="dashboard.css">
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

    function goBack() {
      window.location.href = "dashboard.php";
      //window.alert("Get youself signed up to create your account.");
    }
  </script>
</head>

<body>

  <div class="headerrr">
    <p class="header_textt glow">ASSEMBLE</p>
  </div>

  <div class="bs-example">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">

      <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
        <div class="navbar-nav; style:bottom">
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>

      <div class="navbar-nav">
        <a href="../layerAuthentication/logout.html"><input type="button" class="outbtn" value="Logout"></a>
      </div>
    </nav>
  </div>

  <div class="container" id="sidebar">
    <div class="row">
      <ul>
        <div class="d-flex justify-content-center" style="padding:20px 0px 10px 0px;">
          <div class="brand_logo_container">
            <img src="img2/avatar.png">
          </div>
        </div>

        <p class="uname_box" style="height:31px; width:220px; margin-bottom: 12px;">
          @<?php echo $uname;?>
        </p>
        <br>
        <a href="dashboard.php">
          <li><i class="fas fa-house-user" style="font-size:25px;"> Dashboard</i></li>
        </a>
      </ul>
    </div>
  </div>

  <div>

    <form action="createTeam_add.php" style="padding:12px 30px 0px 30px; margin-top: 18px;  height: 540px;" class="editform" method="POST">
      <h1>Create your Team</h1>
      <div class="scroll">
        <div class="txtb">Team Name:
          <input type="text" id="team_name" name="team_name" placeholder="Give a name to your team" />
        </div>

        <div class="txtb">Purpose:<br>
          <textarea maxlength=50 id="purpose" name="purpose" rows="2" cols="10" wrap="soft" placeholder="Reason to create this team"></textarea><!-- CSS - placeholder text isnt visible by default-->
        </div>

        <div class="txtb">Skillset needed:
          <textarea maxlength=50 id="skills_needed" name="skills_needed" rows="4" cols="10" wrap="soft" placeholder="What skillsets are you looking for!"></textarea>
      </div><!--BRO - Only 50 character is accepted in the form-->
        <div class="txtb">Criteria:
          <textarea maxlength=50 id="criteria" name="criteria" rows="4" cols="10" wrap="soft" placeholder="Mention the experience level you are looking for"></textarea>
        </div>
        <div class="txtb">Number of members needed:
          <input type="number" id="members_needed" name="members_needed" style="border-style: groove;" min="1" max="999" value="1">
        </div>
      </div>

      <input type="submit" class="logbtn" onclick=dataCheck() value="Create">
      <!--cancel button works if window.alert is in func orelse it works as submit which still kinda works-->
    </form>

  </div>


  <div class="container" id="sidebar-right" style="width:250px;">
    <div class="row">
      <div class="cardd-r" style="width:213px; margin-top:75px;">

        <div style="padding-left: 95px; margin-top: -5px;">
          <i class="fas fa-info-circle" style="font-size:25px;"></i>
        </div>

        <div class="alert info">
          <span class="closebtn">&times;</span>
          <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
        </div>

        <div class="alert warning">
          <span class="closebtn">&times;</span>
          <strong>Success!</strong> Indicates a successful or positive action.
        </div>

        <div class="alert success">
          <span class="closebtn">&times;</span>
          <strong>Info!</strong> Indicates a neutral informative change or action.
        </div>

        <script>
          var close = document.getElementsByClassName("closebtn");
          var i;

          for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
              var div = this.parentElement;
              div.style.opacity = "0";
              setTimeout(function() {
                div.style.display = "none";
              }, 600);
              document.getElementsByClassName("cardd-r").style.height = "10px";
            }
          }
        </script>
      </div>
    </div>
  </div>

</body>

</html>

<?php
}
 ?>
