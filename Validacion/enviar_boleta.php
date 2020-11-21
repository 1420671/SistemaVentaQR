<?php
// generando el pdf
header('Content-Type: text/html; charset=utf-8');

require('../fpdf/fpdf.php');

    $id=$_GET['id'];
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    include '../Conexion/cn.php';
    $id=$_GET['id'];
    $q="Select * from ventas where id='".$id."'";
$tre= mysqli_query($conexion, $q);
while($l = $tre->fetch_assoc()){
    $cliente=$l['cliente'];
    $dni=$l['dni'];
    $fecha=$l['fecha'];
    $total=$l['precio_total'];
    $correo=$l['correo'];
}
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
   
    $this->Cell(70,10,'Boleta',0,0,'C');
    $this->Cell(40,10,'Fecha:',0,0,'C');
    $this->Cell(20,10,$fecha,0,0,'C');
    // Salto de línea
    $this->Ln(20);

 $this->Cell(79,10,'Codigo de venta: '.$id,0,1,'C');
    $this->Cell(53,10,'Nombre: '.$cliente,0,1,'C');
    $this->Cell(56,10,'DNI: '.$dni,0,1,'C');
    $this->Cell(122,10,'Correo: '.$correo,0,1,'C');
    $this->Ln(20);
    $this->Cell(40,10,'Producto',1,0,'C',0);
    $this->Cell(40,10,'Cantidad',1,0,'C',0);
    $this->Cell(40,10,'P.Unidad',1,0,'C',0);
    $this->Cell(40,10,'Total',1,1,'C',0);
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
require '../Conexion/cn.php';
$sql = "SELECT p.nombre as nombre,SUM(d.cantidad) as cantidad,d.precio as precio,SUM(d.total) as total FROM detalles_venta d INNER join producto p on p.id=d.id_producto WHERE id_venta='" . $id . "' GROUP BY id_producto";
                            $consulta = mysqli_query($conexion, $sql);
                            $contador = 1;
                            $contarproductos = 0;
                           



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);

 while ($row = $consulta->fetch_assoc()) {                    
$pdf->Cell(40,30,$row['nombre'],1,0,'C',0);
$pdf->Cell(40,30,$row['cantidad'],1,0,'C',0);      
$pdf->Cell(40,30,"S/".$row['precio'],1,0,'C',0);  
$pdf->Cell(40,30,"S/".$row['total'],1,1,'C',0);   
}
$q="Select * from ventas where id='".$id."'";
$tre= mysqli_query($conexion, $q);
while($l = $tre->fetch_assoc()){
    $total=$l['precio_total'];
}
$pdf->Cell(120,30,'total',1,0,'C',0);
$pdf->Cell(40,30,"S/".round($total,2),1,0,'C',0);
$doc = $pdf->Output('', 'S');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
 include '../Conexion/cn.php';
    $id=$_GET['id'];
    $q="Select * from ventas where id='".$id."'";
$tre= mysqli_query($conexion, $q);
while($l = $tre->fetch_assoc()){
    $cliente=$l['cliente'];
    $fecha=$l['fecha'];
    $correo=$l['correo'];
}

try {


    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.hostinger.es';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'soporte@sistemaventaqr.coopalvis.com';                     // SMTP username
    $mail->Password   = 'Sistema20-';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('soporte@sistemaventaqr.coopalvis.com', 'ArtQr');
    $mail->addAddress($correo);     // Add a recipient
    // Attachments

// definiendo el adjunto 
 $mail->AddStringAttachment($doc, "Boleta_Digital".$id."_".$fecha.".pdf", 'base64', 'application/pdf');
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Boleta Digital ';
    $mail->Body    = 'Gracias Por tu compra '.$cliente;

    $mail->send();
    $mensaje='Boleta_Enviada';
    header("location:http://sistemaventaqr.coopalvis.com/Boleta.php?id=".$id."&men=".$mensaje);
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}










 
   
  

?>