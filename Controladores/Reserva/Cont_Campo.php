<?php
// Consulta a la tabla Campos
$query = "SELECT id, nombre_Campo FROM campos ORDER BY nombre_Campo ASC";
$resultado = $mysqli->query($query);
