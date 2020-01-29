<?php

include_once("../model/users.php");
include_once("../dao/daoUsers.php");

function filterByIdTypeUser($idTypeUser)
{
    $user1 = new users(); //instancio un obj de la clase usuario
    $user1->setIdTypeUsers($idTypeUser);

    $daoUsers = new daoUsers(); //instancio un obj de la clase daoUser

    return $daoUsers->readWithTypeUser($user1);
}