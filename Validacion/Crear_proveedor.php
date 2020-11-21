<?php
header('Content-Type: text/html; charset=utf-8');

include '../Conexion/cn.php';

$nombre = $_POST['nombreProvee'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$genero= $_POST['genero'];
$dirección = $_POST['dirección'];

$query = "INSERT INTO provedor(nombre,correo,celular,genero,direccion) VALUES('$nombre','$correo','$celular','$genero','$dirección')";
$resultado = $conexion->query($query);
if ($resultado) {
  header('Location:../Proveedor.php');
}else {
  echo "No se inserto";
}

 ?>
