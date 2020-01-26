
<?php
include_once("../model/resources.php");
include_once("../dao/daoResources.php");
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

if ($_POST["btonListResources"]) {
    if (empty($_POST["idResources"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdResources"] = "el id no existe.";
    }
}
if ($_SESSION["validacion"]) {
    $resources1 = new resources(); //instancio un obj de la clase usuario
    $resources1->setIdResources($_POST["idResources"]);
    $daoResources = new daoResources();
    $resourcesDB = $daoResources->listar(); //llamo al metodo read para buscar los news en la bd
    $_SESSION["resourcesDB"] = $resourcesDB;
    if (!$resourcesDB) {
        $_SESSION["errores"]["resourcesDB"] = "No se ha leido correctamente";
    } 
}


if ($_SESSION["validacion"]) {
    header('Location: ' . $url_exito); //se va a la pantalla de admin sin errores
} else {
    header('Location: ' . $url_error); //se ba a la pantalla de admin mostrando un mensaje de error
}
?>