<?php

//init specifications
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 30000); //300 seconds = 5 minutes
//conection to utep database
$conn = mysqli_connect('ctis.utep.edu', 'ctis', '19691963', 'imsc');
//global array that will return requested data
$toReturn = array();
global $conn, $toReturn;


/*$query = "SELECT * FROM mujoins3";
$polygons = array();
$toReturn['query'] = $query;
$result = mysqli_query($conn, $query);

$result = fetchAll($result);

for ($i=0; $i < sizeof($result); $i++) {
	$polygons[] = $result[$i];
}

$toReturn['coords'] = $polygons;//fetch all */

/*$query_create = "CREATE TABLE test_php SELECT * FROM only_series";
$result_create = mysqli_query($conn, $query_create);*/

/*
$query_tmp_series = "CREATE TABLE tmp_series SELECT * FROM only_series";
$query_tmp_misc = "CREATE TABLE tmp_misc SELECT * FROM only_misc";
$query_tmp_tax = "CREATE TABLE temp_tax SELECT * FROM only_tax";

$result_series = mysqli_query($conn, $query_tmp_series);
$result_misc = mysqli_query($conn, $query_tmp_tax);
$result_tax = mysqli_query($conn, $query_tmp_misc);*/
/******************************************************/
/*
$query_create_mujoins3 = "CREATE TABLE mujoins3 SELECT * FROM noduplicates";
$result_create_mujoins3 = mysqli_query($conn, $query_noduplicate_tax);
*/

$query_mujoins3 = "SELECT * FROM mujoins3";
$polygons = array();
$toReturn['query_mujoins3'] = $query_mujoins3;
$result_mujoins3 = mysqli_query($conn, $query_mujoins3);

$mujoins3 = fetchAll($result_mujoins3);

$query_nodupmisc = "SELECT * FROM noduplicate_misc";
$toReturn['query_nodupmisc'] = $query_nodupmisc;
$result_nodupmisc = mysqli_query($conn, $query_nodupmisc);

$noduplicate_misc = fetchAll($result_nodupmisc);

$query_noduptax = "SELECT * FROM noduplicate_tax";
$toReturn['query_noduptax'] = $query_noduptax;
$result_noduptax = mysqli_query($conn, $query_noduptax);

$noduplicate_tax = fetchAll($result_noduptax);

//$toReturn['result_mujoins3'] = $mujoins3;
//$toReturn['result_nodupmisc'] = $noduplicate_misc;
//$toReturn['result_noduptax'] = $noduplicate_tax;

$final_size = sizeof($mujoins3) + sizeof($noduplicate_misc) + sizeof($noduplicate_tax);

$correct_misc = array();

//$query_create_final = "CREATE TABLE mujoins_final(mukey int(11) not null, cokey int(11))";
//$result_final = mysqli_query($conn, $query_create_final);

$mukey = 0;
$cokey = 0;

for ($i=0; $i < sizeof($noduplicate_misc); $i++) {
  $mukey = $noduplicate_misc[$i]['mukey'];
  $cokey = $noduplicate_misc[$i]['cokey'];

  for ($j=0; $j < sizeof($mujoins3); $j++) {
    if($mukey == $mujoins3[$j]['mukey']){
      //echo "found at $j"." $mukey";
    }
    else{
      array_push($correct_misc, $i);
    }
  }
}

var_dump($correct_misc);
/*for ($i=0; $i < $final_size; $i++) {
  if(array_key_exists($i, $noduplicate_misc)){
    $mukey = $noduplicate_misc[$i]['mukey'];
    $cokey = $noduplicate_misc[$i]['cokey'];

    if(in_array($mukey, $mujoins3)){
      echo "same at: $i ";
      echo "mukey: $mukey ";
      echo "cokey: $cokey ";
    }
  }
}*/

/*for ($i=0; $i < sizeof($noduplicate_misc); $i++) {
  //if(array_key_exists($i, $noduplicate_misc)){
  $mukey = $noduplicate_misc[$i]['mukey'];
  $cokey = $noduplicate_misc[$i]['cokey'];
  //}
  for ($j=0; $j < $final_size; $j++) {
    if(array_key_exists($j, $mujoins3)){
      if(in_array($mukey, $mujoins3)){
        echo "same at: $j ";
        echo "mukey: $mukey ";
        echo "cokey: $cokey ";
      }
      else{
        //echo "different at: $j ";
        //echo "mukey: $mukey ";
        //  echo "cokey: $cokey ";
      }
    }
  }
}

//echo $final_size;

/*for ($i=0; $i < sizeof($mujoins3); $i++) {
	$polygons[] = $mujoins3[$i];
}

$toReturn['all mujoins3'] = $polygons;//fetch all

/*
$done = 0;
$mukey = 0;
$array_mukey = array();
for ($i=0; $i < sizeof($result); $i++) {
  $array_mukey[$i] = $result[$i]['mukey'];
}

$unique = array();
$unique = array_unique($array_mukey, SORT_REGULAR);

$noduplicate_tax = array();

for ($i=0; $i < sizeof($result); $i++) {
  if(array_key_exists($i, $unique)){
    $noduplicate_tax[$i] = $result[$i];
  }
}

$query_noduplicate_tax = "CREATE TABLE noduplicate_tax(mukey int(11) not null, cokey int(11))";
$result_noduplicate_tax = mysqli_query($conn, $query_noduplicate_tax);

$no_duplicate_mukey = 0;
$no_duplicate_cokey = 0;

for ($i=0; $i < sizeof($noduplicate_tax); $i++) {
  if(array_key_exists($i, $noduplicate_tax)){
    $no_duplicate_mukey = $noduplicate_tax[$i]['mukey'];
    $no_duplicate_cokey = $noduplicate_tax[$i]['cokey'];
    $query_insert_noduplicate_tax = "INSERT INTO noduplicate_tax(mukey, cokey) VALUES($no_duplicate_mukey, $no_duplicate_cokey)";
    $result_insert_noduplicate_tax = mysqli_query($conn, $query_insert_noduplicate_tax);
  }
}

/*$unique_index = array();

/*for ($i=0; $i < sizeof($result); $i++) {
  if(array_key_exists($i, $unique)){
    array_push($unique_index, $i);
  }
}*/

//var_dump($array_mukey);
//var_dump($unique);
//var_dump($noduplicate_tax);

//header('Content-Type: application/json');
echo json_encode($toReturn);
$conn->close();

function fetchAll($result){
	$temp = array();
	while($row = mysqli_fetch_assoc($result)){
		$temp[] = $row;
	}
	return $temp;
}

?>
