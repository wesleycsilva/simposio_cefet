<?php session_start(); ?>
<?php include "menu_user.php" ?>
<?php require_once 'global_user.php' ?>
<?php require_once 'valida_login.php' ?>
<?php
try {
    $lista = Evento::listar();
    $format = new FuncaoUser();
    validaLogin();

} catch (Exception $e) {
    Erro::trataErro($e);
}
?>
    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <?php include "header_user.php" ?>

        <!-- MAIN CONTENT-->
        <div class="main-content" id="conteudo">
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
                                        $palestranteString = 'false';
                                        if ($linha['descricao'] != "") {
                                            list($palestrante, $nota) = explode("-", $linha['informacoes']);
                                            $palestranteString = "'" . utf8_encode($palestrante) . "'";
                                        }
                                        $descricao = "'" . utf8_encode($linha['descricao']) . "'";
                                        $dataEvento = date('d/m/Y', strtotime($dataInicio));
                                        $dataString = "'" . $dataEvento . "'";
                                        $horarioInicioString = "'" . $horarioInicio . "'";
                                        $horariFimString = "'" . $horariFim . "'";
                                        $titulo = "'" . utf8_encode($linha['titulo']) . "'";
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
                                                    onclick="inscricao(<?php echo $linha['idEvento'] ?>, <?php echo $_SESSION['idSimposista'] ?>, <?php echo $dadosInscricao['idInscricao'] ?>);">
                                                <i class="fa fa-picture-o"></i>&nbsp; INSCREVER
                                            </button>
                                            <?php if ($dadosInscricao['idInscricao'] != null) :
                                                if ($dadosInscricao['situacao'] == 1) :?>
                                                    <button type="button" class="btn btn-outline-success"
                                                            onclick="gerarQrCode(<?php echo $linha['idEvento'] ?>, <?php echo $_SESSION['idSimposista'] ?>, <?php echo $_SESSION['tipoSimposista'] ?>, <?php echo $descricao ?>, <?php echo $palestranteString ?>, <?php echo $horarioInicioString ?>, <?php echo $horariFimString ?>, <?php echo $titulo ?>, <?php echo $dataString ?>);">
                                                        <i class="fa fa-qrcode"></i>&nbsp; GERAR QRCODE
                                                    </button>
                                                <?php endif;
                                            endif; ?>
                                            <button type="button"
                                                    class="btn btn-outline-danger" <?= $controleCancelar ?>
                                                    onclick="cancelarInscricao(<?php echo $linha['idEvento'] ?>, <?php echo $_SESSION['idSimposista'] ?>, <?php echo $_SESSION['tipoSimposista'] ?>);">
                                                <i class="fa fa-times-circle-o"></i>&nbsp; CANCELAR INSCRIÇÃO
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            unset($descricao);
                            unset($palestranteString);
                            unset($horarioInicioString);
                            unset($horariFimString);
                            unset($palestrante);
                        endforeach; ?>
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

    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">
                        I Simpósio de Engenharia Civil: Materiais, Sustentabilidade e Inovações Tecnológicas
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span id="spanClose" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-image">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th id="labelPalestra" scope="col"></th>
                            <th id="labelPalestrante" scope="col">Palestrante</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="w-25">
                                <div id="qrcode"></div>
                            </td>
                            <td id="palestra"></td>
                            <td id="palestrante"></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        <h4 id="dadosAgenda"></h4>
                    </div>
                    <br>
                    <div class="d-flex justify-content-end">
                        <h5><span class="price text-warning">*Atenção:</span> não esqueça de levar o QRcode no dia do
                            evento.</h5>
                    </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-between">
                    <button id="modalBtnClose" type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button id="modalBtnPrint" type="button" class="btn btn-success" onclick="imprimir()">Imprimir</button>
                </div>
            </div>
        </div>
    </div>

    <div class="printable"></div>

    <script src="vendor/sweetalert/sweetalert.js"></script>
    <script src="js/qrcode.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" rel="stylesheet">
    <!-- END PAGE CONTAINER-->
    <script>
        function inscricao(idEvento, idSimposista, tipoSimposista) {

            swal("Atenção!", "Inscrições Encerradas!", "warning");

        }

        function cancelarInscricao(idEvento, idSimposista, tipoSimposista) {

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
                                tipoSimposista: tipoSimposista,
                                controle: "cancelar"
                            },
                        }).done(function (msg) {
                            swal("Deletado!", "Insrição excluida com sucesso!", "success");
                            setInterval(function () {
                                window.location.reload();
                            }, 3000);
                        })
                    } else {
                        swal("Cancelado", "Sua inscrição continua ativa!", "error");
                    }
                });
        }

        function gerarQrCode(idEvento, idSimposista, idInscricao, descricao, palestrante, horarioInicial, HorarioFinal, titulo, dataString) {
            $('#labelPalestra').text('Palestra');
            $('#labelPalestrante').show();
            $('#labelPalestrante').text('Palestrante');
            $('#palestra').text(descricao);
            $('#data').text(dataString);
            $('#palestrante').text(palestrante);
            var horario = horarioInicial + ' as ' + HorarioFinal + ' horas';
            $('#qrcode').empty();

            $('#dadosAgenda').html('<span id="dataEvento" class="price text-info">Data:</span> ' + dataString + ' <br><span id="horarioEvento" class="price text-info">Horário:</span> ' + horario );

            if (descricao == '') {
                $('#labelPalestra').text('Visita Técnica');
            }

            if (palestrante == false) {
                $('#palestrante').text('');
                $('#palestra').text(titulo);
                $('#labelPalestrante').hide();
            }

            var qrcode = new QRCode(document.getElementById("qrcode"), {
                text: "http://simposioengenhariacivil.com.br/confirma_presenca.php?idEvento=" + idEvento + "&idSimposista=" + idSimposista + "&idInscricao=" + idInscricao,
                width: 128,
                height: 128,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });
            $('#cartModal').modal('show');
            // swal("QrCode", "Disponível a partir do dia 01/08/2019!", "info")
        }

        function imprimir() {

            $(".printable").html($("#cartModal").html());

            $(".printable").print({
                globalStyles: true,
                mediaPrint: false,
                stylesheet: 'http://localhost:90/simposio_cefet/area_user/css/print.css',
                noPrintSelector: "#modalBtnClose, #modalBtnPrint, #spanClose",
                iframe: true,
                append: null,
                prepend: null,
                manuallyCopyFormValues: true,
                deferred: $.Deferred(),
                timeout: 750,
                title: 'I Simpósio de Engenharia Civil: Materiais, Sustentabilidade e Inovações Tecnológicas',
                doctype: '<!doctype html>'
            });
        }

    </script>
<?php include "footer_user.php" ?>