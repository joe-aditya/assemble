<?php
include '../layerAuthentication/config.php';
if(isset($_POST['domain'])){

    $domain = $con->real_escape_string($_POST['domain']);

    $qry = 'SELECT team.teamid, team.creatorid, team.team_name, user.name
            FROM team
            INNER JOIN user
            ON team.creatorid = user.userid
            WHERE team.domain = "'. $domain .'";';

    if($domain=='allTeams'){
        $qry = 'SELECT team.teamid, team.creatorid, team.team_name, user.name
        FROM team
        INNER JOIN user
        ON team.creatorid = user.userid';
    }

    if($domain=='global'){
        $qry1 = 'SELECT team.teamid, team.creatorid, team.team_name, user.name
        FROM team
        INNER JOIN user
        ON team.creatorid = user.userid';
        $qry2 = 'SELECT team.teamid, team.creatorid, team.team_name, user.name
                FROM team
                INNER JOIN user
                ON team.creatorid = user.userid
                WHERE team.domain = "'. $domain .'";';
        $qry = $qry1-$qry2;
    }

    if($result = $con->query($qry)){
        $row = $result->fetch_all(MYSQLI_ASSOC);
        print_r($row);
    }
}else{
    echo "NOT VIEWABLE";
}
