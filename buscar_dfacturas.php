<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Itfip</title>
    <link rel="stylesheet" type="text/css" href="personas.css">
    <link rel="icon" href="img/hotel.png"   type="img/png"/>
</head>
<body>
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
       

      <?php 

      $busqueda = strtolower($_GET['busqueda']);
      if (empty($busqueda)) {
       header("location:buscar_dfacturas.php");

      }

      ?>
     <h1 id="titulo" style="text-align:center;">Resultados de la busqueda</h1>
      
			<form action="buscar_dfacturas.php" method="get" class="form_search">
				<input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
				<input type="submit" value="Buscar" class="btn_search">
			</form> <br><br>
			  
             <div class="container">
              <table  class="table" >
                <thead>
              <tr id="fila1">
                 <th>ID</th>
                 <th>ID_PRODUCTO</th>
                 <th>PRECIO</th>
                 <th>CANTIDAD</th>
                 <th>FEC_CAMB</th>
                  <th style="width: 150px;">OPCIONES</th>
                 

               </tr>
               </thead>
               <?php
               include 'conexion.php';
    	         //paginador
  	         $sql_register = mysqli_query($conection,"SELECT  COUNT(*) as total_registro FROM detalle_factura WHERE (id_producto LIKE '%$busqueda%' OR precio LIKE '%$busqueda%' OR cantidad LIKE '%$busqueda%' OR id_factura LIKE '%$busqueda%' OR fec_cambio LIKE '%$busqueda%')");
               
 

    	         $result_register = mysqli_fetch_array ($sql_register);
    	         $total_registro = $result_register['total_registro'];

    	         $por_pagina = 6;
    	         if (empty($_GET['pagina'])) {
    	         	$pagina=1;
    	         	
    	         }else{
    	         	$pagina = $_GET['pagina'];
    	         }


    	         @$desde = ($pagina-1) * $por_pagina;
    	         $total_paginas = ceil($total_registro / $por_pagina);






    	         $query =  mysqli_query($conection,"SELECT id_producto, precio,  cantidad, id_factura,  fec_cambio FROM detalle_factura WHERE(id_producto LIKE '%$busqueda%' OR precio LIKE '%$busqueda%' OR cantidad LIKE '%$busqueda%' OR id_factura LIKE '%$busqueda%' OR fec_cambio LIKE '%$busqueda%') ORDER BY id_producto ASC LIMIT $desde, $por_pagina");

                $result = mysqli_num_rows($query);
                if ($result > 0) {
                while ($data = mysqli_fetch_array($query)) {
                  ?>

                    
                     <tr class="fila2" style="color: white;">
                    <td data-label ="id_persona"><?php echo $data ["id_producto"] ?></td>
                    <td data-label = "seg_apellido"><?php echo $data ["id_factura"] ?></td>
                    <td data-label = "seg_nombre"><?php echo $data ["precio"] ?></td>
                    <td data-label = "seg_apellido"><?php echo $data ["cantidad"] ?></td>
                    <td data-label = "razon_social"><?php echo $data ["fec_cambio"] ?></td>
                   <td data-label ="OPCION" style="padding-top: 8px;">
                    <a href="form_dfactura.php?VALOR=1&ID=<?php echo $data ["id_producto"] ?>" id="editar" style="text-decoration: none;color: #fff; padding: 5px; background:#DE315D; border-radius: 5px;height: 15px;">Actualizar</a>

                    <a href="Eliminar.php?TABLA=8&ID=<?php echo $data ["id_producto"] ?>" id="editar" style="text-decoration: none;color: #fff; padding: 5px; background:#DE315D; border-radius: 5px;height: 15px;">Eliminar</a></td>
                   
                
    
               </tr>
            
            

            

            

               <?php
                }
               }

               ?>
              
                  
              </table>
            </div>
            <?php
            if ($total_registro !=0) {
              
            
            ?>
              <div class="paginas">
              	<ul>
              		<?php
              		if ($pagina != 1) {
              		?>

              	

              		<?php
              	      }
              		for($i=1; $i <= $total_paginas; $i++){
              			if ($i== $pagina) {
              				echo '<li class= "pageselector">'.$i.'</li>';
              	
              			}else{

              			echo '<li><a href="?pagina='.$i.' &busqueda='.$busqueda.'">'.$i.'</a></li>';}
              		   
              		}

              		if ($pagina != $total_paginas) {
              			
              		

              			?>


              		
              		
              		

              	<?php } ?>



              	</ul>
              	
              </div>
              <?php } ?>
            
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