<?php
$sql_docentes = "SELECT * FROM usuarios as usu 
INNER JOIN roles as rol ON rol.id_rol = usu.rol_id 
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario 
INNER JOIN docentes as doc On doc.persona_id = per.id_persona WHERE doc.estado = '1' ";

$query_docentes = $pdo->prepare($sql_docentes);
$query_docentes->execute();
$docentes = $query_docentes->fetchAll(fetch_style: PDO::FETCH_ASSOC);

