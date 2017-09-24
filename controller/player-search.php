 <?php
 	include_once('../model/queries.php');    
    //get search term
    $searchTerm = $_REQUEST['search'];
    $data = searchPlayer ($searchTerm);    
    //return json data
    //echo $data;
	echo json_encode($data)
?>