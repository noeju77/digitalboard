<?php
include_once '../model/resource.php';
include_once '../dao/daoResource.php';
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
    if (empty($_POST["txtIdTypeResources"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdTypeResources"] = "Debe de completar el campo idTypeResources.";
    }
    if (empty($_POST["txtIdSubject"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdSubject"] = "Debe de completar el campo idSubject.";
    }
    if (empty($_POST["dateUploadDate"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["dateUploadDate"] = "Debe de completar el campo uploadDate.";
    }
    if (empty($_POST["txtName"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtName"] = "Debe de completar el campo name.";
    }
    if (empty($_POST["txtUbicacion"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtUbicacion"] = "Debe de completar el campo ubicacion.";
    }
}

if ($_SESSION["validacion"]) {
    $resource1 = new resources();

    $resource1->setIdTypeResources($_POST["txtIdTypeResources"]);
    $resource1->setIdSubject($_POST["txtIdSubject"]);
    $resource1->setUploadDate($_POST["dateUploadDate"]);
    $resource1->setName($_POST["txtName"]);
    $resource1->setUbicacion($_POST["txtUbicacion"]);
    $daoResources = new daoResources();

    $insertOk = $daoResources->insertar($resource1);
    if (!$insertOk) {
        $_SESSION["errores"]["insertOk"] = "No se ha insertado correctamente";
    }
}

//echo "<pre>";
//var_dump($subject1);
//var_dump($_SESSION);
//echo "</pre>";

if ($_SESSION["validacion"]) {
    header('Location: ' . $url_exito); //se va a la pantalla de admin sin errores
} else {
    header('Location: ' . $url_error); //se ba a la pantalla de admin mostrando un mensaje de error
}
?>


