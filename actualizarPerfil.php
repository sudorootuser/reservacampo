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
include './Vista/MenuNav.php';
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
                            <h3 style="color: white; text-align:center;">INFORMACIÓN DE USUARIO</h3>
                        </div>
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="panel">
                            <div class="container-fluid">
                                <div class="row">
                                    <?php
                                    require './Modelo/Conexion.php';
                                    $id = $_GET['id'];
                                    $sql = "SELECT * FROM usuario WHERE idUsuario ='$id'";
                                    $resultado = $mysqli->query($sql);
                                    $row = $resultado->fetch_array(MYSQLI_ASSOC);
                                    // $varaa= $row['idUsuario']; 
                                    ?>
                                    <div class="col-sm">
                                        <form class="form_horizontal" method="POST" action="funciones/Fun_actualizar.php" autocomplete="off">
                                            <input type="hidden" id="id" name="id" value="<?php echo $row['idUsuario']; ?>" />
                                            <div class="form-group">
                                                <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombreUsuario']; ?>" requiered />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="apellido" class="col-sm-2 control-label">Apellido</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $row['apellido']; ?>" requiered />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="correo" class="col-sm-2 control-label">Correo</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $row['correo']; ?>" requiered />
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="usuario" class="col-sm-2 control-label">Usuario</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $row['usuario']; ?>" requiered />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono" class="col-sm-2 control-label">Télefono</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $row['telefono']; ?>" requiered />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="fechaNacimiento" class="col-sm-5 control-label">Fecha de Nacimiento</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row['fechaNacimiento']; ?>" requiered />
                                            </div>
                                        </div>
                                        <div class=" form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <a href="Dashboard.php" class="btn btn-dark">Regresar</a>
                                                <button type="submit" class="btn btn-success">Guardar</button>
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