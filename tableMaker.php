<?php
/*
//init specifications
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 30000); //300 seconds = 5 minutes
//conection to utep database
$conn = mysqli_connect('ctis.utep.edu', 'ctis', '19691963', 'imsc');
//global array that will return requested data
$toReturn = array();
global $conn, $toReturn;

$query = "SELECT * FROM mujoins3";
$polygons = array();
$toReturn['query'] = $query;
$result = mysqli_query($conn, $query);

$result = fetchAll($result);

for ($i=0; $i < sizeof($result); $i++) {
	$polygons[] = $result[$i];
}

$toReturn['coords'] = $polygons;//fetch all

$query_create = "CREATE TABLE test_php SELECT * FROM only_series";
$result_create = mysqli_query($conn, $query_create);


header('Content-Type: application/json');
echo json_encode($toReturn);
$conn->close();

function fetchAll($result){
	$temp = array();
	while($row = mysqli_fetch_assoc($result)){
		$temp[] = $row;
	}
	return $temp;
} */
?>
