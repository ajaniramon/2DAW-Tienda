<?php
$categorias[0]=array('nombre' => 'Panaderia y reposteria','id' => '1');
$categorias[1]=array('nombre' => 'Pastas y arroces','id' => '2');
$categorias[2]=array('nombre' => 'Legumbres', 'id' => '3');
$categorias[3]=array('nombre' => 'Sin gluten','id' => '4');
$categorias[4]=array('nombre' => 'Sopas y cremas','id' => '5');
$categorias[5]=array('nombre' => 'Ensaladas','id' =>'6');
$categorias[6]=array('nombre' => 'Bebidas','id' => '7');
$categorias[7]=array('nombre' => 'Setas, champinyones y tofu', 'id' => '8');
echo json_encode($categorias);

?>