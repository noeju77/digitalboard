<?php
require_once "evaluation.php";

class results {
   private $idResults;
   private $idEvaluation;
   private $score;
   private $visibility;
   function __construct() {
       
   }
   function getVisibility() {
       return $this->visibility;
   }

   function setVisibility($visibility) {
       $this->visibility = $visibility;
   }

      function getIdResults() {
       return $this->idResults;
   }

   function getIdEvaluation() {
       return $this->idEvaluation;
   }

   function getScore() {
       return $this->score;
   }

   function setIdResults($idResults) {
       $this->idResults = $idResults;
   }

   function setIdEvaluation($idEvaluation) {
       $this->idEvaluation = $idEvaluation;
   }

   function setScore($score) {
       $this->score = $score;
   }

   public function __toString() {
       
   }

}
