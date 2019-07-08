<?php
require_once 'global.php';

$simposista = new Simposista();

switch ($_POST["action"]) {
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
        $senha = addslashes($_POST['password']);

        if (!empty($email) && !empty($senha)) {
            if ($simposista->logar($email, $senha)) {
                echo "OK";
            } else {
                echo "Erro";
            }
        } else {
            echo "Erro";
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
                    errormessage.innerHTML = 'Sucesso : Senha alterada com sucesso e enviada ao Email informado!';
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
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
//        $mail->Host       = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = 'simposioengenhariacivil@gmail.com';                     // SMTP username
        $mail->Password = 'wm&716&#';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

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
        $mail->Body = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function enviarEmailContato()
{
//    var_dump('Fazer função de enviar email contato');exit;
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
//        $mail->Host       = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = 'simposioengenhariacivil@gmail.com';                     // SMTP username
        $mail->Password = 'wm&716&#';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('maggeisiellly@yahoo.com.br', 'Simposio 2019');
        $mail->addAddress('maggeisiellly@yahoo.com.br', 'Mag Geisielly');     // Add a recipient
//        $mail->addAddress('ellen@example.com');               // Name is optional
//        $mail->addReplyTo('info@example.com', 'Information');
//        $mail->addCC('maggeisiellly@yahoo.com.br');
//        $mail->addBCC('bcc@example.com');
        $html = 'E-mail formul&aacute;rio de contato do <b>Simp&oacute;sio!</b><br><br>
                 <b>Nome:</b> ' . $_POST['emailContato'] . '<br><br>
                 <b>E-mail:</b> ' . $_POST['emailContato'] . '<br><br>
                 <b>Assunto:</b> ' . utf8_decode($_POST['assunto']) . '<br><br>
                 <b>Mensagem:</b> ' . utf8_decode($_POST['mensagem']) . '<br><br>
                 <b>Data:</b> ' . date('d/m/Y H:i:s') . '<br>';

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Simposio 2019 - Cefet/MG';
        $mail->Body = $html;
        $mail->AltBody = 'Este é o corpo em texto sem formatação para clientes de email não HTML';

        if ($mail->send()) {
            echo 'OK';
        } else {
            echo 'Erro';
        }

    } catch (Exception $e) {
        echo "Erro";
    }
}


