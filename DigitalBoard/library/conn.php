<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class conn {

    private $host;
    private $user;
    private $pass;
    private $db;
    private $conn;

    function __construct() {
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->db = "dbdatabase";
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
    }

    function getConectar() {
        if ($this->conn->connect_errno) {
            return $this->conn->connect_error;
        }

        return $this->conn;
    }

    function getHost() {
        return $this->host;
    }

    function getUser() {
        return $this->user;
    }

    function getPass() {
        return $this->pass;
    }

    function getDb() {
        return $this->db;
    }

    function setHost($host) {
        $this->host = $host;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    function setDb($db) {
        $this->db = $db;
    }

    public function __toString() {
        
    }

}
