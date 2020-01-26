<?php

//los ficheros a incluir deben ir antes del inicio de sesion
include_once '../model/degree.php';
include_once '../dao/daoDegree.php';

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
    if (empty($_POST["txtIdSubject"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdSubject"] = "Debe de completar el campo idSubject.";
    }
    if (empty($_POST["txtIdTypeEvaluation"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdTypeEvaluation"] = "Debe de completar el campo idTypeEvaluation.";
    }
    if (empty($_POST["txtName"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtName"] = "Debe de completar el campo name.";
    }
}

if ($_SESSION["validacion"]) {
    $evaluation1 = new evaluation();

    $evaluation1->setIdSubject($_POST["txtIdSubject"]);
    $evaluation1->setIdTypeEvaluation($_POST["txtIdTypeEvaluation"]);
    $evaluation1->setName($_POST["txtName"]);

    $daoEvaluation = new daoEvaluation();

    $insertOk = $daoEvaluation->insertar($evaluation1);
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



