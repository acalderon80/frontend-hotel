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
        <h1 id="titulo" style="text-align:center;">Lista de productos</h1>
          <form action="buscar_productos.php" method="get" class="form_search">
        <input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
        <input type="submit" value="Buscar" class="btn_search">
      </form>
         <div class="container">
              <table  class="table" >
                <thead>
               <tr id="fila1">
                 <th>ID</th>
                 <th>ID_CATEG</th>
                 <th>N.PRODUCTO</th>
                 <th>DESC_PROD</th>
                 <th>FEC_CAMB</th>
                 <th>ID_USUA_CAMB</th>
                 <th>PRECIO_PROD</th>
                 <th>UNIDADES_EXIS</th>
                  <th style="width: 150px;">OPCIONES</th>
                 

               </tr>
               </thead>
               <?php
               include 'conexion.php';
               //paginador
               $sql_register = mysqli_query($conection,"SELECT  COUNT(*) as total_registro FROM productos");

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





               $query =  mysqli_query($conection,"SELECT id_producto , id_categoria, nom_producto, desc_producto, fec_cambio, id_usuario_cambio, precio_producto,  unidades_existentes FROM productos ORDER BY   id_producto ASC LIMIT $desde, $por_pagina");

                @$result = mysqli_num_rows($query);
                if ($result > 0) {
                while ($data = mysqli_fetch_array($query)) {
                  ?>

                    <tr class="fila2" style="color: white;">
                    <td data-label ="id_persona"><?php echo $data ["id_producto"] ?></td>
                    <td data-label = "pri_nombre"><?php echo $data ["id_categoria"] ?></td>
                    <td data-label = "seg_nombre"><?php echo $data ["nom_producto"] ?></td>
                    <td data-label = "pri_apellido"><?php echo $data ["desc_producto"] ?></td>
                    <td data-label = "seg_apellido"><?php echo $data ["fec_cambio"] ?></td>
                    <td data-label = "razon_social"><?php echo $data ["id_usuario_cambio"] ?></td>
                    <td data-label = "direccion"><?php echo $data ["precio_producto"] ?></td>
                    <td data-label = "telefono"><?php echo $data ["unidades_existentes"] ?></td>
                   <td data-label ="OPCION" style="padding-top: 8px;">
                    <a href="form_productos.php?VALOR=1&ID=<?php echo $data ["id_producto"] ?>" id="editar" style="text-decoration: none;color: #fff; padding: 5px; background:#DE315D ; border-radius: 5px;height: 15px;">Actualizar</a>

                    <a href="Eliminar.php?TABLA=2&ID=<?php echo $data ["id_producto"] ?>" id="editar" style="text-decoration: none;color: #fff; padding: 5px; background:#DE315D ; border-radius: 5px;height: 15px;">Eliminar</a></td>
                   
                
    
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
        <a href="form_productos.php?VALOR=0&ID=0" id="nuevo">Nuevo</a>
            


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