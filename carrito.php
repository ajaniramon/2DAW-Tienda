<?php
  session_start();
  $carrito = $_POST["carrito"];

  $obj_carrito = new stdClass(); //Construyes obj
  $obj_carrito = json_decode($carrito);

 /*meter el carrito a la bd*/
 header("Content-Type: text/html; charset=utf-8");
 $link = mysql_connect("localhost", "root", "") or die ("No se pudo conectar a la BD" . mysql_error());

 mysql_query("SET NAMES utf8");
 mysql_select_db("shop") or die ("No se pudo seleccionar la base de datos");

 //Cuando haya un sistema de usuarios funcional, hay que pasar el DNI del usuario en el carrito para ponerle el pedido a su nombre.
 $SQL = 'INSERT INTO pedido(fecha,total,dni) VALUES (' . $obj_carrito->fecha . ',' . $obj_carrito->total . ',"52365874f")';
 /*
 for each de cada articulo en el carrito
 "INSERT INTO linea_pedido(idPedido, idArticulo, unidad, precio, precioTotal) VALUES ()";*/
 mysql_query($SQL) or die('Consulta fallida: ' . mysql_error());
 mysql_close($link);
 echo "as";
?>
