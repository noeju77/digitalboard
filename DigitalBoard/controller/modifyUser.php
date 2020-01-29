<?php

include_once '../model/users.php';
include_once '../dao/daoUsers.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');


//$_SESSION["error"];
//damos por correcto el formulario
$_SESSION["validacion"] = true;


//como es correcto eliminamos todos los errores
$_SESSION["error"] = "";
$_SESSION["errorNo"] = 0;

$_SESSION["cancelado"] = false;

$url_exito = "../view/usuario.php";

$user1 = $_SESSION['user'];

$daoUsers = new daoUsers;

if (isset($_POST['formPhone'])) {
    if (isset($_POST['telefono'])) {
        $filtros = Array(
            'telefono' => FILTER_SANITIZE_STRING
        );
        $result = filter_input_array(INPUT_POST, $filtros);
        $expresion = '/^((\+?34([ \t|\-])?)?[9|6|7]((\d{1}([ \t|\-])?[0-9]{3})|(\d{2}([ \t|\-])?[0-9]{2}))([ \t|\-])?[0-9]{2}([ \t|\-])?[0-9]{2})$/';
        if (!preg_match($expresion, $result['telefono'])) {
            $_SESSION['validation'] = false;
            $_SESSION['error'] = "Formato de teléfono incorrecto.";
            $_SESSION['errorNo'] = 1;
        } else {
            $user1 = $daoUsers->read($user1);
            $user1->setPhone($result['telefono']);
            $daoUsers->modificar($user1);
        }
    }
}


if (isset($_POST['formPass'])) {

    if (isset($_POST['password']) && isset($_POST['passwordNuevo']) && isset($_POST['passwordNuevoBis'])) {
        $filtros = Array(
            'password' => FILTER_SANITIZE_STRING,
            'passwordNuevo' => FILTER_SANITIZE_STRING,
            'passwordNuevoBis' => FILTER_SANITIZE_STRING
        );
        $result = filter_input_array(INPUT_POST, $filtros);

        $user1 = $_SESSION['user'];

        $userPassword = $user1->getPassword();

        if (hash('sha224', $result['password']) == $userPassword) {
            $passwordOk = 1;
            if ($result['passwordNuevo'] != $result['passwordNuevoBis']) {
                $_SESSION['validation'] = false;
                $_SESSION["error"] = 'Las contraseñas no coinciden.';
                $_SESSION['errorNo'] = 2;
            } else {
                $user1 = $daoUsers->read($user1);
                $user1->setPassword($result['passwordNuevo']);
                $daoUsers->modificarWithPassword($user1);
            }
        } else {
            $passwordOk = 0;
            $_SESSION['validation'] = false;
            $_SESSION['error'] = 'La contraseña de usuario no es correcta.';
            $_SESSION['errorNo'] = 2;
        }
    }
}

if (isset($_POST['formImage'])) {

    $tiposAceptados = Array('image/png', 'image/jpeg', 'image/jpeg', 'image/pjpeg', 'image/bmp');
    $ruta = time() . "_" . $_FILES['image']['name'];
    if ($_FILES['image']['error'] <= 0 && array_search($_FILES['image']['type'], $tiposAceptados) && $_FILES['image']['size'] <= 1024 * 1024 * 5) {
        move_uploaded_file($_FILES['image']['tmp_name'], "../userimg/" . $ruta);
        $user1 = $_SESSION['user'];
        $user1->setImage($ruta);
        $daoUsers->modificar($user1);
    } else {
        $_SESSION['validation'] = false;
        $_SESSION["error"] = 'Error al subir el fichero. Tipo no aceptado o excede del tamaño permitido.';
        $_SESSION['errorNo'] = 3;
    }
}

if (!$_SESSION['validation']) {
    $url = "../view/usuario.php";
    header('Location: ' . $url);
} else {
    header('Location: ' . $url_exito);
}











