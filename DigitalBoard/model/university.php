<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of unversity
 *
 * @author agarcas
 */
class university {
    private $idUniversity;
    private $name;
   private $ubicacion;
   private $email;
   private $phone;
   function __construct() {
       
   }
   function getIdUniversity() {
       return $this->idUniversity;
   }

   function setIdUniversity($idUniversity) {
       $this->idUniversity = $idUniversity;
   }

      function getName() {
       return $this->name;
   }

   function getUbicacion() {
       return $this->ubicacion;
   }

   function getEmail() {
       return $this->email;
   }

   function getPhone() {
       return $this->phone;
   }

   function setName($name) {
       $this->name = $name;
   }

   function setUbicacion($ubicacion) {
       $this->ubicacion = $ubicacion;
   }

   function setEmail($email) {
       $this->email = $email;
   }

   function setPhone($phone) {
       $this->phone = $phone;
   }

   public function __toString() {
       
   }

}
