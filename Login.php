<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="assets/alertifyJS/css/alertify.min.css">
        <link rel="stylesheet" href="assets/alertifyJS/css/themes/semantic.min.css">
        <script src="assets/alertifyJS/alertify.min.js"></script>
<!--===============================================================================================-->
  <link href="img/isolated-icon.jpg" rel="icon">
  <link href="img/isolated-icon.jpg" rel="apple-touch-icon">
  <script src="js/validar.js"></script>
</head>
<body >
	
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
           
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
                     <center>
                <div id="login100-form-title p-b-37" style="color: purple;"><?php echo isset($_REQUEST['men']) ? $_REQUEST['men'] : ''; ?></div>
                    </center>
                    <form class="login100-form validate-form" method="post" action="Validacion/Validar_Login.php" >
                      <span class="login100-form-title p-b-37"> Login</span>
                      <div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese su usuario">
                                    <input class="input100" type="text" id="usuario" name="usuario" placeholder="Ingrese su usuario" >
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Ingrese su contraseña">
                                    <input class="input100" type="password" id="clave" name="clave" placeholder="Ingrese su contraseña" >
					<span class="focus-input100"></span>
				</div>
                        

				<div class="container-login100-form-btn">
                                    <button class="login100-form-btn" type="submit" >
						Ingresar
					</button>
				</div>

                        <br>

				<div class="text-center">
					<a href="recuperar_contrasena.php" class="txt2 hov1">
						Recuperar contraseña 
					</a>
				</div>
  
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
        

</body>
</html>