<?php
require_once 'global_user.php';

try {

    $idEvento = $_POST['idEvento'];
    $idSimposista = $_POST['idSimposista'];
    $controle = $_POST['controle'];
    $tipoSimposista = 1;

    if(!empty($_POST['tipoSimposista'])) {
        $tipoSimposista = $_POST['tipoSimposista'];
    }

    $inscricao = new Inscricao();

    $inscricao->idEvento = $idEvento;
    $inscricao->idSimposista = $idSimposista;
    $inscricao->urlQrCode = null;

    switch ($controle) {
        case "inscrever":
            $retorno = inserir($inscricao, $tipoSimposista);
            break;
        case "cancelar":
            $retorno = cancelarInscricao($inscricao, $tipoSimposista);
            break;
        default:
            break;
    }

    if ($retorno['status'] != 200) {
        echo $retorno['mensagem'];
    } else {
        echo $retorno['status'];
    }


} catch (Exception $e) {
    Erro::trataErro($e);
}

function inserir($inscricao, $tipoSimposista)
{
    $inscricao->situacao = 1;
    $result = $inscricao->inserir($tipoSimposista);
    return $result;
}


function cancelarInscricao($inscricao, $tipoSimposista)
{
    $inscricao->situacao = 2;
    $result = $inscricao->cancelaInscricao($tipoSimposista);
    return $result;
}