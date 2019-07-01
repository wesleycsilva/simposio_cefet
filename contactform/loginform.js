jQuery(document).ready(function ($) {
    "use strict";

    var form = $("#formLogin");

    var validador = $('#formLogin').validate({
        rules: {
            email: {required: true},
            password: {required: true}
        },
        messages: {
            email: {required: "* E-mail é obrigatório!"},
            password: {required: "* A Senha é obrigatório!"}
        }
    });

    //Contact
    $('form.formLogin').submit(function () {
        if (form.valid()) {
            var email = $('#email').val();
            var password = $('#password').val();

            $.ajax({
                type: "POST",
                url: "login_post.php",
                data: {
                    email: email,
                    password: password,
                    action: "logar"
                },
                success: function (msg) {
                    if (msg == 'OK') {
                        window.location.href = 'area_user/index.php';
                    } else {
                        $("#modalLoginErro").modal('show');
                    }
                }
            });
            return false;
        }
    });

});
