<?php
header('Content-Type: text/html; charset=utf-8');
require '../Conexion/cn.php';
session_start();
$usurio=$_POST['usuario'];
$clave=$_POST['clave'];
$q="select count(*) as contar,id from vendedor where usuario='$usurio' and contraseña='$clave'";
     $consulta= mysqli_query($conexion,$q);
     $array= mysqli_fetch_array($consulta);
     $_SESSION['username']=$usurio;
  if($array['contar']>0){
 $id=$array['id'];
       header("location:../sistema.php?id=$id");
}else{
    echo 'Datos incorrectos';
}
 

?>