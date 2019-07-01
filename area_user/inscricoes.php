<?php include "menu_user.php" ?>
<?php require_once 'global_user.php' ?>
<?php require_once 'valida_login.php' ?>
<?php
try {
    $lista = Evento::listar();
    $format = new FuncaoUser();
    session_start();
    validaLogin();

} catch (Exception $e) {
    Erro::trataErro($e);
}
?>
    ?>
    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <?php include "header_user.php" ?>

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <?php foreach ($lista as $linha): ?>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <?php
                                        list($dataInicio, $horarioInicio) = explode(" ", $linha['dataHoraInicio']);
                                        list($dataFim, $horariFim) = explode(" ", $linha['dataHoraFinal']);
                                        list($ano, $mes, $dia) = explode("-", $linha['data']);
                                        if ($linha['descricao'] != "") {
                                            list($palestrante, $nota) = explode("-", $linha['informacoes']);
                                        }

                                        ?>
                                        <h4><?= $dia ?> de Agosto de <?= $ano ?>
                                            - <?= utf8_encode($linha['titulo']) ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted m-b-15">
                                            <strong>Local:</strong> <?= utf8_encode($linha['local']) ?>
                                        </p>
                                        <?php if ($linha['descricao'] != "") : ?>
                                            <p class="text-muted m-b-15">
                                                <strong>Palestra:</strong> <?= utf8_encode($linha['descricao']) ?></p>
                                        <?php else: ?>
                                            <p class="text-muted m-b-15">
                                                <strong>Empresa:</strong> <?= utf8_encode($linha['informacoes']) ?></p>
                                        <?php endif; ?>
                                        <p class="text-muted m-b-15"><strong>Horário:</strong> <?= $horarioInicio ?>
                                            às <?= $horariFim ?> horas</p>
                                        <?php if ($linha['descricao'] != "") : ?>
                                            <p class="text-muted m-b-15">
                                                <strong>Palestrante:</strong> <?= utf8_encode($palestrante) ?>
                                                <br>
                                                <span class="text-info"><?= utf8_encode($nota) ?></span>
                                            </p>
                                        <?php endif; ?>
                                        <div class="card-body align-items-center">
                                            <button type="button" class="btn btn-outline-primary"
                                                    onclick="inscricao(<?php echo $linha['idEvento'] ?>, <?php echo $_SESSION['idSimposista'] ?>);">
                                                <i class="fa fa-picture-o"></i>&nbsp; INSCREVER
                                            </button>
                                            <button type="button" class="btn btn-outline-success">
                                                <i class="fa fa-qrcode"></i>&nbsp; GERAR QRCODE
                                            </button>
                                            <button type="button" class="btn btn-outline-danger"
                                                    onclick="cancelarInscricao(<?php echo $linha['idEvento'] ?>, <?php echo $_SESSION['idSimposista'] ?>);">
                                                <i class="fa fa-times-circle-o"></i>&nbsp; CANCELAR INSCRIÇÃO
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
    <!-- END PAGE CONTAINER-->
    <script>
        function inscricao(idEvento, idSimposista) {
            $.ajax({
                url: "inscricao_post.php",
                type: 'post',
                data: {
                    idEvento: idEvento,
                    idSimposista: idSimposista,
                    controle: "inscrever"
                },
                beforeSend: function () {
                    // $("#resultado").html("ENVIANDO...");
                    alert('load');
                }
            })
                .done(function (msg) {
                    // $("#resultado").html(msg);
                    alert('resposta');
                })
                .fail(function (jqXHR, textStatus, msg) {
                    alert(msg);
                });
        }

        function cancelarInscricao(idEvento, idSimposista) {
            $.ajax({
                url: "inscricao_post.php",
                type: 'post',
                data: {
                    idEvento: idEvento,
                    idSimposista: idSimposista,
                    controle: "cancelar"
                },
                beforeSend: function () {
                    // $("#resultado").html("ENVIANDO...");
                    alert('load');
                }
            })
                .done(function (msg) {
                    // $("#resultado").html(msg);
                    alert('resposta');
                })
                .fail(function (jqXHR, textStatus, msg) {
                    alert(msg);
                });
        }
    </script>
<?php include "footer_user.php" ?>