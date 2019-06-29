<?php
require_once 'global.php';

$simposista = new Simposista();

switch ($_GET["action"]) {
    case "logar":
        login($simposista);
        break;
    case "lembrar":
        lembrarSenha($simposista);
        break;
    case "contato":
        enviarEmailContato($simposista);
        break;
    default:
        break;
}

function login($simposista)
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
            $dados = $simposista->lembrarSenha($email);
            if ($dados['retorno']) {
                enviarEmail($email, $dados['newPassword']);
                    ?>
                    <script type="text/javascript">
                        errormessage.innerHTML = 'Sucesso : Senh alterada com sucesso e enviada ao Email informado!';
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

function enviarEmail()
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'user@example.com';                     // SMTP username
        $mail->Password   = 'secret';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
        $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function enviarEmailContato()
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'user@example.com';                     // SMTP username
        $mail->Password   = 'secret';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
        $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


