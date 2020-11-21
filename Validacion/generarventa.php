<?php
header('Content-Type: text/html; charset=utf-8');

//generar el id de venta
        include '../Conexion/cn.php';
        $id=$_GET['id'];
        $sql="SELECT max(id) as maximo from ventas";
        $resultado2 = $conexion->query($sql);
        while ( $row = $resultado2->fetch_assoc()) {
         if ($resultado2 -> num_rows > 0) {
               $num= $row['maximo'];
         if ($num > 0 ) {
               $texto=$num+1;  
         }else{
               $texto=500; 
         }                                       
        }                     
     }
        //insertar el id de venta y vendedor
     $q="insert into ventas (id,id_vendedor) values('$texto','$id')";
        $resultado = $conexion->query($q);

    header("location:../sistema2.php");

?>
