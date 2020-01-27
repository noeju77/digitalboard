<?php

require_once "../library/conn.php";
require_once '../model/degree.php';

class daoDegree {

    public $conObj;
    public $conn;
    var $degree;

    //constructor 
    function __construct() {
        $this->conObj = new conn(); //instanciar el objeto
        $this->conn = $this->conObj->getConectar(); //llamo a las propiedades de la conexion
    }

    //vamos a trabajar en el crud (create,read,update, delete y list)

    public function insertar($objDegree) {


        //aqui paso del objeto degree a las variables individuales


        $idTypeDegree = $objDegree->getIdTypeDegree();
        $idFaculty = $objDegree->getIdFaculty();
        $name = $objDegree->getName();


        $sql = "INSERT INTO degree values(null,'$idTypeDegree','$idFaculty','$name')";
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
    public function read($objDegree) {


        //aqui paso del objeto degree a las variables individuales
        $idDegree = $objDegree->getIdDegree();
//ahora creo la sql que ejecutaré para eliminar datos 

        echo $sql = "SELECT * FROM degree where idDegree='$idDegree'";
        $objMySqlLi = $this->conn->query($sql);

        //ejecutamos la consulta y si da error imprimimos dicho error
        if ($objMySqlLi->num_rows != 1) {
            return false;
        } else {
            $arrayAux = mysqli_fetch_assoc($objMySqlLi);

            $objDegree->setIdDegree($arrayAux["idDegree"]);
            $objDegree->setIdTypeDegree($arrayAux["idTypeDegree"]);
            $objDegree->setIdFaculty($arrayAux["idFaculty"]);
            $objDegree->setName($arrayAux["name"]);
            //presentamos el mensaje de insercion con un alert
            return $objDegree;
        }

        //una vez consultado los datos, cerramos la conexion activa
        mysqli_close($this->conn);
    }

    public function eliminar($objDegree) {

        //aqui paso del objeto course a las variables individuales
        $idDegree = $objDegree->getIdDegree();

        //ahora creo la sql que ejecutaré para eliminar datos 

        echo $sql = "DELETE FROM degree WHERE idDegree='$idDegree'";
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



    public function modificar($objDegree) {


        //aqui paso del objeto degree a las variables individuales


        $idDegree = $objDegree->getIdDegree();
        $idTypeDegree = $objDegree->getIdTypeDegree();
        $idFaculty = $objDegree->getIdFaculty();
        $name = $objDegree->getName();



        //ahora creo la sql que ejecutaré para eliminar datos 

        $sql = "UPDATE degree SET idTypeDegree='$idTypeDegree',idFaculty='$idFaculty' , name ='$name'  WHERE idDegree='$idDegree'";
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

        $sql = "SELECT * FROM degree"; //un select general
        $resultado = $this->conn->query($sql); //guardo los resultados en una variable resultado
        //los datos los presentaremos en una table

        $arrayDegree = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {

            array_push($arrayDegree, $fila);
        }
        mysqli_close($this->conn); //cerramos la conexion activa
        return $arrayDegree;
    }

}
