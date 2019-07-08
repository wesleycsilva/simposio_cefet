<?php require_once 'global_user.php' ?>
<?php
try {
    $idSimposista = $_SESSION['idSimposista'];
    $simposista = new SimposistaUser($idSimposista);
    $mask = new FuncaoUser();

} catch (Exception $e) {
    Erro::trataErro($e);
}
?>
<!-- HEADER DESKTOP-->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <div class="header-button">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?= $simposista->nome?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="../img/simposio_logo.png" alt="Simposio"/>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#"><?= $simposista->nome?></a>
                                        </h5>
                                        <span class="email"><?= $simposista->email?></span>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="sair.php">
                                        <i class="zmdi zmdi-power"></i>Sair</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER DESKTOP-->
