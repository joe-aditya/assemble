<?php
include '../layerAuthentication/config.php';
session_start();
if(!isset($_SESSION['uname'])){
echo "<script>window.location.href='../layerAuthentication/login.php';</script>";//BRO
}else{
  $userid=$_SESSION['userid'];
  $uname=$_SESSION['uname'];
  $dp=$_SESSION['dp'];

  $qry = "SELECT * FROM user WHERE userid = '".$userid."';";
  $res = mysqli_query($con, $qry);
  $row = $res->fetch_assoc();

  $pwd = $row['pwd'];
  $name = $row['name'];
  $phno = $row['phno'];
  $sex = $row['sex'];
  $mail = $row['mail'];
  $dob = $row['dob'];
  $bio = $row['bio'];
  $org_name = $row['org_name'];
  $sm_link = $row['sm_link'];
?>
<!DOCTYPE html>
<!-- profile setup 1 | only for first time Login into acc untill the fields are filled-->
<html>
<!-- if this setup is done, redirect to setup_profile_2.html -->

<head>
  <meta charset="utf-8">
  <title>@<?php echo $uname; ?> | My Profile</title>
  <meta name="viewpoint" content="width=device-width;initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="dashboard.css">

  <style>
    .m{
        margin-top: 5px;
      margin-bottom: 0px;
    }
    .h{
      height:90px;
    }
  </style>

  <script>
    function showPass() {
      var x = document.getElementById("npwd");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

    function dataCheck(){

/*Error message field is cleared*/
        $('#erName').html("");
        $('#erSmLink').html("");
        $('#erPhno').html("");
        $('#erDob').html("");
        $('#erBio').html("");
        $('#erOrgName').html("");
        $('#erMail').html("");
        $('#erSex').html("");
        $('#erCpwd').html("");
        $('#erNpwd').html("");
        $('#erNpwdc').html("");

/*Getting entered data*/
        var flag = 1;
        var smlink = $('#sm_link').val();
        var name = $('#name').val();
        var phno = $('#phno').val();
        var mail = $('#mail').val();
        var dob = $('#dob').val();
        var sex;
        var sexF = $('#sexF').is(':checked');
        var sexM = $('#sexM').is(':checked');
        var pwd = "<?php echo $pwd; ?>";
        var cpwd = $('#cpwd').val();
        var npwd = $('#npwd').val();
        var npwdc = $('#npwdc').val();
        var bio = $('#bio').val();
        var orgname = $('#org_name').val();
/*Bio*/
        if(!(bio)) {flag = 0;
             $('#erBio').html('Do not leave your bio empty');
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
/*Social-Media Link*/
        if(!(smlink)) {flag = 0;
             $('#erSmLink').html('Please Enter your Social-media link');
        }
/*Name*/
        var abc = /^[A-Za-z ]+$/.exec(name);
        if(!(abc)) {flag = 0;
             $('#erName').html('Only Alphabets and Spaces are accepted');
        }
        if(!(name)) {flag = 0;
             $('#erName').html('Please Enter your Name');
        }
/*DOB*/
        if(!(dob)) {flag = 0;
             $('#erDob').html('Please Enter your Date of Birth');
        }
/*Org Name can be NULL*/
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
/*Password change*/
        if(cpwd) {
            /*Current Pwd*/
            if(cpwd != pwd) {flag = 0;
                 $('#erCpwd').html('Incorrect password');
            }
            /*Pwd*/
            if(npwd.length < 5) {flag = 0;
              $('#erNpwd').html('Password must be atleast 5 characters');
            }
            if(!(npwd)) {flag = 0;
                 $('#erNpwd').html('Please Enter a New Password');
            }
            /*Pwd confirmation*/
            if(npwd != npwdc) {flag = 0;
                 $('#erNpwdc').html('Confirmation password does not match');
            }
        }
        else{
          if(npwd){flag=0;
            $('#erCpwd').html('Please Enter your Current Password');
          }
        }

        if((flag)&&(cpwd)&&(npwd)){
          pwd = npwd;
        }

/*Valid Data to php by POST*/
        if(flag) {
              $.post('editProfile_update.php', {
                  bio: bio,
                  phno: phno,
                  mail: mail,
                  smlink: smlink,
                  name: name,
                  dob: dob,
                  orgname: orgname,
                  sex: sex,
                  pwd: pwd
              }, function (result){
                  $('').html(result);
              })
            window.location.href = "editProfile.php";
        }
      }

      function uploadDP(){
        var fd = new FormData();
        var files = $('#dp')[0].files[0];

        fd.append('file',files);
        $.ajax({
            url: 'api/upload_avatar.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            cache: false,
            success: function(response){
            if(response!=0){
                //alert(response);
                location.reload();
            }else{
                alert("Upload failed");
            }
            },
        });
      }

    function goBack() {window.location.href = "dashboard.php";}
  </script>
</head>
<div class="headerrr">
  <p class="header_textt glow">ASSEMBLE</p>
</div>

<div class="bs-example">
  <nav class="navbar navbar-expand-md droop navbar-dark">
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
      <div class="navbar-nav; style:bottom">
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
          <img src="img2/<?php echo $dp; ?>">
        </div>
      </div>

      <p class="uname_box" style="height:31px; width:220px; margin-bottom: 12px;">
        @<?php echo $uname; ?>
      </p>
      <br>
      <a href="dashboard.php">
        <li><i class="fas fa-house-user" style="font-size:25px;"> Dashboard</i></li>
      </a>
    </ul>
  </div>
</div>

<div class="grid-container">
  <div class="grid-item">
    <div class="card" style="background-color: inherit; padding: 33px 60px 37px 60px;">
      <div class="col-sm-12">
        <div class=" cardd container">
          <h2 style="display:inline; padding-left: 13px;">My Profile</h2>
          <hr>

          <div class="txtscroll" style="height:393px;">
<div class="row">

            <div class="col-sm-6">

                    <div class="flex-fill">
                      Update DP:
                      <input type="file" id="dp" name="dp" accept="image/png, image/jpeg" style="color: black;">
                      <input type="button" value="Change DP" onclick='uploadDP()'>
                    </div>
<br>

<div style="height:110px;">
                    <div class="flex-fill">
                      <div class="m txtb" style="padding: 0px 0px 0px 0px;">
                        Bio:
                        <textarea maxlength=100 id="bio" name="bio" rows="3" cols="20" wrap="hard" placeholder="Tell others about yourself!"><?php echo $bio; ?></textarea>
                      </div>
                        <p id='erBio' style="color:red;"></p>
                    </div>
</div>
                    <h4 style="text-align:center; margin-top:20px;">Contact details</h4>

<div class="h">
                    <div class="flex-fill">
                      <div class="m txtb">
                        Phone Number:
                        <input maxlength=10 type="text" id="phno" name="phno" placeholder="Phone number" value="<?php echo $phno; ?>" />
                      </div>
                    </div>
                    <p id='erPhno' style="color:red;"></p>
</div>

<div class="h">
                    <div class="flex-fill">
                      <div class="m txtb">
                        Mail-ID:
                        <input type="email" id="mail" name="mail" placeholder="mailID@mail.com" value="<?php echo $mail; ?>" />
                      </div>
                    </div>
                    <p id='erMail' style="color:red;"></p>
</div>

<div class="h">
                    <div class="flex-fill">
                      <div class="m txtb">
                        Social-Media Link:
                        <input type="text" id="sm_link" name="sm_link" placeholder="Help others find you on other platforms!" value="<?php echo $sm_link; ?>" />
                      </div>
                    </div>
                    <p id='erSmLink' style="color:red;"></p>
</div>

            </div>
            <div class="col-sm-6">

                    <h4 style="text-align:center;">Personal Info</h4>

<div class="h">
                    <div class="flex-fill">
                      <div class="m txtb">Name:
                        <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $name; ?>" />
                      </div>
                    </div>
                    <p id='erName' style="color:red;"></p>
</div>

<div class="h">
                    <div class="flex-fill">
                      <div class="m txtb">Date of Birth:
                        <input type="date" id="dob" name="dob" value="<?php echo strftime('%Y-%m-%d', strtotime($dob)); ?>" placeholder="dd-mm-yyyy" />
                      </div>
                    </div>
                    <p id='erDob' style="color:red;"></p>
</div>

<div class="h">
                    <div class="flex-fill">
                      <div class="m txtb">Organisation Name:
                        <input type="text" id="org_name" name="org_name" value="<?php echo $org_name; ?>" placeholder="School/College/University/Workplace" />
                      </div>
                    </div>
                    <p id='erOrgName' style="color:red;"></p>
</div>

<div style="height:40px;">
                    <div class="flex-fill">
                      <p style="display:inline; position:relative; float:left; padding: 0px 5px 0px 0px;">
                        Gender:
                      <div style="margin-top:10px;">
                      <?php if($sex=='M'){ ?>
                        <input type="radio" id="sexM" name="sex" value="M" checked> Male
                        <input type="radio" id="sexF" name="sex" value="F"> Female
                      <?php }else{ ?>
                        <input type="radio" id="sexM" name="sex" value="M"> Male
                        <input type="radio" id="sexF" name="sex" value="F" checked> Female
                      <?php } ?>

                      </div>
                      <p id='erSex' style="color:red;"></p>
                      </p>
                    </div>

</div>

                    <h4 style="text-align:center; margin-top:35px;">Change Password</h4>

<div style="height:60px;">
                    <div class="flex-fill">
                      <div class="m txtb">
                        <input type="password" id="cpwd" name="cpwd" placeholder="Current Password" />
                      </div>
                    </div>
                    <p id='erCpwd' style="color:red;"></p>
</div>

<div style="height:60px;">
                    <div class="flex-fill">
                      <div class="m txtb">
                        <input type="password" id="npwd" name="npwd" placeholder="New Password" />
                      </div>
                    </div>
                    <p id='erNpwd' style="color:red;"></p>
</div>

<div style="height:70px;">
                    <div class="flex-fill">
                      <div class="m txtb">
                        <input type="password" id="npwdc" name="npwdc" placeholder="Confirm New-Password" />
                      </div>
                    </div>
                    <p id='erNpwdc' style="color:red;"></p>
</div>

              </div>

</div>
              <input type="button" class="logbtn" onclick='dataCheck()' value="Save Changes" >
            </div>

        </div>
      </div>
    </div>
  </div>
</div>
</body>

</html>
<?php
}
?>
