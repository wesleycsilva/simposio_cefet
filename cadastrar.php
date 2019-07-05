<?php require_once 'global.php' ?>
<?php require_once 'header.php' ?>
<?php require_once 'menu_cadastrar.php' ?>

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
                <form action="" method="" role="form" id="formCadastrar" name="formCadastrar" class="contactForm">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="controleRadios" id="alunosCefet" value="1">
                                <label class="form-check-label" for="alunosCefet">
                                    <strong>ALUNO CEFET/MG</strong>
                                </label>
                                <div class="validation"></div>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="controleRadios" id="publicoExterno" value="2">
                                <label class="form-check-label" for="publicoExterno">
                                    <strong>PÚBLICO EXTERNO</strong>
                                </label>
                                <div class="validation"></div>
                            </div>
                            <br>
                            <div class="form-group all">
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Seu Nome"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group aluno">
                                <input type="text" class="form-control" name="matricula" id="matricula" maxlength="12"
                                       placeholder="Matricula"></input>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group externo">
                                <input type="text" class="form-control" name="instituicao" id="instituicao"
                                       placeholder="Instituição de Ensino"></input>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group externo">
                                <input type="text" class="form-control" name="cidade" id="cidade"
                                       placeholder="Cidade da Instituição de Ensino"></input>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group all">
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Seu e-mail"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group all">
                                <input type="email" class="form-control" name="emailConfirmacao" id="emailConfirmacao"
                                       placeholder="Confirme seu e-mail"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group all">
                                <input type="date" class="form-control" name="dataNascimento" id="dataNascimento"
                                       placeholder="Data de nascimento"></input>
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group all">
                                <input type="text" name="cpf" class="form-control" id="cpf" maxlength="14"
                                       placeholder="CPF"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group all">
                                <input type="text" class="form-control" name="rg" id="rg" placeholder="RG"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group all">
                                <input type="text" class="form-control" name="telefone" id="telefone"
                                       placeholder="Telefone"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group all">
                                <input type="password" name="password" class="form-control" id="password"
                                       placeholder="Senha"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group all">
                                <input type="password" name="passwordConfirmacao" class="form-control"
                                       id="passwordConfirmacao" placeholder="Confirme sua senha"/>
                                <div class="validation"></div>
                            </div>
                            <div id="errormessage"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="text-center all">
                                <button type="submit" title="Cadastrar" class="btn btn-info">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastroLabel">Simpósio - CefetMG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Cadastro realizado com sucesso!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCadastroErro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroErroLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastroErroLabel">Simpósio - CefetMG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="textErro"></p>
<!--                <p id="textErro">Infelizmente ocorreu um problema ao realizar o seu cadastro. Por gentileza, tente novamente mais tarde!</p>-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<?php require_once 'rodape_cadastrar.php' ?>