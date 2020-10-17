<?php

require 'Conexion/cn.php';

$salida = "";
/*
 * $query = "SELECT * FROM producto WHERE nombre NOT LIKE '' ORDER By id LIMIT 25";
 * $query = "SELECT * FROM producto WHERE nombre NOT LIKE '' ORDER By id LIMIT 25"
   $query = "SELECT * FROM producto WHERE id LIKE '%$q%' OR nombre LIKE '%$q%' OR cantidad LIKE '%$q%' OR descripcion LIKE '%$q%' OR marca LIKE '$q' ";
 
 */
$query = "call listarproductos";
if (isset($_POST['consulta'])) {
    $q = $conexion->real_escape_string($_POST['consulta']);
    $query = "select p.id as id ,p.nombre as nombre,p.cantidad as cantidad,p.precio as precio ,p.foto as foto ,p.descripcion as descripcion "
            . ",p.marca as marca,pro.nombre as provedor,c.nombre as categoria from producto p INNER join provedor pro on p.id_provedor=pro.id INNER join categoria c on p.id_categoria=c.id WHERE p.nombre LIKE '%$q%'";
}
$resultado = $conexion->query($query);
if ($resultado->num_rows > 0) {
    $salida .= "<table border=1 class='tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<td>ID</td>
    					<td>Nombre</td>
    					<td>Stock</td>
    					<td>Precio</td>
    					<td>Foto</td>                                  
                                        <td>Descripción</td>
                                        <td>Marca</td>
                                        <td>Proveedor</td>
                                        <td>Categoria</td>
                                        <td>Editar</td>
                                        <td>Eliminar</td>
    				</tr>

    			</thead>
    			

    	<tbody>";
        
    while ($fila = $resultado->fetch_assoc()) {
        $id = $fila['id'];
        $fot = "data:image/jpg;base64,<?php echo base64_encode();?>";
        $f = $fila['foto'];
        $salida .= "<tr>
    					<td>" . $fila['id'] . "</td>
    					<td>" . $fila['nombre'] . "</td>
    					<td>" . $fila['cantidad'] . "</td>
                                        <td> S/" . $fila['precio'] . "</td>                                 
    		                        <td>" . "<img height='100' width='100' src='data:image/jpg;base64,".base64_encode($fila['foto'])." '/>"."</td>                                     
                                        <td> " . $fila['descripcion'] . "</td>                                            
                                        <td>" . $fila['marca'] . "</td>
                                        <td>" . $fila['provedor'] . "</td>
                                        <td>" . $fila['categoria'] . "</td>
                                        <td>" . "<a href='editar_Producto.php?id=$id' style='color:blue;'>EDITAR</a>" . "</td>
                                        <td>" . "<a href='Validacion/eliminar_producto.php?id=$id' style='color:red;'>ELIMINAR</a>" . "</td>
                                                     
                        
    		    </tr>";
    }
    $salida .= "</tbody></table>";
} else {
    $salida .= "NO HAY DATOS :(";
}


echo $salida;


?>