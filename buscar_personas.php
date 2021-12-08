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
       header("location:buscar_personas.php");

      }

      ?>
     <h1 id="titulo" style="text-align:center;">Resultados de la busqueda</h1>
      
			<form action="buscar_personas.php" method="get" class="form_search">
				<input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
				<input type="submit" value="Buscar" class="btn_search">
			</form> <br><br>
			  
             <div class="container">
              <table  class="table" >
                <thead>
               <tr id="fila1">
                 <th style="width: 50px;">ID</th>
                 <th>P.NOM</th>
                 <th>S.NOM</th>
                 <th>P.APELL</th>
                 <th>S.APELL</th>
                 <th>RAZ_SOC</th>
                 <th>DIREC</th>
                 <th>TEL</th>
                 <th>CORREO</th>
                 <th>IDENTI</th>
                 <th>GENERO</th>
                 <th>FECH_CAM</th>
                 <th>ID_USUA_CAM</th>
                 <th style="width: 150px;">OPCIONES</th>
               </tr>
               </thead>
               <?php
               include 'conexion.php';
    	         //paginador
    	         $sql_register = mysqli_query($conection,"SELECT  COUNT(*) as total_registro FROM personas WHERE ( id_persona LIKE '%$busqueda%' OR pri_nombre LIKE '%$busqueda%' OR seg_nombre LIKE '%busqueda%' OR  pri_apellido LIKE '%$busqueda%' OR seg_apellido LIKE '%$busqueda%' OR razon_social LIKE '%$busqueda%' OR direccion LIKE '%$busqueda%'OR telefono LIKE '%$busqueda%'OR correo LIKE '%$busqueda%'OR identificacion LIKE '%$busqueda%'OR genero LIKE '%$busqueda%'OR fec_cambio LIKE '%$busqueda%'OR id_usuario_cambio LIKE '%$busqueda%')");
               

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






    	         $query =  mysqli_query($conection,"SELECT  id_persona, pri_nombre, seg_nombre, pri_apellido, seg_apellido, razon_social, direccion, telefono, correo, identificacion, genero, fec_cambio,id_usuario_cambio FROM personas WHERE( id_persona LIKE '%$busqueda%' OR pri_nombre LIKE '%$busqueda%' OR seg_nombre LIKE '%busqueda%' OR  pri_apellido LIKE '%$busqueda%' OR seg_apellido LIKE '%$busqueda%' OR razon_social LIKE '%$busqueda%' OR direccion LIKE '%$busqueda%'OR telefono LIKE '%$busqueda%'OR correo LIKE '%$busqueda%'OR identificacion LIKE '%$busqueda%'OR genero LIKE '%$busqueda%'OR fec_cambio LIKE '%$busqueda%'OR id_usuario_cambio LIKE '%$busqueda%') ORDER BY  id_persona ASC LIMIT $desde, $por_pagina");

                $result = mysqli_num_rows($query);
                if ($result > 0) {
                while ($data = mysqli_fetch_array($query)) {
                  ?>

                     <tr class="fila2" style="color: white;">
                    <td data-label ="id_persona"><?php echo $data ["id_persona"] ?></td>
                    <td data-label = "pri_nombre"><?php echo $data ["pri_nombre"] ?></td>
                    <td data-label = "seg_nombre"><?php echo $data ["seg_nombre"] ?></td>
                    <td data-label = "pri_apellido"><?php echo $data ["pri_apellido"] ?></td>
                    <td data-label = "seg_apellido"><?php echo $data ["seg_apellido"] ?></td>
                    <td data-label = "razon_social"><?php echo $data ["razon_social"] ?></td>
                    <td data-label = "direccion"><?php echo $data ["direccion"] ?></td>
                    <td data-label = "telefono"><?php echo $data ["telefono"] ?></td>
                    <td data-label = "correo"><?php echo $data ["correo"] ?></td>
                    <td data-label = "identificacion"><?php echo $data ["identificacion"] ?></td>
                    <td data-label = "genero">
                      <?php if ($data ["genero"]==0) {
                        echo "Masculino";
                      } else {
                        echo "Femenino";
                      } ?>
                    </td>
                    <td data-label = "fec_cambio"><?php echo $data ["fec_cambio"] ?></td>
                    <td data-label = "id_usuario_cambio"><?php echo $data ["id_usuario_cambio"] ?></td>
                    <td data-label ="OPCION" style="padding-top: 8px;">
                      <a href="form_personas.php?VALOR=1&ID=<?php echo $data ["id_persona"] ?>" id="editar" style="text-decoration: none;color: #fff; padding: 5px; background:#DE315D ; border-radius: 5px;height: 15px;">Actualizar</a>

                      <a href="Eliminar.php?TABLA=1&ID=<?php echo $data ["id_persona"] ?>" id="editar" style="text-decoration: none;color: #fff; padding: 5px; background:#DE315D ; border-radius: 5px;height: 15px;">Eliminar</a></td>
                   
                   
                
    
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
