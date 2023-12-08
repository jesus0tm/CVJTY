<?php

$meses = array ();

$meses[0] = "Enero";
$meses[1] = "Febrero";
$meses[2] = "Marzo";
$meses[3] = "Abril";
$meses[4] = "Mayo";
$meses[5] = "Junio";
$meses[6] = "Julio";
$meses[7] = "Agosto";
$meses[8] = "septiembre";
$meses[9] = "Octubre";
$meses[10] = "Noviembre";
$meses[11] = "Diciembre";
       
for ($i=0; $i<count($meses); ++$i) {
	echo $meses[$i];
	echo '<br>';

}



/*$meses = array('Enero', 'Febrero', 'Marzo', 'Arbil', 'Mayo', 'Junio', 'Agosto', 'Septiembre');
for ($i=0; $i<count($meses); ++$i) {
  echo "$i)\t{$meses[$i]} \n";
}*/
?>
