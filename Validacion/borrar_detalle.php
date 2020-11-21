<?php
header('Content-Type: text/html; charset=utf-8');

  include '../Conexion/cn.php';
  $id=$_REQUEST['id'];
  $sql="delete from detalles_venta where id_producto ='".$id."' limit 1";
  mysqli_query($conexion,$sql);
  header("location:../sistema2.php");
?>