<?php

include_once '../model/news.php';
include_once '../dao/daoNews.php';

session_start();

$url_exito = "../view/asignatura.php?idSubject=" . $_GET['idSubject'];

$new1 = new news();

$new1->setIdNews($_GET['idNews']);
$daoNews = new daoNews();

$eliminarOk = $daoNews->eliminar($new1);

header('Location: ' . $url_exito);
