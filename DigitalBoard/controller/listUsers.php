
<?php

include_once("../dao/daoUsers.php");

function listAllUsers(){
    $daoUsers = new daoUsers();

    return $daoUsers->listar();
}