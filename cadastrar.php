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
                <form action="cadastrar_post.php" method="post" role="form" id="formCadastrar" name="formCadastrar" class="contactForm">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Seu Nome"
                                       data-rule="minlen:10" data-msg="Por favor, insira pelo menos 10 caracteres"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="matricula" id="matricula" maxlength="12"
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
                                <input type="email" class="form-control" name="emailConfirmacao" id="emailConfirmacao"
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
                                <input type="text" name="cpf" class="form-control" id="cpf" maxlength="14" placeholder="CPF"
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
                                <input type="password" name="password" class="form-control" id="password"
                                       placeholder="Senha"
                                       data-rule="minlen:6" data-msg="Por favor, insira pelo menos 6 caracteres"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" name="passwordConfirmacao" class="form-control"
                                       id="passwordConfirmacao" placeholder="Confirme sua senha"
                                       data-rule="minlen:6" data-msg="Por favor, insira pelo menos 6 caracteres"/>
                                <div class="validation"></div>
                            </div>
                            <div id="errormessage"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="text-center">
                                <button type="submit" title="Cadastrar" class="btn btn-info">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php require_once 'rodape_cadastrar.php' ?>

<script>
    $(document).ready(function () {
        $('#cpf').mask("999.999.999-99");
        $('#telefone').mask("(99) 99999-9999");
        // dataPickerPeriodo('dataNascimento');

        // var validador = $('#formCadastrar').validate({
        //     rules: {
        //         edtSenhaAtual: {required: true},
        //         edtNovaSenha: {required: true},
        //         edtNovaSenhaAux: {required: true, equalTo: '#edtNovaSenha'}
        //     },
        //     messages: {
        //         edtSenhaAtual: {required: "* Senha atual é obrigatório!"},
        //         edtNovaSenha: {required: "* Nova senha é obrigatório!"},
        //         edtNovaSenhaAux: {required: "* Confirmação da senha é obrigatório!", equalTo: "* A senha e a confirmação não estão coincidindo!"}
        //     }
        // });
    });
</script>
