<?php
#TODO corrigir essa função
require_once(dirname(__FILE__) . '/../classes/ESCW001.php');
require_once(dirname(__FILE__) . '/../classes/ESCW004.php');
require_once(dirname(__FILE__) . '/../classes/ESCW005.php');

$url = $_SERVER['SERVER_NAME'];

// FUNCAO QUE VERIFICA SE O LOGIN ESTA ATIVO.
function verificaLogin() {
//    print_r($_SESSION);
    if (!isset($_SESSION['login']) || !isset($_SESSION['senha'])) {
        return false;
    } else {
        if ($_SESSION["idPerfil"] == 1) {
            //O USUÁRIO QUE ESTÁ TENTANDO LOGAR SERÁ CONSULTADO NA TABELA ESCW001 PORQUE É UM ALUNO
            $objeto = new ESCW001();
        } elseif ($_SESSION["idPerfil"] == 5 || $_SESSION["idPerfil"] == 6) {
            //O USUÁRIO QUE ESTÁ TENTANDO LOGAR SERÁ CONSULTADO NA TABELA ESCW005 PORQUE É UM RESPONSÁVEL
            $objeto = new ESCW005();
        } else {
            //O USUÁRIO QUE ESTÁ TENTANDO LOGAR SERÁ CONSULTADO NA TABELA ESCW004 PORQUE É UM FUNCIONÁRIO DA ESCOLA
            $objeto = new ESCW004();
        }
        $objeto->setLogin($_SESSION['login']);
        $objeto->setSenha($_SESSION['senha']);
        try {
            $consulta = 1;
            if (!$objeto->consultaLoginUsuario($consulta)) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            return false;
        }
    }
}

// FUNCAO QUE VERIFICA SE O USUARIO TEM ACESSO A TELA ATUAL.
function validaAcesso() {
    $oPerfil = new Perfil();
    $tela = end(explode("/", $_SERVER['PHP_SELF']));

    return $oPerfil->validaPermissaoPerfil($_SESSION['idUsuario'], $tela, $_SESSION['idPerfil']);
}

// FUNCAO QUE VERIFICA SE O LOGIN ESTA ATIVO E SE O USUARIO TEM ACESSO A TELA ATUAL.
//function validaLogin($validarAcesso = true) {
function validaLogin() {
    // O LOGIN ESTA ATIVO?
    try {
        if (verificaLogin()) {
        } else {
            unset($_SESSION['idEscola']);
            unset($_SESSION['nomeEscola']);
            unset($_SESSION['codigoEscola']);
            unset($_SESSION['descricaoEscola']);
            unset($_SESSION['cnpjEscola']);
            unset($_SESSION['bdHost']);
            unset($_SESSION['bdBanco']);
            unset($_SESSION['bdUser']);
            unset($_SESSION['bdPassword']);
            unset($_SESSION['logoEscola']);
            unset($_SESSION['codigoUsuario']);
            unset($_SESSION['idUsuario']);
            unset($_SESSION["nome"]);
            unset($_SESSION["email"]);
            unset($_SESSION["situacao"]);
            unset($_SESSION["login"]);
            unset($_SESSION["senha"]);
            unset($_SESSION["idPerfil"]);
            unset($_SESSION["primeiroNome"]);
            session_destroy();

            echo "<script>";
            echo "alert('Sua sessao expirou. \\nFaca o Login novamente.');";
            echo "document.location.href = 'index.php'";
            echo "</script>";
            exit;
        }
    } catch (DbException $e) {
        echo "<script>";
        echo "alert('Erro ao realizar login.');";
        echo "history.go(-1);";
        echo "</script>";
        exit;
    }
}