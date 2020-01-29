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
if ($_POST["btonEliminar"]) {
    if (empty($_POST["txtIdCourse"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdCourse"] = "Debe de completar el campo idCourse.";
    }
    if (empty($_POST["txtName"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtName"] = "Debe de completar el campo  name.";
    }
    if (empty($_POST["txtIdTypeSubjects"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdTypeSubjects"] = "Debe de completar el campo idTypeSubjects.";
    }
}

if ($_SESSION["validacion"]) {
    $subject1 = new subject();

    $subject1->setIdTypeCourse($_POST["txtIdTypeCourse"]);
    $subject1->setName($_POST["txtName"]);
    $subject1->setIdTypeSubjects($_POST["txtIdTypeSubjects"]);

    $daoSubject = new daoSubject();

    $deleteOk = $daoSubject->eliminar($subject11);
    if (!$deleteOk) {
        $_SESSION["errores"]["deleteOk"] = "No se ha eliminado correctamente";
    }
}

if ($_SESSION["validacion"]) {
    header('Location: ' . $url_exito); //se va a la pantalla de admin sin errores
} else {
    header('Location: ' . $url_error); //se ba a la pantalla de admin mostrando un mensaje de error
}
?>
