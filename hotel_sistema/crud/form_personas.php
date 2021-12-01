<?php 
include "conexion.php"; 
$ID = $_GET["ID"]; $VALOR = $_GET["VALOR"];
if ($ID==0){

	$ID="";
	$ID="";
	$pri_nombre="";
	$seg_nombre="";
	$pri_apellido="";
	$seg_apellido="";
	$razon_social="";
	$direccion="";
	$telefono="";
	$correo="";
	$identificacion="";
	$genero="";

}else if ($ID!=0) {
	$sql="SELECT * FROM personas WHERE id_persona = $ID";
	$resultado= mysqli_query($conection, $sql);
	$data = mysqli_fetch_array($resultado);
	if (!$resultado) {
		echo "Error al registrarse";
	} else{

		$ID=$data['id_persona'];
		$pri_nombre=$data['pri_nombre'];
		$seg_nombre=$data['seg_nombre'];
		$pri_apellido=$data['pri_apellido'];
		$seg_apellido=$data['seg_apellido'];
		$razon_social=$data['razon_social'];
		$direccion=$data['direccion'];
		$telefono=$data['telefono'];
		$correo=$data['correo'];
		$identificacion=$data['identificacion'];
		$genero=$data['genero'];

	}
}
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Itfip</title>
    <link rel="stylesheet" type="text/css" href="personas.css">
    <link rel="icon" href="img/hotel.png"   type="img/png"/>
    <link rel="stylesheet" type="text/css" href="Formulario.css">

</head>
<body style="align-content: center;">
  <?php
  session_start();
  if (empty($_SESSION['active'])) {
        header('location:../login/inicio_sesion.php');
  }
  ?>
   <header>
    <div class="nav">
      <div class="logo">
        <img src="img/hotel.png">
      </div>
      <nav class="menu-enlaces">
        <ul class="menu-enlaces-li">
          <li><a href="personas.php">Personas</a></li>
          <li><a href="productos.php">Productos</a></li>
          <li><a href="reservaciones.php">Reservaciones</a></li>
          <li><a href="usuarios.php">Usuarios</a></li>
          <li><a href="habitaciones.php">Habitaciones</a></li>
          <li><a href="ventas.php">Ventas</a></li>
        </ul>
      </nav>
      <div class="menu-nav">
        <div class="usuario">
          <div><a><?php echo $_SESSION['nombre']?></a></div>
        </div>
        <div class="logout">
         <a href="../login/logout.php"> <img src="img/logout.png"></a>
        </div>
      </div>  
    </div>
  </header><br>
      <div class=" tabla">
         <div class="container">
        	<h1 id="titulo" style="text-align:center;">Formulario de personas</h1>
            <form action="Registrar.php?Valor01=$Valor0" method="post" class="form1" onsubmit="returnvalidar();" enctype="multipart/form-data">
        <div class="Numero">
          <input type="checkbox" name="VALOR" checked="true" value="<?php echo $VALOR ?>" style="opacity: 0%;">
        </div>
        <div class="Numero">
          <input type="checkbox" name="TABLA" checked="true" value="1" style="opacity: 0%;">
        </div>
        <div class="Numero">
          <input type="checkbox" name="id_persona" checked="true" value="<?php echo $ID ?>" style="opacity: 0%;">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Primer nombre</label>
          <input type="text" value="<?php echo $pri_nombre ?>" id="inputText" name="pri_nombre" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Segundo nombre</label>
          <input type="text" value="<?php echo $seg_nombre ?>" id="inputText" name="seg_nombre" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Primer apellido</label>
          <input type="text" value="<?php echo $pri_apellido ?>" id="inputText" name="pri_apellido" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Segundo apellido</label>
          <input type="text" value="<?php echo $seg_apellido ?>" id="inputText" name="seg_apellido" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Razon social</label>
          <input type="text"  value="<?php echo $razon_social ?>" id="inputText" name="razon_social" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Direccion</label>
          <input type="text" value="<?php echo $direccion ?>" id="inputText" name="direccion" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <div class="Campo">
          <label for="inputnumber" class="form-label" style="margin-top: 10px;">Telefono</label>
          <input type="number" value="<?php echo $telefono ?>" id="inputnumber" name="telefono" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Correo</label>
          <input type="text" value="<?php echo $correo ?>" id="inputText" name="correo" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Identificacion</label>
          <input type="text" value="<?php echo $identificacion ?>" id="inputText" name="identificacion" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <?php 
        if ($genero==0) {
        	echo "
			<div class='R_btn'>
				<a>Genero:</a>
				<input type='radio' name='genero' value='0' required='true' checked><a>Masculino</a>
				<input type='radio' name='genero' value='1' required='true'><a>Femenino</a>
			</div>";
        } elseif ($genero==1) {
        	echo "
			<div class='R_btn'>
				<a>Genero:</a>
				<input type='radio' name='genero' value='0' required='true'><a>Masculino</a>
				<input type='radio' name='genero' value='1' required='true' checked><a>Femenino</a>
			</div>";
        } else {
        	echo "
			<div class='R_btn'>
				<a>Genero:</a>
				<input type='radio' name='genero' value='0' required='true'><a>Masculino</a>
				<input type='radio' name='genero' value='1' required='true'><a>Femenino</a>
			</div>";
        }
        ?>
        <div style="float: right; margin-top: 20px;" class="Boton">
          <input type="submit" class="btn btn-primary" value="Guardar">
        </div>



        </div>
      </form>
       	</div>
   	</div>
</body>
</html>