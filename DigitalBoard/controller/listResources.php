
<?php
include_once("../model/subject.php");
include_once("../dao/daoResources.php");

function listResourcesBySubject($idSubject){
    $objSubject = new subject();

    $objSubject->setIdCourse($idSubject);

    $daoResources = new daoResources();

    return $daoResources->listar($objSubject);
}
