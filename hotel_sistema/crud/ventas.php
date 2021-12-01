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
        <h1 id="titulo" style="text-align:center;">Lista de ventas</h1>
         <div class="container">
              <table  class="table" >
                <thead>
               <tr id="fila1">
                 <th>ID</th>
                <th>FECHA</th>
                 <th>TOTAL</th>
                 <th>FECHA_CAMBIO</th>
                 <th>ID_USUA_CAMB</th>
                  <th style="width: 120px;">OPCIONES</th>
                 

               </tr>
               </thead>
               <?php
               include 'conexion.php';
               //paginador
               $sql_register = mysqli_query($conection,"SELECT  COUNT(*) as total_registro FROM personas");

                 $result_register = mysqli_fetch_array ($sql_register);
               $total_registro = $result_register['total_registro'];

               $por_pagina = 3;
               if (empty($_GET['pagina'])) {
                $pagina=1;
                
               }else{
                $pagina = $_GET['pagina'];
               }

               $desde = ($pagina-1) * $por_pagina;
               $total_paginas = ceil($total_registro / $por_pagina);





               $query =  mysqli_query($conection,"SELECT  id_venta,   fec_venta, total_venta, fec_cambio, id_usuario_cambio  FROM ventas ORDER BY  id_venta ASC LIMIT $desde, $por_pagina");

                @$result = mysqli_num_rows($query);
                if ($result > 0) {
                while ($data = mysqli_fetch_array($query)) {
                  ?>

                    <tr class="fila2" style="color: white;">
                    <td data-label ="id_persona"><?php echo $data ["id_venta"] ?></td>
                    <td data-label = "pri_nombre"><?php echo $data ["fec_venta"] ?></td>
                    <td data-label = "seg_nombre"><?php echo $data ["total_venta"] ?></td>
                    <td data-label = "pri_apellido"><?php echo $data ["fec_cambio"] ?></td>
                    <td data-label = "seg_apellido"><?php echo $data ["id_usuario_cambio"] ?></td>
                   <td data-label ="OPCION" style="padding-top: 8px;">

                    <a href="form_personas.php?id_persona=<?php echo $data ["id_venta"] ?>" id="editar" style="text-decoration: none;color: #fff; padding: 5px; background:#585CDE; border-radius: 5px;height: 15px;">Editar</a>

                    <a href="Eliminar.php?TABLA=6&ID=<?php echo $data ["id_venta"] ?>" id="editar" style="text-decoration: none;color: #fff; padding: 5px; background:#585CDE; border-radius: 5px;height: 15px;">Eliminar</a></td>
                   
                
    
               </tr>
            

               <?php
                }
               }

               ?>
              
                  
              </table>
             </div>
              <div class="paginas">
                <ul>
                  <?php
                  if ($pagina != 1) {
                    
                  

                  ?>
                  <li><a href="?pagina=<?php echo 1;?>">|<</a></li>
                  <li><a href="?pagina=<?php echo $pagina-1;?>"><<</a></li>


                  <?php
                      }
                  for($i=1; $i <= $total_paginas; $i++){
                    if ($i== $pagina) {
                      echo '<li class= "pageselector">'.$i.'</li>';
                
                    }else{

                    echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';}
                     
                  }

                  if ($pagina != $total_paginas) {
                    
                  

                    ?>


                  
                  
                  <li><a href="?pagina=<?php echo $pagina+1;?>">>></a></li>
                  <li><a href="?pagina=<?php echo $total_paginas;?>">>|</a></li>

                <?php } ?>



                </ul>
                
              </div>
      <br><br>
        <a href="editar_usuario.php?id_persona=<?php echo $data ["id_persona"] ?>" id="nuevo">Nuevo</a>
            


       </div>
</body>
</html>