<?php
require_once 'global_user.php';

try {
    session_start();
    $simposista = new SimposistaUser();

    $senhaAtual = $_POST['senhaAtual'];
    $email = $_SESSION['email'];
    $novaSenha = $_POST['novaSenha'];
    $confirmacaoNovaSenha = $_POST['confirmacaoNovaSenha'];

    $senhaValida = $simposista->consultaLSenhaUsuario($email, $senhaAtual);

    if ($senhaValida['status'] == 200) {
        $senhaGerada = $simposista->atualizaSenha($senhaValida['mensagem'], (string) $novaSenha);
        $_SESSION['controle'] = $senhaGerada;
        var_dump($_SESSION);exit;
    } else {
        var_dump($senhaValida['mensagem']);exit;
        return $senhaValida['mensagem'];
    }
} catch (Exception $e) {
    Erro::trataErro($e);
}