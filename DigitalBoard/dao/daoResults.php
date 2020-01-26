<?php

require_once '../model/results.php';

class daoResults {

    public $conObj;
    public $conn;
    var $results;

    //constructor 
    function __construct() {
        $this->conObj = new conn(); //instanciar el objeto
        $this->conn = $this->conObj->getConectar(); //llamo a las propiedades de la conexion
    }

    //vamos a trabajar en el crud (create,read,update, delete y list)

    public function insertar($objResults) {


        //aqui paso del objeto results a las variables individuales

        $idEvaluation = $objResults->getIdEvaluation();
        $score = $objResults->getScore();
        $visibility = $objResults->getVisibility();

        $sql = "INSERT INTO results values(null,'$idEvaluation','$score','$visibility')";
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
    public function read($objResults) {


        //aqui paso del objeto results a las variables individuales
        $idResults = $objResults->getIdResults();
//ahora creo la sql que ejecutaré para eliminar datos 

        echo $sql = "SELECT * FROM results where idResults='$idResults'";
        $objMySqlLi = $this->conn->query($sql);

        //ejecutamos la consulta y si da error imprimimos dicho error
        if ($objMySqlLi->num_rows != 1) {
            return false;
        } else {
            $arrayAux = mysqli_fetch_assoc($objMySqlLi);

            $objResults->setIdResults($arrayAux["idResults"]);
            $objResults->setIdEvaluation($arrayAux["idEvaluation"]);
            $objResults->seScore($arrayAux["score"]);
            $objResults->setVisibility($arrayAux["visibility"]);
            //presentamos el mensaje de insercion con un alert
            return $objResults;
        }

        //una vez consultado los datos, cerramos la conexion activa
        mysqli_close($this->conn);
    }

    public function eliminar($objResults) {

        //aqui paso del objeto results a las variables individuales
        $idResults = $objResults->getIdResults();


        //ahora creo la sql que ejecutaré para eliminar datos 

        echo $sql = "DELETE FROM results WHERE idNews='$idResults'";
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



    public function modificar($objResults) {


        //aqui paso del objeto results a las variables individuales

        $idResults = $objResults->getIdResults();
        $idEvaluation = $objResults->getIdEvaluation();
        $score = $objResults->getScore();
        $visibility = $objResults->getVisibility();


        $sql = "UPDATE results SET idResults='$idResults', idEvaluation ='$idEvaluation' ,score='$score',visibility='$visibility'  WHERE idResults='$idResults'";
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


    public function listar() {

        $sql = "SELECT * FROM results"; //un select general
        $resultado = $this->conn->query($sql); //guardo los resultados en una variable resultado
        //los datos los presentaremos en una table

        $arrayResults = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {

            array_push($arrayResults, $fila);
        }
        mysqli_close($this->conn); //cerramos la conexion activa
        return $arrayResults;
    }

}
