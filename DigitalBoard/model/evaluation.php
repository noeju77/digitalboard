<?php

require_once "typeEvaluation.php";
require_once "subject.php";

class evaluation {

    private $idEvaluation;
    private $idSubject;
    private $idTypeEvaluation;
    private $name;
    private $visibility;
    function __construct() {
        
    }
    function getVisibility() {
        return $this->visibility;
    }

    function setVisibility($visibility) {
        $this->visibility = $visibility;
    }

        function getIdSubject() {
        return $this->idSubject;
    }

    function getIdTypeEvaluation() {
        return $this->idTypeEvaluation;
    }

    function setIdSubject($idSubject) {
        $this->idSubject = $idSubject;
    }

    function setIdTypeEvaluation($idTypeEvaluation) {
        $this->idTypeEvaluation = $idTypeEvaluation;
    }

        function getIdEvaluation() {
        return $this->idEvaluation;
    }

    function getName() {
        return $this->name;
    }

    function setIdEvaluation($idEvaluation) {
        $this->idEvaluation = $idEvaluation;
    }

    function setName($name) {
        $this->name = $name;
    }

    public function __toString() {
        
    }

}
