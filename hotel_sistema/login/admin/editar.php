<?php 
include  'template / header.php'  ?>

<?php
    if (! isset ( $_GET [ 'codigo' ])) {
        header ( 'Ubicación: index.php? mensaje = error' );
        salir ();
    }

    include_once  'modelo /conexion.php' ;
    $codigo = $_GET [ 'codigo' ];

    $sentencia = $bd -> prepare ( "seleccionar * de persona donde codigo =?;" );
    $sentencia -> ejecutar ([ $codigo ]);
    $persona = $sentencia -> buscar (PDO::FETCH_OBJ );
    // print_r ($ persona);
?>

<div  class = " contenedor mt-5 " >
    <div  class = " row justify-content-center " >
        <div  class = " col-md-4 " >
            <div  class = " tarjeta " >
                <div  class = " card-header " >
                    Editar datos:
                </div >
                <form  class = " p-4 " method = " POST " action = " editarProceso.php " >
                    <div  class = " mb-3 " >
                        <label  class = " form-label " > Nombre: </ label >
                        <input  type = " text " class = " form-control " name = " txtNombre " obligatorio 
                        valor = " <?php  echo  $persona ->nombre ; ?> " >
                    </div >
                    <div  class = " mb-3 " >
                        <label  class = " form-label " > Edad: </label >
                        <input  type = " number " class = " form-control " name = " txtEdad " autofocus  requerido
                        valor = " <?php  echo  $persona ->edad ; ?> " >
                    </div >
                    <div  class = " mb-3 " >
                        <label  class = " form-label " > Signo: </label >
                        <input  type = " text " class = " form-control " name = " txtSigno " autofocus  requerido
                        valor = " <?php  echo  $persona ->signo ; ?> " >
                    </div >
                    <div  class = " d-grid " >
                        <input  type = " hidden " name = " codigo " value = " <?php  echo  $persona ->codigo ; ?> " >
                        <input  type = " submit " class = " btn btn-primary " value = " Editar " >
                    </div >
                < formulario >
            </ div >
        </ div >
    </ div >
</ div >

<?php  include  'template / footer.php'  ?>