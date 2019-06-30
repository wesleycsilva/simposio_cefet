<?php
require_once 'global_user.php';

try {

    $idEvento = $_POST['idEvento'];
    $idSimposista = $_POST['idSimposista'];
    $controle = $_POST['controle'];

    $inscricao = new Inscricao();

    $inscricao->idEvento = $idEvento;
    $inscricao->idSimposista = $idSimposista;
    $inscricao->urlQrCode = null;

    switch ($controle) {
        case "inscrever":
            $retorno = inserir($inscricao);
            break;
        case "cancelar":
            $retorno = cancelarInscricao($inscricao);
            break;
        default:
            break;
    }

    exit;

    return $retorno;

//    var_dump($retorno);exit;
//    array(2) { ["status"]=> string(3) "200" ["mensagem"]=> string(7) "Sucesso" }

    # TODO criar um mensagem com inscrição realizada com sucesso (modal) e dar um refresh na página
    header('Location: index.php');


} catch (Exception $e) {
    Erro::trataErro($e);
}

function inserir($inscricao)
{
    $inscricao->situacao = 1;
    $result = $inscricao->inserir();
    return $result;
}


function cancelarInscricao($inscricao)
{
    $inscricao->situacao = 2;
    $result = $inscricao->cancelaInscricao();
    return $result;
}