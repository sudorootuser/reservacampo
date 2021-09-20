<?php
$idUsuario = $_SESSION["id_usuario"];
?>
<nav class="navbar navbar-expand-lg navbar-dark static-top" style="background-color: #009933 !important;font-family: 'Josefin Sans Bold' !important;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <h1 class="text-warning"><img src="Recursos/Imagenes/LOGO PASION DEPORTIVA COMPLETO.png" style="width: 10%;"></h1>
        </a>
        <!-- <div>Bienvenido</div> -->
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto" style="font-family: Roboto Medium;">
                <li class="nav-item">
                    <a class="nav-link text-white" style="padding: 32px;font-family: 'Josefin Sans Bold' !important;" href="./Dashboard.php">Principal</a>
                </li>
                <li class="nav-item" id="log">
                    <a class="nav-link text-white" style="padding: 32px;font-family: 'Josefin Sans Bold' !important;" href="./reservas.php">Reservas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" style="padding: 32px;font-family: 'Josefin Sans Bold' !important;" href="./canchas.php">Canchas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" style="padding: 32px;font-family: 'Josefin Sans Bold' !important;" href="./extras.php">Extras</a>
                </li>
            </ul>

        </div>
        <div class="dropdown">
            <a class=" btn btn-success nav-link text-white  dropdown-toggle" data-bs-toggle="dropdown" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ajustes
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">Usuario: <br><?php echo $rowUser['nombreUsuario']; ?></a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li> <a class="dropdown-item" href="./perfil.php">Mi Perfil</a></li>
                <!-- <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#updatePerfil" onclick="GetPerfil(<?php echo $idUsuario; ?>)">Mi perfil</a></li> -->
                <li> <a class="dropdown-item" href="Controladores/Salir.php">Salir</a></li>
            </ul>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
</nav>