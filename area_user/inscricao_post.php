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