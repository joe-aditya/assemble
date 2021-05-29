<?php
session_start();
include '../../layerAuthentication/config.php';
if(isset($_POST['uname'])){

    $uname = $con->real_escape_string($_POST['uname']);
    $teamid = $con->real_escape_string($_POST['teamid']);


  /*  $qry = 'SELECT *
            FROM team_request R
            INNER JOIN user U
            ON R.userid = U.userid
            WHERE R.teamid = "'. $teamid .'"
            AND U.uname = "'. $uname .'";';*/

$qry = 'SELECT * FROM user WHERE uname = "'. $uname .'"; ';

    if($result = $con->query($qry)){
      $row = $result->fetch_assoc();
?>
      <div class="col-md-3 joinedbox">
          <h5>
            <center><?php echo $row['uname']; ?></center>
          </h5>
          <p class="form-control txtscroll joined_purpose" style="height:80px; margin-bottom: 8px;">

            <?php echo $row['bio']; ?>
          </p>
      </div>



      <!-- Modal footer -->
      <div class="modal-footer">
        <p id="modalMsg" style="align:left; font-size:25px; color:blue;"></p>
        <button type="button" class="btn btn-danger" onclick="reject('<?php echo $row["uname"]; ?>')">
          <i class="fas fa-user-times" style="font-size:25px;"> Reject Request</i>
        </button>
        <button type="button" class="btn btn-success" onclick="accept('<?php echo $row["uname"]; ?>')">
          <i class="fas fa-user-plus" style="font-size:25px;"> Add to Team</i>
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
