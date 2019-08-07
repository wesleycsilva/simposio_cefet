<?php
require_once 'global.php';
require_once("area_user/classes/Inscricao.php");
$inscricao = new Inscricao();
require_once("area_user/classes/Evento.php");
$evento = new Evento();
require_once("area_user/classes/SimposistaUser.php");
$simposista = new SimposistaUser();

require_once 'area_user/classes/ConexaoUser.php';

$controle = $_POST['controle'];
$idEventoQr = $_POST['idEvento'];
$idSimposistaQr = $_POST['idSimposista'];
$idInscricaoQr = $_POST['idInscricao'];

if ($controle == 'confirmar') {
    try {
        $senhaAdmin = $_POST['senhaAdmin'];
        if ($senhaAdmin !== 'BLZW3C') {
            echo 'Acesso negado a essa área!';
            die();
        }

        $verificarinscricao = $inscricao->consultaInscricao($idInscricaoQr, $idEventoQr, $idSimposistaQr);

        if ($verificarinscricao['idInscricao'] != null) {
            #1 = Cadastrado 2 = Cancelado 3 = Presente 4 = Ausente 5 = Inativo
            switch ($verificarinscricao['situacao']) {
                case 1:
                    $retorno = ['status' => 200, 'mensagem' => 'Inscrição no evento está cancelada!'];
                    break;
                case 2:
                    $retorno = ['status' => 400, 'mensagem' => 'Inscrição no evento está cancelada!'];
                    break;
                case 3:
                    $retorno = ['status' => 400, 'mensagem' => 'QrCode já utilizado, Simposista já confirmou presença!'];
                    break;
                case 4:
                    $retorno = ['status' => 400, 'mensagem' => 'QrCode inválido, Simposista ausente!'];
                    break;
                case 5:
                    $retorno = ['status' => 400, 'mensagem' => 'Inscrição está inativada!'];
                    break;
            }
        } else {
            $retorno = ['status' => 400, 'mensagem' => 'Não foi encontrado inscrição para esse QrCode!'];
        }

        if ($retorno['status'] != 200) {
            echo $retorno['mensagem'];
        } else {
            echo $retorno['status'];
        }

    } catch (Exception $e) {
        Erro::trataErro($e);
    }
} else if ($controle == 'registrar') {
    try {
        $verificarinscricao = $inscricao->consultaInscricao($idInscricaoQr, $idEventoQr, $idSimposistaQr);

        if ($verificarinscricao['idInscricao'] != null) {
            #1 = Cadastrado 2 = Cancelado 3 = Presente 4 = Ausente 5 = Inativo
            switch ($verificarinscricao['situacao']) {
                case 1:
                    $retorno = $inscricao->confirmaSituacao($idInscricaoQr, 3);
                    break;
                case 2:
                    $retorno = ['status' => 400, 'mensagem' => 'Inscrição no evento está cancelada!'];
                    break;
                case 3:
                    $retorno = ['status' => 400, 'mensagem' => 'QrCode já utilizado, Simposista já confirmou presença!'];
                    break;
                case 4:
                    $retorno = ['status' => 400, 'mensagem' => 'QrCode inválido, Simposista ausente!'];
                    break;
                case 5:
                    $retorno = ['status' => 400, 'mensagem' => 'Inscrição está inativada!'];
                    break;
            }
        } else {
            $retorno = ['status' => 400, 'mensagem' => 'Não foi encontrado inscrição para esse QrCode!'];
        }

        if ($retorno['status'] != 200) {
            echo $retorno['mensagem'];
        } else {
            echo $retorno['status'];
        }
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
}
