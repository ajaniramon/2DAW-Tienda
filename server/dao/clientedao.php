<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
$metodo = $_SERVER['REQUEST_METHOD'];
$objeto = new StdClass();

if ($metodo == 'GET') {
	
}else if($metodo == 'POST'){

	$objeto = json_decode($_POST['cliente']);
	
	if (strcmp($objeto->accion,"d") == 0) {
		borrar($objeto->idCliente);
	}

	if (strcmp($objeto->accion,"i") == 0) {
		insertar($objeto);
	}
	if (strcmp($objeto->accion,"a") == 0) {
		actualizar($objeto);
	}
}

function borrar($idCliente){
  $link = mysql_connect("localhost", "root", "root") or die ("No se pudo conectar a la BD" . mysql_error());
  mysql_query("SET NAMES utf8");
  mysql_select_db("shop") or die ("No se pudo seleccionar la base de datos");

  $SQL = "DELETE from cliente WHERE idCliente = " . $idCliente . ";";
  $resultado = mysql_query($SQL,$link);
  if (!$resultado) {
  	echo "Hubo un fallo al borrar.";
  	http_response_code(400);
  }else{
  	echo "Borrado con éxito.";
  	http_response_code(200);
  }

  

}

function insertar($clienteObjeto){
	$link = mysql_connect("localhost", "root", "root") or die ("No se pudo conectar a la BD" . mysql_error());
  mysql_query("SET NAMES utf8");
  mysql_select_db("shop") or die ("No se pudo seleccionar la base de datos");

  //echo "Insertando cliente: " . json_encode($cliente);
   mysql_query("SET NAMES utf8");

  $SQL = "INSERT INTO cliente(idCliente,nombre,apellido,dni,direccion,telefono,correo,contrasenya,empleado) VALUES(null," . "'" . $clienteObjeto->nombre . "'," . "'" . $clienteObjeto->apellido . "'," . "'" . $clienteObjeto->dni . "'," ."'" . $clienteObjeto->direccion . "',"."'" . $clienteObjeto->telefono . "'," . "'" . $clienteObjeto->correo . "'," . "'" . md5($clienteObjeto->contrasenya) . "',".  "'". $clienteObjeto->empleado ."'"  .");";
 
  mysql_query($SQL) or die('Consulta fallida: ' . mysql_error());

  echo "Insertado correctamente.";
  http_response_code(200);
  }


  
   


function actualizar($cliente){
  $link = mysql_connect("localhost", "root", "root") or die ("No se pudo conectar a la BD" . mysql_error());
  mysql_query("SET NAMES utf8");
  mysql_select_db("shop") or die ("No se pudo seleccionar la base de datos");

  $SQL = "UPDATE cliente SET nombre='" . $cliente->nombre . "', apellido='" . $cliente->apellido . "', dni='" . $cliente->dni . "', direccion='" . $cliente->direccion . "', telefono='" .$cliente->telefono . "', correo='" . $cliente->correo . "', empleado='" . $cliente->empleado . "'" . " WHERE idCliente =" . $cliente->idCliente . ";";
  $resultado = mysql_query($SQL,$link);
  if (!$resultado) {
       echo "El cliente tiene pedidos asociados. No se puede actualizar.";
       http_response_code(400);
    }  else{
    	echo "Actualizado correctamente.";
    	http_response_code(200);
    }
}


?>