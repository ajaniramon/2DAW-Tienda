<?php
require('../fpdf/fpdf.php');

/*Obtener datos de los pedidos de la BD*/
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
header("Content-Type: text/html;charset=utf-8");

$link = mysql_connect("localhost", "root", "root")  or die('No se pudo conectar' . mysql_error());

mysql_query("SET NAMES 'utf8'");

mysql_select_db('shop') or die('No se pudo seleccionar la base de datos');

$id = $_GET['id'];

$SQL = "SELECT a.nombre , d.unidad  ,d.precioTotal  FROM linea_pedido d ,articulo a WHERE  d.idPedido=".$id." and d.idArticulo=a.idArticulo;";
/*d.idPedido ,d.idArticulo ,*/

$result = mysql_query($SQL) or die('Consulta fallida: ' . mysql_error());
$i=0;

while ($line = mysql_fetch_array($result, MYSQL_ASSOC)){
  $pedido[$i] = array($line['nombre'],$line['unidad'],$line['precioTotal']);
  /*$line['idPedido'],$line['idArticulo'],*/
  $i++;
}

/* Pruebas */
function prueba($pedido){

  for ($row=0; $row < count($pedido) ; $row++) {
    for ($col=0; $col < 3; $col++) {
      $prueba3.=$pedido[$row][$col];
    }
    $prueba3.="\n";
  }
  return $prueba3;
}

/* /.Pruebas */

echo json_encode(prueba($pedido));



class PDF extends FPDF
{
 function tabla($header,$pedido){
   //Cabecera
   for ($i=0; $i < count($header); $i++) {
     $this->Cell(40,10,$header[$i],1,0,'C');
   }
   $this->Ln();
   //Datos
   for ($row=0; $row < count($pedido) ; $row++) {
     for ($col=0; $col < 3; $col++) {
       $this->Cell(40,10,$pedido[$row][$col],'LR');
     }
     $this->Ln();
   }
  }
}

$pdf=new PDF();
//Títulos de las columnas
$header=array('Articulo','Unidades','Precio');

$pdf->AddPage();
$pdf->SetY(50);
$pdf->tabla($header,$pedido);
$pdf->Output();
?>
