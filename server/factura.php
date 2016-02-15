<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
  function BasicTable($header){
    /*Obtener datos de los pedidos de la BD*/
    /*error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
    header("Content-Type: text/html;charset=utf-8");*/

    $link = mysql_connect("localhost", "root", "root")  or die('No se pudo conectar' . mysql_error());

    mysql_query("SET NAMES 'utf8'");

    mysql_select_db('shop') or die('No se pudo seleccionar la base de datos');

    $id = $_GET['id'];
  //$id = 4;

    $SQL = "SELECT a.nombre , d.unidad  ,d.precioTotal  FROM linea_pedido d ,articulo a WHERE  d.idPedido=".$id." and d.idArticulo=a.idArticulo;";
    /*d.idPedido ,d.idArticulo ,*/

    $result = mysql_query($SQL) or die('Consulta fallida: ' . mysql_error());
    $i=0;

    for ($i=0; $i < count($header); $i++) {
      $this->Cell(40,10,$header[$i],1,0,'C');
    }
    $this->Ln();

    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)){
      $this->Cell(40,10,$line['nombre'],1,'LR');
      $this->Cell(40,10,$line['unidad'],1,'LR');
      $this->Cell(40,10,$line['precioTotal'],1,'LR');
      $this->Ln();
    }
  }
}

$pdf = new PDF();
$pdf->SetFont('Arial','B',16);
$pdf->AddPage();
$header = array('Articulo', 'Unidades', 'Precio');
$pdf->BasicTable($header);
$pdf->Output('F','prueba.pdf');

?>
