<?php
	session_start();
	error_reporting(E_ALL); 
	ini_set('display_errors', 'On'); 
	if (($_SERVER["REQUEST_METHOD"] == "GET") && (empty($_SESSION["username"])) ) {
		$alert="";
		if (isset($_GET["q"])) {
			$alert='<div class="alert alert-danger" role="alert">'. 
			'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.
			'<strong>Escribe el nombre de usuario y contraseña correctos.</strong></div>';
		}// if 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ingresar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
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
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Entrar
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="login.php" method="POST">

					<div class="wrap-input100 validate-input" data-validate = "Ingresa el nombre de usuario">
						<input class="input100" type="text" name="username" id="username" placeholder="Nombre de Usuario">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa la contraseña">
						<input class="input100" type="password" name="pass" id="pass" placeholder="Contraseña">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Ingresar
						</button>
					</div>
					<div class="container-login100-form-btn m-t-32">
					<?php echo $alert; ?>
					</div>
				</form>
			</div>
		</div>
	</div>
	
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

<?php
} else if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['username'])) && (isset($_POST['pass']))){
	$username=$_POST['username']; // Nombre de usuario
	$pass=$_POST['pass'];
 	$fileusername='dany';
 	$filepass='$2y$10$N7D2reRy1/thnMc0GAkVUOdMYPuJ.sx1naQ1K9YMxLjTFRhPrwgm2'; // Pa$$w0rd
	
	///// TODO:Leer del archivo de texto el nombre de usuario y asignarlo a la variable $fileusername
	//// TODO: Leer del archivo de texto el nombre de usuario y asignarlo a la variable $filepass
	$myfile = fopen("registros.txt", "r");
	$fullmyfile = fread($myfile, filesize("registros.txt"));

	$rows =explode(chr(13).chr(10), $fullmyfile);
	$ok =false;

	for ($i=0; $i < count($rows)-1; $i++)  { 
		$range = explode("|", $rows[$i]);
		$fileusername = $range[2];
		$filepass = $range[3];
		
		if ((strcmp($username, $fileusername)==0) && (password_verify($pass, $filepass)) ) {
			// Si la información es correcta se crea una variable de sesión, esto permitiría validar que un usuario ya se encuentra logueado en páginas posteriormente
			$_SESSION["username"]=$username; 
			// Una vez creada la variable de sesión Redirecciona hacia index.php
			header("Location: index.php");
			break;// esta línea no se eejecuta
		}else {
			header("Location: login.php?q=1");
			// Si la información no es correcta, redirecciona al usuario nuevamente a login.php
			break;// esta línea no se eejecuta
		}// if	
	} // for $i
	 /// Validación de username y pass, leyendo de un archivo de texto
} else {
	// Si el Método no es GET ó POST(con username y pass establecidos) redirecciona a login.php
		header("Location: login.php");
}// else if REQUEST_METHOD==POST
?>