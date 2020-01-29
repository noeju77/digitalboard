<?php

include_once("../model/news.php");
include_once("../dao/daoNews.php");

function listSiSystemNews(){
    $daoNews = new daoNews();

    $news = $daoNews->listar();

    $arrayNews = array();
    foreach ($news as $new){

        $objNew = new news();
        $objNew->setTitle($new['title']);
        $objNew->setContent($new['content']);

        array_push($arrayNews, $objNew);
    }

    return $arrayNews;
}



