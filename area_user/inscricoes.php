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
                        <?php foreach ($lista as $linha):
                            $inscricao = new Inscricao();
                            $dadosInscricao = $inscricao->retornaInscricao($linha['idEvento'], $_SESSION['idSimposista']);
                            ?>
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
                                        <?php if ($dadosInscricao['idInscricao'] != null) :
                                            if ($dadosInscricao['situacao'] == 1) :?>
                                                <p class="text-muted m-b-15">
                                                    <strong>Situação:</strong> <span
                                                            class="text-success">Inscrição realizada</span>
                                                </p>
                                            <?php elseif ($dadosInscricao['situacao'] == 2) : ?>
                                                <p class="text-muted m-b-15">
                                                    <strong>Situação:</strong> <span
                                                            class="text-danger">Inscrição não realizada</span>
                                                </p>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <p class="text-muted m-b-15">
                                                <strong>Situação:</strong> <span
                                                        class="text-danger">Inscrição não realizada</span>
                                            </p>
                                        <?php endif; ?>
                                        <div class="card-body align-items-center">
                                            <?php
                                            $controleInscricao = '';
                                            $controleCancelar = 'disabled';
                                            if ($dadosInscricao['idInscricao'] != null) :
                                                if ($dadosInscricao['situacao'] == 1) : //inscricao ativa
                                                    $controleInscricao = 'disabled';
                                                    $controleCancelar = '';
                                                elseif ($dadosInscricao['situacao'] == 2) : //inscricao cancelada
                                                    $controleInscricao = '';
                                                    $controleCancelar = 'disabled';
                                                endif;
                                            endif; ?>
                                            <button type="button"
                                                    class="btn btn-outline-primary" <?= $controleInscricao ?>
                                                    onclick="inscricao(<?php echo $linha['idEvento'] ?>, <?php echo $_SESSION['idSimposista'] ?>);">
                                                <i class="fa fa-picture-o"></i>&nbsp; INSCREVER
                                            </button>
                                            <button type="button" class="btn btn-outline-success"
                                                    onclick="gerarQrCode(<?php echo $linha['idEvento'] ?>, <?php echo $_SESSION['idSimposista'] ?>);">
                                                <i class="fa fa-qrcode"></i>&nbsp; GERAR QRCODE
                                            </button>
                                            <button type="button"
                                                    class="btn btn-outline-danger" <?= $controleCancelar ?>
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

    <script src="vendor/sweetalert/sweetalert.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" rel="stylesheet">
    <!-- END PAGE CONTAINER-->
    <script>
        function inscricao(idEvento, idSimposista) {
            swal({
                    title: "Atenção",
                    text: "Deseja se inscrever neste evento?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Sim, me inscrever!",
                    cancelButtonText: "Não, cancelar!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "inscricao_post.php",
                            type: 'post',
                            data: {
                                idEvento: idEvento,
                                idSimposista: idSimposista,
                                controle: "inscrever"
                            }
                        }).done(function (msg) {
                            swal("Confirmado", "Inscrição foi relizada com sucesso!", "success");
                            setInterval(function () {
                                window.location.reload(); // this will run after every 5 seconds
                            }, 3000);
                        })

                    } else {
                        swal("Cancelar", "Sua inscrição não foi processada!", "error");
                    }
                });
        }

        function cancelarInscricao(idEvento, idSimposista) {

            swal({
                    title: "Atenção",
                    text: "Deseja realmente excluir sua inscrição?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Sim, desejo!",
                    cancelButtonText: "Não, cancelar!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "inscricao_post.php",
                            type: 'post',
                            data: {
                                idEvento: idEvento,
                                idSimposista: idSimposista,
                                controle: "cancelar"
                            },
                        }).done(function (msg) {
                            swal("Deletado!", "Insrição excluida com sucesso!", "success");
                            setInterval(function () {
                                window.location.reload(); // this will run after every 5 seconds
                            }, 3000);
                        })
                    } else {
                        swal("Cancelado", "Sua inscrição continua ativa!", "error");
                    }
                });
        }

        function gerarQrCode(idEvento, idSimposista) {
            swal("QrCode", "Disponível a partir do dia 01/08/2019!", "info")
        }

    </script>
<?php include "footer_user.php" ?>