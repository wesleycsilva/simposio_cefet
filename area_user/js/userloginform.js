jQuery(document).ready(function ($) {
    "use strict";
    var form = $("#formUpdatePassword");

    var validador = $('#formUpdatePassword').validate({
        rules: {
            senhaAtual: {required: true},
            novaSenha: {required: true},
            confirmacaoNovaSenha: {required: true, equalTo: '#novaSenha'}
        },
        messages: {
            senhaAtual: {required: "* Campo obrigatório!"},
            novaSenha: {required: "* Campo obrigatório!"},
            confirmacaoNovaSenha: {required: "* Campo obrigatório!",
                equalTo: "* A senha e a confirmação não estão coincidindo!"
            }
        }
    });

    //Contact
    $('#formUpdatePassword').submit(function () {
        if (form.valid()) {
            var senhaAtual = $('#senhaAtual').val();
            var novaSenha = $('#novaSenha').val();
            var confirmacaoNovaSenha = $('#confirmacaoNovaSenha').val();

            $.ajax({
                type: "POST",
                url: "alterar_senha_post.php",
                data: {
                    senhaAtual: senhaAtual,
                    novaSenha: novaSenha,
                    confirmacaoNovaSenha: confirmacaoNovaSenha
                },
                success: function (msg) {
                    if (msg == 'OK') {
                        // window.location.href = 'area_user/index.php';
                    } else {
                        // $("#modalLoginErro").modal('show');
                    }
                }
            });
            return false;
        }
    });

});