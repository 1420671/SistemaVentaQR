<?php 
  require_once './conexion.php';
    class Ventas{


     public function actualizardetalles($txt1,$txt2,$txt3,$txt4){
         $cn=new ConexionBD();
         $txt5=($txt3*$txt4);
         $sql = "UPDATE `detalles_venta` SET `id_producto`=$txt2,`cantidad`=$txt3 ,`total`=$txt4 WHERE `id_venta`=$txt1";             
         $res = mysqli_query($cn->getConecta(),$sql) or die(mysqli_error($cn->getConecta()));
         return $res;
    }

     public function busquedadedetalles($code,$code2){
          $cn = new ConexionBD();
          $sql = "select id_venta as venta ,id_producto as producto,cantidad,precio,total from detalles_venta where id_venta=$code and id_producto=$code2";
          $res = mysqli_query($cn->getConecta(),$sql) or die(mysqli_error($cn->getConecta()));
          $persona["dato"]=array();
            while ($fila = mysqli_fetch_array($res)) {  
                 array_push($persona["dato"], 
                 array(
                          "venta" => $fila[0], 
                          "producto" => $fila[1],
                          "cantidad"=> $fila[2],
                          "precio"=> $fila[3],
                          "total"=> $fila[4],                       
                  )
             );
          }
           return $persona; 
      }



     public function insertarproducto($txt1,$txt2,$txt3,$txt4){
         $cn=new ConexionBD();
         $txt5=($txt3*$txt4);
         $sql = "insert into detalles_venta values($txt1,$txt2,$txt4,$txt3,$txt5)";             
         $res = mysqli_query($cn->getConecta(),$sql) or die(mysqli_error($cn->getConecta()));
         return $res;
    }

    public function encontrarventa($coda){
         $cn=new ConexionBD();
         $sql = "SELECT id FROM `ventas` where id_vendedor=$coda and precio_total is null";             
         $res = mysqli_query($cn->getConecta(),$sql) or die(mysqli_error($cn->getConecta()));
         $response["dato"]=array();
         while($f=mysqli_fetch_array($res)){
             array_push($response["dato"], 
                array("id"=>$f[0]            
                 )
               );    
            }
        return $response;
    }
     public function listado_provedor() {
          $cn = new ConexionBD();
          $sql = "SELECT * FROM `provedor`";
          $res = mysqli_query($cn->getConecta(),$sql) or die(mysqli_error($cn->getConecta()));
          $persona["dato"]=array();
            while ($fila = mysqli_fetch_array($res)) {  
                 array_push($persona["dato"], 
                 array(
                          "id" => $fila[0], 
                          "nombre" => $fila[1],
                          "correo"=> $fila[2],
                          "celular"=> $fila[3],                        
                          "genero"=> $fila[4],
                          "direccion"=> $fila[5],
                  )
             );
          }
           return $persona;  
     }
      public function listado_productoDESC() {
          $cn = new ConexionBD();
          $sql = "SELECT p.nombre,p.cantidad,p.precio,p.id,p.ruta,p.descripcion,pro.nombre,c.nombre,p.foto from producto p INNER JOIN provedor pro on pro.id=p.id_provedor INNER JOIN categoria c on c.id=p.id_categoria ORDER BY p.nombre DESC";
          $res = mysqli_query($cn->getConecta(),$sql) or die(mysqli_error($cn->getConecta()));
          $persona["dato"]=array();
            while ($fila = mysqli_fetch_array($res)) {  
                 array_push($persona["dato"], 
                 array(
                          "nombre" => $fila[0], 
                          "cantidad" => $fila[1],
                          "precio"=> $fila[2],
                          "id"=> $fila[3],
                          "ruta"=> $fila[4],
                          "descripcion"=> $fila[5],
                          "provedor"=> $fila[6],
                          "categoria"=> $fila[7],
                           "foto"=> base64_encode($fila[8])
                  )
             );
          }
           return $persona;  
     }
     public function listado_producto_preciosmayores() {
          $cn = new ConexionBD();
          $sql = "SELECT p.nombre,p.cantidad,p.precio,p.id,p.ruta,p.descripcion,pro.nombre,c.nombre,p.foto from producto p INNER JOIN provedor pro on pro.id=p.id_provedor INNER JOIN categoria c on c.id=p.id_categoria ORDER BY p.precio ASC";
          $res = mysqli_query($cn->getConecta(),$sql) or die(mysqli_error($cn->getConecta()));
          $persona["dato"]=array();
            while ($fila = mysqli_fetch_array($res)) {  
                 array_push($persona["dato"], 
                 array(
                          "nombre" => $fila[0], 
                          "cantidad" => $fila[1],
                          "precio"=> $fila[2],
                          "id"=> $fila[3],
                          "ruta"=> $fila[4],
                          "descripcion"=> $fila[5],
                          "provedor"=> $fila[6],
                          "categoria"=> $fila[7],
                           "foto"=> base64_encode($fila[8])
                  )
             );
          }
           return $persona;  
     }
       public function listado_producto_preciosmenores() {
          $cn = new ConexionBD();
          $sql = "SELECT p.nombre,p.cantidad,p.precio,p.id,p.ruta,p.descripcion,pro.nombre,c.nombre,p.foto from producto p INNER JOIN provedor pro on pro.id=p.id_provedor INNER JOIN categoria c on c.id=p.id_categoria ORDER BY p.precio DESC";
          $res = mysqli_query($cn->getConecta(),$sql) or die(mysqli_error($cn->getConecta()));
          $persona["dato"]=array();
            while ($fila = mysqli_fetch_array($res)) {  
                 array_push($persona["dato"], 
                 array(
                          "nombre" => $fila[0], 
                          "cantidad" => $fila[1],
                          "precio"=> $fila[2],
                          "id"=> $fila[3],
                          "ruta"=> $fila[4],
                          "descripcion"=> $fila[5],
                          "provedor"=> $fila[6],
                          "categoria"=> $fila[7],
                           "foto"=> base64_encode($fila[8])
                  )
             );
          }
           return $persona;  
     }
     public function listado_productoASC() {
          $cn = new ConexionBD();
          $sql = "SELECT p.nombre,p.cantidad,p.precio,p.id,p.ruta,p.descripcion,pro.nombre,c.nombre,p.foto from producto p INNER JOIN provedor pro on pro.id=p.id_provedor INNER JOIN categoria c on c.id=p.id_categoria ORDER BY p.nombre ASC";
          $res = mysqli_query($cn->getConecta(),$sql) or die(mysqli_error($cn->getConecta()));
          $persona["dato"]=array();
            while ($fila = mysqli_fetch_array($res)) {  
                 array_push($persona["dato"], 
                 array(
                          "nombre" => $fila[0], 
                          "cantidad" => $fila[1],
                          "precio"=> $fila[2],
                          "id"=> $fila[3],
                          "ruta"=> $fila[4],
                          "descripcion"=> $fila[5],
                          "provedor"=> $fila[6],
                          "categoria"=> $fila[7],
                           "foto"=> base64_encode($fila[8])
                  )
             );
          }
           return $persona;  
     }
     public function listado_producto() {
          $cn = new ConexionBD();
          $sql = "SELECT p.nombre,p.cantidad,p.precio,p.id,p.ruta,p.descripcion,pro.nombre,c.nombre,p.foto from producto p INNER JOIN provedor pro on pro.id=p.id_provedor INNER JOIN categoria c on c.id=p.id_categoria";
          $res = mysqli_query($cn->getConecta(),$sql) or die(mysqli_error($cn->getConecta()));
          $persona["dato"]=array();
            while ($fila = mysqli_fetch_array($res)) {  
                 array_push($persona["dato"], 
                 array(
                          "nombre" => $fila[0], 
                          "cantidad" => $fila[1],
                          "precio"=> $fila[2],
                          "id"=> $fila[3],
                          "ruta"=> $fila[4],
                          "descripcion"=> $fila[5],
                          "provedor"=> $fila[6],
                          "categoria"=> $fila[7],
                           "foto"=> base64_encode($fila[8])
                  )
             );
          }
           return $persona;  
     }
                                        /*LOGIN Y A ATRAER UN ID*/
    public function login(){
            $cn=new ConexionBD();
            $sql="SELECT * FROM `vendedor`";
            $res = mysqli_query($cn->getConecta(), $sql) or die(mysqli_error($cn->getConecta()));
            $response["dato"]=array(); 
            while($fila=mysqli_fetch_array($res)){
                array_push($response["dato"],
                array(   
                         "id"=>$fila[0],
                         "nombre"=>$fila[1],
                         "Paterno"=>$fila[2],
                         "Materno"=>$fila[3],
                         "usuario"=>$fila[6],
                         "contrasena"=>$fila[7],
                         "genero"=>$fila[9],
  
                     )
                 );    
            }
           return $response;
    }
    public function busquedaproducto($coda){
             $cn = new ConexionBD();
          $sql = "SELECT p.nombre,p.cantidad,p.precio,p.id,p.ruta,p.descripcion,pro.nombre,c.nombre,p.foto from producto p INNER JOIN provedor pro on pro.id=p.id_provedor INNER JOIN categoria c on c.id=p.id_categoria where p.id=$coda";
          $res = mysqli_query($cn->getConecta(),$sql) or die(mysqli_error($cn->getConecta()));
          $persona["dato"]=array();
            while ($fila = mysqli_fetch_array($res)) {  
                 array_push($persona["dato"], 
                 array(
                          "nombre" => $fila[0], 
                          "cantidad" => $fila[1],
                          "precio"=> $fila[2],
                          "id"=> $fila[3],
                          "ruta"=> $fila[4],
                          "descripcion"=> $fila[5],
                          "provedor"=> $fila[6],
                          "categoria"=> $fila[7],
                           "foto"=> base64_encode($fila[8])
                  )
             );
          }
           return $persona; 
         }




    }


 ?>