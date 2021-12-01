<?php 
include "conexion.php"; 
$ID = $_GET["ID"]; $VALOR = $_GET["VALOR"];
if ($ID==0){

	$ID="";
	$nom_producto="";
	$desc_producto="";
	$id_usuario_cambio="";
	$precio_producto="";
	$unidades_existentes="";

}else if ($ID!=0) {
	$sql="SELECT * FROM productos WHERE id_producto = $ID";
	$resultado= mysqli_query($conection, $sql);
	$data = mysqli_fetch_array($resultado);
	if (!$resultado) {
		echo "Error al registrarse";
	} else{

		$ID=$data['id_producto'];
		$nom_producto=$data['nom_producto'];
		$desc_producto=$data['desc_producto'];
		$id_usuario_cambio=$data['id_usuario_cambio'];
		$precio_producto=$data['precio_producto'];
		$unidades_existentes=$data['unidades_existentes'];

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
        	<h1 id="titulo" style="text-align:center;">Formulario de productos</h1>
            <form action="Registrar.php?Valor01=$Valor0" method="post" class="form1" onsubmit="returnvalidar();" enctype="multipart/form-data">
        <div class="Numero">
          <input type="checkbox" name="VALOR" checked="true" value="<?php echo $VALOR ?>" style="opacity: 0%;">
        </div>
        <div class="Numero">
          <input type="checkbox" name="TABLA" checked="true" value="2" style="opacity: 0%;">
        </div>
        <div class="Numero">
          <input type="checkbox" name="id_producto" checked="true" value="<?php echo $ID ?>" style="opacity: 0%;">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Nombre del producto</label>
          <input type="text" value="<?php echo $nom_producto ?>" id="inputText" name="nom_producto" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Descripcion del producto</label>
          <input type="text" value="<?php echo $desc_producto ?>" id="inputText" name="desc_producto" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">ID del usuario</label>
          <input type="number" value="<?php echo $id_usuario_cambio ?>" id="inputText" name="id_usuario_cambio" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Precio del producto</label>
          <input type="number" value="<?php echo $precio_producto ?>" id="inputText" name="precio_producto" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Unidades existentes</label>
          <input type="number" value="<?php echo $unidades_existentes ?>" id="inputText" name="unidades_existentes" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <div style="float: right; margin-top: 20px;" class="Boton">
          <input type="submit" class="btn btn-primary" value="Guardar">
        </div>



        </div>
      </form>
       	</div>
   	</div>
</body>
</html>