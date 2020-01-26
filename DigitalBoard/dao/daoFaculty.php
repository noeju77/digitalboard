<?php

require_once '../model/faculty.php';

class daoFaculty {

    public $conObj;
    public $conn;
    var $faculty;

    //constructor 
    function __construct() {
        $this->conObj = new conn(); //instanciar el objeto
        $this->conn = $this->conObj->getConectar(); //llamo a las propiedades de la conexion
    }

    //vamos a trabajar en el crud (create,read,update, delete y list)

    public function insertar($objFaculty) {


        //aqui paso del objeto faculty a las variables individuales



        $idUniversity = $objFaculty->getIdUniverity();
        $name = $objFaculty->getName();
        $email = $objFaculty->getEmail();
        $location = $objFaculty->getLocation();
        $phone = $objFaculty->getPhone();


        $sql = "INSERT INTO faculty values(null,'$idUniversity','$name','$email','$location','$phone')";
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
    public function read($objFaculty) {


        //aqui paso del objeto faculty a las variables individuales
        $idFaculty = $objFaculty->getIdFaculty();
//ahora creo la sql que ejecutaré para eliminar datos 

        echo $sql = "SELECT * FROM faculty where idFaculty='$idFaculty'";
        $objMySqlLi = $this->conn->query($sql);

        //ejecutamos la consulta y si da error imprimimos dicho error
        if ($objMySqlLi->num_rows != 1) {
            return false;
        } else {
            $arrayAux = mysqli_fetch_assoc($objMySqlLi);

            $objFaculty->setIdFaculty($arrayAux["idFaculty"]);
            $objFaculty->setIdUniversity($arrayAux["idUniversity"]);
            $objFaculty->setName($arrayAux["name"]);
            $objFaculty->setEmail($arrayAux["email"]);
            $objFaculty->setLocation($arrayAux["location"]);
            $objFaculty->setPhone($arrayAux["phone"]);
            //presentamos el mensaje de insercion con un alert
            return $objFaculty;
        }

        //una vez consultado los datos, cerramos la conexion activa
        mysqli_close($this->conn);
    }

    public function eliminar($objFaculty) {

        //aqui paso del objeto faculty a las variables individuales
        $idFaculty = $objFaculty->getIdFaculty();


        //ahora creo la sql que ejecutaré para eliminar datos 

        echo $sql = "DELETE FROM faculty WHERE idFaculty='$idFaculty'";
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



    public function modificar($objFaculty) {


        //aqui paso del objeto faculty a las variables individuales


        $idFaculty = $objFaculty->getIdFaculty();
        $idUniversity = $objFaculty->getIdUniverity();
        $name = $objFaculty->getName();
        $email = $objFaculty->getEmail();
        $location = $objFaculty->getLocation();
        $phone = $objFaculty->getPhone();





        $sql = "UPDATE faculty SET idUniversity='$idUniversity', name ='$name' ,email='$email' ,location='$location' ,phone='$phone'  WHERE idFaculty='$idFaculty'";
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

        $sql = "SELECT * FROM faculty"; //un select general
        $resultado = $this->conn->query($sql); //guardo los resultados en una variable resultado
        //los datos los presentaremos en una table

        $arrayFaculty = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {

            array_push($arrayFaculty, $fila);
        }
        mysqli_close($this->conn); //cerramos la conexion activa
        return $arrayFaculty;
    }

}
