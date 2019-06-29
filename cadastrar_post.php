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

    # TODO criar um mensagem com usuário cadastrado com sucesso (modal) e redirecionr para a tela de login
    header('Location: index.php');


} catch (Exception $e) {
    Erro::trataErro($e);
}