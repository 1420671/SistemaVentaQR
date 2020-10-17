<?php
require './Conexion/cn.php';
    $token=$_GET['token'];

    $sql="select * from vendedor where token='".$token."'";
    $resultado2 = mysqli_query($conexion, $sql);
    while ($datos= mysqli_fetch_array($resultado2)){
          $nombre=$datos['nombre'];
          $id=$datos['id'];  
        }
    if($resultado2){
        $q="update vendedor set token=null where id='".$id."'";
        $re=mysqli_query($conexion, $q);
   
    
    }
?>
<head>
    <title>Cambiar Contraseña</title>
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
<body>
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
<form class="login100-form validate-form" action="Validacion/cambiar.php?id=<?php echo $id?>" method="post">
    <span class="login100-form-title p-b-37">
        Bienvenido&nbsp;<?php echo $nombre?>
				</span>

	<div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese su usuario">
            <input type="text" class="input100" type="text"  id="uid" name="uid" value="Id De Cliente: <?php echo $id?>" disabled="true">
            
			<span class="focus-input100"></span>
	</div>
 <div class="wrap-input100 validate-input m-b-20" data-validate="Ingrese su nueva contraseña">
     <input  class="input100" type="password" id="newPassword" name="newPassword" placeholder="Ingrese su nueva contraseña">
			<span class="focus-input100"></span>
	</div>
    <div class="container-login100-form-btn">
                                    <button class="login100-form-btn" type="submit" >
						Cambiar contraseña
					</button>
				</div>
 
</form>
                </div>
    </div>
</body>
