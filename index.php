<html>
<link rel="icon" type="image/png" href="Recursos/Imagenes/LOGO PASION DEPORTIVA COMPLETO2.png" />
<!-- Headers -->
<?php
include_once './Vista/Headers.php';

require 'Modelo/Conexion.php';
require 'Controladores/funcs.php';

$errors = array();
if (!empty($_POST)) {
    $usuario = $mysqli->real_escape_string($_POST['usuario']);
    $password = $mysqli->real_escape_string($_POST['password']);

    if (isNulllogin($usuario, $password)) {
        $errors[] = "Debe diligenciar los campos";
    }

    $errors[] = login($usuario, $password);
}
?>

<body style="background-color: #fff;overflow: hidden !important;">
    <div class="box">
        <div class="row content">
            <div class="col-3 Lateral">

            </div>
            <div class="col-6 text-center">
                <br>
                <br>
                <div class="card">
                    <div class="card-header" style="background-color: #caf406;background-image: url('Recursos/Imagenes/FondoLoguin.png')">
                        <div class="card-title">
                            <img src="Recursos/Imagenes/LOGO PASION DEPORTIVA COMPLETO.png" class="img-fluid" style="width: 20%;">
                        </div>
                        <div>
                            <h3 style="color: white;">INGRESO</h3>
                        </div>
                        <!-- Mensaje de Alerta -->
                        <?php echo resultBlock($errors); ?>
                        <!-- Fin alerta -->
                    </div>
                    <div class="card-body" style="border: solid #009933 0.5px;border-radius: 0px 0px 20px 20px;">
                        <form id="loginform" class="form-login" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="background-color: #009933;border: solid #009933 0.5px;border-radius: 10px 0px 0px 10px;" id="basic-addon1"><i class="fas fa-user" style="color: white;"></i></span>
                                <input type="text" style="border: solid #009933 0.5px;" name="usuario" class="form-control" placeholder="Ingrese Usuario o Correo" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="background-color: #009933;border: solid #009933 0.5px;border-radius: 10px 0px 0px 10px;" id="basic-addon1"><i class="fas fa-lock" style="color: white;" required></i></span>
                                <input type="password" style="border: solid #009933 0.5px;" name="password" class="form-control" placeholder="Contraseña" aria-label="password" aria-describedby="basic-addon1">
                            </div>
                            <button type="submit" class="btn" style="background-color: #caf406;color: #009933;width: 100%;font-weight: bold;">Ingresar</button>
                            <br>
                            <div class="botones_regresos mt-3">
                                <a href="recupera.php" class="old">
                                    <center>¿Olvidaste tu contraseña?</center>
                                </a>
                            </div>
                            <div class="botones_regreso">
                                <a href="registro.php" class="form-an-account">
                                    <center>¿No tienes una cuenta?,¡Registrate!</center>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>