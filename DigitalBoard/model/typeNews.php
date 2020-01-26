<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of typeNews
 *
 * @author agarcas
 */
class typeNews {
   private $idTypeNews;
   private $name;
   private $description;
   function __construct() {
       
   }
   function getIdTypeNews() {
       return $this->idTypeNews;
   }

   function getName() {
       return $this->name;
   }

   function getDescription() {
       return $this->description;
   }

   function setIdTypeNews($idTypeNews) {
       $this->idTypeNews = $idTypeNews;
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
