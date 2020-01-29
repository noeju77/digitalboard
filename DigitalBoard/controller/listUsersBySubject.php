
<?php

include_once("../model/users.php");
include_once("../dao/daoSubject.php");

function listSubjectByUser($user1){
    $daoUser = new daoSubject();

    return $daoUser->listByUser($user1);
}
