<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of typeSubject
 *
 * @author agarcas
 */
class typeSubject {
    private $idTypeSubjects;
    private $name;
    private $description;
    function __construct() {
        
    }
    function getIdTypeSubjects() {
        return $this->idTypeSubjects;
    }

    function getName() {
        return $this->name;
    }

    function getDescription() {
        return $this->description;
    }

    function setIdTypeSubjects($idTypeSubjects) {
        $this->idTypeSubjects = $idTypeSubjects;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    public function __toString() {
        
    }

}
