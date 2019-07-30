<?php require_once 'global_user.php' ?>
<?php require_once 'valida_login.php' ?>
<?php
session_start();
validaLogin();

try {
    $idSimposista = $_SESSION['idSimposista'];
    $simposista = new SimposistaUser($idSimposista);
    $mask = new FuncaoUser();

} catch (Exception $e) {
    Erro::trataErro($e);
}
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
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Meus Dados</div>
                                <div class="card-body">
                                    <div class="card-title">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nome</label>
                                                <input id="cc-pament" name="cc-payment" type="text"
                                                       class="form-control"
                                                       aria-required="true" aria-invalid="false"
                                                       value="<?= $simposista->nome ?>">
                                            </div>
                                        </div>
                                        <?php if($_SESSION['tipoSimposista']  == 1) : ?>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Matrícula</label>
                                                <input id="cc-pament" name="cc-payment" type="text"
                                                       class="form-control"
                                                       aria-required="true" aria-invalid="false"
                                                       value="<?= $simposista->matricula ?>">
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if($_SESSION['tipoSimposista']  == 2) : ?>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Instituição de Ensino</label>
                                                    <input id="cc-pament" name="cc-payment" type="text"
                                                           class="form-control"
                                                           aria-required="true" aria-invalid="false"
                                                           value="<?= $simposista->instituicao ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Cidade</label>
                                                    <input id="cc-pament" name="cc-payment" type="text"
                                                           class="form-control"
                                                           aria-required="true" aria-invalid="false"
                                                           value="<?= $simposista->cidade ?>">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif;?>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">E-mail</label>
                                                <input id="cc-pament" name="cc-payment" type="text"
                                                       class="form-control"
                                                       aria-required="true" aria-invalid="false"
                                                       value="<?= $simposista->email ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Telefone</label>
                                                <input id="cc-pament" name="cc-payment" type="text"
                                                       class="form-control"
                                                       aria-required="true" aria-invalid="false"
                                                       value="<?= $mask->maskTel($simposista->telefone) ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">CPF</label>
                                                <input id="cc-pament" name="cc-payment" type="text"
                                                       class="form-control"
                                                       aria-required="true" aria-invalid="false"
                                                       value="<?= $mask->maskCpf($simposista->cpf) ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">RG</label>
                                                <input id="cc-pament" name="cc-payment" type="text"
                                                       class="form-control"
                                                       aria-required="true" aria-invalid="false"
                                                       value="<?= $simposista->rg ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Data de
                                                    Nascimento</label>
                                                <input id="cc-pament" name="cc-payment" type="text"
                                                       class="form-control"
                                                       aria-required="true" aria-invalid="false"
                                                       value="<?= $mask->maskDataBr($simposista->dataNascimento) ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
</div>

<?php include "footer_user.php" ?>
