<?php

include_once '../model/users_has_Subject.php';
include_once '../dao/daoUsers_has_Subject.php';
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
    if (empty($_POST["numberIdUsers"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdUsers"] = "Debe de completar el campo idUsers.";
    }
    if (empty($_POST["numberIdSubject"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["numberIdSubject"] = "Debe de completar el campo idSubject.";
    }
   
}

if ($_SESSION["validacion"]) {
    $uhs1 = new users_has_Subject();

    $uhs1->setIdUsers($_POST["numberIdUsers"]);
    $uhs1->setIdSubject($_POST["numberIdSubject"]);
    

    $daoUHS = new daoUsers_has_Subject();

    $insertOk = $daoUHS->insertarSubject($uhs1);
    if (!$insertOk) {
        $_SESSION["errores"]["insertOk"] = "No se ha insert correctamente";
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





