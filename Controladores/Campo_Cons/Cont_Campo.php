<?php
// Consulta a la tabla Campos
$query = "SELECT id, nombre_Campo FROM campos ORDER BY nombre_Campo ASC";
$resultado = $mysqli->query($query);


$sql = "SELECT * FROM `reservas` WHERE  estado_reserva=0 ORDER BY fecha_Reserva DESC LIMIT 4";
$result3 = mysqli_query($mysqli, $sql);