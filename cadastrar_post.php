<?php
require_once 'global.php';

try {

    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $email = $_POST['email'];
    $dataNascimento = $_POST['dataNascimento'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['password'];
    $instituicao = $_POST['instituicao'];
    $cidade = $_POST['cidade'];
    $checkbox = $_POST['checkbox'];

    $simposista = new Simposista();
    $funcao = new Funcao();

    $retornoMatricula = validaMatricula($matricula);

    if ($retornoMatricula['status'] != 200) {
        echo $retornoMatricula['mensagem'];
        exit;
    }


    $funcao = new Funcao();

    if (!$funcao->validarCPF($cpf)) {
        echo 'Erro! CPF inválido. Por gentileza verifique os dados!';
        exit;
    }

    $tipoSimposista = 1;
    if ($checkbox == 2) {
        $tipoSimposista = 2;
    }

    $simposista->nome = $nome;
    $simposista->matricula = $matricula;
    $simposista->email = $email;
    $simposista->dataNascimento = $dataNascimento;
    $simposista->cpf = $funcao->retirarCaracterCpf($cpf);
    $simposista->rg = $funcao->retirarCaracterRg($rg);
    $simposista->telefone = $funcao->retirarCaracterTelefone($telefone);
    $simposista->senha = $senha;
    $simposista->instituicao = strtoupper($instituicao);
    $simposista->cidade = strtoupper($cidade);
    $simposista->tipoSimposista = $tipoSimposista;

    $retorno = $simposista->inserir();

    if ($retorno['status'] == 200) {
        echo 'OK';
    } else {
        echo 'Erro';
    }
} catch (Exception $e) {
    Erro::trataErro($e);
}

function validaMatricula($matricula)
{
    $dataInicioPrimeiraChamada = strtotime('2019-07-05');
    $dataFinalPrimeiraChamada = strtotime('2019-07-10');
    $dataInicioSegundaChamada = strtotime('2019-07-11');
    $dataFinalSegundaChamada = strtotime('2019-07-17');
    $dataInicioTerceiraChamada = strtotime('2019-07-18');
    $dataFinalTerceiraChamada = strtotime('2019-07-30');

    $arrayMatriculaPrimeiraChamada = [
        '20151', '20152', '20161', '20162', '20171'
    ];

    $arrayMatriculaSegundaChamada = [
        '20172', '20181', '20182', '20191', '20192'
    ];

    $data = strtotime(date("Y-m-d"));
//    $data = strtotime("2019-07-10");

    #count matriculoa = 12
    #20151XXXXXXX - 4 primeiros dígitos = ano da matrícula
    #20151XXXXXXX - 5° = semestre letivo (1 ou 2)


    if (strlen($matricula) != 12) {
        return ['status' => 400, 'mensagem' => 'Erro! Quantidade de caracteres da matricula errado'];
    }

    $anoMatricula = (string)substr($matricula, 0, 5);

    if ($data >= $dataInicioPrimeiraChamada && $data <= $dataFinalPrimeiraChamada) {
        if (!in_array($anoMatricula, $arrayMatriculaPrimeiraChamada)) {
            return ['status' => 400, 'mensagem' => 'Erro! Fora do período de inscrição para sua matrícula. Aguarde a data correta!'];
        }
    } elseif ($data >= $dataInicioSegundaChamada && $data <= $dataFinalSegundaChamada) {
        if (!in_array($anoMatricula, $arrayMatriculaSegundaChamada)) {
            return ['status' => 400, 'mensagem' => 'Erro! Número de matricula inválido para essa etapa'];
        }
    } elseif ($data >= $dataInicioTerceiraChamada && $data <= $dataFinalTerceiraChamada) {
        if (in_array($anoMatricula, $arrayMatriculaPrimeiraChamada)) {
            return ['status' => 200, 'mensagem' => 'OK'];
        } else if (in_array($anoMatricula, $arrayMatriculaSegundaChamada)) {
            return ['status' => 200, 'mensagem' => 'OK'];
        } else {
            return ['status' => 400, 'mensagem' => 'Erro! Número de matricula inválido para essa etapa'];
        }
    } else {
        return ['status' => 400, 'mensagem' => 'Erro! Fora do prazo para inscrição'];
    }
    return ['status' => 200, 'mensagem' => 'OK'];

}