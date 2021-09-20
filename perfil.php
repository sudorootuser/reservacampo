<html>
<link rel="icon" type="image/png" href="Recursos/Imagenes/LOGO PASION DEPORTIVA COMPLETO2.png" />
<!-- Headers -->
<?php
include_once './Vista/HeadersDashboard.php';
require './Modelo/Conexion.php';
require './Controladores/funcs.php';
require './Controladores//Cont_Perfil_User.php';

if (!isset($_SESSION["id_usuario"])) {
    header('Location:index.php');
}
$idUsuario = $_SESSION["id_usuario"];
$sql = "SELECT usuario.idUsuario,nombreUsuario FROM usuario  WHERE usuario.idUsuario='$idUsuario'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();

$sql = "SELECT * FROM usuario where idUsuario ='$idUsuario'";
$resultado = $mysqli->query($sql);

$sql = "SELECT * FROM `reservas` WHERE  estado_reserva=0 ORDER BY fecha_Reserva DESC LIMIT 4";
$result3 = mysqli_query($mysqli, $sql);
?>
<?php
include_once './Vista/MenuNav.php';
// include 'Vista/Vista_Perfil.php';
?>

<body style="background-color: #fff;overflow: hidden !important;">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <!-- <br> -->
            </div>
        </div>
        <div class="row">
            <div class="col-4 bg-light" style="margin-top: 38px;">
                <div class="card ">
                    <div class="card-header text-center" style="background-color: #009933;color: white;">
                        <h3 style="margin-top: 13px;">RESERVAS CERCANAS</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="panel">
                                    <table class="table table-striped">
                                        <thead style="background-color:#009933 ; color:white;">
                                            <tr>
                                                <th scope="col">TITULAR DE LA RESERVA</th>
                                                <th scope="col">FECHA</th>
                                                <th scope="col">EMAIL</th>
                                            </tr>
                                        </thead>
                                        <!-- <?php while ($row = mysqli_fetch_assoc($result3)) { ?> -->
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['titular_Reserva']; ?></td>
                                                <td><?php echo $row['fecha_Reserva']; ?></td>
                                                <td><?php echo $row['email_Titular']; ?></td>

                                            </tr>
                                        </tbody>
                                        <!-- <?php } ?> -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8" id="prueba">
                <div class="container-fluid">
                    <div class="card-header" style="margin-top:40px;background-color: #caf406;background-image: url('Recursos/Imagenes/FondoLoguin.png')">
                        <div class="card-title my-4 ">
                            <h3 style="color: white; text-align:center;">INFORMACIÓN DE USUARIO</h3>
                        </div>
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="panel">
                            <table class="table">
                                <thead style="background-color:#009933 ; color:white;">
                                    <tr>
                                        <th sclass="label-cell">NOMBRE</th>
                                        <th class="label-cell">APELLIDO</th>
                                        <th class="label-cell">CORREO</th>
                                        <th class="label-cell">USUARIO</th>
                                        <th class="label-cell">TÉLEFONO</th>
                                        <th class="label-cell">FECHA DE NACIMIENTO</th>
                                        <th class="label-cell">AJUSTES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $row = $resultado->fetch_array(MYSQLI_ASSOC);
                                        ?>
                                    <tr>
                                        <td class="label-cell"><?php echo $row['nombreUsuario'] ?></td>
                                        <td class="label-cell"><?php echo $row['apellido'] ?></td>
                                        <td class="label-cell"><?php echo $row['correo'] ?></td>
                                        <td class="label-cell"><?php echo $row['usuario'] ?></td>
                                        <td class="label-cell"><?php echo $row['telefono'] ?></td>
                                        <td class="label-cell"><?php echo $row['fechaNacimiento'] ?></td>
                                        <td class="align-middle">
                                            <a href="actualizarPerfil.php?id=<?php echo $row['idUsuario']; ?>" class="btn btn-success mr-3 "><i class="fa fa-pencil-square-o fa-lg"></i></a>
                                        </td>
                                    </tr>
                                    <?php ?>
                                </tbody>
                                <!-- </table> -->
                            </table>
                        </div>
                        <div>
                            <a href="cambiar_Pass_User.php?id=<?php echo $idUsuario ?>" class="btn btn-success" role="button">Cambiar Contraseña</a>
                            <a href="Dashboard.php" class="btn btn-dark" role="button">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</body>
<!-- Footer -->
<?php include './Vista/Footer_Princ.php'; ?>
<!-- Footer Principal -->

</html>