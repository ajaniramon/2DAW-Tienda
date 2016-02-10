<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();

header("Content-Type: text/html;charset=utf-8");

$link = mysql_connect("localhost", "root", "root")  or die('No se pudo conectar' . mysql_error());

mysql_query("SET NAMES 'utf8'");

mysql_select_db('shop') or die('No se pudo seleccionar la base de datos');

$SQL = 'SELECT * FROM categoria';
$result = mysql_query($SQL) or die('Consulta fallida: ' . mysql_error());

$i=0;
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $categoria[$i]=array('nombre'=>$line["nombre"], 'id'=>$line["idCategoria"]);
        $i++;
}

echo json_encode($categoria);

mysql_free_result($result);

mysql_close($link);

?>
