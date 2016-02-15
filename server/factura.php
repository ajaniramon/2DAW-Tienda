<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
  function BasicTable($header){

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
    header("Content-Type: text/html;charset=utf-8");

    $link = mysql_connect("localhost", "root", "root")  or die('No se pudo conectar' . mysql_error());

    mysql_query("SET NAMES 'utf8'");

    mysql_select_db('shop') or die('No se pudo seleccionar la base de datos');

    $id = $_GET['id'];

    //DATOS PEDIDO
    $SQL = "SELECT a.nombre , d.unidad, a.precio, d.precioTotal  FROM linea_pedido d ,articulo a WHERE  d.idPedido=".$id." and d.idArticulo=a.idArticulo;";
    $result = mysql_query($SQL) or die('Consulta fallida: ' . mysql_error());

    //DATOS USUARIO
    $USUARIO = "SELECT c.nombre, c.apellido, p.fecha FROM cliente c, pedido p WHERE p.idPedido = ".$id." AND p.dni = c.dni;";
    $result_usuario = mysql_query($USUARIO) or die ('Consulta fallida: ' . mysql_error());


    $width = array(50,30,40,40);
    //LOGO EcoRecipes
    $this->Image('../img/logo.png',70,null,50,22);
    $this->SetDrawColor(49,127,54);
    $this->SetFillColor(88,176,56);

    //USUARIO
    $this->SetFont('Arial','B','10');
    $line = mysql_fetch_array($result_usuario, MYSQL_ASSOC);
    $nombreCompleto = $line['nombre'] . ' ' . $line['apellido'];
    $this->Cell(20,10,'Usuario: ');
    $this->Cell(40,10,$nombreCompleto);
    //$this->Cell(15,10,$line['nombre']);
    //$this->Cell(20,10,$line['apellido']);
    $this->Ln();
    $this->Cell(20,10,'Fecha: ');
    $this->Cell(20,10,$line['fecha']);
    $this->Ln();
    $this->Ln();

    //TABLA
    $this->SetFont('Arial','B',14);
    for ($i=0; $i < count($header); $i++) {
      $this->Cell($width[$i],10,$header[$i],1,0,'C',true);
    }
    $this->Ln();
    $this->SetFont('Arial','','11');
    $this->SetFillColor(132,210,143);
    $zebreado = false;
    
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)){
      $this->Cell($width[0],10,$line['nombre'],0,'LR','L',$zebreado);
      $this->Cell($width[1],10,$line['unidad'],0,'LR','C',$zebreado);
      $this->Cell($width[2],10,$line['precio'],0,'LR','C',$zebreado);
      $this->Cell($width[3],10,$line['precioTotal'],0,'LR','C',$zebreado);
      $this->Ln();
      $zebreado = !$zebreado;
    }
    //Linea de cierre
    $this->Cell(array_sum($width),0,'','T');

  }
}

$pdf = new PDF();
//$pdf->SetFont('Arial','B',14);
$pdf->AddPage();
$header = array('Articulos', 'Unidades', 'Precio Unidades', 'Total Articulo');
$pdf->BasicTable($header);
$pdf->Output('F','./pdf/factura.pdf');

?>
