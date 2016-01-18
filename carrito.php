<?php
  session_start();
  $carrito = $_POST["carrito"];

  $obj_carrito = new stdClass();
  $obj_carrito = json_decode($carrito);

  var_dump($obj_carrito);
?>
