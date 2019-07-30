<?php require_once 'global_user.php' ?>

<?php
#TODO corrigir essa função

$url = $_SERVER['SERVER_NAME'];

// FUNCAO QUE VERIFICA SE O LOGIN ESTA ATIVO.
function verificaLogin()
{
    if (!isset($_SESSION['email']) || !isset($_SESSION['controle'])) {
        return false;
    }

    try {
        $simposista = new SimposistaUser();

        if ($simposista->consultaLoginUsuario($_SESSION['email'], $_SESSION['controle'])) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }
}

// FUNCAO QUE VERIFICA SE O LOGIN ESTA ATIVO E SE O USUARIO TEM ACESSO A TELA ATUAL.
function validaLogin()
{
    // O LOGIN ESTA ATIVO?
    try {
        if (verificaLogin()) {
        } else {
            $_SESSION['idSimposista'];
            $_SESSION['email'];
            $_SESSION['nome'];
            $_SESSION['controle'];

            echo "<script>";
            echo "alert('Sua sessao expirou. \\nFaça o Login novamente.');";
            echo "document.location.href = '../index.php'";
            echo "</script>";
            exit;
        }
    } catch (DbException $e) {
        echo "<script>";
        echo "alert('Erro ao realizar login.');";
        echo "document.location.href = '../index.php'";
        echo "</script>";
        exit;
    }
}