<?php

require_once "../library/conn.php";

require_once "../model/course.php";

class daoCourse {

    public $conObj;
    public $conn;
    var $course;

    //constructor 
    function __construct() {
        $this->conObj = new conn(); //instanciar el objeto
        $this->conn = $this->conObj->getConectar(); //llamo a las propiedades de la conexion
    }

    //vamos a trabajar en el crud (create,read,update, delete y list)

    public function insertar($objCourse) {


        //aqui paso del objeto course a las variables individuales

        
        $idDegree = $objCourse->getIdDegree();
        $nivel = $objCourse->getNivel();
        $anyoAcademico = $objCourse->getAnyoAcademico();


        $sql = "INSERT INTO course values(null,'$idDegree','$nivel','$anyoAcademico')";
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
    public function read($objCourse) {


        //aqui paso del objeto course a las variables individuales
        $idCourse = $objCourse->getIdCourse();
//ahora creo la sql que ejecutaré para eliminar datos 

        echo $sql = "SELECT * FROM course where idCourse='$idCourse'";
        $objMySqlLi = $this->conn->query($sql);

        //ejecutamos la consulta y si da error imprimimos dicho error
        if ($objMySqlLi->num_rows != 1) {
            return false;
        } else {
            $arrayAux = mysqli_fetch_assoc($objMySqlLi);

            $objCourse->setIdCourse($arrayAux["idCourse"]);
            $objCourse->setIdDegree($arrayAux["idDegree"]);
            $objCourse->setNivel($arrayAux["nivel"]);
            $objCourse->setAnyoAcademico($arrayAux["anyoAcademico"]);
            //presentamos el mensaje de insercion con un alert
            return $objCourse;
        }

        //una vez consultado los datos, cerramos la conexion activa
        mysqli_close($this->conn);
    }

    public function eliminar($objCourse) {

        //aqui paso del objeto course a las variables individuales
        $idCourse = $objCourse->getIdCourse();

        //ahora creo la sql que ejecutaré para eliminar datos 

        echo $sql = "DELETE FROM course WHERE idCourse='$idCourse'";
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



    public function modificar($objCourse) {


        //aqui paso del objeto course a las variables individuales


        $idCourse = $objCourse->getIdCourse();
        $idDegree = $objCourse->getIdDegree();
        $nivel = $objCourse->getNivel();
        $anyoAcademico = $objCourse->getAnyoAcademico();


        //ahora creo la sql que ejecutaré para eliminar datos 

        $sql = "UPDATE course SET idDegree='$idDegree', nivel ='$nivel', anyoAcademico = '$anyoAcademico'  WHERE idCourse='$idCourse'";
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

        $sql = "SELECT * FROM course"; //un select general
        $resultado = $this->conn->query($sql); //guardo los resultados en una variable resultado
        //los datos los presentaremos en una table

        $arrayCourse = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {

            array_push($arrayCourse, $fila);
        }
        mysqli_close($this->conn); //cerramos la conexion activa
        return $arrayCourse;
    }

//fin funcion listar....
}
