<?php 
include "conexion.php"; 
$ID = $_GET["ID"]; $VALOR = $_GET["VALOR"];
if ($ID==0){

	$ID="";
  $id_persona="";
	$login="";
	$clave="";
	$verificado="";
  $estatus="";

}else if ($ID!=0) {
	$sql="SELECT * FROM usuarios WHERE id_usuario = $ID";
	$resultado= mysqli_query($conection, $sql);
	$data = mysqli_fetch_array($resultado);
	if (!$resultado) {
		echo "Error al registrarse";
	} else{

		$ID=$data['id_usuario'];
    $id_persona=$data['id_persona'];
		$login=$data['login'];
		$clave=$data['CLAVE'];
    $verificado=$data['verificado'];
    $estatus=$data['estatus'];

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
        	<h1 id="titulo" style="text-align:center;">Formulario de personas</h1>
            <form action="Registrar.php" method="post" class="form1" onsubmit="returnvalidar();" enctype="multipart/form-data">
        <div class="Numero">
          <input type="checkbox" name="VALOR" checked="true" value="<?php echo $VALOR ?>" style="opacity: 0%;">
        </div>
        <div class="Numero">
          <input type="checkbox" name="TABLA" checked="true" value="4" style="opacity: 0%;">
        </div>
        <div class="Numero">
          <input type="checkbox" name="id_usuario" checked="true" value="<?php echo $ID ?>" style="opacity: 0%;">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Id de la persona</label>
          <input type="number" value="<?php echo $id_persona ?>" id="inputText" name="id_persona" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Usuario</label>
          <input type="text" value="<?php echo $login ?>" id="inputText" name="login" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <div class="Campo">
          <label for="inputText" class="form-label" style="margin-top: 10px;">Clave</label>
          <input type="text" value="<?php echo $clave ?>" id="inputText" name="clave" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
        <?php 
        if (@$verificado==0) {
          echo "
      <div class='R_btn'>
        <a>Verificado:</a>
        <input type='radio' name='verificado' value='0' required='true' checked><a>No</a>
        <input type='radio' name='verificado' value='1' required='true'><a>Si</a>
      </div>";
        } elseif ($verificado==1) {
          echo "
      <div class='R_btn'>
        <a>Verificado:</a>
        <input type='radio' name='verificado' value='0' required='true'><a>No</a>
        <input type='radio' name='verificado' value='1' required='true' checked><a>Si</a>
      </div>";
        } else {
          echo "
      <div class='R_btn'>
        <a>Verificado:</a>
        <input type='radio' name='verificado' value='0' required='true'><a>No</a>
        <input type='radio' name='verificado' value='1' required='true'><a>Si</a>
      </div>";
        }
        ?>
        <?php 
        if (@$estatus==0) {
          echo "
      <div class='R_btn'>
        <a>Estatus:</a>
        <input type='radio' name='estatus' value='0' required='true' checked><a>Usuario</a>
        <input type='radio' name='estatus' value='1' required='true'><a>Administrador</a>
      </div>";
        } elseif ($estatus==1) {
          echo "
      <div class='R_btn'>
        <a>Estatus:</a>
        <input type='radio' name='estatus' value='0' required='true'><a>Usuario</a>
        <input type='radio' name='estatus' value='1' required='true' checked><a>Administrador</a>
      </div>";
        } else {
          echo "
      <div class='R_btn'>
        <a>Estatus:</a>
        <input type='radio' name='estatus' value='0' required='true'><a>Usuario</a>
        <input type='radio' name='estatus' value='1' required='true'><a>Administrador</a>
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
<br>
<br>
<footer>
  <div class="container-footer">
    <br>
    ©2021 - Grupo1
  </div>
</footer>
</html>