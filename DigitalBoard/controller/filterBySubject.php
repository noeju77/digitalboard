<?php

include_once("../model/news.php");
include_once("../dao/daoNews.php");

function listNewsBySubject($idSubject){
    $subject1 = new subject();
    $subject1->setIdSubject($idSubject);
    $daoNews = new daoNews();
    return $daoNews->filterBySubject($subject1);
}



