<?php

include_once '../dao/daoNews.php';
include_once '../model/users.php';

function listNewsByUser($user){
    $daoNews = new daoNews();

    return $daoNews->fiterByUser($user);
}
