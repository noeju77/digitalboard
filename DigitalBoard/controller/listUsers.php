
<?php

include_once("../model/users.php");
include_once("../dao/daoUsers.php");
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

if ($_POST["btonListUsers"]) {
    if (empty($_POST["idUsers"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdUsers"] = "el id no existe.";
    }
}
if ($_SESSION["validacion"]) {
    $users1 = new users(); //instancio un obj de la clase usuario
    $users1->setIdUsers($_POST["idUsers"]);
    $daoUsers = new daoUsers();
     $users = $daoUsers->listar(); //llamo al metodo read para buscar los news en la bd
    $_SESSION["usersDB"] = $resourcesDB;
    if (!$usersDB) {
        $_SESSION["errores"]["usersDB"] = "No se ha leido correctamente";
    } 
}


if ($_SESSION["validacion"]) {
    header('Location: ' . $url_exito); //se va a la pantalla de admin sin errores
} else {
    header('Location: ' . $url_error); //se ba a la pantalla de admin mostrando un mensaje de error
}
?>