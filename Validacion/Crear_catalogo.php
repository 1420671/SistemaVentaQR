<?php
header('Content-Type: text/html; charset=utf-8');

 include '../Conexion/cn.php';
 
  require_once "../vendor/autoload.php";
  use Endroid\QrCode\QrCode;
  
$nombre = $_POST['nombrePro'];
$stock = $_POST['stock'];
$precio = $_POST['Precio'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$desc = $_POST['descripcion'];
$marca = $_POST['marca'];
$provedor = $_POST['provedor'];
$categoria = $_POST['categoria'];

$sql="SELECT max(id) as maximo from producto";
        $resultado2 = $conexion->query($sql);
        while ( $row = $resultado2->fetch_assoc()) {
         if ($resultado2 -> num_rows > 0) {
               $num= $row['maximo'];
         if ($num > 0 ) {
               $texto=$num+1;
               $nombreArchivoParaGuardar = "../img/img_qr/".$texto.".png";
               $ruta=$texto.".png";
               $codigoQR = new QrCode($texto);                 
               $codigoQR->setSize(100);
               $codigoQR->writeFile($nombreArchivoParaGuardar);    
         }else{
               $texto=400;
               $nombreArchivoParaGuardar = "../img/img_qr/".$texto.".png";
               $ruta=$texto.".png";
               $codigoQR = new QrCode($texto);
               $codigoQR->setSize(100);
               $codigoQR->writeFile($nombreArchivoParaGuardar);    
         }                                       
        }                     
     }
     
$query = "INSERT INTO producto(id,nombre,cantidad,precio,foto,ruta,descripcion,marca,id_provedor,id_categoria)"
        . " VALUES('$texto','$nombre','$stock','$precio','$imagen','$ruta','$desc','$marca',$provedor,$categoria)";
$resultado = $conexion->query($query);
 
       
      
       
     
       
if ($resultado) {
  header('Location:../catalogo.php');
}else {
  echo "No se inserto";
}

 ?>
