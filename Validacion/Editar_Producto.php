<?php
header('Content-Type: text/html; charset=utf-8');

include '../Conexion/cn.php';
$id=$_GET['id'];
$cantidad=$_POST['cantidad'];
$precio=$_POST['precio'];
if($cantidad!=null||$precio!=null){
    $sql="update producto set cantidad='".$cantidad."', precio='".$precio."' where id='".$id."'";
    mysqli_query($conexion, $sql);
    if($cantidad=1){
       header("location:../catalogo.php");
    }else{
        echo 'error';
    }
}