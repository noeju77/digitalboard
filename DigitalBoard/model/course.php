<?php

require_once "degree.php";

class course {

    private $idCourse;
    private $idDegree;
    private $nivel;
    private $anyoAcademico;

    function __construct() {
        
    }

    function getIdCourse() {
        return $this->idCourse;
    }

    function getIdDegree() {
        return $this->idDegree;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getAnyoAcademico() {
        return $this->anyoAcademico;
    }

    function setIdCourse($idCourse) {
        $this->idCourse = $idCourse;
    }

    function setIdDegree($idDegree) {
        $this->idDegree = $idDegree;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setAnyoAcademico($anyoAcademico) {
        $this->anyoAcademico = $anyoAcademico;
    }

    public function __toString() {
        
    }

}
