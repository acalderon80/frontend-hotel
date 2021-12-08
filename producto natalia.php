<?php 
include("conexion.php");
if (empty($_GET["id"]) || empty($_GET["variable"])  ) {

	$variable=0;
	$id_categoria="";
	$nom_producto="";
	$desc_producto="";
	$fec_cambio="";
	$precio_producto="";
	$unidades_existentes="";
	


} else {
$id=$_GET["id"];  $variable=$_GET["variable"]; 
}
if ($variable==0) {	

	$id_categoria="";
}
elseif ($variable==1) {

	$sql="SELECT * FROM productos WHERE id_producto = $id";
	$resultado= mysqli_query($conection, $sql);
	$data = mysqli_fetch_array($resultado);
	if (!$resultado) {
		echo "Error al registrarse";
	} else{

		$ID=$data['id_producto'];
		$id_categoria=$data['id_categoria'];
		$nom_producto=$data['nom_producto'];
		$desc_producto=$data['desc_producto'];
		$fec_cambio=$data['fec_cambio'];
		$precio_producto=$data['precio_producto'];
		$unidades_existentes=$data['unidades_existentes'];
	
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
<h1> <center>Productos</h1> </center">
<form action="guardarproducto.php" enctype="multipart/form-data" method="POST">
<input type="checkbox" name="variable" checked="true" value="<?php echo $variable ?>" style="opacity: 0%;">
<input type="checkbox" name="id_producto" checked="true" value="<?php echo $ID ?>" style="opacity: 0%;">

<input type="text" class="form-control mb-3"  value="<?php echo $id_categoria ?>" name="id_categoria" placeholder="ID categoria">
<input type="text" class="form-control mb-3" value="<?php echo $nom_producto ?>" name="nom_producto" placeholder="Producto">
<input type="text" class="form-control mb-3" value="<?php echo $desc_producto ?>" name="desc_producto" placeholder="Descuento">
<h7>Fecha cambios</h7>
<input type="date" class="form-control mb-3" value="<?php echo $fec_cambio ?>" name="fec_cambio" placeholder="Fecha cambios">
<input type="text" class="form-control mb-3" value="<?php echo $precio_producto ?>" name="precio_producto" placeholder="Precio">
<input type="text" class="form-control mb-3" value="<?php echo $unidades_existentes ?>" name="unidades_existentes" placeholder="Unidades existentes">

                                    
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

<th>ID producto</th>
<th>ID categoria</th>
<th>Producto</th>
<th>Descuento</th>
<th>Fecha cambios</th>
<th>Precio</th>
<th>Unidades Existentes</th>
<th style="width: 150px" ></th>   
<th></th>
</tr>
</thead>

<tbody>
<?php
 $query =  mysqli_query($conection,"SELECT  id_producto, id_categoria, 	nom_producto,  desc_producto, fec_cambio, 	precio_producto, unidades_existentes FROM productos ORDER BY id_producto ");

                @$result = mysqli_num_rows($query);
                if ($result > 0) {

while($row=mysqli_fetch_array($query)){
?>
<tr >
<th><?php  echo $row['id_producto']?></th>
<th><?php  echo $row['id_categoria']?></th>
<th><?php  echo $row['nom_producto']?></th>
<th><?php  echo $row['desc_producto']?></th>    
<th><?php  echo $row['fec_cambio']?></th> 
<th><?php  echo $row['precio_producto']?></th> 
<th><?php  echo $row['unidades_existentes']?></th> 
<th><a href="producto.php?variable=1&id=<?php echo $row['id_producto'] ?>" class="btn btn-info">Actualizar</a> 
<br>
<br>
<a href="eliminar.php?tabla=2&id=<?php echo $row['id_producto'] ?>" class="btn btn-danger">Eliminar</a></th>  
<br>
</tr>

<?php 
}}
?>

</tbody>
</table>
<a style="margin-top: "  href="producto.php?variable=0"class="btn btn-info">Nuevo</a>
</div>
</div>  
</div>
</body>
</html>