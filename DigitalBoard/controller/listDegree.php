
<?php
include_once("../model/degree.php");
include_once("../dao/daoDegree.php");
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

if ($_POST["btonListDegree"]) {
    if (empty($_POST["idDegree"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdDegree"] = "el id no existe.";
    }
}
if ($_SESSION["validacion"]) {
    $degree1 = new degree(); //instancio un obj de la clase usuario
    $degree1->setIdDegree($_POST["idDegree"]);
    $daoDegree = new daoDegree();
    $degreeDB = $daoDegree->listar(); //llamo al metodo read para buscar el degree en la bd
    $_SESSION["degreeDB"] = $degreeDB;
    if (!$degreeDB) {
        $_SESSION["errores"]["degreeDB"] = "No se ha leido correctamente";
    }
}




if ($_SESSION["validacion"]) {
    header('Location: ' . $url_exito); //se va a la pantalla de admin sin errores
} else {
    header('Location: ' . $url_error); //se ba a la pantalla de admin mostrando un mensaje de error
}
?>

