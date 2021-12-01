<?php 
include "conexion.php";
$TABLA = $_POST["TABLA"]; $VALOR = $_POST["VALOR"];
if ($TABLA==1) {

	$id_persona=$_POST['id_persona'];
	$pri_nombre=$_POST['pri_nombre'];
	$seg_nombre=$_POST['seg_nombre'];
	$pri_apellido=$_POST['pri_apellido'];
	$seg_apellido=$_POST['seg_apellido'];
	$razon_social=$_POST['razon_social'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];
	$identificacion=$_POST['identificacion'];
	$genero=$_POST['genero'];

	if ($VALOR==0) {
		$cont=1;
		$query = mysqli_query($conection, "SELECT id_persona FROM personas WHERE id_persona='$cont'");
		$data = mysqli_fetch_array($query);

		while ( $cont== $data["id_persona"]) {
			$cont=$cont+1;
			$query = mysqli_query($conection, "SELECT id_persona FROM personas WHERE id_persona='$cont'");
			$data = mysqli_fetch_array($query);
			$sql = mysqli_query($conection, "SELECT id_persona FROM personas WHERE id_persona='$cont+1'");
			$data2 = mysqli_fetch_array($sql);
			if (empty($data["id_persona"])) {
				break;
			}
		}
		
		$sql = "INSERT INTO personas (id_persona, pri_nombre, seg_nombre, pri_apellido, seg_apellido, razon_social, direccion, telefono, correo, identificacion, genero, fec_cambio, id_usuario_cambio) VALUES ($cont, '$pri_nombre', '$seg_nombre', '$pri_apellido', '$seg_apellido', '$razon_social', '$direccion', '$telefono', '$correo', '$identificacion', '$genero', '', '')";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
		} else{
			header('location: personas.php');
		}

	}else if ($VALOR==1){
		$sql = "UPDATE personas SET id_persona='$id_persona', pri_nombre='$pri_nombre', seg_nombre='$seg_nombre', pri_apellido='$pri_apellido', seg_apellido='$seg_apellido', razon_social='$razon_social', direccion='$direccion', telefono='$telefono', correo='$correo', identificacion='$identificacion', genero='$genero' WHERE id_persona=$id_persona";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
		} else{
			header('location: personas.php');
		}


	}else {
		echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
	}
} else 
if ($TABLA==2) {

	$id_producto=$_POST['id_producto'];
	$nom_producto=$_POST['nom_producto'];
	$desc_producto=$_POST['desc_producto'];
	$id_usuario_cambio=$_POST['id_usuario_cambio'];
	$precio_producto=$_POST['precio_producto'];
	$unidades_existentes=$_POST['unidades_existentes'];

	if ($VALOR==0) {
		$cont=1;
		$query = mysqli_query($conection, "SELECT id_producto FROM productos WHERE id_producto='$cont'");
		$data = mysqli_fetch_array($query);
		while ( $cont== $data["id_producto"]) {
			$cont=$cont+1;
			$query = mysqli_query($conection, "SELECT id_producto FROM productos WHERE id_producto='$cont'");
			$data = mysqli_fetch_array($query);
			$sql = mysqli_query($conection, "SELECT id_producto FROM productos WHERE id_producto='$cont+1'");
			$data2 = mysqli_fetch_array($sql);
			if (empty($data["id_producto"])) {
				break;
			}
		}
		
		$sql = "INSERT INTO productos (id_producto, nom_producto, desc_producto, fec_cambio, id_usuario_cambio, precio_producto, unidades_existentes) VALUES ($cont, '$nom_producto', '$desc_producto', '', '$id_usuario_cambio', '$precio_producto', '$unidades_existentes');";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion1");</script>';
		} else{
			header('location: productos.php');
		}

	}else if ($VALOR==1){
		$sql = "UPDATE productos SET id_producto='$id_producto', nom_producto='$nom_producto', desc_producto='$desc_producto', id_usuario_cambio='$id_usuario_cambio', precio_producto='$precio_producto', unidades_existentes='$unidades_existentes' WHERE id_producto=$id_producto";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
		} else{
			header('location: productos.php');
		}


	}else {
		echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
	}
} else if ($TABLA==3) {

	@$id_reservacion=$_POST['id_reservacion'];
	$id_usuario_cambio=$_POST['id_usuario_cambio'];

	if ($VALOR==0) {
		$cont=1;
		$query = mysqli_query($conection, "SELECT id_reservacion FROM reservaciones WHERE id_reservacion='$cont'");
		$data = mysqli_fetch_array($query);

		while ( $cont== $data["id_reservacion"]) {
			$cont=$cont+1;
			$query = mysqli_query($conection, "SELECT id_reservacion FROM reservaciones WHERE id_reservacion='$cont'");
			$data = mysqli_fetch_array($query);
			$sql = mysqli_query($conection, "SELECT id_reservacion FROM reservaciones WHERE id_reservacion='$cont+1'");
			$data2 = mysqli_fetch_array($sql);
			if (empty($data["id_reservacion"])) {
				break;
			}
		}
		
		$sql = "INSERT INTO reservaciones (id_reservacion, fec_cambio, id_usuario_cambio, fec_inicio, fec_fin) VALUES ($cont, '', '$id_usuario_cambio', '', '')";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
		} else{
			header('location: reservaciones.php');
		}

	}else if ($VALOR==1){
		$sql = "UPDATE reservaciones SET id_reservacion='$id_reservacion', id_usuario_cambio='$id_usuario_cambio' WHERE id_reservacion=$id_reservacion";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
		} else{
			header('location: reservaciones.php');
		}


	}else {
		echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
	}
} else if ($TABLA==4) {

	$id_usuario=$_POST['id_usuario'];
	$login=$_POST['login'];
	$clave=$_POST['clave'];
	$id_usuario_cambio=$_POST['id_usuario_cambio'];

	if ($VALOR==0) {
		$cont=1;
		$query = mysqli_query($conection, "SELECT id_usuario FROM usuarios WHERE id_usuario='$cont'");
		$data = mysqli_fetch_array($query);

		while ( $cont== $data["id_usuario"]) {
			$cont=$cont+1;
			$query = mysqli_query($conection, "SELECT id_usuario FROM usuarios WHERE id_usuario='$cont'");
			$data = mysqli_fetch_array($query);
			$sql = mysqli_query($conection, "SELECT id_usuario FROM usuarios WHERE id_usuario='$cont+1'");
			$data2 = mysqli_fetch_array($sql);
			if (empty($data["id_usuario"])) {
				break;
			}
		}
		
		$sql = "INSERT INTO usuarios (id_usuario, login, clave, fec_cambio, id_usuario_cambio, verificado_correo) VALUES ($cont, '', '$login', '$clave', '$id_usuario_cambio', 1)";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
		} else{
			header('location: usuarios.php');
		}

	}else if ($VALOR==1){
		$sql = "UPDATE usuarios SET id_usuario='$id_usuario', login='$login', clave='$clave' WHERE id_usuario=$id_usuario";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
		} else{
			header('location: usuarios.php');
		}


	}else {
		echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
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