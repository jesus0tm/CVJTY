<?php
$edat = $_GET ['edat'];

if ($edat>=0 && $edat<=3 )
{
echo 'Esta en el rango de infants';
}

elseif	 ($edat>=4 && $edat<= 17) 
{
echo 'Esta en el rango de nins';
}
elseif ($edat>=18 && $edat<= 64) 
{
echo 'Esta en el rango de adults';
}
?>
