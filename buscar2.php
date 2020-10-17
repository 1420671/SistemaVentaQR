<?php

require 'Conexion/cn.php';

$salida = "";
$query = "SELECT * FROM provedor WHERE nombre NOT LIKE '' ORDER By id LIMIT 25";
if (isset($_POST['consulta'])) {
    $q = $conexion->real_escape_string($_POST['consulta']);
    $query = "SELECT * FROM provedor WHERE id LIKE '%$q%' OR nombre LIKE '%$q%' OR correo LIKE '%$q%' OR celular LIKE '%$q%' OR genero LIKE '$q'";
}
$resultado = $conexion->query($query);
if ($resultado->num_rows > 0) {
    $salida .= "<table border=1 class='tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<td>ID</td>
    					<td>Nombre</td>
    					<td>Correo</td>
    					<td>Celular</td>
    					<td>Genero</td>
                                        <td>Direccion</td>
                                        <td>Editar</td>
                                        <td>Eliminar</td>
    				</tr>

    			</thead>
    			

    	<tbody>";
        
    while ($fila = $resultado->fetch_assoc()) {
        $id = $fila['id'];
        $salida .= "<tr>
    					<td>" . $fila['id'] . "</td>
    					<td>" . $fila['nombre'] . "</td>
    					<td>" . $fila['correo'] . "</td>
                                        <td>" . $fila['celular'] . "</td>                                 
                                        <td>" . $fila['genero'] . "</td>                                            
                                        <td>" . $fila['direccion'] . "</td>
                                        <td>" . "<a href='editar_Proveedor.php?id=$id' style='color:blue;'>EDITAR</a>" . "</td>
                                        <td>" . "<a href='Validacion/eliminar_proveedor.php?id=$id' style='color:red;'>ELIMINAR</a>" . "</td>
                                                     
                        
    		    </tr>";
    }
    $salida .= "</tbody></table>";
} else {
    $salida .= "NO HAY DATOS :(";
}


echo $salida;


?>