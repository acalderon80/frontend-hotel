<?php
$alert = '';
session_start();
if (!empty($_SESSION['active'])) {
	header('location:../crud/personas.php'); //volver 1 carpeta
}else{



if(!empty($_POST))
{
	if (empty($_POST['usuario']) || empty($_POST['contraseña'])) {

		$alert = 'Clave o usuario incorrectos';

	}else{
		require_once "conexion.php";
		 $usuario = mysqli_real_escape_string($conection, $_POST['usuario']) ;
		 $contraseña = md5(mysqli_real_escape_string($conection, $_POST['contraseña']));

		 $query = mysqli_query($conection, "SELECT * FROM usuarios WHERE login= '$usuario' AND CLAVE = '$contraseña'");
		 $result = mysqli_num_rows($query);
		 if ($result >= 0) {
		 	$datos = mysqli_fetch_array($query);
		 	$_SESSION['active'] = true;
		 	$_SESSION['id_usuario'] = $datos['id_usuario'];
		 	$_SESSION['nombre']= $datos['login'];
		 	header('location:../crud/personas.php ');

		 }else{
		 	
		 	session_destroy();
		 }
	}
}
}
?>