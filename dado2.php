<?php

function lanzarDado() {    
    $valor = rand(1, 6);
    return $valor;
}

$conteoResultados = array_fill(1, 6, 0);
$cantidadTiradas = isset($_GET['tiradas']) ? max(1, intval($_GET['tiradas'])) : 6;


for ($i = 0; $i < 1000; $i++) {
    $resultado = lanzarDado();
    $conteoResultados[$resultado]++;
//    print(strval($resultado) . " | $i <br/>");
}


echo "<br/>Porcentaje de cada resultado:<br/>";
foreach ($conteoResultados as $numero => $conteo) {
    $porcentaje = ($conteo / $cantidadTiradas) * 100; // Calcular el porcentaje
    echo "Número $numero: $porcentaje%<br/>";
}


?>
