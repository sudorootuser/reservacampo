<?php

include '..//..//Modelo/Conexion.php';

if (isset($_POST['deletesend'])) {
    $unique = $_POST['deletesend'];

    $sql = "UPDATE reservas SET estado_reserva=1 WHERE reservas.`idReservas`=$unique;";
    $result = mysqli_query($mysqli, $sql);

}
