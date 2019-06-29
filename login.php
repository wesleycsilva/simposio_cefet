<?php require_once 'global.php' ?>
<?php require_once 'header.php' ?>
<?php require_once 'menu_cadastrar.php' ?>

<main id="main">
    <section id="about">
        <div class="container">
            <div class="section-header">
                <h3>Login</h3>
                <p>Preencha corretamente os campos abaixo e clique no botão entrar para acessar sua área e se inscrever nas atividades do Simpósio!</p>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h4 class="text-center">I° Simpósio de Engenharia Civil: Materiais, Sustentabilidade e Inovações Tecnológicas </h4>
                </div>
            </div>
            <div class="form">
                <form action="login_post.php?action=logar" method="post" role="form" class="contactForm">
                    <br>
                    <div class="row">
                        <div class="col-lg-4 col-md-4"></div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" id="email" placeholder="Seu e-mail"
                                       data-rule="email" data-msg="Por favor, digite um e-mail válido"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="senha" id="senha" required="required"
                                       data-rule="required"
                                       data-msg="Por favor, insira pelo menos 6 caracteres" placeholder="Sua Senha">
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" title="Cadastrar" class="btn btn-primary btn-block">Entrar
                                </button>
                            </div>
                            <div class="form-group text-right">
<!--                                <a href="#" data-toggle="modal" data-target="#modalLembrarSenha" class="text-info small btn-esqueci-minha-senha">-->
                                    <small class="semi-bold"> Clique aqui</small>
                                </a>
                                <small class="small">
                                    Esqueceu sua senha?
                                    <a href="#" data-toggle="modal" data-target="#modalLembrarSenha" class="text-info small"><strong>Clique aqui</strong></a>
                                </small>
                            </div>

                            <hr>
                            <div class="form-group text-center">
                                <small class="small">
                                    Não tem cadastro?
                                    <a href="cadastrar.php" class="text-warning small"><strong>Cadastre-se</strong></a>
                                </small>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<div class="modal fade" id="modalLembrarSenha" tabindex="-1" role="dialog" aria-labelledby="modalLembrarSenhaLabel"
     aria-hidden="true">
    <form method="POST" name="formLembrarSenha" id="formLembrarSenha" action="login_post.php?action=lembrar">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title text-warning" id="modalLembrarSenhaLabel">Esqueci minha senha</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row border-top border-bottom py-2 mb-2">
                            <div class="col-md-12 no-padding sm-p-l-10">
                                <p>Não lembra sua senha? Digite o e-mail cadastrado no campo abaixo, para
                                    receber sua nova senha!</p>
                            </div>
                        </div>
                        <div class="row py-2 mb-2">
                            <div class="form-group col-12">
                                <div class="col-md-12 no-padding sm-p-l-10">
                                    <label class="control-label">Email</label>
                                    <input type="text" class="form-control d-flex w-100" id="emailLembrarSenha" name="emailLembrarSenha">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top py-2 mb-2">
                            <div class="col-md-12 no-padding sm-p-l-10">
                                <p class="text-justify">Ao solicitar uma nova senha o site enviará a nova senha para
                                    o e-mail cadastrado, se não receber o e-mail na sua caixa de entrada verifique
                                    na sua caixa de lixo eletrônico (spam).</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php require_once 'rodape_cadastrar.php' ?>