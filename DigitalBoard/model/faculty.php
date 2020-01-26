<?php

require_once "university.php";

class faculty {

    private $idFaculty;
    private $idUniversity;
    private $name;
    private $location;
    private $phone;

    function __construct() {
        
    }
    function getIdUniversity() {
        return $this->idUniversity;
    }

    function setIdUniversity($idUniversity) {
        $this->idUniversity = $idUniversity;
    }

        function getIdFaculty() {
        return $this->idFaculty;
    }

    function getName() {
        return $this->name;
    }

    function getLocation() {
        return $this->location;
    }

    function getPhone() {
        return $this->phone;
    }

    function setIdFaculty($idFaculty) {
        $this->idFaculty = $idFaculty;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setLocation($location) {
        $this->location = $location;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    public function __toString() {
        
    }

}
