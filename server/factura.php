<?php
require('../fpdf/fpdf.php');

/*Obtener datos de los pedidos de la BD*/
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
header("Content-Type: text/html;charset=utf-8");

$link = mysql_connect("localhost", "root", "root")  or die('No se pudo conectar' . mysql_error());

mysql_query("SET NAMES 'utf8'");

mysql_select_db('shop') or die('No se pudo seleccionar la base de datos');

$id = $_GET['id'];

$SQL = "SELECT d.idPedido ,d.idArticulo ,a.nombre , d.unidad  ,d.precioTotal  FROM linea_pedido d ,articulo a WHERE  d.idPedido=".$id." and d.idArticulo=a.idArticulo;";
$result = mysql_query($SQL) or die('Consulta fallida: ' . mysql_error());
$i=0;

while ($line = mysql_fetch_array($result, MYSQL_ASSOC)){
  $pedido[$i] = array($line['idPedido'],$line['idArticulo'],$line['nombre'],$line['unidad'],$line['precioTotal']);
  $i++;
}

echo json_encode($pedido);

/*
class PDF extends FPDF
{
//Cabecera de página
   function Header()
   {

    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
    $this->Cell(80);
    //Título
    $this->Cell(60,10,'Cabecera',1,0,'C');
    //Salto de línea
    $this->Ln(20);

   }

   //Pie de página
   function Footer()
   {
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }
   //Tabla simple
   function TablaSimple($header)
   {
    //Cabecera
    foreach($header as $col)
    $this->Cell(40,7,$col,1);
    $this->Ln();

      $this->Cell(40,5,"hola",1);
      $this->Cell(40,5,"hola2",1);
      $this->Cell(40,5,"hola3",1);
      $this->Cell(40,5,"hola4",1);
      $this->Ln();
      $this->Cell(40,5,"linea ",1);
      $this->Cell(40,5,"linea 2",1);
      $this->Cell(40,5,"linea 3",1);
      $this->Cell(40,5,"linea 4",1);
   }

   //Tabla coloreada
function TablaColores($header)
{
//Colores, ancho de línea y fuente en negrita
$this->SetFillColor(255,0,0);
$this->SetTextColor(255);
$this->SetDrawColor(128,0,0);
$this->SetLineWidth(.3);
$this->SetFont('','B');
//Cabecera

for($i=0;$i<count($header);$i++)
$this->Cell(40,7,$header[$i],1,0,'C',1);
$this->Ln();
//Restauración de colores y fuentes
$this->SetFillColor(224,235,255);
$this->SetTextColor(0);
$this->SetFont('');
//Datos
   $fill=false;
$this->Cell(40,6,"hola",'LR',0,'L',$fill);
$this->Cell(40,6,"hola2",'LR',0,'L',$fill);
$this->Cell(40,6,"hola3",'LR',0,'R',$fill);
$this->Cell(40,6,"hola4",'LR',0,'R',$fill);
$this->Ln();
      $fill=!$fill;
      $this->Cell(40,6,"col",'LR',0,'L',$fill);
$this->Cell(40,6,"col2",'LR',0,'L',$fill);
$this->Cell(40,6,"col3",'LR',0,'R',$fill);
$this->Cell(40,6,"col4",'LR',0,'R',$fill);
$fill=true;
   $this->Ln();
   $this->Cell(160,0,'','T');
}



}

$pdf=new PDF();
//Títulos de las columnas
$header=array('Columna 1','Columna 2','Columna 3','Columna 4');
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(65);
//$pdf->AddPage();
$pdf->TablaSimple($header);
//Segunda página
$pdf->AddPage();
$pdf->SetY(65);
$pdf->TablaColores($header);
$pdf->Output();*/
?>
