<?php 
include "conexion.php";
$TABLA = $_GET["TABLA"]; $ID = $_GET["ID"];
if ($TABLA==1) {
	$sql="DELETE FROM personas WHERE id_persona = $ID";

	$resultado= mysqli_query($conection, $sql);
	if (!$resultado) {
		echo "Error al registrarse";
	} else{
		header('location: personas.php');
	}
} else if ($TABLA==2) {
	$sql="DELETE FROM productos WHERE id_producto = $ID";

	$resultado= mysqli_query($conection, $sql);
	if (!$resultado) {
		echo "Error al registrarse";
	} else{
		header('location: productos.php');
	}
} else if ($TABLA==3) {
	$sql="DELETE FROM reservaciones WHERE id_reservacion = $ID";

	$resultado= mysqli_query($conection, $sql);
	if (!$resultado) {
		echo "Error al registrarse";
	} else{
		header('location: reservaciones.php');
	}
} else if ($TABLA==4) {
	$sql="DELETE FROM usuarios WHERE id_usuario = $ID";

	$resultado= mysqli_query($conection, $sql);
	if (!$resultado) {
		echo "Error al registrarse";
	} else{
		header('location: usuarios.php');
	}
} else if ($TABLA==5) {
	$sql="DELETE FROM habitaciones WHERE id_habitacion = $ID";

	$resultado= mysqli_query($conection, $sql);
	if (!$resultado) {
		echo "Error al registrarse";
	} else{
		header('location: habitaciones.php');
	}
} else if ($TABLA==6) {
	$sql="DELETE FROM ventas WHERE id_venta = $ID";

	$resultado= mysqli_query($conection, $sql);
	if (!$resultado) {
		echo "Error al registrarse";
	} else{
		header('location: ventas.php');
	}
}

?>