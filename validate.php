<?php
// Validación de la sesión de usuario
// Si la sesión no se ha iniciado, se redirecciona a login.php para iniciar una sesión
      session_start();
	  if (! isset($_SESSION["username"])) {
		  header("Location: login.php"); /* Redirect browser */
		  exit();
	  }  //if $_SESSION["username"]==""
?>