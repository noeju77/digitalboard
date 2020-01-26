

<?php

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

if ($_POST["btonListBySurnames"]) {
    if (empty($_POST["surnames"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtSurname"] = "el apellido no existe.";
    }
}
if ($_SESSION["validacion"]) {
    $users1 = new users(); //instancio un obj de la clase usuario
    $users1->setSurnames($_POST["surnames"]);
    $daoUsers = new daoUsers();
    $UsersDB = $daoUsers->read($users1); //llamo al metodo read para buscar el usuario en la bd
    $_SESSION["usersDB"] = $usersDB;
    if (!$usersDB) {
        $_SESSION["errores"]["usersDB"] = "No se ha leido correctamente";
    } else {

        $user = $daoUsers->listUsersBySubject(); //llamo al metodo listar para mostrar los documentos que pertenecen al usuario
    }
}




if ($_SESSION["validacion"]) {
    header('Location: ' . $url_exito); //se va a la pantalla de admin sin errores
} else {
    header('Location: ' . $url_error); //se ba a la pantalla de admin mostrando un mensaje de error
}
?>

