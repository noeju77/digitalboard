<?php
include_once '../model/users.php';

session_start();

//if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
//    header("Location: ../controller/controllerLogOut.php");
//}

/*
 * esto es para pruebas, borrar después
 * */
$modelUser = new users();
$modelUser->setEmail("jagarbar@alu.upo.es");
$modelUser->setImage("../assets/img/Retrato_JAGB_peque.jpg");

/*
 * Borrar hasya aquí
 * */

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

<body class="align-content-center">
<header>
    <nav class="navbar navbar-dark navbar-expand-md fixed-top navbar--apple" style="height: auto;width: auto;opacity: 1;filter: blur(0px);">
        <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#menu" style="margin-top: 5px;"><span class="sr-only">Toggle navigation</span><i class="icon-graduation" style="margin-right: 15px;font-size: 35px;"></i><span style="margin-right: 10px;">DigitalBoard</span><span class="navbar-toggler-icon"><i class="la la-navicon"></i></span></button>
            <div
                    class="collapse navbar-collapse" id="menu">
                <ul class="nav navbar-nav flex-grow-1 justify-content-between flex-nowrap" style="margin-top: 16px;">
                    <li class="nav-item d-none d-xs-block d-md-block" role="presentation"><a class="nav-link" data-bs-hover-animate="tada" href="principal.php"><i class="icon-graduation apple-logo" style="font-size: 50px;margin-top: -11px;padding-top: 0px;"></i><p>DigitalBoard</p></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" style="font-size: 20px;"><button onclick="javascript:window.history.back();" >Principal</button></a></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tooltip" data-bs-tooltip="" data-placement="bottom" href="usuario.php" style="font-size: 20px;" title="Personaliza tu perfil"><?php echo $modelUser->getEmail(); ?></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="width: 50px;"><img class="rounded img-fluid" src="<?php echo $modelUser->getImage(); ?>" width="40px" height="50px" style="margin-right: 30px;width: auto;height: auto;margin-top: -5px;"></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../controller/controllerLogOut.php" style="font-size: 20px;">Log Out</a></li>
                    <li class="nav-item d-none d-xs-block d-md-block" role="presentation"><a class="nav-link" href="#" style="margin-top: -5px;"><i class="icon ion-ios-search-strong" style="font-size: 30px;"></i></a></li>
                    <li class="nav-item d-none d-xs-block d-md-block" role="presentation"><a class="nav-link" href="https://www.upo.es/escuela-politecnica-superior/" target="_blank"><img style="width: 50px;height: 50px;margin-top: -10px;" src="../assets/img/Logo_UPO_EPS.jpg"></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="col d-flex flex-wrap" style="margin-right: 0px;margin-top: 150px;">
    <h1 style="margin-left: 10px;font-size: 30px;">Modificar Datos</h1>
</div>
<div class="col d-flex flex-wrap" style="margin-right: 0px;margin-top: 20px;">
    <div class="card shadow flex-row mb-3" style="margin-bottom: 0px;width: 510px;margin-left: 10px;">
        <div class="card-header py-3" style="width: 120px;">
            <p class="text-primary m-0 font-weight-bold">Cambiar teléfono</p>
        </div>
        <div class="card-body" style="width: 270px;">
            <form method="post" action="../model/controllerUser.php">
                <label for="city"><strong>Teléfono</strong><br></label><input class="form-control" type="tel" placeholder="Teléfono" value="<?php echo $modelUser->getPhone(); ?>" name="telefono" style="width: 150px;" minlength="9" maxlength="9">
                <button class="btn btn-primary" type="submit" style="margin: 0px;margin-top: 12px;" name="formPhone">Guardar</button>
            </form>
        </div>
    </div>
    <div class="card shadow d-flex d-xl-flex flex-row mb-3" style="margin-bottom: 0px;width: 510px;margin-left: 10px;">
        <div class="card-header py-3" style="width: 120px;">
            <p class="text-primary m-0 font-weight-bold">Cambiar contraseña</p>
        </div>
        <div class="card-body" style="width: 270px;">
            <form method="post" action="../model/controllerUser.php">
                <label for="city"><strong>Contraseña actual</strong><br></label>
                <input class="form-control" type="password" style="width: 150px;" name="password" placeholder="Contraseña actual">
                <label for="city"><strong>Nueva contraseña</strong><br></label>
                <input class="form-control" type="password" style="width: 150px;" name="password" placeholder="Contraseña actual">
                <label for="city"><strong>Vuelva a introducir nueva contraseña</strong><br></label>
                <input class="form-control" type="password" style="width: 150px;" name="password" placeholder="Contraseña actual">
                <button class="btn btn-primary" type="submit" style="margin: 0px;margin-top: 12px;" name="formPass">Guardar</button>
            </form>
        </div>
    </div>
    <div class="card shadow d-flex d-xl-flex flex-row mb-3" style="margin-bottom: 0px;width: 510px;margin-left: 9px;">
        <div class="card-header py-3" style="width: 120px;">
            <p class="text-primary m-0 font-weight-bold">Cambiar imagen</p>
        </div>
        <div class="card-body" style="width: 270px;"><label for="city"><strong>Imagen</strong><br></label>
            <form method="post" action="../model/controllerUser.php">
                <input class="bg-warning" type="file" style="width: 350px;" accept="image/*">
                <button class="btn btn-primary" type="submit" style="margin: 0px;margin-top: 12px;" name="formImage">Guardar</button>
            </form>
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
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="assets/js/stylish-portfolio.js"></script>
<script src="assets/js/Navbar---Apple.js"></script>
</body>

</html>