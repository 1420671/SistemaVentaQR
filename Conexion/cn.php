<?php
$host="localhost";
$usuario="u437250555_sistemaqr";
$clave="Sistema20-";
$bd="u437250555_sistemaqr";
$conexion= mysqli_connect($host, $usuario, $clave, $bd);

if($conexion){
} else {
    echo 'no se pudo conectar';
}

?>

