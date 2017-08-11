<?php

require('./library.php');

$ciudad = $_POST['ciudad'];
$tipo = $_POST['tipo'];
$precioLow = $_POST['precioLow'];
$precioHigh = $_POST['precioHigh'];

$data = getData();



if($ciudad!=""){
	
	foreach ($data as $key => $value) {
      if ($ciudad!=$value['Ciudad']) {
        unset($data[$key]);
      }
    }
	
}

if($tipo!=""){
	
	foreach ($data as $key => $value) {
      if ($tipo!=$value['Tipo']) {
        unset($data[$key]);
      }
    }
}

foreach ($data as $key => $value) {
	preg_match_all('!\d+!', $value['Precio'], $matches);
	$precio = ($matches[0][0]*1000 + $matches[0][1]);

	if($precio<=$precioLow || $precio>=$precioHigh){
		unset($data[$key]);
	}
}

//echo json_encode($precioLow);

echo json_encode($data);

?>