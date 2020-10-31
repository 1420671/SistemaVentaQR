<?php
require './Conexion/cn.php';
session_start();
$usuario = $_SESSION['username'];
$i = "select id from vendedor where usuario='" . $usuario . "'";
$re = mysqli_query($conexion, $i);
while ($row = $re->fetch_assoc()) {
    $id = $row['id'];
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Art QR</title>       
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function tiempoReal()
            {
                var tabla = $.ajax({
                    type: "post",
                    url: 'buscar4.php',
                    data: '<?php $id ?>',
                    dataType: 'text',
                    async: false
                }).responseText;

                document.getElementById("miTabla").innerHTML = tabla;
            }
            setInterval(tiempoReal, 1000);
        </script>
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
                                    <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                                        <ul class="nav navbar-nav navbar-right">
                                            <li>                                                                             
                                                <a class="page-scroll" href="catalogo.php">Catalogo</a>
                                            </li>
                                            <li>
                                                <a class="page-scroll" href="Proveedor.php">Provedores</a>
                                            </li>
                                            <li>
                                                <a class="page-scroll" href="categoria.php">Categoria</a>
                                            </li>
                                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $usuario ?>&nbsp;<i class="fa fa-user"></i><span class="caret"></span></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="usuario.php?usuario=<?php echo $usuario ?>">ver perfil&nbsp;<i class="fa fa-user-circle-o" ></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="#" ><img src="<?php echo $filename ?>"/></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="Validacion/salir_login.php" >Cerrar Sesion&nbsp;<i class="fa fa-sign-out"></i>
                                                        </a>
                                                    </li>
                                                </ul> 
                                            </li>
                                        </ul>
                                    </div>
                                </nav>          
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>
        </header>
        <div id="caja"  style="display: none;">
            <center>      
                <div style="margin-top: 80px;" >
                    <h1>Lista de Productos <?php echo $id ?></h1><br>                  
                </div>
                <div style="margin-left: -600px;"> 
                    <section id="miTabla">
                    </section>
                </div>     
            </center>
            <a href="Boleta.php" class="btn btn-success">Confirmar Compra</a>&nbsp;
            <a type="submit" class="btn btn-danger" onclick="ocultar();" >cancelar compra</a>
            <a type="submit" class="btn btn-danger" onclick="mandar();" >iniciar venta</a>
            <div style="margin-left: 900px;margin-top: -100px; ">
                <table class="table table-bordered" style="width:300px;">
                    <tr>
                        <th scope="col" >Sub-Total</th>
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
        </div>
        <div id="b" style=" margin-left: 400px; margin-top: 300px;" >
            <form method="POST"action="Validacion/generarventa.php?id=<?php echo $id ?>">
                <input type="submit" id="d" style="width: 500px; height:100px; " name="crear"  value="GENERAR VENTA" class="btn btn-success" />
            </form>
        </div>
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
