<?php

include_once '../model/users.php';
include_once '../model/subject.php';
include_once '../dao/daoSubject.php';
include_once '../dao/daoUsers_has_Subject.php';

session_start();

$url_exito = "../view/admin.php";

$subject1 = new subject();

$subject1->setIdCourse($_POST["curso"]);
$subject1->setName($_POST["nombre"]);
$subject1->setIdTypeSubjects($_POST["TipoAsignatura"]);

$daoSubject = new daoSubject();

$daoSubject->insertar($subject1);

$listStudents = $_POST['alumnos'];
$listTeachers = $_POST['profesores'];

$uhs1 = new users_has_Subject();

$subject1->getIdSubject();

$subject2 = $daoSubject->readWithoutId($subject1);

$uhs1->setIdSubject($subject2->getIdSubject());

$daoUHS = new daoUsers_has_Subject();

foreach ($listStudents as $student){

    $uhs1->setIdUsers($student);

    $daoUHS->insertarSubject($uhs1);
}

foreach ($listTeachers as $teacher){

    $uhs1->setIdUsers($teacher);

    $daoUHS->insertarSubject($uhs1);
}

header('Location: ' . $url_exito); //se va a la pantalla de admin sin errores


