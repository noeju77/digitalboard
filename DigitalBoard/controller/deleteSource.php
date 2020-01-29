<?php

include_once '../model/resources.php';
include_once '../dao/daoResources.php';

session_start();

$url_exito = "../view/asignatura.php?idSubject=" . $_GET['idSubject'];

$source1 = new resources();

$source1->setIdResources($_GET['idResource']);
$daoSources = new daoResources();

$eliminarOk = $daoSources->eliminar($source1);

header('Location: ' . $url_exito);