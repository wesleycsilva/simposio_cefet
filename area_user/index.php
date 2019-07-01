<?php include "menu_user.php" ?>
<?php require_once 'valida_login.php' ?>
<?php
session_start();
validaLogin();

?>
<!-- PAGE CONTAINER-->
<div class="page-container">
    <?php include "header_user.php" ?>

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Programação</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="au-card m-b-40">
                            <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                <div class="bg-overlay bg-overlay--blue"></div>
                                <h3>
                                    <i class="zmdi zmdi-account-calendar"></i>08 Agosto, 2019</h3>
                            </div>
                            <div class="au-task js-list-load">
                                <div class="au-task__title">
                                    <p><strong>Local:</strong> Anfiteatro do Centro Federal de Educação Tecnológico
                                        de Minas Gerais,
                                        CEFETMG, Campus Varginha.</p>
                                </div>
                                <div class="au-task-list js-scrollbar3">
                                    <div class="au-task__item au-task__item--danger">
                                        <div class="au-task__item-inner">
                                            <h5 class="task">
                                                <a href="#">Recepção e Credenciamento</a>
                                            </h5>
                                            <span class="time">17:30 às 18:30 horas</span>
                                        </div>
                                    </div>
                                    <div class="au-task__item au-task__item--warning">
                                        <div class="au-task__item-inner">
                                            <h5 class="task">
                                                <a href="#">Jantar</a>
                                            </h5>
                                            <span class="time">17:30 às 18:30 horas</span>
                                        </div>
                                    </div>
                                    <div class="au-task__item au-task__item--primary">
                                        <div class="au-task__item-inner">
                                            <h5 class="task">
                                                <a href="#">Abertura do evento</a>
                                            </h5>
                                            <span class="time">18:50 às 19:00 horas</span>
                                            <p class="small">Profas. Denise de Carvalho Urashima e Mag Geisielly Alves
                                                Guimarães - Curso de Engenharia Civil, CEFETMG - Campus Varginha</p>
                                        </div>
                                    </div>
                                    <div class="au-task__item au-task__item--success">
                                        <div class="au-task__item-inner">
                                            <h5 class="task">
                                                <a href="#">Palestra 1: Construções Pré-Colombianas das Américas</a>
                                            </h5>
                                            <span class="time">19:00 às 20:10 horas</span>
                                            <p class="small">Prof. José Celso da Cunha - Engenheiro civil e escritor
                                                no âmbito de engenharia e arquitetura.</p>
                                        </div>
                                    </div>
                                    <div class="au-task__item au-task__item--danger">
                                        <div class="au-task__item-inner">
                                            <h5 class="task">
                                                <a href="#">Palestra 2: Concreto Reforçado com Fibras de Aço:
                                                    Propriedades, Aplicações e Perspectivas para o Futuro</a>
                                            </h5>
                                            <span class="time">20:30 às 21:40 horas</span>
                                            <p class="small">Eng. Romário de Souza Lima - Belgo Bekaert</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="au-task__footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="au-card m-b-40">
                            <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                <div class="bg-overlay bg-overlay--blue"></div>
                                <h3>
                                    <i class="zmdi zmdi-account-calendar"></i>09 Agosto, 2019</h3>
                            </div>
                            <div class="au-task js-list-load">
                                <div class="au-task__title">
                                    <p><strong>Local:</strong> Hall da Biblioteca do Centro Federal de Educação
                                        Tecnológico
                                        de Minas Gerais,
                                        CEFETMG, Campus Varginha.</p>
                                </div>
                                <div class="au-task-list js-scrollbar3">
                                    <div class="au-task__item au-task__item--danger">
                                        <div class="au-task__item-inner">
                                            <h5 class="task">
                                                <a href="#">Visita técnica 1: Pedreira Santo Antônio</a>
                                            </h5>
                                            <span class="time">14:30 às 16:30 horas</span>
                                        </div>
                                    </div>
                                    <div class="au-task__item au-task__item--warning">
                                        <div class="au-task__item-inner">
                                            <h5 class="task">
                                                <a href="#">Visita técnica 2: ECOVIA – Reciclagem de Resíduos da
                                                    Construção Civil Ltda.</a>
                                            </h5>
                                            <span class="time">14:30 às 16:30 horas</span>
                                        </div>
                                    </div>
                                    <div class="au-task__item au-task__item--primary">
                                        <div class="au-task__item-inner">
                                            <h5 class="task">
                                                <a href="#">Jantar</a>
                                            </h5>
                                            <span class="time">17:30 às 18:30 horas</span>
                                        </div>
                                    </div>
                                    <div class="au-task__item au-task__item--success">
                                        <div class="au-task__item-inner">
                                            <h5 class="task">
                                                <a href="#">Palestra 1: Inovações, Tecnologia e Sustentabilidade nas
                                                    Construções em Madeira</a>
                                            </h5>
                                            <span class="time">19:00 às 20:10 horas</span>
                                            <p class="small">Prof. Francisco Carlos Gomes - Universidade Federal de
                                                Lavras - UFLA</p>
                                        </div>
                                    </div>
                                    <div class="au-task__item au-task__item--danger">
                                        <div class="au-task__item-inner">
                                            <h5 class="task">
                                                <a href="#">Palestra 2: Resíduos Agroindustriais para a Produção de
                                                    Cimentos de Baixo Impacto Ambiental</a>
                                            </h5>
                                            <span class="time">20:30 às 21:40 horas</span>
                                            <p class="small">Prof. Conrado de Souza Rodrigues - Centro Federal de
                                                Educação Tecnológica de Minas Gerais (CEFETMG)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="au-task__footer">
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
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</div>
<?php include "footer_user.php" ?>

