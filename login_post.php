<?php
require_once 'global.php';

$simposista = new Simposista();

switch ($_GET["action"]) {
    case "logar":
        cadastrar($simposista);
        break;
    case "lembrar":
        lembrarSenha($simposista);
        break;
    default:
        break;
}

function cadastrar($simposista)
{
    //verificar se clicou no botao
    if (isset($_POST['email'])) {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        //verificar se está preenchido
        if (!empty($email) && !empty($senha)) {
            if ($simposista->logar($email, $senha)) {
                //header("location: inscricao.php");
                echo "<script>location.href='inscricao.php';</script>";
                exit;

            } else {
                ?>
                <script type="text/javascript">
                    errormessage.innerHTML = 'Erro : Email e/ou Senha incorretos!';
                </script>
                <?php
            }

        } else {
            ?>
            <script type="text/javascript">
                errormessage.innerHTML = 'Erro : Preencha todos os campos!';
            </script>
            <?php
        }
    }
}

function lembrarSenha($simposista)
{
    if (isset($_POST['emailLembrarSenha'])) {
        $email = addslashes($_POST['emailLembrarSenha']);
        if (!empty($email)) {
            if ($simposista->lembrarSenha($email)) {
                ?>
                <script type="text/javascript">
                    errormessage.innerHTML = 'Sucesso : Nova senha enviada por e-mail!';
                </script>
                <?php

            } else {
                ?>
                <script type="text/javascript">
                    errormessage.innerHTML = 'Erro : Email inexistente!';
                </script>
                <?php
            }
        }
    } else {
        ?>
        <script type="text/javascript">
            errormessage.innerHTML = 'Erro : Preencha todos os campos!';
        </script>
        <?php
    }
}


