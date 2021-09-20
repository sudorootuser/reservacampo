<html id="prueba">
<link rel="icon" type="image/png" href="Recursos/Imagenes/LOGO PASION DEPORTIVA COMPLETO2.png" />
<?php
// <!-- Headers -->
include_once './Vista/HeadersCampos.php';
require 'Modelo/Conexion.php';
require 'Controladores/funcs.php';

$sql = "SELECT * FROM `reservas` WHERE  estado_reserva=0 ORDER BY fecha_Reserva DESC LIMIT 4";
$result3 = mysqli_query($mysqli, $sql);

// print_r($la);die;
if (!isset($_SESSION["id_usuario"])) {
    header('Location:index.php');
}
require 'Controladores//Cont_Perfil_User.php';
?>

<body style="background-color: #fff;overflow: hidden !important;">
    <?php
    include_once './Vista/MenuNav.php';
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <br>
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
                    <?php
                    include_once 'Vista/Cancha/form.php';
                    include_once 'Vista/Cancha/profile.php';
                    ?>
                    <div class="alert alert-light text-center message" role="alert">
                    </div>
                    <div class="alert alert alert-success " role="alert" style="margin-top:10px;background-color: #caf406;background-image: url('Recursos/Imagenes/FondoLoguin.png')">
                        <h4 class="text-light text-center">LISTADO DE CANCHAS</h4>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#userModal" id="addnewbtn">NUEVA CANCHA</button>
                        </div>
                        <div class="col-9">
                            <div class="input-group input-group-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Buscar..." id="searchinput">
                            </div>
                        </div>

                    </div>
                    <?php
                    include_once 'Vista/Cancha/playerstable.php';
                    ?>
                    <nav id="pagination">
                    </nav>
                    <input type="hidden" name="currentpage" id="currentpage" value="1">
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include 'Vista/Footer_Princ.php'; ?>
    <!-- Footer Principal -->
    <div id="overlay" style="display:none;">
</body>

</html>