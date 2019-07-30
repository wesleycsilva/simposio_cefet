<?php require_once 'global_user.php' ?>
<?php require_once 'valida_login.php' ?>
<?php
session_start();
validaLogin();

?>
<?php include "menu_user.php" ?>
<!-- PAGE CONTAINER-->
<div class="page-container">
    <?php include "header_user.php" ?>

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <form action="" method="Post" id="formUpdatePassword" name="formUpdatePassword" role="form"
                                  class="contactForm">
                                <div class="card-header">Alterar Senha</div>
                                <div class="card-body">
                                    <div class="card-title">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label for="senhaAtual" class="control-label mb-1">Senha atual</label>
                                                <input id="senhaAtual" name="senhaAtual" type="password"
                                                       class="form-control"
                                                       aria-required="true" aria-invalid="false">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label for="novaSenha" class="control-label mb-1">Nova senha</label>
                                                <input id="novaSenha" name="novaSenha" type="password"
                                                       class="form-control"
                                                       aria-required="true" aria-invalid="false">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label for="confirmacaoNovaSenha" class="control-label mb-1">Confirmação
                                                    nova senha</label>
                                                <input id="confirmacaoNovaSenha" name="confirmacaoNovaSenha"
                                                       type="password"
                                                       class="form-control"
                                                       aria-required="true" aria-invalid="false">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">
                                                    Alterar
                                                </button>
<!--                                                <button type="submit" title="Cadastrar" class="btn btn-info">Alterar-->
<!--                                                </button>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>© Copyright . Todos os direitos reservados. <br>Designed by <a href="#">Esposo da
                                Mag</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer_user.php" ?>