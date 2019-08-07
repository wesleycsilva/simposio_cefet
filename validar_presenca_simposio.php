<?php require_once 'global.php' ?>
<?php require_once 'header.php' ?>
<?php require_once("area_user/classes/SimposistaUser.php"); ?>
<?php require_once("area_user/classes/Evento.php"); ?>
<?php require_once 'area_user/classes/ConexaoUser.php'; ?>

<?php
$idEvento = $_GET['idEvento'];
$idSimposista = $_GET['idSimposista'];
$idInscricao = $_GET['idInscricao'];

$simposista = new SimposistaUser();
$simposista->id = $idSimposista;

$simposista->carregar();

$evento = new Evento();
$evento->id = $idEvento;

$evento->carregar();
list($dataInicio, $horarioInicio) = explode(" ", $evento->dataHoraInicio);
list($dataFim, $horarioFim) = explode(" ", $evento->dataHoraFinal);
?>

    <main id="main">
        <section id="about">
            <div class="container">
                <div class="section-header">
                    <h3>Registro de Presença</h3>
                    <p>Confira os dados abaixo e confirme a presença do simposista!</p>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h4>I Simpósio de Engenharia Civil: Materiais, Sustentabilidade e Inovações Tecnológicas </h4>
                    </div>
                </div>
                <div class="form">
                    <form action="" method="" role="form" id="formValidar" name="formValidar" class="">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <br>
                                <div class="form-group aluno">
                                    <input type="hidden" class="form-control" name="idEvento" id="idEvento" value="<?= $idEvento?>"/>
                                    <input type="hidden" class="form-control" name="idInscricao" id="idInscricao" value="<?= $idInscricao?>"/>
                                    <input type="hidden" class="form-control" name="idSimposista" id="idSimposista" value="<?= $idSimposista?>"/>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong>Simposista:</strong> <?= $simposista->nome?></h5>
                                            <br>
                                            <p class="card-text"><strong>CPF: </strong><?= $simposista->cpf?></p>
                                            <p class="card-text"><strong>RG: </strong><?= $simposista->rg?></p>
                                            <br>
                                            <h5 class="card-title"><strong>Palestra:</strong> <?= utf8_encode($evento->descricao)?></h5>
                                            <br>
                                            <p class="card-text"><strong>Palestrante: </strong><?= utf8_encode($evento->informacoes)?></p>
                                            <p class="card-text"><strong>Data: </strong><?= date('d/m/Y', strtotime($evento->data))?></p>
                                            <p class="card-text"><strong>Horário: </strong><?= $horarioInicio . ' às ' . $horarioFim?></p>
                                            <button type="button" title="Cancelar" id="btnCancelar" class="btn btn-warning">Cancelar</button>
                                            <button type="button" title="Registrar Presença" id="btnRegistrar" class="btn btn-primary">Registrar Presença</button>
                                        </div>
                                    </div>
                                    <div class="validation"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
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

<!-- Template Main Javascript File -->
<script src="js/main.js"></script>

<script>
    $('#btnRegistrar').click(function () {
        var idEvento = $('#idEvento').val();
        var idSimposista =  $('#idSimposista').val();
        var idInscricao = $('#idInscricao').val();
        $.ajax({
            url: "confirma_presenca_post.php",
            type: 'post',
            data: {
                senhaAdmin: $('#senhaAdmin').val(),
                idEvento: idEvento,
                idSimposista: idSimposista,
                idInscricao: idInscricao,
                controle: 'registrar'
            }, success: function (msg) {
                if(msg == 200) {
                    alert('Presença confirmado com sucesso!');
                    window.location = 'index.php';
                } else {
                    alert(msg)
                    window.location = 'index.php';
                }
            }
        });
    })

    $('#btnCancelar').click(function () {
        window.location = 'index.php';
    })
</script>