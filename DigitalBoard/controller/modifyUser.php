<?php

include_once '../model/users.php';
include_once '../dao/daoUser.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');


//$_SESSION["error"];
//damos por correcto el formulario
$_SESSION["validacion"] = true;
//como es correcto eliminamos todos los errores
$_SESSION["errores"] = "";

$_SESSION["cancelado"] = false;

//validamos los campos y en caso de encontrar un error cambiamos la bandera validacion a false;
if ($_POST["btonModificar"]) {

    if (empty($_POST["txtIdTypeUsers"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdTypeUsers"] = "Debe de completar el campo idTypeUsers.";
    }
    if (empty($_POST["txtName"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtName"] = "Debe de completar el campo  name.";
    }
    if (empty($_POST["txtSurnames"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtSurnames"] = "Debe de completar el campo  surnames.";
    }
    if (empty($_POST["txtPhone"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtPhone"] = "Debe de completar el campo phone.";
    }
    if (empty($_POST["txtEmail"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtEmail"] = "Debe de completar el campo email.";
    }
    if (empty($_POST["txtPassword"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtPassword"] = "Debe de completar el campo password.";
    }
    if (empty($_POST["txtState"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtState"] = "Debe de completar el campo state.";
    }
    if (empty($_POST["fileImage"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["fileImage"] = "Debe de completar el campo image.";
    }
} elseif ($_POST["btonCancelar"]) {
    $_SESSION["cancelado"] = true;
    $_SESSION["errores"]["sms"] = "ha cancelado la operación.";
} else {
    $_SESSION["validacion"] = false;
    $_SESSION["errores"]["sms"] = "Petición ajena al sistema.";
}

if ($_SESSION["validacion"]) {
    $user1 = new users();

    $user1->setIdTypeUsers($_POST["txtIdTypeUsers"]);
    $user1->setName($_POST["txtName"]);
    $user1->setSurnames($_POST["txtSurnames"]);
    $user1->setPhone($_POST["txtPhone"]);
    $user1->setEmail($_POST["txtEmail"]);
    $user1->setPassword($_POST["txtPassword"]);
    $user1->setState($_POST["txtState"]);
    $user1->setImage($_POST["fileImage"]);
    $daoUser = new daoUser();

    $modifyOk = $daoUser->modificar($user1);
    if (!$modifyOk) {
        $_SESSION["errores"]["modifyOk"] = "No se ha modificado correctamente";
    }

    if ($_SESSION["validacion"] || $_SESSION["cancelado"]) {

        header('Location: ../vista/listaUser.php');
    } else {
        header('Location: ../vista/datosModificados.php');
    }
}
?>

