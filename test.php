<?php
session_start();
$SQL = "SELECT p.idPedido FROM pedido p, cliente c WHERE c.dni = p.dni AND c.dni ='".$_SESSION['dni']."'"  ." ORDER BY p.fecha DESC";
echo $SQL;
?>