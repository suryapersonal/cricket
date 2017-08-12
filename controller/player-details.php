 <?php
 	include_once('../model/queries.php');    
    $playerName = $_REQUEST['playerName'];
    $playerDetails = getPlayerDetails ($playerName);    
    echo json_encode($playerDetails);
?>