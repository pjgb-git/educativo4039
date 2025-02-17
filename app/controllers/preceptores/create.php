<?php
include('../../../app/config.php');

$rol_id = $_POST['rol_id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$ci = $_POST['ci'];
$email = $_POST['email'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$celular = $_POST['celular'];
$profesion = $_POST['profesion'];
$direccion = $_POST['direccion'];
$cargo = $_POST['cargo'];
$antiguedad = $_POST['antiguedad'];


$pdo->beginTransaction();

///////INSERTAR A LA TABLA USUARIOS

$password = password_hash($ci, PASSWORD_DEFAULT);

    $sentencia = $pdo->prepare("INSERT INTO usuarios 
                (rol_id, email, password, fyh_creacion, estado) 
    VALUES (:rol_id, :email, :password, :fyh_creacion, :estado)");

    
    $sentencia->bindParam(':rol_id',$rol_id);
    $sentencia->bindParam(':email',$email);
    $sentencia->bindParam(':password',$password);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    $sentencia->bindParam('estado',$estado_de_registro); 

    $sentencia->execute();

    $id_usuario = $pdo->LastInsertId();

///////////INSERTAR A LA TABLA PERSONAS

$sentencia = $pdo->prepare('INSERT INTO personas
        (usuario_id, nombres, apellidos, ci, fecha_nacimiento, celular, profesion, direccion, fyh_creacion, estado)
VALUES ( :usuario_id, :nombres, :apellidos, :ci, :fecha_nacimiento, :celular, :profesion, :direccion, :fyh_creacion, :estado)');

$sentencia->bindParam(':usuario_id',$id_usuario);
$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':ci',$ci);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':profesion',$profesion);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);

$sentencia->execute();

$id_persona = $pdo->lastInsertId();

///// INSERTAR A LA TABLA PRECEPTORES

$sentencia = $pdo->prepare('INSERT INTO preceptores
        (persona_id, cargo, antiguedad, fyh_creacion, estado)
VALUES (:persona_id, :cargo, :antiguedad, :fyh_creacion, :estado)');

$sentencia->bindParam(':persona_id', $id_persona);
$sentencia->bindParam(':cargo', $cargo);
$sentencia->bindParam(':antiguedad', $antiguedad);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado_de_registro);



if($sentencia->execute()){

$pdo->commit();
session_start();
$_SESSION['mensaje'] = "Se registro al preceptor de la manera correcta en la base de datos";
$_SESSION['icono'] = "success";
header('Location:'.APP_URL."/admin/preceptores");
//header('Location:' .$URL.'/');
}else{
echo 'error al registrar a la base de datos';
$pdo->rollBack();
session_start();
$_SESSION['mensaje'] = "Error no se pudo registrar al preceptor en la base datos";
$_SESSION['icono'] = "error";
?><script>window.history.back();</script><?php
}



