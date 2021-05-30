<?php
include '../layerAuthentication/config.php';
session_start();
if(!isset($_SESSION['admin_id'])){
echo "<script>window.location.href='../layerAuthentication/login.php';</script>";//BRO
}else{
  $admin_id=$_SESSION['admin_id'];

  $qry = "SELECT * FROM admin WHERE admin_id = '".$admin_id."';";
  $res = mysqli_query($con, $qry);
  $row = $res->fetch_assoc();
  $pwd = $row['admin_pwd'];
?>
<!DOCTYPE html>
<!-- profile setup 1 | only for first time Login into acc untill the fields are filled-->
<html>
<!-- if this setup is done, redirect to setup_profile_2.html -->

<head>
  <meta charset="utf-8">
  <title>Admin | Key Settings</title>
  <meta name="viewpoint" content="width=device-width;initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../layerUser/dashboard.css">

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
        $('#erCpwd').html("");
        $('#erNpwd').html("");
        $('#erNpwdc').html("");

/*Getting entered data*/
        var flag = 1;
        var pwd = "<?php echo $pwd; ?>";
        var cpwd = $('#cpwd').val();
        var npwd = $('#npwd').val();
        var npwdc = $('#npwdc').val();

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
              $.post('api/editKey_update.php', {
                  pwd: pwd
              }, function (result){
                  $('#erCpwd').html(result);
              })
            window.location.href = "editKey.php";
        }
      }

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


<div class="container" id="sidebar" style="width:300px;">
  <div class="row">
    <ul>
      <div class="d-flex justify-content-center" style="padding:20px 0px 10px 0px;">
        <div class="brand_logo_container">
            <img src="admin_logo.png" style="border-radius:0%; height:200px; width:200px;">
        </div>
      </div>

<div class="row" style="margin-left:15px;">
      <p class="uname_box" style="height:31px; width:220px; margin-bottom: 12px;">
        ADMIN
      </p>
      <br>
      <a href="adminpage.php">
        <li><i class="fas fa-house-user" style="font-size:25px;"> Dashboard</i></li>
      </a>
    </ul>
  </div></div>
</div>

<div class="grid-container">
  <div class="grid-item">
    <div class="card" style="background-color: inherit; padding: 33px 60px 37px 60px;">
      <div class="col-sm-12">
        <div class=" cardd container">
          <h2 style="display:inline; padding-left: 13px;">Admin Profile</h2>
          <hr>

          <div class="txtscroll" style="height:393px;">
<div class="row">

            <div class="col-sm-5">

              <div class="d-flex justify-content-center" style="padding:20px 0px 10px 0px;">
                <div class="brand_logo_container">
                    <img src="admin_logo.png" style="border-radius:0%; height:250px; width:250px;">
                </div>
              </div>


            </div>
            <div class="col-sm-7">


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

<div style="height:90px;">
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
