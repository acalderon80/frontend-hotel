<?php 
include("conexion.php");
if (empty($_GET["id"]) || empty($_GET["variable"])  ) {

	$variable=0;
	$id_habitacion="";
	$id_persona="";
	$fec_inicio="";
	$fec_fin="";
	$fec_cambio="";
	

} else {
$id=$_GET["id"];  $variable=$_GET["variable"]; 
}
if ($variable==0) {	

	$id_habitacion="";
}
elseif ($variable==1) {

	$sql="SELECT * FROM reservaciones WHERE id_reservacion = $id";
	$resultado= mysqli_query($conection, $sql);
	$data = mysqli_fetch_array($resultado);
	if (!$resultado) {
		echo "Error al registrarse";
	} else{

		$ID=$data['id_reservacion'];
		$id_habitacion=$data['id_habitacion'];
		$id_persona=$data['id_persona'];
		$fec_inicio=$data['fec_inicio'];
		$fec_fin=$data['fec_fin'];
		$fec_cambio=$data['fec_cambio'];
		
	
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>


 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="estilos2.css">

<tr align="left"> <img src="arriba.png" width="1350" height="180"></tr>
<table align="center" width="1350" border="0" cellspacing="0">
<tr align="center">
<th bgcolor="3f48cc"><a href="principal.php" width="40" height="40" p style="color:#000000";> Inicio</a></th>
<th bgcolor="3f48cc"><a href="persona.php" width="40" height="40" p style="color:#000000";>Personas</a></th>
<th bgcolor="3f48cc"><a href="producto.php" width="40" height="40" p style="color:#000000";>Productos</a></td>
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
<h1> <center>Reservacion</h1> </center">
<form action="guardareserva.php" enctype="multipart/form-data" method="POST">
<input type="checkbox" name="variable" checked="true" value="<?php echo $variable ?>" style="opacity: 0%;">
<input type="checkbox" name="id_reservacion" checked="true" value="<?php echo $ID ?>" style="opacity: 0%;">

<input type="text" class="form-control mb-3"  value="<?php echo $id_habitacion ?>" name="id_habitacion" placeholder="ID habitacion">
<input type="text" class="form-control mb-3" value="<?php echo $id_persona ?>" name="id_persona" placeholder="ID Persona">
<h7>Fecha inicio</h7>
<input type="date" class="form-control mb-3" value="<?php echo $fec_inicio ?>" name="fec_inicio" placeholder="Fecha inicio">
<h7>Fecha fin</h7>
<input type="date" class="form-control mb-3" value="<?php echo $fec_fin ?>" name="fec_fin" placeholder="Fecha fin">
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

<th>ID reservacion</th>
<th>ID habitacion</th>
<th>ID persona</th>
<th>Fecha inicio</th>
<th>Fecha fin</th>
<th>Fecha cambios</th>
<th style="width: 150px" ></th>   
<th></th>
</tr>
</thead>

<tbody>
<?php
 $query =  mysqli_query($conection,"SELECT  id_reservacion, id_habitacion, 	id_persona,  fec_inicio, fec_fin, 	fec_cambio FROM reservaciones ORDER BY id_reservacion ");

                @$result = mysqli_num_rows($query);
                if ($result > 0) {

while($row=mysqli_fetch_array($query)){
?>
<tr >
<th><?php  echo $row['id_reservacion']?></th>
<th><?php  echo $row['id_habitacion']?></th>
<th><?php  echo $row['id_persona']?></th>
<th><?php  echo $row['fec_inicio']?></th>    
<th><?php  echo $row['fec_fin']?></th> 
<th><?php  echo $row['fec_cambio']?></th> 
<th><a href="reservas.php?variable=1&id=<?php echo $row['id_reservacion'] ?>" class="btn btn-info">Actualizar</a> 
<br>
<br>
<a href="eliminar.php?tabla=3&id=<?php echo $row['id_reservacion'] ?>" class="btn btn-danger">Eliminar</a></th>  
<br>
</tr>

<?php 
}}
?>

</tbody>
</table>
<a style="margin-top: "  href="reservas.php?variable=0"class="btn btn-info">Nuevo</a>
</div>
</div>  
</div>
</body>
</html>