<?php

include_once '../model/news.php';
include_once '../controller/listNews.php';

$modelNews1 = listSiSystemNews();

?>


<!DOCTYPE html>
<html lang="es">

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
        <section id="portfolio" class="content-section" style="padding: 29px;background-image: url(../assets/img/bg-masthead.jpg);height: 500px;">
            <div class="container" style="height: auto;width: auto;padding-right: 0px;padding-left: 0px;">
                <div class="content-section-heading text-center" style="height: auto;width: auto;">
                    <div class="content-section-heading text-center" style="height: auto;width: auto;"><i class="icon-graduation" style="font-size: 100px;"></i></div>
                    <h1 class="flex-wrap tada animated mb-5" style="margin: 0px;margin-bottom: 0px;font-size: 54px;margin-left: 0px;color: rgb(0,0,0);width: auto;height: auto;margin-top: 0px;padding: 0px;">DigitalBoard</h1>
                </div>
                <div class="content-section-heading text-center" style="height: 50;">
                    <h2 class="flex-wrap mb-5" style="margin: 0px;margin-bottom: 0px;font-size: 30px;margin-left: 0px;margin-top: 30px;">Con DigitalBoard estudiar es fácil....sobre todo PA.</h2><a class="btn btn-primary btn-xl js-scroll-trigger" role="button" href="../view/login.php" style="width: auto;height: auto;">Log In</a></div>
            </div>
        </section>
        <section id="portfolio" class="content-section" style="padding: 29px;">
            <div class="container">
                <div class="content-section-heading text-center">
                    <h2 class="mb-5">Noticias del campus</h2>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#">
                            <div class="caption">
                                <div class="caption-content">
                                    <h2><?php echo $modelNews1[0]->getTitle(); ?></h2>
                                    <p class="mb-0"><?php echo $modelNews1[0]->getContent(); ?></p>
                                </div>
                            </div><img class="img-fluid" src="../assets/img/portfolio-1.jpg"></a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#">
                            <div class="caption">
                                <div class="caption-content">
                                    <h2><?php echo $modelNews1[1]->getTitle(); ?></h2>
                                    <p class="mb-0"><?php echo $modelNews1[1]->getContent(); ?></p>
                                </div>
                            </div><img class="img-fluid" src="../assets/img/portfolio-2.jpg"></a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#">
                            <div class="caption">
                                <div class="caption-content">
                                    <h2><?php echo $modelNews1[2]->getTitle(); ?></h2>
                                    <p class="mb-0"><?php echo $modelNews1[2]->getContent(); ?><br></p>
                                </div>
                            </div><img class="img-fluid" src="../assets/img/portfolio-2.jpg"></a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#">
                            <div class="caption">
                                <div class="caption-content">
                                    <h2><?php echo $modelNews1[3]->getTitle(); ?></h2>
                                    <p class="mb-0"><?php echo $modelNews1[3]->getContent(); ?><br></p>
                                </div>
                            </div><img class="img-fluid" src="../assets/img/portfolio-1.jpg"></a>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer text-center">
            <div class="container">
                <ul class="list-inline mb-5">
                    <li class="list-inline-item">&nbsp;<a class="text-white social-link rounded-circle" href="https://www.facebook.com/digitalboard.pa.9" target="_blank"><i class="icon-social-facebook"></i></a></li>
                    <li class="list-inline-item">&nbsp;<a class="text-white social-link rounded-circle" href="https://twitter.com/Digitalboard1"><i class="icon-social-twitter"></i></a></li>
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
