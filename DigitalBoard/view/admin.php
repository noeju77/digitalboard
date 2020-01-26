<?php
include_once '../model/users.php';
include_once '../dao/daoUsers.php';
session_start();

if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header("Location: ../controller/controllerLogOut.php");
}
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>DigitalBoard</title>
        <link rel="icon" type="image/png" sizes="212x220" href="../assets/img/birrete.png">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic">
        <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
        <link rel="stylesheet" href="../assets/fonts/line-awesome.min.css">
        <link rel="stylesheet" href="../assets/fonts/simple-line-icons.min.css">
        <link rel="stylesheet" href="../assets/css/Bootstrap-Calendar.css">
        <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="../assets/css/Login-Form-Clean.css">
        <link rel="stylesheet" href="../assets/css/Navbar---Apple-1.css">
        <link rel="stylesheet" href="../assets/css/Navbar---Apple.css">
        <link rel="stylesheet" href="../assets/css/Navigation-with-Button.css">
        <link rel="stylesheet" href="../assets/css/Navigation-with-Search.css">
    </head>

    <body>
        <header>
            <nav class="navbar navbar-dark navbar-expand-md fixed-top navbar--apple" style="height: auto;width: auto;opacity: 1;filter: blur(0px);">
                <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#menu"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"><i class="la la-navicon"></i></span></button>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="nav navbar-nav flex-grow-1 justify-content-between flex-nowrap" style="margin-top: 16px;">
                            <li class="nav-item d-none d-xs-block d-md-block" role="presentation"><a class="nav-link" data-bs-hover-animate="tada" href="index.html"><i class="icon-graduation apple-logo" style="font-size: 50px;margin-top: -11px;padding-top: 0px;"></i><p>DigitalBoard</p></a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="font-size: 20px;">Mi institución</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="font-size: 20px;">Cursos</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="font-size: 20px;">Enlace1</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="font-size: 20px;">Enlace2</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tooltip" data-bs-tooltip="" data-placement="bottom" href="datos_usuario.html" style="font-size: 20px;" title="Personaliza tu perfil"><?php echo $_SESSION['user']->getName() . " : " . $_SESSION['user']->getEmail(); ?></a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="width: 50px;"><img class="rounded img-fluid" src="../assets/img/Retrato_JAGB_peque.jpg" width="40px" height="50px" style="margin-right: 30px;width: auto;height: auto;"></a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="../controller/controllerLogOut.php" style="font-size: 20px;">Log Out</a></li>
                            <li class="nav-item d-none d-xs-block d-md-block" role="presentation"><a class="nav-link" href="#"><i class="icon ion-ios-search-strong" style="font-size: 30px;"></i></a></li>
                            <li class="nav-item d-none d-xs-block d-md-block" role="presentation"><a class="nav-link" href="https://www.upo.es/escuela-politecnica-superior/" target="_blank"><img style="width: 50px;height: 50px;" src="../assets/img/Logo_UPO_EPS.jpg"></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div style="padding-top: 100px;padding-bottom: 100px;margin-top: 100px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>El usuario es <?php echo $_SESSION['user']->getObjTypeUsers()->getName(); ?></h2>
                        <h3>Menu</h3>
                        <?php
                        if ($_SESSION['user']->getObjTypeUsers()->getIdTypeUsers() == 1) {
                            echo "menu admin";
                            ?>
                            <ul type = "circle">
                                <li>usuarios</li>
                                <li>universidad</li>
                                <li>facultades</li>
                                <li>titulaciones</li>
                                <li>universidad</li>
                            </ul>
                            <?php
                        } elseif ($_SESSION['user']->getObjTypeUsers()->getIdTypeUsers() == 2) {
                            echo "menu profesor";
                            ?>
                            <ul type = "circle">
                                <li>alumnos</li>
                                <li>asignaturas 1</li>
                                <li>asignaturas 2</li>

                            </ul>
                            <?php
                        } elseif ($_SESSION['user']->getObjTypeUsers()->getIdTypeUsers() == 3) {
                            echo "menu alumno";
                            ?>
                            <ul type = "circle">
                                <li>asignaturas 1</li>
                                <li>asignaturas 2</li>

                            </ul>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="padding-top: 100px;padding-bottom: 97px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    <div style="padding-top: 100px;padding-bottom: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    <div style="padding-top: 100px;padding-bottom: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    <footer class="footer text-center">
        <div class="container">
            <ul class="list-inline mb-5">
                <li class="list-inline-item">&nbsp;<a class="text-white social-link rounded-circle" href="https://www.facebook.com/digitalboard.pa.9" target="_blank"><i class="icon-social-facebook"></i></a></li>
                <li class="list-inline-item">&nbsp;<a class="text-white social-link rounded-circle" href="https://twitter.com/Digitalboard1" target="_blank"><i class="icon-social-twitter"></i></a></li>
                <li class="list-inline-item">&nbsp;<a class="text-white social-link rounded-circle" href="https://github.com/noeju77/digitalboard" target="_blank"><i class="icon-social-github"></i></a></li>
                <li class="list-inline-item">&nbsp;<a class="text-white social-link rounded-circle" href="mailto: info@digitalboard.es" target="_blank"><i class="icon ion-email"></i></a></li>
            </ul>
            <p class="text-muted mb-0 small">Copyright &nbsp;© DigitalBoard Grupo 4 PA</p>
        </div><a class="js-scroll-trigger scroll-to-top rounded" href="#page-top"><i class="fa fa-angle-up"></i></a></footer>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../assets/js/stylish-portfolio.js"></script>
    <script src="../assets/js/Navbar---Apple.js"></script>
</body>

</html>