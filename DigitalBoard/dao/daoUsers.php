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
require_once "../model/users.php";

class daoUsers {

    public $conObj;
    public $conn;
    private $user;

    //constructor 
    function __construct() {
        $this->conObj = new conn(); //instanciar el objeto
        $this->conn = $this->conObj->getConectar(); //llamo a las propiedades de la conexion
        $user = new users();
    }

    //vamos a trabajar en el crud (create,read,update, delete y list)

    public function insertar($objUser) {


        //aqui paso del objeto Usuario a las variables individuales

        $idTypeUsers = $objUser->getIdTypeUsers();
        $name = $objUser->getName();
        $surnames = $objUser->getSurnames();
        $phone = $objUser->getPhone();
        $email = $objUser->getEmail();
        $password = $objUser->getPassword();
        $state = $objUser->getState();
        $image = 'default.jpeg';

        //ahora creo la sql que ejecutaré para insertar datos, 
        //se supone que cada variable ya tienen valores
        $sql = "insert into users values(null,'$idTypeUsers','$name','$surnames', '$phone','$email',SHA2('$password', 224),'$state','$image')";
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
    public function read($objUser) {


        //aqui paso del objeto Usuario a las variables individuales
        $idUsers = $objUser->getIdUsers();
//ahora creo la sql que ejecutaré para eliminar datos 

        echo $sql = "SELECT * FROM users where idUsers='$idUsers'";
        $objMySqlLi = $this->conn->query($sql);

        //ejecutamos la consulta y si da error imprimimos dicho error
        if ($objMySqlLi->num_rows != 1) {
            return false;
        } else {
            $arrayAux = mysqli_fetch_assoc($objMySqlLi);

            $objUser->setIdUsers($arrayAux["idUsers"]);
            $objUser->setIdTypeUsers($arrayAux["idTypeUsers"]);
            $objUser->setName($arrayAux["name"]);
            $objUser->setSurnames($arrayAux["surnames"]);
            $objUser->setPhone($arrayAux["phone"]);
            $objUser->setEmail($arrayAux["email"]);
            $objUser->setPassword($arrayAux["password"]);
            $objUser->setState($arrayAux["state"]);
            $objUser->setImage($arrayAux["image"]);
            //presentamos el mensaje de insercion con un alert
            return $objUser;
        }

        //una vez consultado los datos, cerramos la conexion activa
        mysqli_close($this->conn);
    }

    public function readWithTypeUser($objUser) {
        $idTypeUsers = $objUser->getIdTypeUsers();

        $sql = "SELECT * FROM users  WHERE idTypeUsers = '$idTypeUsers';";
        $resultado3 = $this->conn->query($sql); //guardo los resultados en una variable resultado
        //los datos los presentaremos en una table

        $arrayUserBySubject = array();
        while ($fila = mysqli_fetch_assoc($resultado3)) {

            array_push($arrayUserBySubject, $fila);
        }
        mysqli_close($this->conn); //cerramos la conexion activa
        return $arrayUserBySubject;
    }

    public function eliminar($objUser) {

        //aqui paso del objeto Usuario a las variables individuales
        $idUsers = $objUser->getIdUsers();

        //ahora creo la sql que ejecutaré para eliminar datos 

        echo $sql = "UPDATE users SET state = '1' WHERE idUsers = '$idUsers'";
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



    public function modificar($objUser) {


        //aqui paso del objeto Usuario a las variables individuales

        $idUsers = $objUser->getIdUsers();
        $idTypeUsers = $objUser->getIdTypeUsers();
        $name = $objUser->getName();
        $surnames = $objUser->getSurnames();
        $phone = $objUser->getPhone();
        $email = $objUser->getEmail();
        $state = $objUser->getState();
        $image = $objUser->getImage();


        //ahora creo la sql que ejecutaré para eliminar datos 

        $sql = "UPDATE users SET idTypeUsers='$idTypeUsers', name ='$name' , surnames ='$surnames',phone ='$phone',email='$email', state='$state',image='$image' WHERE idUsers='$idUsers'";
        //ejecutamos la consulta y si da error imprimimos dicho error
        if (!$this->conn->query($sql)) {
            mysqli_close($this->conn);
            print false;
        } else {
            mysqli_close($this->conn);
            return true;
        }
    }

    public function modificarWithPassword($objUser) {

        //aqui paso del objeto Usuario a las variables individuales

        $idUsers = $objUser->getIdUsers();
        $idTypeUsers = $objUser->getIdTypeUsers();
        $name = $objUser->getName();
        $surnames = $objUser->getSurnames();
        $phone = $objUser->getPhone();
        $email = $objUser->getEmail();
        $password = $objUser->getPassword();
        $state = $objUser->getState();
        $image = $objUser->getImage();


        //ahora creo la sql que ejecutaré para eliminar datos

        $sql = "UPDATE users SET idTypeUsers='$idTypeUsers', name ='$name' , surnames ='$surnames',phone ='$phone',email='$email',password = SHA2('$password', 224), state='$state',image='$image' WHERE idUsers='$idUsers'";
        //ejecutamos la consulta y si da error imprimimos dicho error
        if (!$this->conn->query($sql)) {
            mysqli_close($this->conn);
            print false;
        } else {
            mysqli_close($this->conn);
            return true;
        }

    }

//fin modificar
    //creamos la funcion consultar, la idea es hacer una consulta y mostrar los datos en una tabla
    //con los encabezados tal y como se llama en la bd

    public function listar() {

        $sql = "SELECT * FROM users WHERE state = 0"; //un select general
        $resultado = $this->conn->query($sql); //guardo los resultados en una variable resultado
        //los datos los presentaremos en una table

        $arrayUser = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {

            array_push($arrayUser, $fila);
        }
        mysqli_close($this->conn); //cerramos la conexion activa
        return $arrayUser;
    }

    public function listBySurnames() {

        $sql = "SELECT * FROM dbdatabase.users WHERE users.surnames = '$surnames'"; //un select general
        $resultado2 = $this->conn->query($sql); //guardo los resultados en una variable resultado
        //los datos los presentaremos en una table

        $arrayUserBySurnames = array();
        while ($fila = mysqli_fetch_assoc($resultado2)) {

            array_push($arrayUserBySurnames, $fila);
        }
        mysqli_close($this->conn); //cerramos la conexion activa
        return $arrayUserBySurnames;
    }

    public function listUsersBySubject() {

        $sql = "SELECT * FROM users u, subject s, users_has_subject uhs WHERE u.idUsers= uhs.idUsers AND uhs.idSubject = s.idSubject"; //un select general
        $resultado3 = $this->conn->query($sql); //guardo los resultados en una variable resultado
        //los datos los presentaremos en una table

        $arrayUserBySubject = array();
        while ($fila = mysqli_fetch_assoc($resultado3)) {

            array_push($arrayUserBySubject, $fila);
        }
        mysqli_close($this->conn); //cerramos la conexion activa
        return $arrayUserBySubject;
    }

//fin funcion listar....

    
//
//
//
    //como usuario es el que se loguea , login será una operacion mas de usuario


    function consultaLogin($user) {

        $sql = "SELECT u.*, tu.name AS typename FROM users u, typeusers tu WHERE tu.idTypeUsers=u.idTypeUsers AND email = '" . $user->getEmail() . "' AND password=SHA2('" . $user->getPassword() . "', 224) AND state = 0 LIMIT 1";
        $objUser = new users();
        $objTypeUsers = new typeUsers();
        $objMySqlLi = $this->conn->query($sql);

        $arrayAux = mysqli_fetch_assoc($objMySqlLi);

        //ejecutamos la consulta y si da error imprimimos dicho error               
        if ($objMySqlLi->num_rows != 1) {
            return false;
        } else {

            $objUser->setIdUsers($arrayAux["idUsers"]);
            $objUser->setIdTypeUsers($arrayAux["idTypeUsers"]);
            $objUser->setName($arrayAux["name"]);
            $objUser->setSurnames($arrayAux["surnames"]);
            $objUser->setPhone($arrayAux["phone"]);
            $objUser->setEmail($arrayAux["email"]);
            $objUser->setPassword($arrayAux["password"]);
            $objUser->setState($arrayAux["state"]);
            $objUser->setImage($arrayAux["image"]);

            $objTypeUsers->setIdTypeUsers($arrayAux["idTypeUsers"]);
            $objTypeUsers->setName($arrayAux["typename"]);

            $objUser->setObjTypeUsers($objTypeUsers);

            //presentamos el mensaje de insercion con un alert
            return $objUser;
        }
    }

}
