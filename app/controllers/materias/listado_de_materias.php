<?php
$sql_materias = "SELECT * FROM materias WHERE estado = '1'";
$query_materias = $pdo->prepare($sql_materias);
$query_materias->execute();
$materias = $query_materias->fetchAll(fetch_style: PDO::FETCH_ASSOC);