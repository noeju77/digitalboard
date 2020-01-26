<?php

require_once "typeNews.php";
require_once "subject.php";
require_once "users.php";
class news {

    private $idNews;
    private $idTypeNews;
    private $idUsers;
    private $idSubject;
    private $title;
    private $content;
    private $publication;

    function __construct() {
        
    }

    function getIdNews() {
        return $this->idNews;
    }

    function getTitle() {
        return $this->title;
    }

    function getContent() {
        return $this->content;
    }

    function getPublication() {
        return $this->publication;
    }

    function setIdNews($idNews) {
        $this->idNews = $idNews;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setPublication($publication) {
        $this->publication = $publication;
    }

    public function __toString() {
        
    }

}
