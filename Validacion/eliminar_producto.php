<?php
header('Content-Type: text/html; charset=utf-8');

include '../Conexion/cn.php';
$id=$_GET['id'];
$sql="delete from producto where id='".$id."'";
mysqli_query($conexion, $sql);
header('location:../catalogo.php')
?>
