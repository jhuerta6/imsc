<?php
	require('config.php');
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    if($conn->connect_error){
        die('Connect Error (' . $conn->connect_errno . ') '
        . $conn->connect_error);
    }
	$toReturn = array();
	if(isset($_GET['district'])){
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