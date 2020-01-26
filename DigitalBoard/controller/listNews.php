

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

if ($_POST["btonListNews"]) {
    if (empty($_POST["idNews"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdNews"] = "el id no existe.";
    }
}
if ($_SESSION["validacion"]) {
    $news1 = new news(); //instancio un obj de la clase usuario
    $news1->setIdNews($_POST["idNews"]);
    $daoNews = new daoNews();
    $newsDB = $daoNews->listar(); //llamo al metodo read para buscar los news en la bd
    $_SESSION["newsDB"] = $newsDB;
    if (!$newsDB) {
        $_SESSION["errores"]["newsDB"] = "No se ha leido correctamente";
    } 
}


if ($_SESSION["validacion"]) {
    header('Location: ' . $url_exito); //se va a la pantalla de admin sin errores
} else {
    header('Location: ' . $url_error); //se ba a la pantalla de admin mostrando un mensaje de error
}
?>

