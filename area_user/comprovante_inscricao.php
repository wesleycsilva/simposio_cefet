<?php session_start(); ?>
<?php include "menu_user.php" ?>
<?php require_once 'global_user.php' ?>
<?php require_once 'valida_login.php' ?>
<?php include "phpqrcode/qrlib.php";  ?>

<?php
try {
    $lista = Evento::listar();
    $format = new FuncaoUser();
    validaLogin();

} catch (Exception $e) {
    Erro::trataErro($e);
}
?>

    <div class="page-container">
        <?php include "header_user.php" ?>
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- MAP DATA-->
                            <div class="map-data m-b-40">
                                <h3 class="title-3 m-b-30">
                                    <i class="zmdi zmdi-map"></i>Russia</h3>
                                <div class="map-wrap">
                                    <div class="vmap" id="vmap5"></div>
                                </div>
                            </div>
                            <!-- END MAP DATA-->
                        </div>
                        <div class="col-md-6">
                            <!-- MAP DATA-->
                            <div class="map-data m-b-40">
                                <h3 class="title-3 m-b-30">
                                    <i class="zmdi zmdi-map"></i>Brazil</h3>
                                <div class="map-wrap">
                                    <div class="vmap" id="vmap6"></div>
                                </div>
                            </div>
                            <!-- END MAP DATA-->
                            <!-- END PAGE CONTAINER-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                                            href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cartModal">
                View Cart
            </button>
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
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-image">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Palestra</th>
                                <th scope="col">Horário</th>
                                <th scope="col">Palestrante</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="w-25">
                                    <div id="qrcode"></div>
<!--                                    <img id="aaaa" src="" class="img-fluid img-thumbnail" alt="Sheep">-->
                                </td>
                                <td>Concreto Reforçado com Fibras de Aço: Propriedades, Aplicações e Perspectivas para o Futuro</td>
                                <td>19:00 ÀS 20:10 HORAS</td>
                                <td>Prof. José Celso da Cunha</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <h5><span class="price text-info">Atenção:</span> não esqueça de levar o QRcode no dia do evento.</h5>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-success">Imprimir</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/qrcode.js"></script>
        <script type="text/javascript">
            var qrcode = new QRCode(document.getElementById("qrcode"), {
                text: " http://simposioengenhariacivil.com.br/confirma_presenca.php?idEvento=1&idSimposista=60&idInscricao=60",
                width: 128,
                height: 128,
                colorDark : "#000000",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
            });
        </script>
    </div>
<?php include "footer_user.php" ?>