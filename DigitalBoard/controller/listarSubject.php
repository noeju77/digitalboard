<?php

include_once("../dao/daoSubject.php");

function listAllSubject(){
    $daoSubject = new daoSubject();
    return $daoSubject->listar();
}
