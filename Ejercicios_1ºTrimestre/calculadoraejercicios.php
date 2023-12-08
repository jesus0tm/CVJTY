<?php

$op1 = $_GET['op1'];

$op2 = $_GET['op2'];

$op = $_GET['op']; 



/*function sumar($op1,  $op2) {
	return $op1 + $op2;
}

function restar($op1, $op2) {
	return $op1 - $op2;
}

function dividir($op1, $op2) {
	return $op1 / $op2;
}

function multiplicar($op1, $op2) {
	return $oper1 * $op2;
}*/

#$resultado = 1;

switch ($op) {
	case 'Sumar':
	$resultado = $op1 + $op2;
	break;

        case 'Restar':
        $resultado = $op1 - $op2;
        break;

        case 'Multiplicar':
        $resultado = $op1 * $op2;
        break;

        case 'Dividir':
        $resultado = $op1 / $op2;
        break;
}


echo "Resultado: " . $resultado;

?>
