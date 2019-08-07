<?php require_once 'global.php' ?>
<?php require_once 'header.php' ?>

<?php
$idEvento = $_GET['idEvento'];
$idSimposista = $_GET['idSimposista'];
$idInscricao = $_GET['idInscricao'];
?>

    <main id="main">
        <section id="about">
            <div class="container">
                <div class="section-header">
                    <h3>Registro de Presença</h3>
                    <p>Por gentileza informe a senha abaixo!</p>
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
                                    <input type="password" class="form-control" name="senhaAdmin" id="senhaAdmin" placeholder="Administrador">
                                    <div class="validation"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="text-center all">
                                    <button type="button" title="Cadastrar" id="btnValidar" class="btn btn-info">Validar</button>
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
    $('#btnValidar').click(function () {
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
                controle: 'confirmar'
            }, success: function (msg) {
                if(msg == 200) {
                    window.location = 'validar_presenca_simposio.php?idEvento='+idEvento+'&idSimposista='+idSimposista+'&idInscricao='+idInscricao;
                } else {
                    alert(msg);
                }

            }
        });
    })
</script>