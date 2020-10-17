<?php
include 'Conexion/cn.php';
$resAlumnos=$conexion->query("SELECT * FROM vendedor where id='".$id."'");

///TABLA DONDE SE DESPLIEGAN LOS REGISTROS //////////////////////////////
echo '<table class="table table-bordered" style="width:600px;">
                                 <thead>
				<tr>
				 <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col"><?php echo $id?></th>
      <th scope="col">Precio</th>
      <th scope="col">Foto</th>
    </tr>
  </thead>';
				while ($filaAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
						 <td>'.$filaAlumnos['nombre'].'</td>
						 <td>'.$filaAlumnos['Paterno'].'</td>
						 <td>'.$filaAlumnos['precio'].'</td>
						 <td>'.$filaAlumnos['total'].'</td>
                        
						 </tr>';
				}
				echo '</table>';
                                
?>

    <?php
    header("location:sistema2.php");
?>
 
        
  
    
     


         