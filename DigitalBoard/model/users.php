<?php

require_once "typeUsers.php";

class users {

    private $idUsers;
    private $name;
    private $surnames;
    private $phone;
    private $email;
    private $password;
    private $state;
    private $idTypeUsers;
    private $objTypeUsers;
    private $image;

    function __construct() {
        
    }

    function getSurnames() {
        return $this->surnames;
    }

    function setSurnames($surnames) {
        $this->surnames = $surnames;
    }

    function getIdTypeUsers() {
        return $this->idTypeUsers;
    }

    function setIdTypeUsers($idTypeUsers) {
        $this->idTypeUsers = $idTypeUsers;
    }

    function getIdUsers() {
        return $this->idUsers;
    }

    function getName() {
        return $this->name;
    }

    function getPhone() {
        return $this->phone;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getState() {
        return $this->state;
    }

    function setIdUsers($idUsers) {
        $this->idUsers = $idUsers;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setState($state) {
        $this->state = $state;
    }

    function getObjTypeUsers() {
        return $this->objTypeUsers;
    }

    function setObjTypeUsers($objTypeUsers) {
        $this->objTypeUsers = $objTypeUsers;
    }

    function getImage() {
        return $this->image;
    }

    function setImage($image) {
        $this->image = $image;
    }

    public function __toString() {
        
    }

}
