<div class="col-lg-6">
    <div class="form">
        <h4>ENVIE-NOS UMA MENSAGEM</h4>
        <p>Em caso de alguma dúvida, entre em contato com a coordenação do Simpósio através do
            formulário abaixo.</p>
        <form action="" name="formContato" id="formContato" method="" role="form" class="contatoForm">
            <div class="form-group">
                <input type="text" name="nomeContato" class="form-control" id="nomeContato" placeholder="Seu Nome"
                       data-rule="minlen:10" data-msg="Por favor, insira pelo menos 10 caracteres"/>
                <!--                                <input type="hidden" name="action" id="action" value="contato">-->
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

<div class="modal fade" id="modalContato" tabindex="-1" role="dialog" aria-labelledby="modalContatoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalContatoLabel">Atenção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Sua mensagem foi enviada com sucesso. Obrigado!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalContatoErro" tabindex="-1" role="dialog" aria-labelledby="modalContatoErroLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalContatoErroLabel">Atenção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>A mensagem não pôde ser enviada. Por gentileza tente mais tarde!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/jquery/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
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

<script src="contactform/emailform.js"></script>

