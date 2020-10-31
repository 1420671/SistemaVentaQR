<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registro</title>
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
        <link rel="stylesheet" href="assets/alertifyJS/css/alertify.min.css" />
        <link rel="stylesheet" href="assets/alertifyJS/css/themes/semantic.min.css" />
        <script src="assets/alertifyJS/alertify.min.js"></script>
<!--===============================================================================================-->
  <link href="img/isolated-icon.jpg" rel="icon">
  <link href="img/isolated-icon.jpg" rel="apple-touch-icon">
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
                    <form class="login100-form validate-form" method="post" action="Validacion/Guardar_Registro.php">
				<span class="login100-form-title p-b-37">
					Registro
				</span>
				<div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese su Nombre">
					<input class="input100" type="text" name="nombre" placeholder="Ingrese su Nombre">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Ingrese Apellido Paterno">
                                    <input class="input100" type="text" name="ApellidoPaterno" placeholder="Ingrese Apellido Paterno">
					<span class="focus-input100"></span>
				</div>
                        			<div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese Apellido Materno">
					<input class="input100" type="text" name="ApellidoMaterno" placeholder="Ingrese Apellido Materno">
					<span class="focus-input100"></span>
				</div>
                   
                        			<div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese su correo">
                                                   <input class="input100" type="email" name="correo" placeholder="Ingrese su correo">
					<span class="focus-input100"></span>
				</div>
                        			<div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese su celular">
                                                    <input class="input100" type="phone" name="celular" size="9" placeholder="Ingrese su celular">
					<span class="focus-input100"></span>
				</div>
                        <div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese su Nombre de Empresa">
                            <input class="input100" type="text" name="Nombre_Empresa" placeholder="Ingrese su Nombre de Empresa">
					<span class="focus-input100"></span>
				</div>
                         <div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese su Ruc de la Empresa">
                             <input class="input100" type="text" name="Ruc"  placeholder="Ingrese su Ruc de la Empresa">
					<span class="focus-input100"></span>
				</div>
                        
                        			<div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese Rubro">
                                                    <select class="input100 selectpicker" data-live-search="true" name="rubro">
                                                        <option>Elegir</option>
                                                        <option value="Bodega">Bodega</option>
                                                        <option value="Textil">Textil</option>
                                                        <option value="Construcción">Construcción</option>
                                                        <option value="Plásticos">Plásticos</option>
                                                        <option value="Suministros Eléctricos">Suministros Eléctricos</option>
                                                        <option value="Gas de Oxigeno">Gas de Oxigeno</option>
                                                        <option value="Almacén">Almacén</option>
                                                        <option value="Carrocerías">Carrocerías</option>
                                                        <option value="Procesadora de alimentos">Procesadora de alimentos</option>
                                                        <option value="Lácteos">Lácteos</option>
                                                    </select>
                                               <span class="focus-input100"></span>
                                                </div>
                                        <div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese Genero">
                                                    <select class="input100 selectpicker" data-live-search="true" name="genero">
                                                        <option>Elegir</option>
                                                        <option value="Hombre">Hombre</option>
                                                        <option value="Mujer">Mujer</option>
                                                        <option value="Otro">Otro</option>       
                                                    </select>
                        <span class="focus-input100"></span>
                                                </div>
                                                  
					
                                
				<div class="container-login100-form-btn">
                                    <input class="login100-form-btn" type="submit" >
						
					
				</div>
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>


        <script>
            
        </script>
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrConfirap.min.js"></script>
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