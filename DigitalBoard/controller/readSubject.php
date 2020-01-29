<?php

include_once("../model/subject.php");
include_once("../dao/daoSubject.php");

function readSubject($idSubject){
    $subject1 = new subject();
    $subject1->setIdSubject($idSubject);

    $daoSubject = new daoSubject();
    return $daoSubject->read($subject1);
}


