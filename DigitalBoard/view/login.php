<?php
session_start();
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

    <body style="width: auto;">
        <div class="login-clean" style="background-color: #f4b903;">
            <form class="border rounded border-primary" method="post" action="../controller/controllerLogin.php">
                <h2 class="sr-only">Login Form</h2>
                <div data-bs-hover-animate="jello" class="illustration"><a href="index.html"><i class="icon-graduation" style="color: #114c5e;filter: contrast(100%);"></i></a>
                    <h1>DigitalBoard</h1>
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" data-toggle="tooltip" data-bs-tooltip="" data-placement="right" name="email" placeholder="Correo" title="Para acceder introduzca su correo">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" data-toggle="tooltip" data-bs-tooltip="" data-placement="right" name="password" placeholder="Contraseña" title="Para acceder introduzca su contraseña">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" role="button" value="Log In" name="login"/>

                </div>
                <a class="forgot" href="#">¿Ha olvidado su usuario o contraseña?</a>

                <?php if (isset($_SESSION["validation"]) && $_SESSION["validation"] === false && (isset($_SESSION["error"]))) { ?>
                    <div class="clearfix">&nbsp;</div>
                    <div class = "alert alert-danger" role = "alert">
                        <span><?php echo $_SESSION["error"]; ?></span>
                       
                    </div>
                <?php } ?>

            </form>

        </div>
        <footer class = "border rounded footer text-center">
            <div class = "container">
                <ul class = "list-inline mb-5">
                    <li class = "list-inline-item">&nbsp;
                        <a class = "text-white social-link rounded-circle" href = "https://www.facebook.com/digitalboard.pa.9" target = "_blank"><i class = "icon-social-facebook"></i></a></li>
                    <li class = "list-inline-item">&nbsp;
                        <a class = "text-white social-link rounded-circle" href = "https://twitter.com/Digitalboard1" target = "_blank"><i class = "icon-social-twitter"></i></a></li>
                    <li class = "list-inline-item">&nbsp;
                        <a class = "text-white social-link rounded-circle" href = "https://github.com/noeju77/digitalboard" target = "_blank"><i class = "icon-social-github"></i></a></li>
                    <li class = "list-inline-item">&nbsp;
                        <a class = "text-white social-link rounded-circle" href = "mailto: info@digitalboard.es" target = "_blank"><i class = "icon ion-email"></i></a></li>
                </ul>
                <p class = "text-muted mb-0 small">Copyright &nbsp;
                    © DigitalBoard Grupo 4 PA</p>
            </div><a class = "js-scroll-trigger scroll-to-top rounded" href = "#page-top"><i class = "fa fa-angle-up"></i></a></footer>
        <script src = "../assets/js/jquery.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/bs-init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="../assets/js/stylish-portfolio.js"></script>
        <script src="../assets/js/Navbar---Apple.js"></script>
    </body>

</html>
<?php
unset($_SESSION["validacion"]);
unset($_SESSION["error"]);
?>