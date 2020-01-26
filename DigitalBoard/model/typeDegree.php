<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of typeDegree
 *
 * @author agarcas
 */
class typeDegree {
    private $idTypeDegree;
    private $name;
    private $description;
    
    function __construct() {
        
    }
    function getIdTypeDegree() {
        return $this->idTypeDegree;
    }

    function getName() {
        return $this->name;
    }

    function getDescription() {
        return $this->description;
    }

    function setIdTypeDegree($idTypeDegree) {
        $this->idTypeDegree = $idTypeDegree;
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
