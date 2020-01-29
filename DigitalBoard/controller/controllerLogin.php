<?php

include_once '../model/users.php';
include_once '../dao/daoUsers.php';
session_start();

$_SESSION['validation'] = true;
$_SESSION['error'] = "";
$url = "../view/admin.php";

if ($_POST["login"]) {
    //validacion de los campos del fomulario que si no estan instanciados o vienen vacios es error
    if (!isset($_POST["email"]) || empty($_POST["email"]) || !isset($_POST["password"]) || $_POST["password"] === "") {
        $_SESSION['validation'] = false;
        $_SESSION['error'] = "Error al rellenar el formulario.";
    } else {
        $filtros = Array(
            'email' => FILTER_SANITIZE_STRING,
            'password' => FILTER_SANITIZE_STRING
        );
        $resultado = filter_input_array(INPUT_POST, $filtros);
        $usuario = $_POST["email"];
        $password = $_POST["password"];
        $daoUsers = new daoUsers();
        $objUser = new users();
        $objUser->setEmail($usuario);
        $objUser->setPassword($password);
        $objUser = $daoUsers->consultaLogin($objUser);

        if (gettype($objUser) !== "boolean") {
            $_SESSION['user'] = $objUser;

            if ($objUser->getIdTypeUsers() != 1) {
                $url = "../view/principal.php";
            }

            //para esos campos devuelve un objeto de la tabla
            if (!$objUser) {
                $_SESSION['validation'] = false;
                $_SESSION['error'] = "Error al rellenar el formulario.";
            }
        } else{
            $_SESSION['validation'] = false;
                $_SESSION['error'] = "Error al rellenar el formulario.";
        }
    }
} else {
    $_SESSION['validation'] = false;
    $_SESSION['error'] = "Error al rellenar el formulario.";
}


if (!$_SESSION['validation']) {
    $url = "../view/login.php";
}

header("Location: " . $url);
?>

