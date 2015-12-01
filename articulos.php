<?php
$id = $_POST['categoria'];
switch($id){
case 1:
//id,nombre, descripcion,precio, imagen, categoria
$articulo[0]=array('id' => '1', 'nombre' => 'Pan rustico','descripcion' => 'Pan rustico normal', 'precio' => '3', 'imagen' => 'pan.png', 'categoria' => '1','cantidad' => '1');
$articulo[1]=array('id' => '2', 'nombre' => 'Pan chapata','descripcion' => 'Pan chapata normal', 'precio' => '4', 'imagen' => 'chapata.png', 'categoria' => '1','cantidad' => '1');
break;

case 2:
$articulo[0]=array('id' => '3', 'nombre' => 'Espaguetis de musgo','descripcion' => 'Para los veganos extremistas', 'precio' => '20', 'imagen' => 'esp.png', 'categoria' => '2','cantidad' => '1');
$articulo[1]=array('id' => '4', 'nombre' => 'Arroz con brocoli','descripcion' => 'Quien dijo que iba a estar amargo', 'precio' => '10', 'imagen' => 'arroz.png', 'categoria' => '2','cantidad' => '1');
break;

case 3:
$articulo[0]=array('id' => '5', 'nombre' => 'Judias verdes','descripcion' => 'judias', 'precio' => '5', 'imagen' => 'judias.png', 'categoria' => '3','cantidad' => '1');
$articulo[1]=array('id' => '6', 'nombre' => 'Judias radioactivas','descripcion' => 'A veces me entran picores...', 'precio' => '3', 'imagen' => 'radio.png', 'categoria' => '3','cantidad' => '1');
break;

case 4: 
$articulo[0]=array('id' => '7', 'nombre' => 'Articulo sin gluten 1','descripcion' => 'Desratizado con cianuro de hidrogeno.', 'precio' => '3', 'imagen' => 'gluten.png', 'categoria' => '4','cantidad' => '1');
$articulo[1]=array('id' => '8', 'nombre' => 'Óxido de hierro III','descripcion' => 'No tiene gluten, lo puedo vender', 'precio' => '3', 'imagen' => 'oxido.png', 'categoria' => '4','cantidad' => '1');

break;

case 5:
$articulo[0]=array('id' => '9', 'nombre' => 'Sopa de tomate','descripcion' => 'Sopa de tomate', 'precio' => '3', 'imagen' => 'tomate.png', 'categoria' => '5','cantidad' => '1');
$articulo[1]=array('id' => '10', 'nombre' => 'Crema de calabacin','descripcion' => 'agh, que asco.', 'precio' => '3', 'imagen' => 'calabacin.png', 'categoria' => '5','cantidad' => '1');

break;

case 6: 
$articulo[0]=array('id' => '11', 'nombre' => 'Ensalada de lechuga','descripcion' => 'y ya esta', 'precio' => '3', 'imagen' => 'pan.png', 'categoria' => '6','cantidad' => '1');
$articulo[1]=array('id' => '12', 'nombre' => 'Ensalada de canonigos','descripcion' => 'meat is murder', 'precio' => '3', 'imagen' => 'pan.png', 'categoria' => '6','cantidad' => '1');

break;

case 7:
$articulo[0]=array('id' => '13', 'nombre' => 'Coca-Cola','descripcion' => 'Beba coke.', 'precio' => '3', 'imagen' => 'cocacola.png', 'categoria' => '7','cantidad' => '1');
$articulo[1]=array('id' => '14', 'nombre' => 'Vodka Rojo','descripcion' => 'Beba con responsabilidad.', 'precio' => '3', 'imagen' => 'vodka.png', 'categoria' => '7','cantidad' => '1');

break;

case 8:
$articulo[0]=array('id' => '15', 'nombre' => 'Setas alucinógenas','descripcion' => 'te ponen to entripao', 'precio' => '3', 'imagen' => 'seta.png', 'categoria' => '8','cantidad' => '1');
$articulo[1]=array('id' => '16', 'nombre' => 'Psillocybe Hollandia','descripcion' => ':D', 'precio' => '3', 'imagen' => 'seta.png', 'categoria' => '8','cantidad' => '1');
break;
}
echo json_encode($articulo);
?>