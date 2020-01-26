
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

if ($_POST["btonListUsersByType"]) {//compruebo que se ha pulsado el boton
    if (empty($_POST["id"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtId"] = "el usuario no existe.";
    }
}
if ($_SESSION["validacion"]) { //si la bandera esta bajada(no hay errores)
//    if (!is_null($_POST["id"])) { //compruebo que el id existe y no esta vacio
    $user1 = new users(); //instancio un obj de la clase usuario
    $user1->setIdTypeUsers($_POST["id"]);
    $daoUser = new daoUsers(); //instancio un obj de la clase daoUser

    $userDB = $daoUsers->readWithTypeUser($user1); //llamo al metodo read para buscar el usuario en la bd
    $_SESSION["userDB"] = $userDB;
    if (!$userDB) {
        $_SESSION["errores"]["userDB"] = "No se ha leido correctamente";
  //llamo al metodo listar para mostrar los documentos que pertenecen al usuario
    }
}

if ($_SESSION["validacion"]) {
    header('Location: ' . $url_exito); //se va a la pantalla de admin sin errores
} else {
    header('Location: ' . $url_error); //se ba a la pantalla de admin mostrando un mensaje de error
}
?>