<?php

//los ficheros a incluir deben ir antes del inicio de sesion
include_once '../model/news.php';
include_once '../dao/daoNews.php';

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
if ($_POST["btonEliminar"]) {
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

    $eliminarOk = $daoNews->eliminar($new1);
    if (!$eliminarOk) {
        $_SESSION["errores"]["eliminarOk"] = "No se ha eliminado correctamente";
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

