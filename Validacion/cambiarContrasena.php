<?php
header('Content-Type: text/html; charset=utf-8');

include '../Conexion/cn.php';
$id=$_GET['id'];
$contra=$_POST['txtcontraseña'];
if($contra!=null){
    $sql2="update vendedor set contraseña='".$contra."' where id='".$id."'";
    mysqli_query($conexion, $sql2);
    if($contra=1){
        echo '<script>alert("se guardo")</script>';
        header("location:../sistema.php");
    }
}
?>

