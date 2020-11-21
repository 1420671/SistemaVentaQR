<?php  
   require_once './negocio.php';
   $obj = new Ventas();
   $tag = $_REQUEST["tag"];


///**ACERCA DE LAS VENTAS**///
    if($tag=="actualizardetalles") {
       $txt1=$_REQUEST["txtv"];
       $txt2=$_REQUEST["txtp"];
       $txt3=$_REQUEST["txtc"];
       $txt4=$_REQUEST["txtt"];
       $res= $obj->actualizardetalles($txt1,$txt2,$txt3,$txt4);
       if($res==1)
        $men="inserto ok";
     else
        $men="error";
     $response["estado"]=$men;
    echo json_encode($response);
  }
   if($tag=="encontrarventa") {
   	  $coda=$_REQUEST["coda"];
      $lista= $obj->encontrarventa($coda);
      echo json_encode($lista);
   }

  if($tag=="insertarproducto") {
       $txt1=$_REQUEST["txt1"];
       $txt2=$_REQUEST["txt2"];
       $txt3=$_REQUEST["txt3"];
       $txt4=$_REQUEST["txt4"];
       $res= $obj->insertarproducto($txt1,$txt2,$txt3,$txt4);
       if($res==1)
        $men="inserto ok";
     else
        $men="error";
     $response["estado"]=$men;
    echo json_encode($response);
  }
   if ($tag=="busquedadedetalles") {
        $code=$_REQUEST["id_venta"];
        $code2=$_REQUEST["id_pro"];
    echo json_encode($obj->busquedadedetalles($code,$code2));
   }

///**ACERCA DE LOS PROVEEDORES**///
   if($tag=="listado_provedor") {
    $lista= $obj->listado_provedor();
    echo json_encode($lista);
   }


///**ACERCA DE LOS PRODUCTOS**///
   if($tag=="listado_producto") {
    $lista= $obj->listado_producto();
    echo json_encode($lista);
   }
    if($tag=="listado_productoASC") {
    $lista= $obj->listado_productoASC();
    echo json_encode($lista);
   }
    if($tag=="listado_productoDESC") {
    $lista= $obj->listado_productoDESC();
    echo json_encode($lista);
   }

   if($tag=="listado_producto_preciosmenores") {
    $lista= $obj->listado_producto_preciosmenores();
    echo json_encode($lista);
   }

   if($tag=="listado_producto_preciosmayores") {
    $lista= $obj->listado_producto_preciosmayores();
    echo json_encode($lista);
   }
    if ($tag=="busquedaproducto") {
    $code=$_REQUEST["coda"];
    echo json_encode($obj->busquedaproducto($code));
   }




///**ACERCA DEL LOGIN**///
   if($tag=="login") {
    $lista= $obj->login();
    echo json_encode($lista);
   }
  
?>