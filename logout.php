<?php
	session_start();
	unset($_SESSION["username"]); //Elimina la variable de sesión username
	session_destroy();            // Elimina la información de la sesión
    header("Location: login.php"); // Redirecciona a login.php 
	exit();
?>