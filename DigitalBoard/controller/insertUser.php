<?php

include_once '../model/users.php';
include_once '../dao/daoUsers.php';

////direccion en caso de exito, sustituir vista.php por la vista correspondiente
$url_exito = "../view/admin.php";

$user1 = new users();

$daoUser = new daoUsers();

if (isset($_POST['idTypeUsers'])&& isset($_POST['txtName']) && isset($_POST['txtSurnames']) && isset($_POST['txtEmail']) && isset($_POST['txtPassword'])) {
    $filtros = Array(
        'idTypeUsers' => FILTER_SANITIZE_STRING,
        'txtName' => FILTER_SANITIZE_STRING,
        'txtSurnames' => FILTER_SANITIZE_STRING,
        'txtEmail' => FILTER_SANITIZE_EMAIL,
        'txtPassword' => FILTER_SANITIZE_STRING
    );
    $result = filter_input_array(INPUT_POST, $filtros);

    $user1->setIdTypeUsers($result ["idTypeUsers"]);
    $user1->setName($result ["txtName"]);
    $user1->setSurnames($result ["txtSurnames"]);
    $user1->setEmail($result ["txtEmail"]);
    $user1->setPassword($result ["txtPassword"]);
    $user1->setState(0);

    $daoUser->insertar($user1);
}

header('Location: ' . $url_exito);