<?php

$link = mysql_connect("localhost", "root", "root") or die('No se pudo conectar' . mysql_error());

mysql_select_db('shop') or die('No se pudo seleccionar la base de datos');

$page = $_GET['page'];
$limit = $_GET['rows'];
$sidx = $_GET['sidx']; /*index row*/
$sord = $_GET['sord']; /*direction*/

if(!$sidx) $sidx = 1;

$result = mysql_query("SELECT COUNT(*) as count FROM clientes");
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$count = $row['count'];

if($count > 0 && $limit > 0){
  $total_pages = ceil($count/$limit);
}else{
  $total_pages = 0;
}

if ($page > $total_pages) $page = $total_pages;
$start = $limit*$page - $limit;
if ($start < 0) $start = 0;
$SQL = "SELECT * FROM clientes ORDER BY $sidx $sord LIMIT $start, $limit";
$result = mysql_query($SQL) or die ('No se ha podido ejecutar la consulta. ' . mysql_error());

$i = 0;
while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
  $response->row[$i]['id'] = $row['idCliente'];
  $response->row[$i]['cell'] = array($row['idCliente'], $row['nombre'], $row['apellido'], $row['dni'], $row['direccion'], $row['telefono'], $row['correo']);
  $i++;
}
echo json_encode($response);

?>
