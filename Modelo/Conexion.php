<?php
$mysqli = new mysqli("localhost", "root", "", "reservacampo");
if (mysqli_connect_errno()) {
    die('Conexion Fallida ' . mysqli_connect_errno());
}
