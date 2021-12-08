<?php 
include("conexion.php");
if (empty($_GET["id"]) || empty($_GET["variable"])  ) {

	$variable=0;
	$pri_nombre="";
	$seg_nombre="";
	$pri_apellido="";
	$seg_apellido="";
	$direccion="";
	$telefono="";
	$correo="";
	$identificacion="";
	$genero="";
	$fec_cambio="";


} else {
$id=$_GET["id"];  $variable=$_GET["variable"]; 
}
if ($variable==0) {	

	$pri_nombre="";
}
elseif ($variable==1) {

	$sql="SELECT * FROM personas WHERE id_persona = $id";
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
		$direccion=$data['direccion'];
		$telefono=$data['telefono'];
		$correo=$data['correo'];
		$identificacion=$data['identificacion'];
		$genero=$data['genero'];
		$fec_cambio=$data['fec_cambio'];
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>


 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="estilos2.css">

<tr align="left"> <img src="arriba.png" width="2000" height="180"></tr>
<table align="center" width="2000" border="0" cellspacing="0">
<tr align="center">
<th bgcolor="3f48cc"><a href="principal.php" width="40" height="40" p style="color:#000000";> Inicio</a></th>
<th bgcolor="3f48cc"><a href="producto.php" width="40" height="40" p style="color:#000000";>Productos</a></th>
<th bgcolor="3f48cc"><a href="reservas.php" width="40" height="40" p style="color:#000000";>Reservaciones</a></td>
<th bgcolor="3f48cc"><a href="facturacion.php" width="40" height="40" p style="color:#000000";>Facturacion</a></th>
<th bgcolor="3f48cc"><a href="dfactura.php"width="40" height="40" p style="color:#000000";>Detalle factura</a></th>
</tr>
</table>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
</head>
<body>
<div class="container mt-5">
<div class="row"> 
                        
<div class="col-md-3">
<h1> <center>Persona</h1> </center">
<form action="guardarpersona.php" enctype="multipart/form-data" method="POST">
<input type="checkbox" name="variable" checked="true" value="<?php echo $variable ?>" style="opacity: 0%;">
<input type="checkbox" name="id_persona" checked="true" value="<?php echo $ID ?>" style="opacity: 0%;">

<input type="text" class="form-control mb-3"  value="<?php echo $pri_nombre ?>" name="pri_nombre" placeholder="Primer nombre">
<input type="text" class="form-control mb-3" value="<?php echo $seg_nombre ?>" name="seg_nombre" placeholder="Segundo nombre">
<input type="text" class="form-control mb-3" value="<?php echo $pri_apellido ?>" name="pri_apellido" placeholder="Primer apellido">
<input type="text" class="form-control mb-3" value="<?php echo $seg_apellido ?>" name="seg_apellido" placeholder="Segundo apellido">
<input type="text" class="form-control mb-3" value="<?php echo $direccion ?>" name="direccion" placeholder="Direccion">
<input type="text" class="form-control mb-3" value="<?php echo $telefono ?>" name="telefono" placeholder="Telefono">
<input type="text" class="form-control mb-3" value="<?php echo $correo ?>" name="correo" placeholder="Correo">
<input type="text" class="form-control mb-3" value="<?php echo $identificacion ?>" name="identificacion" placeholder="Identificacion">
<input type="text" class="form-control mb-3" value="<?php echo $genero ?>" name="genero" placeholder="Genero">
<h7>Fecha cambios</h7>
<input type="date" class="form-control mb-3" value="<?php echo $fec_cambio ?>" name="fec_cambio" placeholder="Fecha cambios">
                                    
<center><input type="submit" value="Guardar" class="btn btn-primary"></center>
<br>
<br>
<br>

</form>
</div>

<div class="col-md-8" >
<table class="table"  >
<thead class="table-success table-striped" >
<tr>

<th>ID persona</th>
<th>Primer nombre</th>
<th>Segundo nombre</th>
<th>Primer apellido</th>
<th>Segundo apellido</th>
<th>Direccion</th>
<th>Telefono</th>
<th>Correo</th>
<th>Identificacion</th>
<th>Genero</th>
<th>Fecha cambios</th>
<th style="width: 150px" ></th>   
<th></th>
</tr>
</thead>

<tbody>
<?php
 $query =  mysqli_query($conection,"SELECT  id_persona, pri_nombre, seg_nombre,  pri_apellido, seg_apellido, direccion, telefono, correo, identificacion, genero, fec_cambio  FROM personas ORDER BY id_persona ");

                @$result = mysqli_num_rows($query);
                if ($result > 0) {

while($row=mysqli_fetch_array($query)){
?>
<tr >
<th><?php  echo $row['id_persona']?></th>
<th><?php  echo $row['pri_nombre']?></th>
<th><?php  echo $row['seg_nombre']?></th>
<th><?php  echo $row['pri_apellido']?></th>    
<th><?php  echo $row['seg_apellido']?></th> 
<th><?php  echo $row['direccion']?></th> 
<th><?php  echo $row['telefono']?></th> 
<th><?php  echo $row['correo']?></th> 
<th><?php  echo $row['identificacion']?></th> 
<th><?php  echo $row['genero']?></th> 
<th><?php  echo $row['fec_cambio']?></th>
<th><a href="persona.php?variable=1&id=<?php echo $row['id_persona'] ?>" class="btn btn-info">Actualizar</a> 
<br>
<br>
<a href="eliminar.php?tabla=1&id=<?php echo $row['id_persona'] ?>" class="btn btn-danger">Eliminar</a></th>  
<br>
</tr>

<?php 
}}
?>

</tbody>
</table>
<a style="margin-top: "  href="persona.php?variable=0"class="btn btn-info">Nuevo</a>
</div>
</div>  
</div>
</body>
</html>