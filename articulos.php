<?php

header("Content-Type: text/html;charset=utf-8");

$link = mysql_connect("localhost", "root", "")  or die('No se pudo conectar' . mysql_error());

mysql_query("SET NAMES 'utf8'");

mysql_select_db('shop') or die('No se pudo seleccionar la base de datos');

$id = $_POST['categoria'];

$SQL = 'SELECT * FROM articulos WHERE categoria = '.$id;
$result = mysql_query($SQL) or die('Consulta fallida: ' . mysql_error());

$i=0;
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $articulo[$i]=array('id'=>$line["idArticulos"], 'nombre'=>$line["nombre"], 'descripcion'=>$line["descripcion"], 'precio'=>$line["precio"], 'imagen'=>$line["imagen"], 'categoria'=>$line["categoria"], 'cantidad'=>$line["cantidad"] );
        $i++;
}


echo json_encode($articulo);

mysql_free_result($result);

mysql_close($link);

?>
