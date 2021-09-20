<html>
<link rel="icon" type="image/png" href="Recursos/Imagenes/LOGO PASION DEPORTIVA COMPLETO2.png" />
<!-- Headers -->

<?php
include_once './Vista/HeadersDashboard.php';
require './Modelo/Conexion.php';
require './Controladores/funcs.php';
require './Controladores//Cont_Perfil_User.php';

if (!isset($_SESSION["id_usuario"])) {
    header('Location: index.php');
}
$idUsuario = $_SESSION["id_usuario"];
// print_r($idUsuario);die;
$sql = "SELECT usuario.idUsuario,nombreUsuario FROM usuario  WHERE usuario.idUsuario='$idUsuario'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();

// $sql = "SELECT * FROM usuario where idUsuario ='$idUsuario'";
// $resultado = $mysqli->query($sql);

$sql = "SELECT * FROM `reservas` WHERE  estado_reserva=0 ORDER BY fecha_Reserva DESC LIMIT 4";
$result3 = mysqli_query($mysqli, $sql);

?>
<?php
include_once './Vista/MenuNav.php';
// include 'Vista/Vista_Perfil.php';
?>
<!--  -->

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
                            <h3 style="color: white; text-align:center;">CAMBIAR CONTRASEÑA</h3>
                        </div>
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="panel">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm">
                                        <form id="loginform" class="form-horizontal" role="form" action="funciones/guarda_contra.php" method="POST" autocomplete="off">
                                            <input type="hidden" id="user_id" name="user_id" value="<?php echo $idUsuario; ?>" />
                                            <div class="form-group">
                                                <label for="password" class="col-md-3 control-label">Actual Contraseña</label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" name="password_old" placeholder="Contraseña Actual " required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="col-md-3 control-label">Nueva Contraseña</label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="con_password" class="col-md-3 control-label">Confirmar Contraseña</label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" name="con_password" placeholder="Confirmar Contraseña" required>
                                                </div>
                                            </div>
                                            <div style="margin-top:10px" class="form-group">
                                                <div class="col-sm-12 controls">
                                                    <a href="Dashboard.php" class="btn btn-dark">Regresar</a>
                                                    <button id="btn-login" type="submit" class="btn btn-success">Modificar</a>
                                                </div>
                                            </div>
                                        </form>
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