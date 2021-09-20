<?php
$action = $_REQUEST['action'];

if (!empty($action)) {
    require_once '../../Modelo/Extra/Player.php';
    $obj = new Player();
}

if ($action == 'adduser' && !empty($_POST)) {
    $raqueta = $_POST['raquetas'];
    $pelotas = $_POST['pelotas'];
    $uniformes = $_POST['uniformes'];
    $dia = $_POST['dia'];
    $campo = $_POST['cbx_campo'];
    // $imagen = $_FILES['photo'];
    $playerId = (!empty($_POST['userid'])) ? $_POST['userid'] : '';

    // file (photo) upload
    $imagename = '';
    if (!empty($imagen['name'])) {
        $imagename = $obj->uploadPhoto($imagen);
        $playerData = [
            'raqueta' => $raqueta,
            'pelotas' => $pelotas,
            'uniformes' => $uniformes,
            'dia' => $dia,
            'reservas_idReservas' => $campo,
            'imagen' => $imagename,
        ];
    } else {
        $playerData = [
            'raqueta' => $raqueta,
            'pelotas' => $pelotas,
            'uniformes' => $uniformes,
            'dia' => $dia,
            'reservas_idReservas' => $campo,
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
