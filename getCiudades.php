<?php

require("./library.php");

$field = $_POST['field'];
$data = getData();

if($field == 'ciudades'){
	
	$ciudades = array();
	foreach ($data as $key => $value) {
      
		if (!in_array($value['Ciudad'],$ciudades)) {
			array_push($ciudades,$value['Ciudad']);
		}
	}
	
	echo json_encode($ciudades);
	
}

if($field == 'tipo'){
	
	$tipo = array();
	foreach ($data as $key => $value) {
      
		if (!in_array($value['Tipo'],$tipo)) {
			array_push($tipo,$value['Tipo']);
		}
	}
	
	echo json_encode($tipo);
	
}


?>