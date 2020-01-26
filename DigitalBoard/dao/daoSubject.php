<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of daoUser
 *
 * @author agarcas
 */
require_once "../library/conn.php";
require_once "../model/subject.php";
require_once "../model/users.php";
class daoSubject {

    public $conObj;
    public $conn;
    private $subject;

    //constructor 
    function __construct() {
        $this->conObj = new conn(); //instanciar el objeto
        $this->conn = $this->conObj->getConectar(); //llamo a las propiedades de la conexion
    }

    //vamos a trabajar en el crud (create,read,update, delete y list)

    public function insertar($objSubject) {


        //aqui paso del objeto subject a las variables individuales

        $idCourse = $objSubject->getIdCourse();
        $idTypeSubjects = $objSubject->getIdTypeSubjects();
        $name = $objSubject->getName();


        //ahora creo la sql que ejecutaré para insertar datos, 
        //se supone que cada variable ya tienen valores
        $sql = "INSERT INTO subject values(null,'$idCourse','$idTypeSubjects','$name')";
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
    public function read($objSubject) {


        //aqui paso del objeto subject a las variables individuales
        $idSubject = $objSubject->getIdSubject();
//ahora creo la sql que ejecutaré para eliminar datos 

        echo $sql = "SELECT * FROM subject where idSubject='$idSubject'";
        $objMySqlLi = $this->conn->query($sql);

        //ejecutamos la consulta y si da error imprimimos dicho error
        if ($objMySqlLi->num_rows != 1) {
            return false;
        } else {
            $arrayAux = mysqli_fetch_assoc($objMySqlLi);

            $objSubject->setIdSubject($arrayAux["idSubject"]);
            $objSubject->setIdCourse($arrayAux["idCourse"]);
            $objSubject->setIdTypeSubjects($arrayAux["idTypeSubjects"]);
            $objSubject->setName($arrayAux["name"]);

            //presentamos el mensaje de insercion con un alert
            return $objSubject;
        }

        //una vez consultado los datos, cerramos la conexion activa
        mysqli_close($this->conn);
    }

    public function eliminar($objSubject) {

        //aqui paso del objeto Subject a las variables individuales
        $idSubject = $objSubject->getIdSubject();

        //ahora creo la sql que ejecutaré para eliminar datos 

        echo $sql = "DELETE FROM subject WHERE idSubject='$idSubject'";
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



    public function modificar($objSubject) {


        //aqui paso del objeto subject a las variables individuales

        $idSubject = $objSubject->getIdSubject();
        $idCourse = $objSubject->getIdCourse();
        $idTypeSubjects = $objSubject->getIdTypeSubjects();
        $name = $objSubject->getName();


        //ahora creo la sql que ejecutaré para eliminar datos 

        $sql = "UPDATE subject SET idCourse='$idCourse','idTypeSubjects ='$idTypeSubjects', name ='$name'  WHERE idSubject='$idSubject'";
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
    //creamos la funcion consultar, la idea es hacer una consulta y mostrar los datos en una tabla
    //con los encabezados tal y como se llama en la bd

    public function listar() {

        $sql = "SELECT * FROM subject"; //un select general
        $resultado = $this->conn->query($sql); //guardo los resultados en una variable resultado
        //los datos los presentaremos en una table

        $arraySubject = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {

            array_push($arraySubject, $fila);
        }
        mysqli_close($this->conn); //cerramos la conexion activa
        return $arraySubject;
    }
    
    
//fin funcion listar....
}
