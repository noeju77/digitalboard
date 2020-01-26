<?php

include_once '../model/news.php';
include_once '../dao/daoNews.php';
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

    if (empty($_POST["txtIdTypeNews"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdTypeNews"] = "Debe de completar el campo IdTypeNews.";
    }
    if (empty($_POST["txtIdUsers"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdUsers"] = "Debe de completar el campo idUsers.";
    }
    if (empty($_POST["txtIdSubject"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdSubject"] = "Debe de completar el campo idSubject.";
    }
    if (empty($_POST["txtTitle"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtTitle"] = "Debe de completar el campo title.";
    }
    if (empty($_POST["txtContent"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtContent"] = "Debe de completar el campo content.";
    }
    if (empty($_POST["datePublication"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["datePublication"] = "Debe de completar el campo publication.";
    }
} elseif ($_POST["btonCancelar"]) {
    $_SESSION["cancelado"] = true;
    $_SESSION["errores"]["sms"] = "ha cancelado la operación.";
} else {
    $_SESSION["validacion"] = false;
    $_SESSION["errores"]["sms"] = "Petición ajena al sistema.";
}

if ($_SESSION["validacion"]) {
    $new1 = new news();

    $new1->setIdTypeNews($_POST["txtIdTypeNews"]);
    $new1->setIdUsers($_POST["txtIdUsers"]);
    $new1->setIdSubject($_POST["txtIdSubject"]);
    $new1->setTitle($_POST["txtTitle"]);
    $new1->setContent($_POST["txtContent"]);
    $new1->setPublication($_POST["datePublication"]);
    $daoNews = new daoNews();

    $modifyOk = $daoNews->modificar($new1);
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



