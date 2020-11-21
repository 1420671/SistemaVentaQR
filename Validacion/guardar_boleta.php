<?php
header('Content-Type: text/html; charset=utf-8');

include '../Conexion/cn.php';
$id=$_GET['id'];
$total=$_GET['total'];
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$dni=$_POST['dni'];
$fechaActual = date('d-m-Y');

$q="UPDATE ventas set cliente='".$nombre."', correo='".$correo."', dni='".$dni."', "
    . "precio_total='".$total."', fecha='".$fechaActual."' where id='".$id."'";
$con=$conexion->query($q);
$mensaje='Se guardo Correctamente';
header("location:../Boleta.php?id=".$id."&men=".$mensaje."&nombre=".$nombre."&correo=".$correo."&dni=".$dni);
?>

