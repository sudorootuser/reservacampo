<html>
<link rel="icon" type="image/png" href="Recursos/Imagenes/LOGO PASION DEPORTIVA COMPLETO2.png"/>
<!-- Headers -->
<?php
include_once './Vista/Headers.php';
require 'Modelo/Conexion.php';
require 'Controladores/funcs.php';

$errors = array();

if (!empty($_POST)) {
    $nombre = $mysqli->real_escape_string($_POST['nombre']);
    $usuario = $mysqli->real_escape_string($_POST['usuario']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $con_password = $mysqli->real_escape_string($_POST['con_password']);

    $activo = 0;

    if (isNull($nombre, $usuario, $password, $con_password, $email)) {
        $errors[] = "Hay campos vacios";
    }
    if (!isEmail($email)) {
        $errors[] = "Direcci&oacute;n de correo no Valida";
    }
    if (!validaPassword($password, $con_password)) {
        $errors[] = "Las contraseñas deben ser iguales";
    }
    if (emailExiste($email)) {
        $errors[] = "correo eletronico $email ya existe";
    }
    if (count($errors) == 0) {

        $pass_hash = hashPassword($password);
        $token = generateToken();

        $registro = registraUsuario($usuario, $pass_hash, $nombre, $email, $activo, $token);

        echo "<script>alert('Creación de Cuenta Exitosa');window.location='index.php'</script>";
    } else {
        $errors[] = "ERROR AL CARGAR EL REGISTRO";
    }
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
                        <div class="card-title my-4">
                            <h3 style="color: white;">REGISTRO DE USUARIO</h3>
                        </div>
                        <!-- Mensaje de Alerta -->
                        <?php echo resultBlock($errors); ?>
                        <!-- Fin alerta -->
                    </div>
                    <div class="card-body" style="border: solid #009933 0.5px;border-radius: 0px 0px 20px 20px;">
                        <form id="loginform" class="form-login" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="background-color: #009933;border: solid #009933 0.5px;border-radius: 10px 0px 0px 10px;" id="basic-addon1"><i class="fas fa-user" style="color: white;"></i></span>
                                <input type="text" style="border: solid #009933 0.5px;" name="nombre" class="form-control" placeholder="Nombre" aria-label="nombre" aria-describedby="basic-addon1" value="<?php if (isset($nombre)) echo $nombre; ?>" required />
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="background-color: #009933;border: solid #009933 0.5px;border-radius: 10px 0px 0px 10px;" id="basic-addon1"><i class="fas fa-user" style="color: white;"></i></span>
                                <input type="text" style="border: solid #009933 0.5px;" name="usuario" class="form-control" placeholder="Usuario" aria-label=" Usuario" aria-describedby="basic-addon1" value="<?php if (isset($usuario)) echo $usuario; ?>" required />
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="background-color: #009933;border: solid #009933 0.5px;border-radius: 10px 0px 0px 10px;" id="basic-addon1"><i class="fas fa-envelope" style="color: white;"></i></span>

                                <input type="email" style="border: solid #009933 0.5px;" name="email" class="form-control" placeholder="Correo Eletronico" aria-label="Correo Eletronico" aria-describedby="basic-addon1" value="<?php if (isset($email)) echo $email; ?>" required />
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="background-color: #009933;border: solid #009933 0.5px;border-radius: 10px 0px 0px 10px;" id="basic-addon1"><i class="fas fa-lock" style="color: white;"></i></span>
                                <input type="password" style="border: solid #009933 0.5px;" name="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="basic-addon1" required />
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="background-color: #009933;border: solid #009933 0.5px;border-radius: 10px 0px 0px 10px;" id="basic-addon1"><i class="fas fa-lock" style="color: white;"></i></span>
                                <input type="password" style="border: solid #009933 0.5px;" name="con_password" class="form-control" placeholder="Confirmar Contraseña" id="myPassword" aria-label="Contraseña" aria-describedby="basic-addon1" required />
                            </div>
                            <button type="submit" class="btn" style="background-color: #caf406;color: #009933;width: 100%;font-weight: bold;">Ingresar</button>
                            <div class="botones_regresos mt-3">
                                <a href="index.php" class="old">
                                    <center>Tienes una cuenta inicia aquí !!</center>
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