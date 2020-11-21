<?php
header('Content-Type: text/html; charset=utf-8');

include '../Conexion/cn.php';
$id=$_GET['id'];
$clave=$_POST['newPassword'];

    $s="update vendedor set contraseña='".$clave."' where id='".$id."'";

    $conexion->query($s);
    $men= 'Contraseña cambiada';
    header("location:../Login.php?men=".$men);
?>

