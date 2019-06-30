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
                                <h5>I° Simpósio de Engenharia Civil</br> Materiais, Sustentabilidade e Inovações
                                    Tecnológicas </h5>
                                <p>O Simpósio será realizado nos dias <strong>08 e 09 de agosto de 2019</strong> no Centro Federal de
                                    Educação Tecnológica de Minas Gerais, Campus Varginha.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="footer-links">
                                <h4>Links</h4>
                                <ul>
                                    <li><a href="#about">Sobre</a></li>
                                    <li><a href="#team">Palestrantes</a></li>
                                    <li><a href="#features">Visitas Técnicas</a></li>
                                    <li><a href="#pricing">Programação</a></li>
                                    <li><a href="#services">Inscrições</a></li>
                                    <li><a href="#footer">Contato</a></li>
                                    <li><a href="login.php">Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form">
                        <h4>ENVIE-NOS UMA MENSAGEM</h4>
                        <p>Em caso de alguma dúvida, entre em contato com a coordenação do Simpósio através do
                            formulário abaixo.</p>
                        <form action="login_post.php?action=contato" method="post" role="form" class="contactForm">
                            <div class="form-group">
                                <input type="text" name="nomeContato" class="form-control" id="nomeContato" placeholder="Seu Nome"
                                       data-rule="minlen:10" data-msg="Por favor, insira pelo menos 10 caracteres"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="emailContato" id="emailContato"
                                       placeholder="Seu Email" data-rule="email"
                                       data-msg="Por favpr, insira um e-mail válido"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="assunto" id="assunto"
                                       placeholder="Assunto" data-rule="minlen:6"
                                       data-msg="Por favor, insira pelo menos 6 caracteres"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="mensagem" id="mensagem" rows="5" data-rule="required"
                                          data-msg="Por favor, escreva algo para nós" placeholder="Mensagem"></textarea>
                                <div class="validation"></div>
                            </div>

                            <div id="sendmessage">Sua mensagem foi enviada com sucesso. Obrigado!</div>
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