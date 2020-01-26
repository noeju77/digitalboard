<?php

require_once "typeDegree.php";
require_once "faculty.php";

class degree {

    private $idDegree;
    private $idTypeDegree;
    private $idFaculty;
    private $name;

    function __construct() {
        
    }

    function getIdTypeDegree() {
        return $this->idTypeDegree;
    }

    function getIdFaculty() {
        return $this->idFaculty;
    }

    function setIdTypeDegree($idTypeDegree) {
        $this->idTypeDegree = $idTypeDegree;
    }

    function setIdFaculty($idFaculty) {
        $this->idFaculty = $idFaculty;
    }

    function getIdDegree() {
        return $this->idDegree;
    }

    function getName() {
        return $this->name;
    }

    function setIdDegree($idDegree) {
        $this->idDegree = $idDegree;
    }

    function setName($name) {
        $this->name = $name;
    }

    public function __toString() {
        
    }

}
