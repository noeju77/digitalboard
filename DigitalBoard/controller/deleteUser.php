<?php

include_once '../model/users.php';
include_once '../dao/daoUsers.php';

session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

$url_exito = "../view/admin.php";

if (isset($_GET["idUsers"])) {

    $user1 = new users(); //instancio un obj de la clase subject
    $user1->setIdUsers($_GET["idUsers"]);

    $daoUser = new daoUsers();
    $deleteOk = $daoUser->eliminar($user1);

    if (!$deleteOk) {
        $_SESSION["errores"]["deleteOk"] = "No se ha eliminado correctamente";
    }
}

header('Location: ' . $url_exito);

?>