<?php

include('../../../app/config.php');

$id_usuario = $_POST['id_usuario'];
$id_persona = $_POST['id_persona'];
$id_estudiante = $_POST['id_estudiante'];
$id_ppff = $_POST['id_ppff'];


$rol_id = $_POST['rol_id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$ci = $_POST['ci'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$celular = $_POST['celular'];
$profesion = "ESTUDIANTE";
$direccion = $_POST['direccion'];
$email = $_POST['email'];


$nivel_id = $_POST['nivel_id'];
$grado_id = $_POST['grado_id'];
$rude = $_POST['rude'];
$departamento = $_POST['departamento'];
$localidad = $_POST['localidad'];


$nombres_apellidos_ppff = $_POST['nombres_apellidos_ppff'];
$ci_ppff = $_POST['ci_ppff'];
$celular_ppff = $_POST['celular_ppff'];
$ocupacion_ppff = $_POST['ocupacion_ppff'];
$ref_nombre = $_POST['ref_nombre'];
$ref_parentezco = $_POST['ref_parentezco'];
$ref_celular = $_POST['ref_celular'];


$pdo->beginTransaction();

///////ACTUALIZAR A LA TABLA USUARIOS

$password = password_hash($ci, PASSWORD_DEFAULT);

    $sentencia = $pdo->prepare('UPDATE usuarios 
                SET rol_id=:rol_id,
                    email=:email, 
                    password=:password, 
                    fyh_actualizacion=:fyh_actualizacion
                    
                WHERE id_usuario=:id_usuario');

    $sentencia->bindParam(':id_usuario',$id_usuario);
    $sentencia->bindParam(':rol_id',$rol_id);
    $sentencia->bindParam(':email',$email);
    $sentencia->bindParam(':password',$password);
    $sentencia->bindParam(':fyh_actualizacion',$fechaHora);
    
    

    $sentencia->execute();

    

///////////ACTUALIZAR A LA TABLA PERSONAS

$sentencia = $pdo->prepare('UPDATE personas
    SET nombres=:nombres, 
        apellidos=:apellidos, 
        ci=:ci, 
        fecha_nacimiento=:fecha_nacimiento, 
        celular=:celular, 
        profesion=:profesion, 
        direccion=:direccion, 
        fyh_actualizacion=:fyh_actualizacion 
        
    WHERE id_persona=:id_persona');

$sentencia->bindParam(':id_persona',$id_persona);
$sentencia->bindParam(':nombres' ,$nombres);
$sentencia->bindParam(':apellidos' ,$apellidos);
$sentencia->bindParam(':ci' ,$ci);
$sentencia->bindParam(':fecha_nacimiento' ,$fecha_nacimiento);
$sentencia->bindParam(':celular' ,$celular);
$sentencia->bindParam(':profesion' ,$profesion);
$sentencia->bindParam(':direccion' ,$direccion);
$sentencia->bindParam(':fyh_actualizacion' ,$fechaHora);


$sentencia->execute();

///// ACTUALIZAR A LA TABLA ESTUDIANTES

$sentencia = $pdo->prepare('UPDATE estudiantes
        SET nivel_id=:nivel_id, 
            grado_id=:grado_id, 
            rude=:rude, 
            fyh_actualizacion=:fyh_actualizacion,
            departamento=:departamento,
            localidad=:localidad
        WHERE id_estudiante=:id_estudiante');

$sentencia->bindParam(':id_estudiante',$id_estudiante);
$sentencia->bindParam(':nivel_id',$nivel_id);
$sentencia->bindParam(':grado_id',$grado_id);
$sentencia->bindParam(':rude',$rude);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':departamento',$departamento);
$sentencia->bindParam(':localidad',$localidad);



$sentencia->execute();

    

    ///// ACTUALIZAR A LA TABLA padres de familia
    
    $sentencia = $pdo->prepare('UPDATE ppffs
            SET nombres_apellidos_ppff=:nombres_apellidos_ppff, 
                ci_ppff=:ci_ppff, 
                celular_ppff=:celular_ppff, 
                ocupacion_ppff=:ocupacion_ppff, 
                ref_nombre=:ref_nombre, 
                ref_parentezco=:ref_parentezco, 
                ref_celular=:ref_celular, 
                fyh_actualizacion=:fyh_actualizacion
            WHERE id_ppff=:id_ppff');
    
    $sentencia->bindParam(':id_ppff',$id_ppff);
    $sentencia->bindParam(':nombres_apellidos_ppff',$nombres_apellidos_ppff);
    $sentencia->bindParam(':ci_ppff',$ci_ppff);
    $sentencia->bindParam(':celular_ppff',$celular_ppff);
    $sentencia->bindParam(':ocupacion_ppff',$ocupacion_ppff);
    $sentencia->bindParam(':ref_nombre',$ref_nombre);
    $sentencia->bindParam(':ref_parentezco',$ref_parentezco);
    $sentencia->bindParam(':ref_celular',$ref_celular);
    $sentencia->bindParam(':fyh_actualizacion',$fechaHora);
    
   

if($sentencia->execute()){
        
$pdo->commit();
session_start();
$_SESSION['mensaje'] = "Se actualizó al estudiante de la manera correcta en la base de datos";
$_SESSION['icono'] = "success";
header('Location:'.APP_URL."/admin/estudiantes");

}else{

$pdo->rollBack();
session_start();
$_SESSION['mensaje'] = "Error no se pudo actualizar al estudiante en la base datos";
$_SESSION['icono'] = "error";
?><script>window.history.back();</script><?php
}



