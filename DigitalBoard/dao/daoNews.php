<?php

require_once "../library/conn.php";
require_once '../model/news.php';

class daoNews
{

    public $conObj;
    public $conn;
    var $news;

    //constructor 
    function __construct()
    {
        $this->conObj = new conn(); //instanciar el objeto
        $this->conn = $this->conObj->getConectar(); //llamo a las propiedades de la conexion
    }

    //vamos a trabajar en el crud (create,read,update, delete y list)

    public function insertar($objNews)
    {


        //aqui paso del objeto news a las variables individuales

        $idTypeNews = $objNews->getIdTypeNews();
        $idUsers = $objNews->getIdUsers();
        $idSubject = $objNews->getIdSubject();
        $title = $objNews->getTitle();
        $content = $objNews->getContent();
        $publication = $objNews->getPublication();

        $sql = "INSERT INTO news values(null,'$idTypeNews','$idUsers','$idSubject','$title','$content','$publication')";
        //ejecutamos la consulta y si da error imprimimos dicho error
        if (!$this->conn->query($sql)) {
            return false;
        } else {

            return true;
        }
        //una vez insertado los datos, cerramos la conexion activa
        mysqli_close($this->conn);
    }

//fin insertar
    public function read($objNews)
    {


        //aqui paso del objeto news a las variables individuales
        $idNews = $objNews->getIdNews();
//ahora creo la sql que ejecutaré para eliminar datos 

        echo $sql = "SELECT * FROM news where idNews='$idNews'";
        $objMySqlLi = $this->conn->query($sql);

        //ejecutamos la consulta y si da error imprimimos dicho error
        if ($objMySqlLi->num_rows != 1) {
            return false;
        } else {
            $arrayAux = mysqli_fetch_assoc($objMySqlLi);

            $objNews->setIdNews($arrayAux["idNews"]);
            $objNews->setIdTypeNews($arrayAux["idTypeNews"]);
            $objNews->setIdUsers($arrayAux["idUsers"]);
            $objNews->setIdSubject($arrayAux["idSubject"]);
            $objNews->setTitle($arrayAux["title"]);
            $objNews->setContent($arrayAux["content"]);
            $objNews->setPublication($arrayAux["publication"]);
            //presentamos el mensaje de insercion con un alert
            return $objNews;
        }

        //una vez consultado los datos, cerramos la conexion activa
        mysqli_close($this->conn);
    }

    public function eliminar($objNews)
    {

        //aqui paso del objeto news a las variables individuales
        $idNews = $objNews->getIdNews();


        //ahora creo la sql que ejecutaré para eliminar datos 

        echo $sql = "DELETE FROM news WHERE idNews='$idNews'";
        //ejecutamos la consulta y si da error imprimimos dicho error
        if (!$this->conn->query($sql)) {
            return false;
        } else {
            //presentamos el mensaje de insercion con un alert
            return true;
        }
        //una vez eliminado los datos, cerramos la conexion activa
        mysqli_close($this->conn);
    }

//fin eliminar


    public function modificar($objNews)
    {


        //aqui paso del objeto news a las variables individuales

        $idNews = $objNews->getIdNews();
        $idTypeNews = $objNews->getIdTypeNews();
        $idUsers = $objNews->getIdUsers();
        $idSubject = $objNews->getIdSubject();
        $title = $objNews->getTitle();
        $content = $objNews->getContent();
        $publication = $objNews->getPublication();


        $sql = "UPDATE news SET idTypeNews='$idTypeNews', idUsers ='$idUsers' ,idSubject='$idSubject' ,title='$title' ,content='$content' ,publication='$publication' WHERE idNews='$idNews'";
        //ejecutamos la consulta y si da error imprimimos dicho error
        if (!$this->conn->query($sql)) {
            print false;
        } else {
            return true;
        }

        //una vez modificado los datos, cerramos la conexion activa
        mysqli_close($this->conn);
    }

//fin modificar


    public function listar()
    {

        $sql = "SELECT n.title, n.content FROM news n WHERE n.idTypeNews = 1 ORDER BY n.publication DESC LIMIT 4 ; "; //un select general
        $resultado = $this->conn->query($sql); //guardo los resultados en una variable resultado
        //los datos los presentaremos en una table

        $arrayNews = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {

            array_push($arrayNews, $fila);
        }
        mysqli_close($this->conn); //cerramos la conexion activa
        return $arrayNews;
    }

    public function filterBySubject($objSubject)
    {
        //aqui paso del objeto news a las variables individuales
        $idSubject = $objSubject->getIdSubject();

        $sql = " SELECT * FROM subject s , news n WHERE s.idSubject = n.idSubject AND n.idTypeNews = 2 AND s.idSubject='$idSubject'  ORDER BY n.publication DESC;";
        $resultado = $this->conn->query($sql); //guardo los resultados en una variable resultado
        //los datos los presentaremos en una table

        $arrayResources = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {
            array_push($arrayResources, $fila);
        }
        mysqli_close($this->conn); //cerramos la conexion activa
        return $arrayResources;
    }

    public function filterBySystem()
    {
        $sql = "SELECT * FROM news n WHERE  n.idTypeNews = 1 ORDER BY n.publication DESC;";
        $resultado = $this->conn->query($sql); //guardo los resultados en una variable resultado
        //los datos los presentaremos en una table

        $arrayResources = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {
            array_push($arrayResources, $fila);
        }
        mysqli_close($this->conn); //cerramos la conexion activa

        return $arrayResources;
    }

    public function fiterByUser($user){

        $idUsers = $user->getIdUsers();

        $sql = "SELECT s.name, n.title, n.content 
                FROM subject s, users_has_subject uhs, news n 
                WHERE s.idSubject = uhs.idSubject AND uhs.idSubject = n.idSubject AND n.idTypeNews = 2 
                    AND uhs.idUsers = $idUsers
                ORDER BY n.publication DESC;";

        $resultado = $this->conn->query($sql); //guardo los resultados en una variable resultado
        //los datos los presentaremos en una table

        $arrayResources = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {
            array_push($arrayResources, $fila);
        }
        mysqli_close($this->conn); //cerramos la conexion activa

        return $arrayResources;
    }

}
