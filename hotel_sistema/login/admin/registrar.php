<?php
    //pri
    include_once 'model/conexion.php';
    $pri_nombre = $_POST["pri_nombre"];
    $seg_nombre = $_POST["seg_nombre"];
    $pri_apellido = $_POST["pri_apellido"];
     $seg_apellido = $_POST["seg_apellido"];
      $razon_social = $_POST["razon_social"];
       $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
          $correo = $_POST["correo"];
            $identificacion= $_POST["identificacion"];
              $genero = $_POST["genero"];
              $fec_cambio = $_POST["fec_cambio"];



    
    $sentencia = $bd->prepare("INSERT INTO personas(pri_nombre,seg_nombre, $pri_apellido, $seg_apellido, $razon_social, $direccion, $telefono, $correo,$identificacion,$genero,$fec_cambio ) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$pri_nombre,$seg_nombre,$pri_apellido, $seg_apellido,$razon_social,$direccion,$telefono,$correo,$identificacion, $genero,$fec_cambio]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>