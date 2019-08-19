<?php 
    require_once "validate.php";  // validación de sesión de usuario // redirecciona a login.php si no se ha iniciado la sesión
    error_reporting(E_ALL); 
	ini_set('display_errors', 'On'); 
	if (($_SERVER["REQUEST_METHOD"] == "GET") ){
		$alert="";
		if (isset($_GET["q"])) {
			$alert='<div class="alert alert-danger" role="alert">'. 
			'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.
			'<strong>El usuario ya existe, intenta con otro nombre de usuario.</strong></div>';
		}// if 
		
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registrar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
	
 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./index.php" target="_blank"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>HW</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        	 <ul class="nav navbar-nav navbar-right">
       	 	<li><?php echo $_SESSION["username"]; ?> <span class="glyphicon glyphicon glyphicon-user" aria-hidden="true"></span></li>
            <li><a href="./logout.php"> Salir <span class="glyphicon glyphicon-off" aria-hidden="true"></span></a></li>
            </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
    	<form enctype="multipart/form-data" method="POST" action="registrar.php">
    	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<?php echo $alert; ?>	
		</div> <!--cols-->
		</div><!--row--> 
    	
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			
				<div class="form-group">
				    <label for="username" class="control-label"><span class="label label-danger"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></span> Nombre de usuario:</label>
			 	    <input type="text" class="form-control tooltipUsername" data-toggle="tooltip" data-placement="bottom" id="username" name="username" value="" placeholder="Nombre de usuario" autofocus  title="Escribe el Nombre de usuario."  onblur="this.value=trim(this.value);">
				</div>
		</div> <!--cols-->
		</div><!--row-->
		<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="form-group">
				    <label for="name" class="control-label"><span class="label label-danger"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></span> Nombre:</label>
			 	    <input type="text" class="form-control tooltipName" data-toggle="tooltip" data-placement="bottom" id="name" name="name" value="" placeholder="Nombre" title="Escribe el Nombre."  onblur="this.value=trim(this.value);">
				</div>
		</div> <!--cols-->
		</div><!--row-->
		<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="form-group">
				    <label for="email" class="control-label"><span class="label label-danger"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></span>Correo Electr&oacute;nico:</label>
			 	    <input type="text" class="form-control tooltipEmail" data-toggle="tooltip" data-placement="bottom" id="email" name="email" value="" placeholder="Correo electrónico" title="Escribe el Correo electrónico en formato correcto."  onblur="this.value=trim(this.value);">
				</div>
		</div> <!--cols-->
		</div><!--row-->
		<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			 <label for="passwd" class="control-label">Contrase&ntilde;a:</label>
		      <input type="password" class="form-control tooltipPasswd" data-toogle="tooltip" data-placement="bottom" id="passwd" name="passwd" placeholder="Contrase&ntilde;a" title="Escribe una contrase&ntilde;a v&aacute;lida."  onblur="this.value=trim(this.value)" onkeyup="validatePasswd(this.value);">
		      <br/><br/><br/>
		      <div class="progress">
		      	
				  <div id="prog20" class="progress-bar progress-bar-warning progress-bar-striped" style="width: 20%;display: none;"></div>
				  <div id="prog40" class="progress-bar progress-bar-warning progress-bar-striped" style="width: 20%;display: none;"></div>
				  <div id="prog60" class="progress-bar progress-bar-warning progress-bar-striped" style="width: 20%;display: none;"></div>
				  <div id="prog80" class="progress-bar progress-bar-warning progress-bar-striped" style="width: 20%;display: none;"></div>
				  <div id="prog100" class="progress-bar progress-bar-warning progress-bar-striped" style="width: 20%;display: none;"></div>
				</div><!-- Progress -->
		</div> <!--cols-->
		</div><!--row-->
		<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="form-group">
					<br/>
			 	    <input type="button" class="btn btn-primary" data-placement="bottom" id="send" name="send" value="Registrar" onclick="doValidate();">
				</div>
		</div> <!--cols-->
		</div><!--row-->

		</form>
		
	</div><!--container-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		function trim(str) {
        	  return str.replace(/^\s+/g, '').replace(/\s+$/g, '').replace(/['"]+/g, '').replace(/<[^>]*>/g, '').replace(/&/g, '');
    	} //jc trim
	
		var emailexp = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
		var doc= document.forms[0];

		 function doValidate() {
		 	if ( (doc.username.value.length<3) ) {				
				doc.username.focus();
				$('.tooltipUsername').tooltip('show');
				return false;
			}//user
			if ( (doc.name.value.length<3) ) {				
				doc.name.focus();
				$('.tooltipName').tooltip('show');
				return false;
			}//name
			if ( (doc.email.value.length<6) || (!(emailexp.test(doc.email.value))) ) {				
				doc.email.focus();
				$('.tooltipEmail').tooltip('show');
				return false;
			}//user
			
			// if (doc.passwd.value.length<8) {
				// $('.tooltipPasswd').tooltip('show');
				// return false;
			// }//password
			if (! (validatePasswd(doc.passwd.value) )) {
				doc.passwd.focus();
				$('.tooltipPasswd').tooltip('show');
				return false;
			}//Passwd
			// si todos los campos están llenos se envían
			doc.submit();
		}//doValidate
		
		
	function validatePasswd(campo) {
	   valor = 0;  // El valor inicial de la complejidad del password es 0
	   flag = false; 
	    patron = /[A-Z]+/      // mayúsculas de la a A la Z
		  if (campo.match(patron)) {
		       valor += 20;
 	        }//// mayúsculas de la a A la Z
  		  patron = /[a-z]+/      // minúsculas de la a a la z
		  if (campo.match(patron)) {
		       valor += 20;
		     } // minúsculas de la a a la z
        patron = /\d+/      // un dígito o más
		  if (campo.match(patron)) {
		       valor += 20;
		     } // un dígito o más
       	patron = /\W+/      // cualquier caracter que no sea letra o número
		  if (campo.match(patron)) {
		       valor += 20;
		     } // cualquier caracter que no sea letra o número
      	 if (campo.length>=10)  {
		    valor += 20;
		  } else if ((campo.length<8) && (valor>=20)) {
		     valor=20;
		 }//longitud
    		 if (valor>=80) {
                 flag = true; 
               } // if
        
            for (i=20;i<=100;i+=20){
               $("#prog"+i).hide();
              }//for i
               
          for (i=20;i<=valor;i+=20){
          	$("#prog"+i).show();
          }//for i
               return flag;
	  } // validatePasswd
	  $( document ).ready(function() {
	   	$('[data-toggle="tooltip"]').tooltip()
	    	
	  });
	
	</script>
	</body>
</html>

<?php
} else if (($_SERVER["REQUEST_METHOD"] == "POST") 
 		&&  (isset($_POST['username'])) 
 		&& (isset($_POST['passwd']))
 		&& (isset($_POST['name']))  
 		&& (isset($_POST['email']))){
 			// Si es método POST y vienen los datos  $username, $pass, $name, $email
			$username=$_POST['username']; // Nombre de usuario
			$pass=password_hash($_POST['passwd'], PASSWORD_DEFAULT);  // Contraseña convertida a hash
			$name=$_POST['name']; // Nombre
			$email=$_POST['email']; // Correo electrónico
			
			//TODO: Almacenar las 4 variables $username, $pass, $name, $email en el archivo de texto de los usuarios  
			/*Asigno mi variable para crear el archivo, con el a+ si ya está
			creado, solo sobreescribe */
			$file = fopen("registros.txt", "a+");
			
			/*Asigno mi variable para leer el archivo completo */
			$fullfile = fread($file, filesize("registros.txt"));
			
			/*Asigno el arreglo explode para poder identificar los saltos de
			línea del archivo completo */
			$rows = explode(chr(13).chr(10), $fullfile);

			/*Se agrega ciclo for para buscar por los separadores pipe line dentro
			de cada línea*/
			$exist = false;
			for ($i=0; $i < count($rows)-1; $i++) { 
				 	$range = explode("|", $rows[$i]);
				 /*Validar usuario:	echo $range[2]."<br>";*/
				 	if ($username == $range[2]) {
						fclose($file);
						//echo"Usuario ya existe";
						header("Location: registrar.php?q=1");
				 		//  esta línea no se ejecuta
				 		break;
				 	}// if
			}// for $i
			// Si llega a está línea es porque el usuario no existe
			/*Antes de escribir los valores en el archivo, los concateno y los
						guardo en una sola variable, para salto de línea utilizo los
						caracteres hexadecimales */
			 			$reg = $name."|".$email."|".$username."|".$pass."|".chr(13).chr(10);
						/*Escribo en mi archivo, lo que se almacenó en las variables al llenar el formulario registrar.php */
						fwrite($file, $reg);
			/*Cierro el archivo*/
			fclose($file);
							
		// si se puede alamacenar la información se regresa el mensaje de registro
		echo(registroOk($name));
		//echo "datos registrados";
		
} else {
	echo "Método no admitido";
}// else if
				
	
function registroOK($n) {
	return <<<_HTML_
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registrar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
		<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./index.php" target="_blank"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>HW</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        	 <ul class="nav navbar-nav navbar-right">
       	 	<li><span class="glyphicon glyphicon glyphicon-user" aria-hidden="true"></span></li>
            <li><a href="./logout.php"> Salir <span class="glyphicon glyphicon-off" aria-hidden="true"></span></a></li>
            </ul>
        </div>
      </div>
    </nav>
		<div class="container text-center">
    		<div class="row">
    			<div class="col-md-offset-4 col-md-4 col-sd-offset-2 col-sd-6 col-xs-offset-3 col-xs-6 text-center">
    			<div class="alert alert-success" role="alert">El usuario ha sido registrado satisfactoriamente<br/>
    			<a href="./index.php">Ir al Inicio</div><br/>
    			<a href="./registrar.php">Registrar a otro usuario</div><br/>
		    	</div>
			</div><!--row-->
		</div><!--container-->
</body>
</html>
_HTML_;
	}// show_login
?>