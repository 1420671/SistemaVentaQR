<?php
include './Conexion/cn.php';
session_start();
$self = $_SERVER['PHP_SELF'];
header("refresh:7; url=$self");
$usuario = $_SESSION['username'];
$i = "select id from vendedor where usuario='" . $usuario . "'";
$re = mysqli_query($conexion, $i);
while ($row = $re->fetch_assoc()) {
    $id = $row['id'];
    ?>
    <!doctype html>
    <html lang="en">
        <head>
            <meta charset="utf-8" http-equiv="Refresh" content="7000;url=sistema2.php">
            <title>Art QR </title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <meta content="" name="keywords">
            <meta content="" name="description">
            <link href="img/isolated-icon.jpg" rel="icon">
            <link href="img/isolated-icon.jpg" rel="apple-touch-icon">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">
            <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
            <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
            <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
            <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
            <link href="lib/animate/animate.min.css" rel="stylesheet">
            <link href="lib/venobox/venobox.css" rel="stylesheet">
            <link href="css/nivo-slider-theme.css" rel="stylesheet">
            <link href="css/style.css" rel="stylesheet">
            <link href="css/responsive.css" rel="stylesheet">
            <style>
                body{
                    background:url("img/back2.jpg");  
                    background-size: cover;
                    background-position: center center;
                }
            </style>
        </head>
        <?php
        if (!isset($usuario)) {
            header("location:Login.php");
        } else {
            require 'phpqrcode/qrlib.php';
            $dir = 'temp/';
            if (!file_exists($dir))
                mkdir($dir);
            $filename = $dir . 'test.png';
            $tamanio = 7;
            $level = 'H';
            $frameSize = 1;
            $contenido = $id;
            QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);
        }
        ?>
        <body data-spy="scroll">
            <--!data-target="#navbar-example" onLoad="alert('Bienvenido');" onUnLoad="confirm('Gracias por tu visita, espero que vuelvas!);-->
            <header>
                <div id="sticker" class="header-area" style="background: black;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <nav class="navbar navbar-default">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <a class="navbar-brand page-scroll sticky-logo" href="sistema.php">
                                            <h1><span>Sistema</span>QR</h1>
                                        </a>
                                    </div>
                           
                                </nav>          
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            $d = "select id from ventas where id_vendedor='" . $id . "'";
            $e = mysqli_query($conexion, $d);
            while ($o = $e->fetch_assoc()) {
                $texto = $o['id'];
            }
            ?>
        </header>
        <div id="caja">
            <div style="margin-top: 80px;" >
                <h2 style="font-family:Sofia;text-align: center;color:black;;">Carrito de Compras</h2>                         
            </div>
            <div style="width:600px;float:left;margin-left:30px;padding: 10px;">
                <table class="table table-bordered table-dark"> 
                    <thead>
                        <tr>
                            <th scope="col" class="text-center" style=" background-color: black;color: white;">#</th>
                            <th scope="col" class="text-center" style=" background-color: black;color: white;">Nombre del Producto</th>
                            <th scope="col" class="text-center" style=" background-color: black;color: white;">Cantidad</th>
                            <th scope="col" class="text-center" style=" background-color: black;color: white;">Precio</th>
                            <th scope="col" class="text-center" style=" background-color: black;color: white;">Total</th>
                            <th scope="col" class="text-center" style=" background-color: black;color: white;">Accion</th>
                        </tr>
                    </thead>
                    <tbody>   
                        <?php
                        $sql = "select d.id_producto as id,p.nombre,d.cantidad,d.precio,d.total from detalles_venta d inner join producto p on d.id_producto=p.id where d.id_venta='" . $texto . "'";
                        $consulta = mysqli_query($conexion, $sql);
                        $contador = 1;
                        $contarproductos = 0;
                        $total = 0;
                        while ($row = $consulta->fetch_assoc()) {
                            $contarproductos = $contarproductos + $row['cantidad'];
                            $total = $total + $row['total'];
                            ?>
                            <tr>           
                                <td scope="row" class="text-center" style="color:white;font-size:15px;background-color:#606060 ;"><?php echo $contador ?></td>
                                <td scope="row" class="text-center" style="color:white;font-size:15px;background-color:#606060 ;"><?php echo $row['nombre'] ?></td>              
                                <td scope="row" class="text-center" style="color:white;font-size:15px;background-color:#606060 ;"><?php echo $row['cantidad'] ?></td>  
                                <td scope="row" class="text-center" style="color:white;font-size:15px;background-color:#606060 ;">S/ <?php echo $row['precio'] ?></td>  
                                <td scope="row" class="text-center" style="color:white;font-size:15px;background-color:#606060 ;">S/ <?php echo $row['total'] ?></td> 
                                <td scope="row" style="color:white;font-size:15px;background-color:#606060;"><center><a type="button" href="Validacion/borrar_detalle.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Descartar</a></center></td>
                            </tr>  
                            <?php
                            $contador++;
                        }
                        ?>
                    </tbody>              
                </table>
            </div>       
            <div id="2" style="width:400px;float:right;margin-right:60px;margin-top: 20px;background-color: rgba(0,0,0,.5)">
                <div style="margin-top:20px;margin-left:100px;">
                    <table class="table table-bordered" style="width:200px;">
                        <tr>
                            <th scope="col" style="color:white;width:100px;text-align:center;">CANTIDAD</th>
                            <th scope="col" style="color:white;width:100px;text-align:center;"><?php echo $contarproductos ?></th>
                        </tr>                    
                        <tr>
                            <td style="font-weight: bold;color:white;width:100px;text-align: center;">TOTAL &nbsp;<i class="fa fa-money"></i></td>
                            <th scope="col" style="color:white;width:100px;text-align:center;">S/ <?php echo $total ?> soles</th>
                        </tr>
                    </table>
                </div>
                <div style="padding:15px;">
                    <center>
                        <a href="Boleta.php?id=<?php echo $texto ?> " class="btn btn-success" >CONFIRMAR COMPRA</a>&nbsp;
                        <a type="button" href="Validacion/borrar_boleta.php?texto=<?php echo $texto?>" class="btn btn-danger" onclick="ocultar();" >CANCELAR COMPRA</a>
                    </center>
                </div>
            </div>
        </div>

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        <!--
                        <div style="margin-top: 80px;" >
                    <h1>Lista de Productos <?php echo $texto ?></h1><br>                  
                </div>
                <div style="margin-left: -600px;"> 
                    <section id="miTabla">
                        <table>
                            <thead>
                                <tr>
                                    <td>Nombre</td>
                                    <td>cantidad</td>
                                    <td>Precio</td>
                                    <td>Total</td>
                                </tr>
                            </thead>
                            <tbody>
        <?php
        include './Conexion/cn.php';
        $con = "select p.nombre,d.cantidad,d.precio,d.total from detalles_venta d inner join producto p on d.id_producto=p.id where d.id_venta='" . $texto . "'";
        $q = mysqli_query($conexion, $con);
        while ($l = $q->fetch_assoc()) {
            ?>
                                                                            <tr>
                                                                                <th><?php echo $l['nombre'] ?></th>
                                                                                <th><?php echo $l['cantidad'] ?></th>
                                                                                <th><?php echo $l['precio'] ?></th>
                                                                                <th><?php echo $l['total'] ?></th>
                                                                            </tr>
            <?php
        }
        ?>
                            </tbody>
                        </table>
                    </section>
                </div>
            </center>
            <div id="2">
                <a href="Boleta.php?id=<?php echo $texto ?>" class="btn btn-success">Confirmar Compra</a>&nbsp;
                <a type="submit" class="btn btn-danger" onclick="ocultar();" >cancelar compra</a>
            </div>                            
        </div>
          <div style="margin-left: 900px;margin-top: -100px; ">
              <table class="table table-bordered" style="width:300px;">
                  <tr>
                      <th scope="col" >Sub-Total&nbsp;<i class="fa fa-money"></i></th>
                      <th scope="col"></th>
                  </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td style=" font-weight: bold ;">Total&nbsp;<i class="fa fa-money"></i></td>
                          <td></td>
                      </tr>
                  </tbody>
              </table>
          </div>
        -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/venobox/venobox.min.js"></script>
        <script src="lib/knob/jquery.knob.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/parallax/parallax.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
        <script src="lib/appear/jquery.appear.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="contactform/contactform.js"></script>
        <script src="js/main.js"></script>
        <script language="JavaScript" type="text/javascript">
        </script>
    </body>
</html>

