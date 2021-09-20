<?php
// Consulta a la tabla Campos
$query = "SELECT r.`id`,r.`titular_Reserva` FROM reservas r ORDER BY r.`titular_Reserva` ASC";
$resultado = $mysqli->query($query);
