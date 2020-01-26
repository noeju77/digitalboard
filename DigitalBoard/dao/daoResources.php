<?php

require_once '../model/resources.php';

class daoResources {

    public $conObj;
    public $conn;
    var $resources;

    //constructor 
    function __construct() {
        $this->conObj = new conn(); //instanciar el objeto
        $this->conn = $this->conObj->getConectar(); //llamo a las propiedades de la conexion
    }

    //vamos a trabajar en el crud (create,read,update, delete y list)

    public function insertar($objResources) {


        //aqui paso del objeto resources a las variables individuales

        $idTypeResources = $objResources->getIdTypeResources();
        $idSubject = $objResources->getIdSubject();
        $name = $objResources->getName();
        $uploadDate = $objResources->getUploadDate();
        $location = $objResources->getLocation();
        $visibility = $objResources->getVisibility();
        $folder = $objResources->getFolder();
        $sql = "INSERT INTO resources values(null,'$idTypeResources','$idSubject','$name','$uploadDate','$location','$visibility','$folder')";
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
    public function read($objResources) {


        //aqui paso del objeto resources a las variables individuales
        $idResources = $objResources->getIdResources();
//ahora creo la sql que ejecutaré para eliminar datos 

        echo $sql = "SELECT * FROM resources where idResources='$idResources'";
        $objMySqlLi = $this->conn->query($sql);

        //ejecutamos la consulta y si da error imprimimos dicho error
        if ($objMySqlLi->num_rows != 1) {
            return false;
        } else {
            $arrayAux = mysqli_fetch_assoc($objMySqlLi);

            $objResources->setIdResources($arrayAux["idResources"]);
            $objResources->setIdTypeResources($arrayAux["idTypeResources"]);
            $objResources->setIdSubject($arrayAux["idSubject"]);
            $objResources->setUploadDate($arrayAux["uploadDate"]);
            $objResources->setName($arrayAux["name"]);
            $objResources->setLocation($arrayAux["location"]);
            $objResources->setVisibility($arrayAux["visibility"]);
            $objResources->setFolder($arrayAux["folder"]);
            //presentamos el mensaje de insercion con un alert
            return $objResources;
        }

        //una vez consultado los datos, cerramos la conexion activa
        mysqli_close($this->conn);
    }

    public function eliminar($objResources) {

        //aqui paso del objeto resources a las variables individuales
        $idResources = $objResources->getIdResources();


        //ahora creo la sql que ejecutaré para eliminar datos 

        echo $sql = "DELETE FROM resources WHERE idResources='$idResources'";
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



    public function modificar($objResources) {


        //aqui paso del objeto resources a las variables individuales
        $idResources = $objResources->getIdResources();
        $idTypeResources = $objResources->getIdTypeResources();
        $idSubject = $objResources->getIdSubject();
        $name = $objResources->getName();
        $location = $objResources->getLocation();
        $visibility = $objResources->getVisibility();
        $folder = $objResources->getFolder();


        $sql = "UPDATE resources SET idTypeResources='$idTypeResources', idSubject ='$idSubject' ,name='$name' , 'location =$location','visibility =$visibility','folder =$folder' WHERE idResources='$idResources'";
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

        $sql = "SELECT * FROM resources"; //un select general
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
