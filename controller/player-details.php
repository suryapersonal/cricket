 <?php
 	include_once('../model/queries.php');    
    $playerName = $_REQUEST['playerName'];
    $season = $_REQUEST['season'];
    $playerDetails = getPlayerDetails ($playerName, $season);    
    echo json_encode($playerDetails);
?>