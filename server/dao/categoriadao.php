<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
$metodo = $_SERVER['REQUEST_METHOD'];
$objeto = new StdClass();

if ($metodo == 'GET') {
	
}else if($metodo == 'POST'){

	$objeto = json_decode($_POST['categoria']);
	
	if (strcmp($objeto->accion,"d") == 0) {
		borrar($objeto->idCategoria);
	}

	if (strcmp($objeto->accion,"i") == 0) {
		insertar($objeto);
	}
	if (strcmp($objeto->accion,"a") == 0) {
		actualizar($objeto);
	}
}

function borrar($idCategoria){
  $link = mysql_connect("localhost", "root", "root") or die ("No se pudo conectar a la BD" . mysql_error());
  mysql_query("SET NAMES utf8");
  mysql_select_db("shop") or die ("No se pudo seleccionar la base de datos");

  $SQL = "DELETE from categoria WHERE idCategoria = " . $idCategoria;

 $success =  mysql_query($SQL,$link);

 if (!$success) {
 	echo "Error al borrar. La categoría tiene productos asociados.";
 	http_response_code(400);
 }else{
 	echo "Borrado correctamente.";
 	http_response_code(200);
 }
 mysql_close($link);

}

function insertar($categoria){
	$link = mysql_connect("localhost", "root", "root") or die ("No se pudo conectar a la BD" . mysql_error());
  mysql_query("SET NAMES utf8");
  mysql_select_db("shop") or die ("No se pudo seleccionar la base de datos");

  $selectSql = "SELECT * FROM categoria WHERE nombre = "."'".$categoria->nombre."'";
  if (!$resultado = mysql_query($selectSql)) {
  	die(mysql_error());
  }else if(mysql_num_rows($resultado) == 0){
  	$insertSql = "INSERT INTO categoria VALUES(null," . "'". $categoria->nombre. "'" . ");";
  	$resultado = mysql_query($insertSql) or die('Consulta fallida: ' . mysql_error());
        echo "Categoria insertada con exito.";
  }else{
  	http_response_code(400);
  	echo "La categoría ya existe";
  }


  
   
}

function actualizar($categoria){
  $link = mysql_connect("localhost", "root", "root") or die ("No se pudo conectar a la BD" . mysql_error());
  mysql_query("SET NAMES utf8");
  mysql_select_db("shop") or die ("No se pudo seleccionar la base de datos");

  $SQL = "UPDATE categoria set nombre=" . "'" .$categoria->nombre . "'"	. " WHERE idCategoria = " . $categoria->idCategoria . ";";

  $resultado = mysql_query($SQL,$link);
  if (!$resultado) {
      echo "No se ha podido actualizar porque tiene productos asociados.";
      http_response_code(400);
  }else{
  	echo "Actualizado correctamente.";
  	http_response_code(200);
  }
}
?>