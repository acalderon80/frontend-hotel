<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from personas");
    $personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de personas
                </div>
                <div class="p-8">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                               
                                <th scope="col">Primer Nombre</th>
                                <th scope="col">Primer Apellido</th>
                                <th scope="col">Razon social</th>
                                <th scope="col">Ident</th>
                                <th scope="col">Correo</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($personas as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->pri_nombre; ?></td>
                                <td><?php echo $dato->pri_apellido; ?></td>
                                <td><?php echo $dato->razon_social; ?></td>
                                <td><?php echo $dato->identificacion; ?></td>
                                <td><?php echo $dato->correo; ?></td>
                                <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div  class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form style="height: 880px;" method="POST" action="registrar.php">
                    <div class="mb-10">
                        <label class="form-label">Primer nombre: </label>
                        <input type="text" class="form-control" name="pri_nombre" autofocus required>
                    
                        <label class="form-label">Segundo nombre: </label>
                        <input type="text" class="form-control" name="seg_nombre" autofocus required>
                                         <label class="form-label">Primer apellido: </label>
                        <input type="text" class="form-control" name="pri_apellido" autofocus required>
                    
                         <label class="form-label">Segundo apellido: </label>
                        <input type="text" class="form-control" name="seg_apellido" autofocus required>
                
                         <label class="form-label">Razon social: </label>
                        <input type="text" class="form-control" name="razon_social" autofocus required>
                  
                         <label class="form-label">Direccion: </label>
                        <input type="text" class="form-control" name="direccion" autofocus required>
                   
                         <label class="form-label">Telefono: </label>
                        <input type="text" class="form-control" name="telefono" autofocus required>
                  
                         <label class="form-label">Correo: </label>
                        <input type="text" class="form-control" name="correo" autofocus required>
                    
                         <label class="form-label">Identificacion: </label>
                        <input type="text" class="form-control" name="identificacion" autofocus required>
                  
                         <label class="form-label">Genero: </label>
                        <input type="text" class="form-control" name="genero" autofocus required>
                                             <label class="form-label">Fecha: </label>
                        <input type="date" class="form-control" name="fec_cambio" autofocus required>
                   
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<?php include 'template/footer.php' ?>