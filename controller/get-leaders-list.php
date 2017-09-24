<?php
 	include_once('../model/queries.php');    
    $season = $_REQUEST['season'];
    $leadersType = $_REQUEST['leadersListType'];
    if ($leadersType == 'batting-runs') {
    	$list = getBattingRunsList ($season);
    } else {
    	$list = getWicketsList ($season);
    }   
	echo json_encode($list);
?>
