<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of typeEvaluation
 *
 * @author agarcas
 */
class typeEvaluation {
   private $idTypeEvaluation;
   private $name;
   private $description;
   function __construct() {
       
   }
   function getIdTypeEvaluation() {
       return $this->idTypeEvaluation;
   }

   function getName() {
       return $this->name;
   }

   function getDescription() {
       return $this->description;
   }

   function setIdTypeEvaluation($idTypeEvaluation) {
       $this->idTypeEvaluation = $idTypeEvaluation;
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
