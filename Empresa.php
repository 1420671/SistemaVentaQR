<?php
include './Conexion/cn.php';
$id = $_GET['Id'];
$sql = "select * from empresa where id='" . $id . "'";
$resultado = mysqli_query($conexion, $sql);
while ($fila = mysqli_fetch_assoc($resultado)) {
    ?>
    <!doctype html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Mi Perfil</title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <meta content="" name="keywords">
            <meta content="" name="description">

            <!-- Favicons -->
            <link href="img/isolated-icon.jpg" rel="icon">
            <link href="img/isolated-icon.jpg" rel="apple-touch-icon">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

            <!-- Bootstrap CSS File -->
            <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

            <!-- Libraries CSS Files -->
            <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
            <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
            <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
            <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
            <link href="lib/animate/animate.min.css" rel="stylesheet">
            <link href="lib/venobox/venobox.css" rel="stylesheet">

            <!-- Nivo Slider Theme -->
            <link href="css/nivo-slider-theme.css" rel="stylesheet">

            <!-- Main Stylesheet File -->
            <link href="css/style.css" rel="stylesheet">

            <!-- Responsive Stylesheet File -->
            <link href="css/responsive.css" rel="stylesheet">

            <!-- =======================================================
              Theme Name: eBusiness
              Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
              Author: BootstrapMade.com
              License: https://bootstrapmade.com/license/
            ======================================================= -->
        </head>
        <?php
        if (!isset($usuario)) {
            header("location:Login.php");
        } else {
            
        }
        ?>
        <body data-spy="scroll" data-target="#navbar-example" >


            <header>
                <!-- header-area start -->
                <div id="sticker" class="header-area" style="background: black;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">

                                <!-- Navigation -->
                                <nav class="navbar navbar-default">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <!-- Brand -->
                                        <a class="navbar-brand page-scroll sticky-logo" href="sistema.php">
                                            <h1><span>Sistema</span>QR</h1>
                                            <!-- Uncomment below if you prefer to use an image logo -->
                                            <!-- <img src="img/logo.png" alt="" title=""> -->
                                        </a>
                                    </div>

                                    </header>
                                    <!-- header end -->

                                    <center>
                                        <div class="card" style="width: 50rem; margin-top: 100px;">
                                            <br>
                                            <br>
                                            <h1>Perfil de la Empresa</h1>
                                            <div class="card-body">
                                                <label>Nombre Empresa:</label><br>
                                                <input type="text" name="txtnom" value="<?php echo $fila['nombre'] ?>" disabled="true"><br>
                                                <label>Ruc:</label><br>
                                                <input  type="text" name="txtpater" value="<?php echo $fila['Ruc'] ?>"disabled="true" /><br>
                                                <label>Rubro:</label><br>
                                                <input  type="text" name="txtmater" value="<?php echo $fila['Rubro'] ?>"disabled="true" /><br>
                                                <br>
                                                <a href="sistema.php" class="btn btn-danger">Ir al menú Principal</a>

                                            </div>
                                        </div>
                                    </center>


                                    <?php
                                }
                                ?>



                                <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

                                <!-- JavaScript Libraries -->
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

                                <!-- Contact Form JavaScript File -->
                                <script src="contactform/contactform.js"></script>

                                <script src="js/main.js"></script>


                                </body>

                                </html>
