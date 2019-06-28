<?php 
require_once("classes/Simposista.php");
$simposista = new Simposista();
require_once("classes/Funcao.php");
$funcao = new Funcao();
 ?>
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
</head>
<body>
<!--==========================
Header
============================-->
<header id="header">

    <div class="container">

        <div class="logo float-left">
            <!-- Uncomment below if you prefer to use an image logo -->
            <h1 class="text-light"><a href="index.php#intro" class="scrollto"><span>I° Simpósio</span></a></h1>
            <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
            <ul>
                <li class="active"><a href="index.php#intro">Home</a></li>
                <li><a href="index.php#about">Sobre</a></li>
                <li><a href="index.php#team">Palestrantes</a></li>
                <li><a href="index.php#features">Visitas Técnicas</a></li>
                <li><a href="index.php#pricing">Agenda</a></li>
                <li><a href="index.php#services">Inscrições</a></li>
                <li><a href="index.php#why-us">Ajuda</a></li>
                <li><a href="#footer">Contato</a></li>
            </ul>
        </nav><!-- .main-nav -->

    </div>
</header><!-- #header -->


<main id="main">
<section id="about">
  <div class="container">
  <div class="section-header">
      <h3>Cadastre-se</h3>
      <p>Cadastre-se para se inscrever nas atividades do Simpósio!</p>
  </div>
  <div class="row">
      <div class="col-lg-12 col-md-12">
          <h4>I° Simpósio de Engenharia Civil: Materiais, Sustentabilidade e Inovações Tecnológicas </h4>
          <p>Para facilitar sua inscrição, por favor, cadastre-se.</p>
      </div>
  </div>
  <div class="form">
    <form action="classes/cadastrarSimposista.php" method="POST" role="form" class="contactForm">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="form-group">
              <input type="text" name="nome" class="form-control" id="nome" placeholder="Seu Nome"
                     data-rule="minlen:10" data-msg="Por favor, insira pelo menos 10 caracteres"/>
              <div class="validation"></div>
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="matricula" id="matricula"
                     data-rule="required"
                     data-msg="Por favor, insira sua matrícula" placeholder="Matricula"></input>
              <div class="validation"></div>
          </div>
          <div class="form-group">
              <input type="email" class="form-control" name="email" id="email"
                     placeholder="Seu e-mail"
                     data-rule="email" data-msg="Por favor, digite um e-mail válido"/>
              <div class="validation"></div>
          </div>
          <div class="form-group">
              <input type="email" class="form-control" name="confirmaEmail" id="confirmaEmail"
                     placeholder="Confirme seu e-mail" data-rule="email"
                     data-msg="Por favor, digite um e-mail válido"/>
              <div class="validation"></div>
          </div>
          <div class="form-group">
              <input type="date" class="form-control" name="dataNascimento" id="dataNascimento"
                     data-rule="required"
                     data-msg="Por favor, digite um data válida"
                     placeholder="Data de nascimento"></input>
              <div class="validation"></div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="form-group">
              <input type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF"  
                     data-rule="minlen:11" data-msg="Por favor, digite um CPF válido"/>
              <div class="validation"></div>
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="rg" id="rg" placeholder="RG"
                     data-rule="required" data-msg="Por favor, digite um RG válido"/>
              <div class="validation"></div>
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="telefone" id="telefone"
                     placeholder="Telefone" data-rule="minlen:11"
                     data-msg="Por favor, digite um número de celular válido"/>
              <div class="validation"></div>
          </div>
          <div class="form-group">
              <input type="password" name="senha" class="form-control" id="senha"
                     placeholder="Senha"
                     data-rule="minlen:6" data-msg="Por favor, insira pelo menos 6 caracteres"/>
              <div class="validation"></div>
          </div>
          <div class="form-group">
            <input type="password" name="confirmaSenha" class="form-control"
                   id="confirmaSenha" placeholder="Confirme sua senha"
                   data-rule="minlen:6" data-msg="Por favor, insira pelo menos 6 caracteres"/>
            <div class="validation"></div>
          </div>
          <div id="errormessage"></div>     
        </div>        
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <br>
        <div class="text-center">
          <button type="submit" title="cadastrar" class="btn btn-info">Cadastrar</button>
        </div>
        </div>
      </div>
    </form>
  </div>
  </div>
</section>
</main>

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
                                    <li><a href="index.php#services">Inscrições</a></li>
                                    <li><a href="index.php#why-us">Ajuda</a></li>
                                    <li><a href="index.php#footer">Contato</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form">
                        <h4>ENVIE-NOS UMA MENSAGEM</h4>
                        <p>Em caso de alguma dúvida, entre em contato com a coordenação do Simpósio através do formulário abaixo.</p>
                        <form action="" method="post" role="form" class="contactForm">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Seu Nome"
                                       data-rule="minlen:4" data-msg="Please enter at least 4 chars"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Seu Email" data-rule="email"
                                       data-msg="Please enter a valid email"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject"
                                       placeholder="Assunto" data-rule="minlen:4"
                                       data-msg="Please enter at least 8 chars of subject"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required"
                                          data-msg="Please write something for us" placeholder="Mensagem"></textarea>
                                <div class="validation"></div>
                            </div>

                            <div id="sendmessage">Your message has been sent. Thank you!</div>
                            <div id="errormessage"></div>

                            <div class="text-center">
                                <button type="submit" title="Send Message">Enviar Mensagem</button>
                            </div>
                        </form>
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

