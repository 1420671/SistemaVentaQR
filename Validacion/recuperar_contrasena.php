<?php
header('Content-Type: text/html; charset=utf-8');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';

if(array_key_exists($key='usuario', $_POST)){
    try {
        include '../Conexion/cn.php';
        $usuario=$_POST['usuario'];
        $sql="select correo from vendedor where usuario= '".$usuario."'";
        $st = $conexion->query($sql);
        if($resultado=$st->fetch_assoc()){
            $correo=$resultado['correo'];
            echo 'Enviar mail de recuperacion a '.$correo;
            //generar token
            $token= uniqid();
            $q="update vendedor set token='".$token."' where correo='".$correo."'";
            try{
               $conexion->query($q);
            // Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
 
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
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Recupere su Clave';
    $mail->Body    = 'Haga Click en <a href="http://sistemaventaqr.coopalvis.com/recuperar.php?token='.$token.'">este link</a>';

    $mail->send();
    $mensaje='Revise su correo para recuperar la contraseña';
    header("location:../Login.php?men=".$mensaje);
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
            } catch (Exception $ex) {
                echo 'No pude guardar el token'.$e->getMessage();
            }
           
        }else{
            echo 'No existe usuario';
        }
    } catch (Exception $e) {
        echo 'Fallo la conexion a la base: '.$e->getMessage();
    }
 
}
?>