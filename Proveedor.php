
<html>
    <head>
        <meta charset="utf-8">
        <title>Art QR </title>
        <link rel="stylesheet" type="text/css" href="css/css/estilo.css">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicons -->
        <link href="img/isolated-icon.jpg" rel="icon">
        <link href="img/isolated-icon.jpg" rel="apple-touch-icon">

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
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="assets/alertifyJS/css/alertify.min.css">
        <link rel="stylesheet" href="assets/alertifyJS/css/themes/semantic.min.css">
        <script src="assets/alertifyJS/alertify.min.js"></script>
    </head>
    <body>
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
                                    <a class="navbar-brand page-scroll sticky-logo" href="sistema.php">
                                        <h1><span>Sistema</span>QR</h1>                                    
                                    </a>
                                </div>                     
                                <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <a class="page-scroll" href="sistema.php">Inicio</a>
                                        </li>

                                </div>                           
                            </nav>                       
                        </div>
                    </div>
                </div>
            </div>
        </header>
    <center>
        <div class="container" style="margin-top: 80px;">
            <div class="row">
                <div class="col-sm-6">              
                    <input class="input100" type="text" name="caja_busqueda" id="caja_busqueda" placeholder="Busqueda de un Proveedor">
                    <span class="focus-input100"></span>
                </div>
                <div class="col-sm-6" style="padding: 10px;">                   
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                        Registrar Nuevo Proveedor(a)
                    </button>
                </div>
            </div>
            <div id="datos" style="margin-top: 10px;"></div>
        </div>
    </center>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel"><span class="login100-form-title p-b-37">
                            Registro De Provedores
                        </span></h5>
                </div>
                <div class="modal-body">
                    <form class="login100-form validate-form" method="post" action="Validacion/Crear_proveedor.php" enctype="multipart/form-data">

                        <div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese Nombre del Proveedor">
                            <input class="input100" type="text" name="nombreProvee" placeholder="Ingrese Nombre del Proveedor">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-25" data-validate = "Ingrese correo">
                            <input class="input100" type="email" name="correo" placeholder="Ingrese correo">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese celular">
                            <input class="input100" type="phone" name="celular" placeholder="Ingrese celular">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese Genero">
                            <select class="input100 selectpicker" data-live-search="true" name="genero">
                                <option>Elegir</option>
                                <option value="Hombre">Hombre</option>
                                <option value="Mujer">Mujer</option>   
                            </select>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese dirección">
                            <input class="input100" type="text" name="dirección" placeholder="Ingrese dirección" required>

                            <span class="focus-input100"></span>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button  class="btn btn-success" type="submit">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/main_3.js"></script>
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

<script language="JavaScript" type="text/javascript">
<!--
    </body>
            </html>
