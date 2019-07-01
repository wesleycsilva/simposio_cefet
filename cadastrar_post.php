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

    $simposista = new Simposista();
    $funcao = new Funcao();

    $simposista->nome = $nome;
    $simposista->matricula = $matricula;
    $simposista->email = $email;
    $simposista->dataNascimento = $dataNascimento;
    $simposista->cpf = $funcao->retirarCaracterCpf($cpf);
    $simposista->rg = $funcao->retirarCaracterRg($rg);
    $simposista->telefone = $funcao->retirarCaracterTelefone($telefone);
    $simposista->senha = $senha;

    $retorno = $simposista->inserir();

//    var_dump($retorno);exit;
//    array(2) { ["status"]=> string(3) "200" ["mensagem"]=> string(7) "Sucesso" }

    if ($retorno['status'] == 200) {
        echo 'OK';
    } else {
        echo 'Erro';
    }
    # TODO criar um mensagem com usuário cadastrado com sucesso (modal) e redirecionr para a tela de login

//    header('Location: index.php');


} catch (Exception $e) {
    Erro::trataErro($e);
}

function validaMatricula($matricula)
{
    $dataInicioPrimeiraChamada = strtotime('2019-07-03');
    $dataFinalPrimeiraChamada 	= strtotime('2019-07-08');
    $dataInicioSegundaChamada 	= strtotime('2019-07-09');
    $dataFinalSegundaChamada 	= strtotime('2019-07-15');
    $dataInicioTerceiraChamada 	= strtotime('2019-07-16');
    $dataFinalTerceiraChamada 	= strtotime('2019-07-30');

    $arrayMatriculaPrimeiraChamada = [
        '20151', '20152', '20161', '20162', '20171'
    ];

    $arrayMatriculaSegundaChamada = [
        '20172', '20181', '20182', '20191', '20192'
    ];

    #$data = strtotime(date("Y-m-d"));
    $data = strtotime("2019-07-18");

    #count matriculoa = 12
    #20151XXXXXXX - 4 primeiros dígitos = ano da matrícula
    #20151XXXXXXX - 5° = semestre letivo (1 ou 2)

    if (strlen($matricula) != 12) {
        return 'Quantidade de caracteres da matricula errado';
    }

    $anoMatricula = (string) substr($matricula, 0, 5);

    if ($data >= $dataInicioPrimeiraChamada && $data <= $dataFinalPrimeiraChamada) {
        if (!in_array($anoMatricula, $arrayMatriculaPrimeiraChamada)) {
            return 'Número de matricula inválido para essa etapa';
        }
    } elseif ($data >= $dataInicioSegundaChamada && $data <= $dataFinalSegundaChamada) {
        if (!in_array($anoMatricula, $arrayMatriculaSegundaChamada)) {
            return 'Número de matricula inválido para essa etapa';
        }
    } elseif ($data >= $dataInicioTerceiraChamada && $data <= $dataFinalTerceiraChamada) {
        if (in_array($anoMatricula, $arrayMatriculaPrimeiraChamada)) {
            return 'OK';
        } else if(in_array($anoMatricula, $arrayMatriculaSegundaChamada)) {
            return 'OK';
        } else {
            return 'Número de matricula inválido para essa etapa';
        }
    } else {
        return 'Fora do prazo para cadastro';
    }
    return 'OK';

}