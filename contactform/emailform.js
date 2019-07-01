jQuery(document).ready(function ($) {
    "use strict";

    var form = $("#formContato");

    var validador = $('#formContato').validate({
        rules: {
            nomeContato: {required: true},
            emailContato: {required: true},
            assunto: {required: true},
            mensagem: {required: true}
        },
        messages: {
            nomeContato: {required: "* Nome é obrigatório!"},
            emailContato: {required: "* E-mail é obrigatório!"},
            assunto: {required: "* Assunto é obrigatório!"},
            mensagem: {required: "* Mensagem é obrigatório!"}
        }
    });

    //Contact
    $('form.contatoForm').submit(function () {
        if (form.valid()) {
            var nomeContato = $('#nomeContato').val();
            var emailContato = $('#emailContato').val();
            var assunto = $('#assunto').val();
            var mensagem = $('#mensagem').val();

            $.ajax({
                type: "POST",
                url: "login_post.php",
                data: {
                    nomeContato: nomeContato,
                    emailContato: emailContato,
                    assunto: assunto,
                    mensagem: mensagem,
                    action: "contato"
                },
                success: function (msg) {
                    if (msg == 'OK') {
                        $("#modalContato").modal('show');
                        window.setTimeout(function () {
                            window.location.href = "index.php";
                        }, 5000);
                    } else {
                        $("#modalContatoErro").modal('show');
                    }

                }
            });
            return false;
        }
    });

});
