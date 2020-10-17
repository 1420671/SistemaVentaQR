<?php
include './Conexion/cn.php';
session_start();
$id = $_GET['id'];
$sqltotal = "Select SUM(total) as neto from detalles_venta where id_venta='" . $id . "'";
$consultatotal = mysqli_query($conexion, $sqltotal);
while ($row = $consultatotal->fetch_assoc()) {
    $total = $row['neto'];
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" http-equiv="Refresh" content="3000;url=sistema2.php>
              <title>Art QR </title>       
              <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
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
        <link rel="stylesheet" href="assets/alertifyJS/css/alertify.min.css"/>
        <link rel="stylesheet" href="assets/alertifyJS/css/themes/semantic.min.css" />
        <script src="assets/alertifyJS/alertify.min.js"></script>
        <style>
            body{
                background:url("img/back3.jpg");  
                background-size: cover;
                background-position: center center;
            }
        </style>
    </head>
    <body data-spy="scroll" >
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
        </header>
        <div style="margin-top: 100px;">
            <form method="POST" action="Validacion/guardar_boleta.php?id=<?php echo $id ?>&total=<?php echo $total ?>" onsubmit="alert();">

                <div style="width: 500px;float:right;margin-right:40px;;margin-top:10px;padding: 5px;background-color: rgba(0,0,0,.3)">
                    <h2 style="font-family:Sofia;text-align: center;color:#E9CFCF;">Datos del Cliente</h2>        
                    <div class="form-group">
                        <center>
                            <div class="form-control" style="width: 400px;margin: 5px; background: orange;"><?php echo isset($_REQUEST['men']) ? $_REQUEST['men'] : ''; ?></div>
                        </center>
                        <center><input type="text" class="form-control" name="nombre" placeholder="INGRESAR NOMBRE" style="width: 400px;margin: 5px;" value="<?php echo isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : ''; ?>"></center>
                        <center><input type="text" class="form-control" name="dni" placeholder="INGRESAR DNI" style="width: 400px;margin: 5px;" value="<?php echo isset($_REQUEST['dni']) ? $_REQUEST['dni'] : ''; ?>"></center>
                        <center><input type="text" class="form-control" name="correo" placeholder="INGRESAR CORREO" style="width: 400px;margin: 5px;" value="<?php echo isset($_REQUEST['correo']) ? $_REQUEST['correo'] : ''; ?>"></center>
                        <center>                     
                            <button type="submit" class="btn btn-success" >GUARDAR</button>
                        </center><br>
                        <center>
                            <a type="button" class="btn btn-danger" href="imprimir_boleta.php?id=<?php echo $id ?>" target="_blank">IMPRIMIR</a>&nbsp;&nbsp;
                            <a type="button" class="btn btn-danger" href="Validacion/enviar_boleta.php?id=<?php echo $id ?>">ENVIAR CORREO</a>
                            <a type="button" class="btn btn-danger" href="sistema.php" target="_blank" onclick="self.close()">SALIR</a>
                        </center>  
                    </div>                   
                </div>

                <div style="width: 600px;float: left;margin-left:30px;;margin-top:10px;padding: 5px;background-color: rgba(0,0,0,.3)">
                    <h2 style="font-family:Sofia;text-align: center;color:#E9CFCF;">Tabla de Productos</h2>
                    <table class="table table-bordered table-dark"> 
                        <thead>
                            <tr>
                                <th scope="col" class="text-center" style=" background-color: black;color: white;">#</th>
                                <th scope="col" class="text-center" style=" background-color: black;color: white;">Nombre del Producto</th>
                                <th scope="col" class="text-center" style=" background-color: black;color: white;">Cantidad</th>
                                <th scope="col" class="text-center" style=" background-color: black;color: white;">Precio</th>
                                <th scope="col" class="text-center" style=" background-color: black;color: white;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT p.nombre as nombre,SUM(d.cantidad) as cantidad,d.precio as precio,SUM(d.total) as total FROM detalles_venta d INNER join producto p on p.id=d.id_producto WHERE id_venta='" . $id . "' GROUP BY id_producto";
                            $consulta = mysqli_query($conexion, $sql);
                            $contador = 1;
                            $contarproductos = 0;
                            while ($row = $consulta->fetch_assoc()) {
                                $contarproductos = $contarproductos + $row['cantidad'];
                                ?>
                                <tr>
                                    <td scope="row" class="text-center" style="color:white;"><?php echo $contador ?></td>
                                    <td scope="row" class="text-center" style="color:white;"><?php echo $row['nombre'] ?></td>                       
                                    <td scope="row" class="text-center" style="color:white;"><?php echo $row['cantidad'] ?> </td>
                                    <td scope="row" class="text-center" style="color:white;">S/<?php echo $row['precio'] ?></td>  
                                    <td scope="row" class="text-center" style="color:white;">S/<?php echo $row['total'] ?></td>
                                </tr>  
                                <?php
                                $contador++;
                            }
                            ?>
                        </tbody>
                        <tfoot>
                        <th scope="col" colspan="1" class="text-center"></th>
                        <th scope="col" colspan="2" class="text-left" style=" background-color: black;color: white;">Total de Productos Comprados  : <?php echo $contarproductos; ?></th>
                        <th scope="col" colspan="2" class="text-left" style=" background-color: black;color: white;">Total de la Venta: S/<?php echo round($total,2); ?></th>
                        </tfoot>
                    </table>
                </div>
            </form>
        </div>

        <script>
            function alert() {
                alert("Se guardo correctamente");
            }
        </script>

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

