<?php

require_once "../library/conn.php";
require_once '../model/users_has_Subject.php';
require_once "../model/users.php";
class daoUsers_has_Subject {

    public $conObj;
    public $conn;
    private $subject;

    //constructor
    function __construct() {
        $this->conObj = new conn(); //instanciar el objeto
        $this->conn = $this->conObj->getConectar(); //llamo a las propiedades de la conexion
    }

    public function insertarSubject($objUHS) {


        //aqui paso del objeto Usuario a las variables individuales

        $idUsers = $objUHS->getIdUsers();
        $idSubject = $objUHS->getIdSubject();


        //ahora creo la sql que ejecutaré para insertar datos, 
        //se supone que cada variable ya tienen valores
        $sql = "insert into users_has_subject values(null,'$idUsers','$idSubject')";
        //ejecutamos la consulta y si da error imprimimos dicho error
        if (!$this->conn->query($sql)) {
            return false;
        } else {

            return true;
        }
        //una vez insertado los datos, cerramos la conexion activa
        mysqli_close($this->conn);
    }

}
