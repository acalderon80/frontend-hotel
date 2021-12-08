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
	$fec_cambio= new datetime();
	$fec_cambio= $fec_cambio->format ('Y-m-d');

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
		
		$sql = "INSERT INTO personas (id_persona, pri_nombre, seg_nombre, pri_apellido, seg_apellido, razon_social, direccion, telefono, correo, identificacion, genero, fec_cambio, id_usuario_cambio) VALUES ($cont, '$pri_nombre', '$seg_nombre', '$pri_apellido', '$seg_apellido', '$razon_social', '$direccion', '$telefono', '$correo', '$identificacion', '$genero', '$fec_cambio', '')";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
		} else{
			header('location: personas.php');
		}

	}else if ($VALOR==1){
		$sql = "UPDATE personas SET id_persona='$id_persona', pri_nombre='$pri_nombre', seg_nombre='$seg_nombre', pri_apellido='$pri_apellido', seg_apellido='$seg_apellido', razon_social='$razon_social', direccion='$direccion', telefono='$telefono', correo='$correo', identificacion='$identificacion', genero='$genero', fec_cambio='$fec_cambio' WHERE id_persona=$id_persona";

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
	$id_categoria=$_POST['id_categoria'];
	$nom_producto=$_POST['nom_producto'];
	$desc_producto=$_POST['desc_producto'];
	$id_usuario_cambio=$_POST['id_usuario_cambio'];
	$precio_producto=$_POST['precio_producto'];
	$unidades_existentes=$_POST['unidades_existentes'];
	$fec_cambio= new datetime();
	$fec_cambio= $fec_cambio->format ('Y-m-d');

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
		
		$sql = "INSERT INTO productos (id_producto, id_categoria, nom_producto, desc_producto, fec_cambio, id_usuario_cambio, precio_producto, unidades_existentes) VALUES ($cont, '$id_categoria', '$nom_producto', '$desc_producto', '$fec_cambio', '$id_usuario_cambio', '$precio_producto', '$unidades_existentes');";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion1");</script>';
		} else{
			header('location: productos.php');
		}

	}else if ($VALOR==1){
		$sql = "UPDATE productos SET id_producto='$id_producto', id_categoria='$id_categoria', nom_producto='$nom_producto', desc_producto='$desc_producto', fec_cambio='$fec_cambio', id_usuario_cambio='$id_usuario_cambio', precio_producto='$precio_producto', unidades_existentes='$unidades_existentes' WHERE id_producto=$id_producto";

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
	$id_persona=$_POST['id_persona'];
	$id_habitacion=$_POST['id_habitacion'];
	$fec_inicio=$_POST['fec_inicio'];
	$fec_fin=$_POST['fec_fin'];
	$fec_cambio= new datetime();
	$fec_cambio= $fec_cambio->format ('Y-m-d');


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
		
		$sql = "INSERT INTO reservaciones (id_reservacion, id_habitacion, id_persona, fec_inicio, fec_fin, fec_cambio) VALUES ($cont, '$id_habitacion', '$id_persona', '$fec_inicio', '$fec_fin', '$fec_cambio')";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
		} else{
			header('location: reservaciones.php');
		}

	}else if ($VALOR==1){
		$sql = "UPDATE reservaciones SET id_reservacion='$id_reservacion', id_habitacion='$id_habitacion', id_persona='$id_persona', fec_inicio='$fec_inicio', fec_fin='$fec_fin'  WHERE id_reservacion=$id_reservacion";

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
	$id_persona=$_POST['id_persona'];
	$login=$_POST['login'];
	$clave=$_POST['clave'];	
	$verificado=$_POST['verificado'];
	$estatus=$_POST['estatus'];
	$fec_cambio= new datetime();
	$fec_cambio= $fec_cambio->format ('Y-m-d');

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
		
		$sql = "INSERT INTO usuarios (id_usuario, id_persona, login, clave, verificado, estatus, fec_cambio) VALUES ($cont, '$id_persona', '$login', '$clave', '$verificado', '$estatus', '$fec_cambio')";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
		} else{
			header('location: usuarios.php');
		}

	}else if ($VALOR==1){
		$sql = "UPDATE usuarios SET id_usuario='$id_usuario', id_persona='$id_persona', login='$login', clave='$clave', verificado='$verificado', estatus='$estatus', fec_cambio='$fec_cambio' WHERE id_usuario=$id_usuario";

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

	$id_habitacion=$_POST['id_habitacion'];
	$num_habitacion=$_POST['num_habitacion'];
	$id_tipo_habitacion=$_POST['Habitacion'];
	$id_persona=$_POST['id_persona'];
	$estado=$_POST['estado'];
	$limpieza=100000;
	if ($id_tipo_habitacion==1) {
		$costo_dia=500000;
		$mantenimiento=$costo_dia*3;
	}else if ($id_tipo_habitacion==2) {
		$costo_dia=120000;
		$mantenimiento=$costo_dia*3;
	}else if ($id_tipo_habitacion==3) {
		$costo_dia=200000;
		$mantenimiento=$costo_dia*3;
	}else if ($id_tipo_habitacion==4) {
		$costo_dia=300000;
		$mantenimiento=$costo_dia*3;
	}else if ($id_tipo_habitacion==5) {
		$costo_dia=800000;
		$mantenimiento=$costo_dia*3;
	}else if ($id_tipo_habitacion==6) {
		$costo_dia=1000000;
		$mantenimiento=$costo_dia*3;
	}else if ($id_tipo_habitacion==7) {
		$costo_dia=1500000;
		$mantenimiento=$costo_dia*3;
	}
	if ($estado==0) {
		$mantenimiento=0;
	}
	$fec_cambio= new datetime();
	$fec_cambio= $fec_cambio->format ('Y-m-d');

	if ($VALOR==0) {
		$cont=1;
		$query = mysqli_query($conection, "SELECT id_habitacion FROM habitaciones WHERE id_habitacion='$cont'");
		$data = mysqli_fetch_array($query);

		while ( $cont== $data["id_habitacion"]) {
			$cont=$cont+1;
			$query = mysqli_query($conection, "SELECT id_habitacion FROM habitaciones WHERE id_habitacion='$cont'");
			$data = mysqli_fetch_array($query);
			$sql = mysqli_query($conection, "SELECT id_habitacion FROM habitaciones WHERE id_habitacion='$cont+1'");
			$data2 = mysqli_fetch_array($sql);
			if (empty($data["id_habitacion"])) {
				break;
			}
		}
		
		$sql = "INSERT INTO habitaciones (id_habitacion, num_habitacion, id_tipo_habitacion, id_persona, costo_dia, limpieza, mantenimiento, estado, fec_cambio) VALUES ($cont, '$num_habitacion', '$id_tipo_habitacion', '$id_persona', '$costo_dia', '$limpieza', '$mantenimiento', '$estado', '$fec_cambio')";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
		} else{
			header('location: habitaciones.php');
		}

	}else if ($VALOR==1){
		$sql = "UPDATE habitaciones SET id_habitacion='$id_habitacion', num_habitacion='$num_habitacion', id_tipo_habitacion='$id_tipo_habitacion', id_persona='$id_persona', costo_dia='$costo_dia', limpieza='$limpieza', mantenimiento='$mantenimiento', estado='$estado', fec_cambio='$fec_cambio' WHERE id_habitacion=$id_habitacion";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
		} else{
			header('location: habitaciones.php');
		}


	}else {
		echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
	}
} else if ($TABLA==6) {

	$id_venta=$_POST['id_venta'];
	$id_persona=$_POST['id_persona'];
	$total_venta=$_POST['total_venta'];
	$fec_venta=$_POST['fec_venta'];	
	$verificado=$_POST['verificado'];
	$estatus=$_POST['estatus'];
	$fec_cambio= new datetime();
	$fec_cambio= $fec_cambio->format ('Y-m-d');

	if ($VALOR==0) {
		$cont=1;
		$query = mysqli_query($conection, "SELECT id_venta FROM ventas WHERE id_venta='$cont'");
		$data = mysqli_fetch_array($query);

		while ( $cont== $data["id_venta"]) {
			$cont=$cont+1;
			$query = mysqli_query($conection, "SELECT id_venta FROM ventas WHERE id_venta='$cont'");
			$data = mysqli_fetch_array($query);
			$sql = mysqli_query($conection, "SELECT id_venta FROM ventas WHERE id_venta='$cont+1'");
			$data2 = mysqli_fetch_array($sql);
			if (empty($data["id_venta"])) {
				break;
			}
		}
		
		$sql = "INSERT INTO ventas (id_venta, id_persona, total_venta, fec_venta, fec_cambio) VALUES ($cont, '$id_persona', '$total_venta', '$fec_venta', '$fec_cambio')";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
		} else{
			header('location: ventas.php');
		}

	}else if ($VALOR==1){
		$sql = "UPDATE ventas SET id_venta='$id_venta', id_persona='$id_persona', total_venta='$total_venta', fec_venta='$fec_venta', fec_cambio='$fec_cambio' WHERE id_venta=$id_venta";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
		} else{
			header('location: ventas.php');
		}


	}else {
		echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
	}
} else if ($TABLA==7) {

	$id_factura=$_POST['id_factura'];
	$id_persona=$_POST['id_persona'];
	$fecha=$_POST['fecha'];
	$fec_cambio= new datetime();
	$fec_cambio= $fec_cambio->format ('Y-m-d');

	if ($VALOR==0) {
		$cont=1;
		$query = mysqli_query($conection, "SELECT id_factura FROM factura WHERE id_factura='$cont'");
		$data = mysqli_fetch_array($query);

		while ( $cont== $data["id_factura"]) {
			$cont=$cont+1;
			$query = mysqli_query($conection, "SELECT id_factura FROM factura WHERE id_factura='$cont'");
			$data = mysqli_fetch_array($query);
			$sql = mysqli_query($conection, "SELECT id_factura FROM factura WHERE id_factura='$cont+1'");
			$data2 = mysqli_fetch_array($sql);
			if (empty($data["id_factura"])) {
				break;
			}
		}
		
		$sql = "INSERT INTO factura (id_factura, id_persona, fecha, fec_cambio) VALUES ($cont, '$id_persona', '$fecha', '$fec_cambio')";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
		} else{
			header('location: factura.php');
		}

	}else if ($VALOR==1){
		$sql = "UPDATE factura SET id_factura='$id_factura', id_persona='$id_persona', fecha='$fecha', fec_cambio='$fec_cambio' WHERE id_factura=$id_factura";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
		} else{
			header('location: factura.php');
		}


	}else {
		echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
	}
} else if ($TABLA==8) {

	$id_producto=$_POST['id_producto'];
	$id_factura=$_POST['id_factura'];
	$precio=$_POST['precio'];
	$cantidad=$_POST['cantidad'];
	$fec_cambio= new datetime();
	$fec_cambio= $fec_cambio->format ('Y-m-d');

	if ($VALOR==0) {
		$cont=1;
		$query = mysqli_query($conection, "SELECT id_producto FROM detalle_factura WHERE id_producto='$cont'");
		$data = mysqli_fetch_array($query);

		while ( $cont== $data["id_producto"]) {
			$cont=$cont+1;
			$query = mysqli_query($conection, "SELECT id_producto FROM detalle_factura WHERE id_producto='$cont'");
			$data = mysqli_fetch_array($query);
			$sql = mysqli_query($conection, "SELECT id_producto FROM detalle_factura WHERE id_producto='$cont+1'");
			$data2 = mysqli_fetch_array($sql);
			if (empty($data["id_producto"])) {
				break;
			}
		}
		
		$sql = "INSERT INTO detalle_factura (id_producto, id_factura, precio, cantidad, fec_cambio) VALUES ($cont, '$id_factura', '$precio', '$cantidad', '$fec_cambio')";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
		} else{
			header('location: dfactura.php');
		}

	}else if ($VALOR==1){
		$sql = "UPDATE detalle_factura SET id_producto='$id_producto', id_factura='$id_factura', precio='$precio', cantidad='$cantidad', fec_cambio='$fec_cambio' WHERE id_producto=$id_producto";

		$resultado= mysqli_query($conection, $sql);
		if (!$resultado) {
			echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
		} else{
			header('location: dfactura.php');
		}


	}else {
		echo '<script language="javascript">alert("No se logro registrar la informacion");</script>';
	}
}

?>