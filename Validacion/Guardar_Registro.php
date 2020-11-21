<?php

include '../Conexion/cn.php';
$nombre = $_POST['nombre'];
$ApPater = $_POST['ApellidoPaterno'];
$ApMater = $_POST['ApellidoMaterno'];
$correo = $_POST['correo'];
$celu = $_POST['celular'];
$nombreE = $_POST['Nombre_Empresa'];
$nu = $_POST['Ruc'];
$rubro = $_POST['rubro'];
$genero = $_POST['genero'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';
$nuevo_usuario = mysqli_query($conexion, "select * from vendedor where correo='$correo'");
if (mysqli_num_rows($nuevo_usuario) > 0) {
    echo'<script>alert("El correo ya esta registrado");window.history.go(-1)</script>';
} else {

    $insertar1 = "insert into vendedor(nombre,Paterno,Materno,correo,celular,genero)values('$nombre','$ApPater','$ApMater','$correo',$celu,'$genero')";
    $resultado1 = mysqli_query($conexion, $insertar1);
    
    $sqlempresa = "Select id from vendedor where correo='" . $correo . "'";
    $consultaempresa = mysqli_query($conexion, $sqlempresa);
    while ($row2 = $consultaempresa->fetch_assoc()) {
        $idvendedor = $row2['id'];
    }
    $insertar2 = "insert into empresa(id,nombre,Ruc,Rubro)values('$idvendedor','$nombreE','$nu','$rubro')";
    $resultado2 = mysqli_query($conexion, $insertar2);
    if (!$resultado1 && !$resultado2) {
        echo'<script>alert("Error al registrarse");window.history.go(-1)</script>';
    } else {

        //generar contraseña aleatoria
        function password_random($length = 6) {
            $charset = "abcdefghijklmnopqrstuvwxyz0123456789%&$/()#!?";
            $password = "";
            for ($i = 0; $i < $length; $i++) {
                $rand = rand() % strlen($charset);
                $password .= substr($charset, $rand, 1);
            }return $password;
        }

        $password = password_random(20);
        //generar usuario aleatorio
        $usuarioGenereado = substr($nombre, 0, 4) . substr($ApPater, 0, 2) . substr($nu, -4);

        $insertar3 = "UPDATE vendedor SET usuario='$usuarioGenereado', contraseña='$password' WHERE correo='$correo'";

        if ($conexion->query($insertar3) === true) {


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

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Datos De Registro';
    $mail->Body    = 'Gracias Por tu Registro '.$nombre."<br>"."Email :".$correo."<br>"."Usuario :".$usuarioGenereado."<br>"."Contraseña :".$password;

  
    $mail->send();
    echo"<script>alert('Se envio el usuario y su contraseña a su correo');window.location.href='/Agradecimiento.php?usuario=$nombre'</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
            
            
   
        }


        mysqli_close($conexion);
    }
}
?>

