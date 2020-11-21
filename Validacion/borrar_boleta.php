<?php
header('Content-Type: text/html; charset=utf-8');

include '../Conexion/cn.php';
$id=$_REQUEST['texto'];
$sql1="delete from detalles_venta where id_venta='".$id."'";
$sql="delete from ventas where id='".$id."'";
mysqli_query($conexion, $sql1);
mysqli_query($conexion, $sql);
header("location:../sistema.php");

