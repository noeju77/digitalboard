<?php

require_once "typeResources.php";
require_once "subject.php";

class resources {

    private $idResources;
    private $idTypeResources;
    private $idSubject;
    private $uploadDate;
    private $name;
    private $location;
    private $folder;
    private $visibility;

    function __construct() {
        
    }

    function getLocation() {
        return $this->location;
    }

    function getFolder() {
        return $this->folder;
    }

    public function getIdTypeResources()
    {
        return $this->idTypeResources;
    }

    public function setIdTypeResources($idTypeResources)
    {
        $this->idTypeResources = $idTypeResources;
    }

    public function getIdSubject()
    {
        return $this->idSubject;
    }

    public function setIdSubject($idSubject)
    {
        $this->idSubject = $idSubject;
    }

    function setLocation($location) {
        $this->location = $location;
    }

    function setFolder($folder) {
        $this->folder = $folder;
    }

    function getVisibility() {
        return $this->visibility;
    }

    function setVisibility($visibility) {
        $this->visibility = $visibility;
    }

    function getIdResources() {
        return $this->idResources;
    }

    function getUploadDate() {
        return $this->uploadDate;
    }

    function getName() {
        return $this->name;
    }

    function setIdResources($idResources) {
        $this->idResources = $idResources;
    }

    function setUploadDate($uploadDate) {
        $this->uploadDate = $uploadDate;
    }

    function setName($name) {
        $this->name = $name;
    }

    public function __toString() {
        
    }

}
