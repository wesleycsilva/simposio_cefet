<?php


require_once("Simposista.php");
$simposista = new Simposista();
require_once("Funcao.php");
$funcao = new Funcao();
$listaSimp = $simposista->listar();
//verificar se clicou no botao
$nomel = addslashes($_POST['nome']);
$nome = ucwords(strtolower($nomel));
$matricula = addslashes($_POST['matricula']);
$email = addslashes($_POST['email']);
$confirmaEmail = addslashes($_POST['confirmaEmail']);
$dataNascimento = addslashes($_POST['dataNascimento']);

$cpf1 = $_POST['cpf'];
$cpf2 = $funcao->limpar_texto($cpf1);
$cpf3 = $funcao->validarCPF($cpf2);
if ($cpf3 == 1) {
    $cpf = $cpf2;
} else {
    echo "Erro : CPF Inválido.";
    exit();
}
$rg = addslashes($_POST['rg']);
$telefone = addslashes($_POST['telefone']);
$senha = addslashes($_POST['senha']);
$confirmaSenha = addslashes($_POST['confirmaSenha']);
if ($simposista->verificarMatricula($matricula) == false) {
    if ($simposista->verificarCpf($cpf) == false) {
        if ($senha == $confirmaSenha) {
            if ($email == $confirmaEmail) {
                $simposista->setNome($nome);
                $simposista->setMatricula($matricula);
                $simposista->setEmail($email);
                $simposista->setDataNascimento($dataNascimento);
                $simposista->setCpf($cpf);
                $simposista->setRg($rg);
                $simposista->setTelefone($telefone);
                $simposista->setSenha($senha);
                //$simposista->setSituacao($situacao);
                if ($simposista->inserir()) {
                    echo "Cadastrado com sucesso.";
                } else {
                    echo "Erro : Cadastro não foi realizado, tente novamente.";
                }
            } else {
                echo "Erro : Emails Diferentes.";
            }
        } else {
            echo "Erro : Senhas Diferentes.";
        }
    } else {
        echo "Erro : CPF já cadastrado.";
    }
} else {
    echo "Erro : Matrícula já cadastrada.";
}