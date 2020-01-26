<?php

//los ficheros a incluir deben ir antes del inicio de sesion
include_once '../model/course.php';
include_once '../dao/daoCourse.php';

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
    if (empty($_POST["txtIdDegree"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdDegree"] = "Debe de completar el campo idDegree.";
    }
    if (empty($_POST["txtNivel"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtNivel"] = "Debe de completar el campo  nivel.";
    }
    if (empty($_POST["txtAnyoAcademico"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtAnyoAcademico"] = "Debe de completar el campo anyoAcademico.";
    }
}

if ($_SESSION["validacion"]) {
    $course1 = new course();

    $course1->setIdDegree($_POST["txtIdDegree"]);
    $course1->setNivel($_POST["txtNivel"]);
    $course1->setAnyoAcademico($_POST["txtAnyoAcademico"]);

    $daoCourse = new daoCourse();

    $insertOk = $daoCourse->insertar($course1);
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


