<?php
header('Content-Type: text/html; charset=utf-8');

include '../Conexion/cn.php';
$id=$_GET['id'];
$sql="delete from provedor where id='".$id."'";
mysqli_query($conexion, $sql);
header('location:../Proveedor.php')
?>
