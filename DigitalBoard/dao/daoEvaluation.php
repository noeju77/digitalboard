<?php

require_once "../library/conn.php";
require_once '../model/evaluation.php';

class daoDegree {

    public $conObj;
    public $conn;
    var $evaluation;

    //constructor 
    function __construct() {
        $this->conObj = new conn(); //instanciar el objeto
        $this->conn = $this->conObj->getConectar(); //llamo a las propiedades de la conexion
    }

    //vamos a trabajar en el crud (create,read,update, delete y list)

    public function insertar($objEvaluation) {


        //aqui paso del objeto evaluation a las variables individuales


        $idSubject = $objEvaluation->getIdSubject();
        $idTypeEvaluation = $objEvaluation->getIdTypeEvaluation();
        $name = $objEvaluation->getName();
        $visibility = $objEvaluation->getVisibility();

        $sql = "INSERT INTO evaluation values(null,'$idSubject','$idTypeEvaluation','$name','$visibility')";
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
    public function read($objEvaluation) {


        //aqui paso del objeto evaluation a las variables individuales
        $idEvaluation = $objEvaluation->getIdEvaluation();
//ahora creo la sql que ejecutaré para eliminar datos 

        echo $sql = "SELECT * FROM evaluation where idEvaluation='$idEvaluation'";
        $objMySqlLi = $this->conn->query($sql);

        //ejecutamos la consulta y si da error imprimimos dicho error
        if ($objMySqlLi->num_rows != 1) {
            return false;
        } else {
            $arrayAux = mysqli_fetch_assoc($objMySqlLi);

            $objEvaluation->setIdEvaluation($arrayAux["idEvaluation"]);
            $objEvaluation->setIdSubject($arrayAux["idSubject"]);
            $objEvaluation > setIdTypeEvaluation($arrayAux["idTypeEvaluation"]);
            $objEvaluation->setName($arrayAux["name"]);
            $objEvaluation->setVisibility($arrayAux["visibility"]);
            //presentamos el mensaje de insercion con un alert
            return $objEvaluation;
        }

        //una vez consultado los datos, cerramos la conexion activa
        mysqli_close($this->conn);
    }

    public function eliminar($objEvaluation) {

        //aqui paso del objeto evaluation a las variables individuales
        $idEvaluation = $objEvaluation->getIdEvaluation();

        //ahora creo la sql que ejecutaré para eliminar datos 

        echo $sql = "DELETE FROM evaluation WHERE idEvaluation='$idEvaluation'";
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



    public function modificar($objEvaluation) {


        //aqui paso del objeto evaluation a las variables individuales


        $idEvaluation = $objEvaluation->getIdEvaluation();
        $idTypeEvaluation = $objEvaluation->getIdTypeEvaluation();
        $idSubject = $objEvaluation->getIdSubject();
        $name = $objEvaluation->getName();
        $visibility = $objEvaluation->getVisibility();




        $sql = "UPDATE evaluation SET idTypeEvaluation='$idTypeEvaluation',idSubject='$idSubject' , name ='$name', visibility ='$visibility'  WHERE idEvaluation='$idEvaluation'";
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

        $sql = "SELECT * FROM evaluation"; //un select general
        $resultado = $this->conn->query($sql); //guardo los resultados en una variable resultado
        //los datos los presentaremos en una table

        $arrayEvaluation = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {

            array_push($arrayEvaluation, $fila);
        }
        mysqli_close($this->conn); //cerramos la conexion activa
        return $arrayEvaluation;
    }

}
