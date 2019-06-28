<!DOCTYPE html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>Simpósio Cefet</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700"
          rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">

<body>
<!--==========================
Header
============================-->
<header id="header">

    <div class="container">

        <div class="logo float-left">
            <!-- Uncomment below if you prefer to use an image logo -->
            <h1 class="text-light"><a href="#intro" class="scrollto"><span>I° Simpósio</span></a></h1>
            <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
            <ul>
<!--                <li class="active"><a href="#intro">Home</a></li>-->
                <li class="active"><a href="index.php#about">Sobre</a></li>
                <li><a href="index.php#team">Palestrantes</a></li>
                <li><a href="index.php#features">Visitas Técnicas</a></li>
                <li><a href="index.php#pricing">Programação</a></li>
                <li><a href="login.php">Inscrições</a></li>
<!--                <li><a href="#why-us">Ajuda</a></li>-->
                <li><a href="index.php#footer">Contato</a></li>
            </ul>
        </nav><!-- .main-nav -->

    </div>
</header><!-- #header -->

<!--==========================
  Intro Section
============================-->
<section id="intro" class="clearfix">
<div class="container d-flex h-90">
  <div class="row justify-content-center align-self-center">
    <div class="col-md-12 intro-info order-md-first order-last">
        <h5>I° Simpósio de Engenharia Civil</br> Materiais, Sustentabilidade e Inovações Tecnológicas </br>
          <span><strong>CEFET-MG</strong></span></h5> 
  
     <!--      <div>
      <a href="cadastrar.php" class="btn-get-started scrollto">Cadastre-se</a>
      </div>-->
    </div> 
    
    <div class="login-form">
     <form action="" method="post">
      <br>
            <h2 class="text-center">Sistema de Login</h2>       
          
            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email"  placeholder="Seu e-mail" data-rule="email" data-msg="Por favor, digite um e-mail válido" required="required"/>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha" data-rule="minlen:6" data-msg="Por favor, insira pelo menos 6 caracteres" required="required"/>
              <div class="validation"></div>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Logar</button>
            </div>
            <div class="clearfix">
                <!-- <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label> -->
                <a href="index.php#footer" class="pull-right">Esqueceu a Senha?</a>
            </div>        
        </form>
        <p class="text-center"><a href="cadastrar.php">Crie a sua Conta</a></p>
        <div id="errormessage" style="color: red;"></div>
    </div>

  </div>
</div>
</section><!-- #intro -->


<?php 
require_once("classes/Simposista.php");
$simposista = new Simposista();
  //verificar se clicou no botao
  if(isset($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    
    //verificar se está preenchido
    if (!empty($email) && !empty($senha)) {
    
      if ($simposista->logar($email, $senha)) {
        //header("location: inscricao.php");
        echo "<script>location.href='inscricao.php';</script>"; 
        exit;
          
        }
        else {         
          ?>
          <script type="text/javascript">
            errormessage.innerHTML = 'Erro : Email e/ou Senha incorretos!';
          </script>
          <?php
        }       
  
    }
    else {
      ?>
      <script type="text/javascript">
        errormessage.innerHTML = 'Erro : Preencha todos os campos!';
      </script>
      <?php
    }
  }

  ?>

<!--==========================
  Footer
============================-->
<footer id="footer" class="section-bg">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="footer-info">
                                <h5>I° Simpósio de Engenharia Civil</br> Materiais, Sustentabilidade e Inovações Tecnológicas  </h5>
                                <p>O Simpósio será realizado nos dias 08 e 09 de agosto de 2019 no Centro Federal de Educação Tecnológica de Minas Gerais, Campus Varginha.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="footer-links">
                                <h4>Links</h4>
                                <ul>
                                    <li class="active"><a href="index.php#intro">Home</a></li>
                                    <li><a href="index.php#about">Sobre</a></li>
                                    <li><a href="index.php#team">Palestrantes</a></li>
                                    <li><a href="index.php#features">Visitas Técnicas</a></li>
                                    <li><a href="index.php#pricing">Agenda</a></li>
                                    <li><a href="login.php">Inscrições</a></li>
                                    <li><a href="index.php#why-us">Ajuda</a></li>
                                    <li><a href="index.php#footer">Contato</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong></strong>. Todos os direitos reservados
        </div>
        <div class="credits">
            Designed by <a href="#">Esposo da Mag</a>
        </div>
    </div>
</footer>

<!-- #footer -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- Uncomment below i you want to use a preloader -->
<!-- <div id="preloader"></div> -->

<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/mobile-nav/mobile-nav.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/isotope/isotope.pkgd.min.js"></script>
<script src="lib/lightbox/js/lightbox.min.js"></script>
<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="js/main.js"></script>

</body>
</html>

