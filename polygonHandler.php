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
		$sql = "CALL getObjectIds('$property', '$district')";
		$result = $conn->multi_query($sql);
		$ids = array();
		do {
	        /* store first result set */
	        if ($result = $conn->store_result()) {
	            while ($row = $result->fetch_row()) {
	                array_push($ids, $row);
	            }
	            $result->free();
	        }
	    } while ($conn->next_result());
		
		$sql = "";
		foreach($ids as $id){
			$id = $id[0];
			$sql .= "CALL getCoordinates($id);";
		}
		//echo $sql;
		$result = $conn->multi_query($sql);
		$coords = array();
		do {
	        /* store first result set */
	        if ($result = $conn->store_result()) {
	        	$polygon = array();
	            while ($row = $result->fetch_row()) {
	                array_push($polygon, $row);
	            }
				array_push($coords, $polygon);
	            $result->free();
	        }
	    } while ($conn->next_result());
	    $toReturn['coords'] = $coords;
		
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