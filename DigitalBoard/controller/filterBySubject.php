<?php

include_once("../model/news.php");
include_once("../dao/daoNews.php");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$_SESSION["validacion"] = true;
$_SESSION["errores"] = "";
//direccion en caso de exito, sustituir vista.php por la vista correspondiente 
$url_exito = "../view/vista.php";
//direccion en caso de error, por lo general será la vista del formulario que llamo
//a este controlador
$url_error = "../view/vista.php";

if ($_POST["btonAsignaturas"]) {
    if (empty($_POST["idSubject"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdSubject"] = "el id asignatura no existe.";
    }
}
if ($_SESSION["validacion"]) {
    $subject1 = new subject(); //instancio un obj de la clase usuario
    $subject1->setIdSubject($_POST["idSubject"]);
    $daoSubject = new daoSubject();
    $subjectDB = $daoSubject->read($subject1); //llamo al metodo read para buscar el usuario en la bd
    $_SESSION["subjectDB"] = $subjectDB;
    if (!$subjectDB) {
        $_SESSION["errores"]["subjectDB"] = "No se ha leido correctamente";
    } else {
        $daoNews = new daoNews(); //instancio un obj de la clase daoDoc
        $new = $daoNews->filterBySubject($subject1); //llamo al metodo listar para mostrar los documentos que pertenecen al usuario
    }
}




if ($_SESSION["validacion"]) {
    header('Location: ' . $url_exito); //se va a la pantalla de admin sin errores
} else {
    header('Location: ' . $url_error); //se ba a la pantalla de admin mostrando un mensaje de error
}
?>

