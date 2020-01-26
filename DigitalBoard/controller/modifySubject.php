<?php

include_once '../model/subject.php';
include_once '../dao/daoSubject.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');


//$_SESSION["error"];
//damos por correcto el formulario
$_SESSION["validacion"] = true;
//como es correcto eliminamos todos los errores
$_SESSION["errores"] = "";

$_SESSION["cancelado"] = false;

//validamos los campos y en caso de encontrar un error cambiamos la bandera validacion a false;
if ($_POST["btonModificar"]) {

    if (empty($_POST["txtIdCourse"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdCourse"] = "Debe de completar el campo idCourse.";
    }
    if (empty($_POST["txtName"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtName"] = "Debe de completar el campo  name.";
    }
    if (empty($_POST["txtIdTypeSubjects"])) {
        $_SESSION["validacion"] = false;
        $_SESSION["errores"]["txtIdTypeSubjects"] = "Debe de completar el campo idTypeSubjects.";
    }
} elseif ($_POST["btonCancelar"]) {
    $_SESSION["cancelado"] = true;
    $_SESSION["errores"]["sms"] = "ha cancelado la operación.";
} else {
    $_SESSION["validacion"] = false;
    $_SESSION["errores"]["sms"] = "Petición ajena al sistema.";
}

if ($_SESSION["validacion"]) {
    $subject1 = new subject();

    $subject1->setIdTypeCourse($_POST["txtIdTypeCourse"]);
    $subject1->setName($_POST["txtName"]);
    $subject1->setIdTypeSubjects($_POST["txtIdTypeSubjects"]);

    $modifyOk = $daoUser->modificar($user1);
    if (!$modifyOk) {
        $_SESSION["errores"]["modifyOk"] = "No se ha modificado correctamente";
    }

    if ($_SESSION["validacion"] || $_SESSION["cancelado"]) {

        header('Location: ../vista/listaUser.php');
    } else {
        header('Location: ../vista/datosModificados.php');
    }
}
?>



