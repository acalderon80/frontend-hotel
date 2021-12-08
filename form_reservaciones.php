<?php 
include "conexion.php"; 
$ID = $_GET["ID"]; $VALOR = $_GET["VALOR"];
if ($ID==0){

	$id_reservacion="";
	$id_habitacion="";
	$id_persona="";
  $fec_inicio="";
  $fec_fin="";

}else if ($ID!=0) {
	$sql="SELECT * FROM reservaciones WHERE id_reservacion = $ID";
	$resultado= mysqli_query($conection, $sql);
	$data = mysqli_fetch_array($resultado);
	if (!$resultado) {
		echo "Error al registrarse";
	} else{

		$id_reservacion=$data['id_reservacion'];
		$id_habitacion=$data['id_habitacion'];
		$id_persona=$data['id_persona'];
    $fec_inicio=$data['fec_inicio'];
    $fec_fin=$data['fec_fin'];

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
         <li><a href="factura.php">Factura</a></li>
          <li><a href="dfactura.php">Detalle factura</a></li>
            <li><a href="facturas.php"><img src="img/impresora.png" style="width: 26px; height: 26px;"></a></li>
             <li><a href="inventario.php"><img src="img/inventario.png" style="width: 26px; height: 26px;"></a></li>
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
        	<h1 id="titulo" style="text-align:center;">Formulario de reservaciones</h1>
            <form action="Registrar.php" method="post" class="form1" onsubmit="returnvalidar();" enctype="multipart/form-data">
        <div class="Numero">
          <input type="checkbox" name="VALOR" checked="true" value="<?php echo $VALOR ?>" style="opacity: 0%;">
        </div>
        <div class="Numero">
          <input type="checkbox" name="TABLA" checked="true" value="3" style="opacity: 0%;">
        </div>
        <div class="Numero">
          <input type="checkbox" name="id_reservacion" checked="true" value="<?php echo $ID ?>" style="opacity: 0%;">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Id de la habitacion</label>
          <input type="number" value="<?php echo $id_habitacion ?>" id="inputText" name="id_habitacion" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Id del usuario</label>
          <input type="number" value="<?php echo $id_persona ?>" id="inputText" name="id_persona" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Inicio de la reservacion</label>
          <input type="date" value="<?php echo $fec_inicio ?>" name="fec_inicio">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Fin de la reservacion</label>
          <input type="date" value="<?php echo $fec_fin ?>" name="fec_fin">
        </div>
        <div style="float: right; margin-top: 20px;" class="Boton">
          <input type="submit" class="btn btn-primary" value="Guardar">
        </div>



        </div>
      </form>
       	</div>
   	</div>
</body>
<br>
<br>
<footer>
  <div class="container-footer">
    <br>
    ©2021 - Grupo1
  </div>
</footer>
</html>