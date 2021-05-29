<?php
session_start();
include '../../layerAuthentication/config.php';
if(isset($_POST['uname'])){

    $uname = $con->real_escape_string($_POST['uname']);
    $teamid = $con->real_escape_string($_POST['teamid']);


$qry = 'SELECT * FROM user U
        INNER JOIN skill S
        ON U.userid = S.userid
        WHERE U.uname = "'. $uname .'"; ';

    if($result = $con->query($qry)){
      $row = $result->fetch_assoc();
?>

<style>
.carddd {
  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.5);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}
</style>

  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<div class="col-lg-12">
<div class="row">

  <div class="col-lg-3">
      <div class="carddd">
          <h4>CREATOR</h4>
          <img src="img2/<?php echo $row['dp']; ?>" height="150px" width="150px" style=" margin-top:20px; border-radius: 50%;">

          <h2>@<?php echo $row['uname']; ?></h2>
          <h5 class="title"><?php echo $row['name']; ?></h5>

          <div style="align: center; padding-left:10px; padding-right:10px;">
            <?php echo $row['bio']; ?>
          </div>
          <hr>
          <div style="margin: 15px 0; padding-left:5px; font-size:20px; text-align:left;">

            <a href="<?php echo $row['sm_link']; ?>" style="font-size:20px;">
              <i class="fa fa-link" style="font-size:22px;"></i>
              <?php echo $row['sm_link']; ?>
            </a><br>

            <i class="fa fa-phone-alt" style="font-size:22px;"> -</i><?php echo $row['phno']; ?><br>

            <i class="fa fa-envelope" style="font-size:22px;"> -</i><?php echo $row['mail']; ?><br>

          </div>
          <hr>
          <div>
          <?php $i=0; for($i=0; $i<$row['warning']; $i++){ ?>
                      <i class="fa fa-skull-crossbones" style="font-size:22px;"> </i>
          <?php } ?>
          </div>

      </div>
  </div>

<div class="col-lg-9">
  <table class="table table-striped table-dark" style=" margin-top: 50px; border-radius:20px;">
    <thead>
      <tr>
        <th style="width: 15%"></th>
        <th style="width: 85%"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th></th>
        <td><i class="fa fa-exclamation-triangle" style="font-size:27px;"> You will automatically leave the team<br>
          on submitting your report!</i>
          </td>
      </tr>
      <tr>
        <th></th>
        <td></td>
      </tr>
      <tr>
        <th></th>
        <td><textarea class="form-control txtscroll" maxlength=200 id="reportMsg" name="reportMsg" rows="6" cols="10" wrap="soft" placeholder="What is the reason for reporting this team?" style="height:180px; width:493px;"></textarea>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>
</div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <p id="modalMsg" style="align:left; font-size:25px; color:blue;"></p>
        <button type="button" class="btn btn-danger" onclick="submitReport()">
          <i class="fas fa-bookmark" style="font-size:25px;"> Submit Report</i>
        </button>
        <button type="button" class="btn btn-info" data-dismiss="modal">
          <i class="fas fa-times-circle" style="font-size:25px;"> Close</i>
        </button>
      </div>
<?php
    }
    else{
      echo $con->error;
    }
}
else{
    echo "NOT VIEWABLE";
}
