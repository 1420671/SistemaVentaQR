
<?php
header('Content-Type: text/html; charset=utf-8');

require('./fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Catalogo Art QR',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(40,10,'id',1,0,'C',0);
    $this->Cell(40,10,'Nombre',1,0,'C',0);
    $this->Cell(40,10,'QR',1,1,'C',0); 
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    
  
}
}
require './Conexion/cn.php';
$consulta="select id, nombre,ruta from producto";
$resultado= mysqli_query($conexion, $consulta);



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);

while($row=$resultado->fetch_assoc()){
$pdf->Cell(40,30,$row['id'],1,0,'C',0);
$pdf->Cell(40,30,utf8_decode($row['nombre']),1,0,'C',0);      
$pdf->Cell(40,30, $pdf->image('./img/img_qr/'.$row['ruta'],$pdf->GetX(),$pdf->GetY()),1,1,'C');
    

}

$pdf->Output();
?>
