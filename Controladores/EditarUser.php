<?php

session_start();
require_once '../Modelo/Conexion.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$movil = $_POST['movil'];
$tipoUser = $_POST['tipo'];
$email = $_POST['email'];
$nombreUser = $_POST['user'];
$avatar = $_POST['foto'];

$id_usuario = $_SESSION["SESS_MEMBER_ID"];

$sql_User = "UPDATE usuarios SET nombre='$nombre',apellido='$apellido',email='$email',usuario='$nombreUser',telefono=$telefono,celular=$movil,tipo_idtipo=$tipoUser WHERE idusuarios=$id_usuario";

//print_r($sql_User);die();
if ($consulta_User = mysqli_query($link, $sql_User)) {

    $_SESSION['SESS_FIRST_NAME'] = $nombre;
    $_SESSION['SESS_LAST_NAME'] = $apellido;
    $_SESSION['tipo_idtipo'] = $tipo;
    $_SESSION['telefono'] = $telefono;
    $_SESSION['celular'] = $movil;
    $_SESSION['usuario'] = $nombreUser;
    $_SESSION['email'] = $email;
    
    //echo "<script></script>";
    echo "<script>window.location.href = '../Perfil.php?secction=1';</script>";
    //print_r($consulta_User);
} else {
    die("No existe la consulta");
}
$id = mysqli_insert_id($link);
