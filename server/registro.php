<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
  session_start();
  $cliente = $_POST['cliente'];
  $clienteObjeto = new stdClass();
  $clienteObjeto = json_decode($cliente);

  header("Content-Type: text/html; charset=utf-8");
  $link = mysql_connect("localhost", "root", "root") or die ("No se pudo conectar a la BD" . mysql_error());
   mysql_select_db("shop") or die ("No se pudo seleccionar la base de datos");

  mysql_query("SET NAMES utf8");

  $SQL = "INSERT INTO cliente(idCliente,nombre,apellido,dni,direccion,telefono,correo,contrasenya,empleado) VALUES(null," . "'" . $clienteObjeto->nombre . "'," . "'" . $clienteObjeto->apellido . "'," . "'" . $clienteObjeto->dni . "'," ."'" . $clienteObjeto->direccion . "',"."'" . $clienteObjeto->telefono . "'," . "'" . $clienteObjeto->correo . "'," . "'" . md5($clienteObjeto->contrasenya) . "','false');";

  mysql_query($SQL) or die('Consulta fallida: ' . mysql_error());

  echo "¡OK! Ahora puedes iniciar sesión. ";

?>