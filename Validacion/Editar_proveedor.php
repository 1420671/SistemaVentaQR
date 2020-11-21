<?php
header('Content-Type: text/html; charset=utf-8');

include '../Conexion/cn.php';
$id=$_GET['id'];
$correo=$_POST['txtcorreo'];
$celular=$_POST['txtcelular'];
$direccion=$_POST['txtdireccion'];

if($correo!=null||$celular!=null||$dirección!=null){
    $sql="update provedor set correo='".$correo."', celular='".$celular."', direccion='".$direccion."' where id='".$id."'";
    mysqli_query($conexion, $sql);
    if($correo=1){
       header("location:../Proveedor.php");
    }else{
        echo 'error';
    }
}