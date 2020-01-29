<?php

include_once '../model/resources.php';
include_once '../dao/daoResources.php';

$resource1 = new resources();
$daoResources = new daoResources();

if (isset($_POST['carpeta']) && isset($_POST['tituloContenido'])) {
    $filtros = Array(
        'carpeta' => FILTER_SANITIZE_STRING,
        'tituloContenido' => FILTER_SANITIZE_STRING
    );
    $result = filter_input_array(INPUT_POST, $filtros);

    $ruta = time() . "_" . $_FILES['fichero']['name'];

    $resource1->setIdTypeResources(1);
    $resource1->setIdSubject($_POST['idSubject']);
    $resource1->setUploadDate(date('d/m/y'));
    $resource1->setName($result["tituloContenido"]);
    $resource1->setLocation($ruta);
    $resource1->setFolder($result['carpeta']);

    $tiposAceptados = Array('application/vnd.ms-powerpoint', 'application/pdf', 'image/png', 'image/jpeg',
        'image/pjpeg', 'image/bmp', 'application/msword', 'text/csv', 'video/mpeg', 'application/vnd.ms-excel',
        'application/zip', 'application/x-rar-compressed');

    if ($_FILES['fichero']['error'] <= 0 && array_search($_FILES['fichero']['type'], $tiposAceptados) && $_FILES['fichero']['size'] <= 1024 * 1024 * 1024 * 20) {
        move_uploaded_file($_FILES['fichero']['tmp_name'], "../res/" . $ruta );
        $daoResources->insertar($resource1);
    }
    
    $url_exito = "../view/asignatura.php?idSubject=" . $_POST['idSubject'];

}

header('Location: ' . $url_exito);


