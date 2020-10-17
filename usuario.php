<?php
include './Conexion/cn.php';
$usuario=$_GET['usuario'];
$sql="select * from vendedor where usuario='".$usuario."'";
$resultado=mysqli_query($conexion,$sql);
while($fila= mysqli_fetch_assoc($resultado)){
   
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
 if(!isset($usuario)){
     header("location:Login.php");
 }else{
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
            </nav>
          </div>
        </div>
      </div>
    </div>
    
  </header>
  <!-- header end -->
  
<?php

if($fila['genero']=="Hombre"){
    $link="images/Hombre.jpg";
}else{
    $link="images/Mujer.jpg";
}

?>
   <center>
 <div class="card" style="width: 50rem; margin-top: 100px;">
     <h1>Mi Perfil<img src="<?php echo $link?>" style="width:100px;margin-top: -10px;"></h1>
  <div class="card-body">
      <form method="POST" action="Validacion/cambiarContrasena.php?id=<?php echo $fila['id']?>">
      <label>Nombre:</label><br>
      <input type="text" name="txtnom" value="<?php echo $fila['nombre']?>" disabled="true"><br>
          <label>Apellido Paterno:</label><br>
          <input  type="text" name="txtpater" value="<?php echo $fila['Paterno']?>"disabled="true" /><br>
          <label>Apellido Materno:</label><br>
          <input  type="text" name="txtmater" value="<?php echo $fila['Materno']?>"disabled="true" /><br>
           <label>Correo:</label><br>
           <input  type="text" name="txtcorreo" value="<?php echo $fila['correo']?>"disabled="true" /><br>
      <label>Celular:</label><br>
      <input  type="text" name="txtcelular" value="<?php echo $fila['celular']?>"/><br>
      <label>Genero:</label><br>
      <input  type="text" name="txtgenero" value="<?php echo $fila['genero']?>"disabled="true"/><br>
      <label>Usuario:</label><br>
      <input  type="text" name="txtusuario" value="<?php echo $fila['usuario']?>"disabled="true"/><br>
      <label>Contraseña:</label><br>
      <input  type="text" name="txtcontraseña" value="<?php echo $fila['contraseña']?>"/><br>
      <br>
      <a href="Empresa.php?Id=<?php echo $fila['id']?>" class="btn btn-info">Ver Empresa</a><br>
      <br>
      <input type="submit" class="btn btn-success"value="Guardar"/>
      <a href="sistema.php" class="btn btn-danger">Regresar</a>
      
      </form>
      <?php
}
?>
  </div>
</div>
</center>
  


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
