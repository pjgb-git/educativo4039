<?php
include('../../../app/config.php');

$id_administrativo = $_POST['id_administrativo'];
$id_usuario = $_POST['id_usuario'];
$id_persona = $_POST['id_persona'];

$rol_id = $_POST['rol_id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$ci = $_POST['ci'];
$email = $_POST['email'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$celular = $_POST['celular'];
$profesion = $_POST['profesion'];
$direccion = $_POST['direccion'];

$pdo->beginTransaction();

///////ACTUALIZAR A LA TABLA USUARIOS

$password = password_hash($ci, PASSWORD_DEFAULT);

    $sentencia = $pdo->prepare('UPDATE usuarios 
        SET rol_id =:rol_id,
            email =:email, 
            password =:password,
            fyh_actualizacion=:fyh_actualizacion
        WHERE id_usuario=:id_usuario ');
    

    
    $sentencia->bindParam(':rol_id', $rol_id);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':password', $password);
    $sentencia->bindParam('fyh_actualizacion', $fyh_actualizacion);
    $sentencia->bindParam('id_usuario', $id_usuario); 

    $sentencia->execute();

    

///////////actualizar A LA TABLA PERSONAS

$sentencia = $pdo->prepare('UPDATE personas
       SET nombres=:nombres,
           apellidos=:apellidos,
           ci=:ci,
           fecha_nacimiento=:fecha_nacimiento, 
           celular=:celular, 
           profesion=:profesion, 
           direccion=:direccion, 
           fyh_actualizacion=:fyh_actualizacion
           
        WHERE id_persona = :id_persona ');


$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':ci',$ci);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':profesion',$profesion);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam('fyh_actualizacion',$fyh_actualizacion);
$sentencia->bindParam('id_persona',$id_persona);

$sentencia->execute();



///// actualizar A LA TABLA ADMINISTRATIVOS

$sentencia = $pdo->prepare('UPDATE administrativos
        SET fyh_actualizacion=:fyh_actualizacion
    WHERE id_administrativo=:id_administrativo ');



$sentencia->bindParam(':fyh_actualizacion',$fyh_actualizacion);
$sentencia->bindParam(':id_administrativo',$id_administrativo);



if($sentencia->execute()){

$pdo->commit();
session_start();
$_SESSION['mensaje'] = "Se actualizó el parsonal docente de la manera correcta en la base de datos";
$_SESSION['icono'] = "success";
header('Location:'.APP_URL."/admin/administrativos");
//header('Location:' .$URL.'/');
}else{

$pdo->rollBack();
session_start();
$_SESSION['mensaje'] = "Error no se pudo actualizar al docente en la base datos";
$_SESSION['icono'] = "error";
?><script>window.history.back();</script><?php
}



