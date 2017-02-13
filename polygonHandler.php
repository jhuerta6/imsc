<?php
	ini_set('memory_limit', '-1');
	require('config.php');
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    if($conn->connect_error){
        die('Connect Error (' . $conn->connect_errno . ') '
        . $conn->connect_error);
    }
	$toReturn = array();
	if(isset($_GET['getMode']) AND $_GET['getMode'] == "polygons"){
		//do somethig with this
		$property = $_GET['property'];
		$district = $_GET['district'];
		$lat2 = $_GET['NE']['lat'];
		$lat1 = $_GET['SW']['lat'];
		$lng2 = $_GET['NE']['lng'];
		$lng1 = $_GET['SW']['lng']; 
		$sql = "CALL getBoundedCoordinates('$district', '$property', $lat1, $lat2, $lng1, $lng2);";
		$result = $conn->multi_query($sql);
		$ids = array();
		$coords= array();
		do {
	        /* store first result set */
	        if ($result = $conn->store_result()) {
	            while ($row = $result->fetch_row()) {
	            	if(!in_array($row[0], $ids)){
	            		$ids[$row[0]][] = array($row[1], $row[2]);
	            	}
	            }
	            $result->free();
	        }
	    } while ($conn->next_result());
		$toReturn['coords'] = $ids;
	}
	else if(isset($_GET['district'])){
		$district = $_GET['district'];
		$sql = "CALL getCoordinates($district)";
		$result = $conn->query($sql);
		if($result AND $result->num_rows < 400){
			$toReturn['coords'] = $result->fetch_all();
		}
	} 
	else if(isset($_POST['columns'])){
		$sql = "SELECT * FROM attributes";
		$result = $conn->query($sql);
		$toReturn['columns'] = $result->fetch_all();
	}
	header('Content-Type: application/json');
	echo json_encode($toReturn);
	$conn->close();
?>