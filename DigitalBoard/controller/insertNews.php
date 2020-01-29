<?php

//los ficheros a incluir deben ir antes del inicio de sesion

include_once '../model/users.php';
include_once '../model/news.php';
include_once '../dao/daoNews.php';

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
$url_exito = "../view/principal.php";
//direccion en caso de error, por lo general será la vista del formulario que llamo
//a este controlador
$url_error = "../view/vista.php";

$user1 = $_SESSION["user"];

$new1 = new news();

if (isset($_POST['idSubject'])) {
    $idTypeNews = 2;
} else {
    $idTypeNews = 1;
}

if (isset($_POST['idSubject']))
    $new1->setIdSubject($_POST['idSubject']);

$daoNews = new daoNews();

if (isset($_POST['tituloNoticia']) && isset($_POST['descripNoticia'])) {
    $filtros = Array(
        'tituloNoticia' => FILTER_SANITIZE_STRING,
        'descripNoticia' => FILTER_SANITIZE_STRING
    );
    $result = filter_input_array(INPUT_POST, $filtros);

    $new1->setIdTypeNews($idTypeNews);
    $new1->setIdUsers($user1->getIdUsers());

    $new1->setTitle($result['tituloNoticia']);
    $new1->setContent($result['descripNoticia']);

    $new1->setPublication(date('d/m/y'));

    $daoNews->insertar($new1);

}

header('Location: ' . $url_exito);

?>



