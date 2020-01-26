<?php

require_once "typeResources.php";
class typeResources {
  private $idTypeResources;
  private $name;
  private $description;
  function __construct() {
      
  }
  function getIdTypeResources() {
      return $this->idTypeResources;
  }

  function getName() {
      return $this->name;
  }

  function getDescription() {
      return $this->description;
  }

  function setIdTypeResources($idTypeResources) {
      $this->idTypeResources = $idTypeResources;
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
