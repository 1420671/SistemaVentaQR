<?php
header('Content-Type: text/html; charset=utf-8');

include '../Conexion/cn.php';
$nombre = $_POST['nombreCate'];
$query = "INSERT INTO categoria(nombre) VALUES('$nombre')";
$resultado = $conexion->query($query);
if ($resultado) {
  header('Location:../categoria.php');
}else {
  echo "No se inserto";
}

 ?>
