<?php

header("Content-Type: text/html;charset=utf-8");

$link = mysql_connect("localhost", "root", "")  or die('No se pudo conectar' . mysql_error());

mysql_query("SET NAMES 'utf8'");

mysql_select_db('shop') or die('No se pudo seleccionar la base de datos');

$SQL = 'SELECT * FROM categorias';
$result = mysql_query($SQL) or die('Consulta fallida: ' . mysql_error());

$i=0;
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $categorias[$i]=array('nombre'=>$line["nombre"], 'id'=>$line["idCategorias"]);
        $i++;
}

echo json_encode($categorias);

mysql_free_result($result);

mysql_close($link);

?>
