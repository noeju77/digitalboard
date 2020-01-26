<?php
require_once "users.php";
require_once "subject.php";
class users_has_Subject {
   private $idUsershasSubject;
   private $idUsers;
   private $idSubject;
   function __construct() {
       
   }
   function getIdUsershasSubject() {
       return $this->idUsershasSubject;
   }

   function getIdUsers() {
       return $this->idUsers;
   }

   function getIdSubject() {
       return $this->idSubject;
   }

   function setIdUsershasSubject($idUsershasSubject) {
       $this->idUsershasSubject = $idUsershasSubject;
   }

   function setIdUsers($idUsers) {
       $this->idUsers = $idUsers;
   }

   function setIdSubject($idSubject) {
       $this->idSubject = $idSubject;
   }

   public function __toString() {
       
   }

}
