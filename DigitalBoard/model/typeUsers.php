<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of typeUsers
 *
 * @author agarcas
 */
class typeUsers {
  private $idTypeUsers;
  private $name;
  function __construct() {
      
  }
  function getName() {
      return $this->name;
  }

  function setName($name) {
      $this->name = $name;
  }

  function getIdTypeUsers() {
      return $this->idTypeUsers;
  }

  function setIdTypeUsers($idTypeUsers) {
      $this->idTypeUsers = $idTypeUsers;
  }

  public function __toString() {
      
  }

}
