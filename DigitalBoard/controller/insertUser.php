<?php

include_once '../model/users.php';
include_once '../dao/daoUsers.php';
session_start();
//
error_reporting(E_ALL);
ini_set('display_errors', '1');

//
//$_SESSION["error"];
//damos por correcto el formulario
$_SESSION["validacion"] = true;
//como es correcto eliminamos todos los errores
$_SESSION["errores"] = "";
//direccion en caso de exito, sustituir vista.php por la vista correspondiente 
$url_exito = "../view/vista.php";
//direccion en caso de error, por lo general será la vista del formulario que llamo
//a este controlador
$url_error = "../view/vista.php";
//validamos los campos y en caso de encontrar un error cambiamos la bandera validacion a false;
if ($_POST["btonInsertar"]) {
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

    $insertOk = $daoUser->insertar($user1);
    if (!$insertOk) {
        $_SESSION["errores"]["insertOk"] = "No se ha insertado correctamente";
    }
}

//echo "<pre>";
//var_dump($user1);
//var_dump($_SESSION);
//echo "</pre>";

if ($_SESSION["validacion"]) {
    header('Location: ' . $url_exito); //se va a la pantalla de admin sin errores
} else {
    header('Location: ' . $url_error); //se ba a la pantalla de admin mostrando un mensaje de error
}
?>