<?php
$action = $_REQUEST['action'];

if (!empty($action)) {
    include '../../Modelo/Reserva/Player.php';
    $obj = new Player();
}

if ($action == 'adduser' && !empty($_POST)) {
    $titular_Reserva = $_POST['username'];
    $fecha_Reserva = $_POST['email'];
    $telefono_Titular = $_POST['phone'];
    $email_Titular = $_POST['email2'];
    $Campos_idCampos = $_POST['cbx_campo'];
    $playerId = (!empty($_POST['userid'])) ? $_POST['userid'] : '';

    // file (photo) upload
    $imagename = '';
    if (!empty($imagen['name'])) {
        $imagename = $obj->uploadPhoto($imagen);
        $playerData = [
            'titular_Reserva' => $titular_Reserva,
            'fecha_Reserva' => $fecha_Reserva,
            'telefono_Titular' => $telefono_Titular,
            'email_Titular' => $email_Titular,
            'Campos_idCampos' => $Campos_idCampos,
        ];
    } else {
        $playerData = [
            'titular_Reserva' => $titular_Reserva,
            'fecha_Reserva' => $fecha_Reserva,
            'telefono_Titular' => $telefono_Titular,
            'email_Titular' => $email_Titular,
            'Campos_idCampos' => $Campos_idCampos,
        ];
    }

    if ($playerId) {
        $obj->update($playerData, $playerId);
    } else {
        $playerId = $obj->add($playerData);
    }

    if (!empty($playerId)) {
        $player = $obj->getRow('id', $playerId);
        echo json_encode($player);
        exit();
    }
}

if ($action == "getusers") {
    $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $limit = 3;
    $start = ($page - 1) * $limit;

    $players = $obj->getRows($start, $limit);
    if (!empty($players)) {
        $playerslist = $players;
    } else {
        $playerslist = [];
    }
    $total = $obj->getCount();
    $playerArr = ['count' => $total, 'players' => $playerslist];
    echo json_encode($playerArr);
    exit();
}

if ($action == "getuser") {
    $playerId = (!empty($_GET['id'])) ? $_GET['id'] : '';
    if (!empty($playerId)) {
        $player = $obj->getRow('id', $playerId);
        echo json_encode($player);
        exit();
    }
}

if ($action == "deleteuser") {
    $playerId = (!empty($_GET['id'])) ? $_GET['id'] : '';
    if (!empty($playerId)) {
        $isDeleted = $obj->deleteRow($playerId);
        if ($isDeleted) {
            $message = ['deleted' => 1];
        } else {
            $message = ['deleted' => 0];
        }
        echo json_encode($message);
        exit();
    }
}

if ($action == 'search') {
    $queryString = (!empty($_GET['searchQuery'])) ? trim($_GET['searchQuery']) : '';
    $results = $obj->searchPlayer($queryString);
    echo json_encode($results);
    exit();
}
