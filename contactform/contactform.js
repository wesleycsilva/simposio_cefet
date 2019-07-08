jQuery(document).ready(function ($) {
    "use strict";
    $('#cpf').mask("999.999.999-99");
    $('#telefone').mask("(99) 99999-9999");
    // $('#dataNascimento').datepicker();

    $(".aluno").css("display", "none");
    $(".externo").css("display", "none");
    $(".all").css("display", "none");

    $('input:radio[name="controleRadios"]').change(function() {
        var checkbox = $("input[type=radio][name=controleRadios]:checked").val();
        if (checkbox == 1) {
            $(".externo").css("display", "none");
            $(".aluno").css("display", "block");
            $(".all").css('display','block');
        } else if (checkbox == 2) {
            $(".aluno").css('display','none');
            $(".externo").css("display", "block");
            $(".all").css("display", "block");
        }
    });

    var form = $("#formCadastrar");

    var validador = $('#formCadastrar').validate({
        rules: {
            nome: {required: true},
            matricula: {
                required: function (elem) {
                    return $("input[type=radio][name=controleRadios]:checked").val() == 1
                }
            },
            // matricula: {required: true, minlength: 12},
            instituicao: {required: function (elem) {
                    return $("input[type=radio][name=controleRadios]:checked").val() == 2
                }
            },
            cidade: {required: function (elem) {
                    return $("input[type=radio][name=controleRadios]:checked").val() == 2
                }
            },
            email: {required: true},
            emailConfirmacao: {required: true, equalTo: '#email'},
            dataNascimento: {required: true},
            cpf: {required: true},
            rg: {required: true},
            telefone: {required: true},
            password: {required: true, minlength: 6},
            passwordConfirmacao: {required: true, equalTo: '#password'}
        },
        messages: {
            nome: {required: "* Nome é obrigatório!"},
            matricula: {required: "* Matrícula é obrigatório!", minlength: "*Matrícula tem 12 dígitos"},
            instituicao: {required: "* Instituição é obrigatório!"},
            cidade: {required: "* Cidade da Instituição é obrigatório!"},
            email: {required: "* E-mail é obrigatório!"},
            emailConfirmacao: {
                required: "* Confirmação do e-mail é obrigatório!",
                equalTo: "* O e-mail e a confirmação não estão coincidindo!"
            },
            dataNascimento: {required: "* Data de nascimento é obrigatório!"},
            cpf: {required: "* CPF é obrigatório!"},
            rg: {required: "* RG é obrigatório!"},
            telefone: {required: "* Telefone é obrigatório!"},
            password: {required: "* A Senha é obrigatório!", minlength: "*Mínimo 6 caracteres"},
            passwordConfirmacao: {
                required: "* Confirmação da senha é obrigatório!",
                equalTo: "* A senha e a confirmação não estão coincidindo!"
            }
        }
    });

    //Contact
    $('form.contactForm').submit(function () {

        console.log('qqqqq');
        if (form.valid()) {
            var nome            = $('#nome').val();
            var matricula       = $('#matricula').val();
            var email           = $('#email').val();
            var dataNascimento  = $('#dataNascimento').val();
            var cpf             = $('#cpf').val();
            var rg              = $('#rg').val();
            var telefone        = $('#telefone').val();
            var password        = $('#password').val();
            var instituicao     = $('#instituicao').val();
            var cidade          = $('#cidade').val();
            var checkbox = $("input[type=radio][name=controleRadios]:checked").val();

            $.ajax({
                type: "POST",
                url: "cadastrar_post.php",
                data: {
                    nome: nome,
                    matricula: matricula,
                    email: email,
                    dataNascimento: dataNascimento,
                    cpf: cpf,
                    rg: rg,
                    telefone: telefone,
                    password: password,
                    controle: "inscrever",
                    instituicao: instituicao,
                    cidade: cidade,
                    checkbox: checkbox

                },
                success: function (msg) {
                    if (msg == 'OK') {
                        $("#modalCadastro").modal('show');
                        window.setTimeout(function () {
                            window.location.href = "index.php";
                        }, 4000);
                    } else {
                        // alert(msg);
                        $('#textErro').text(msg);
                        $("#modalCadastroErro").modal('show');
                    }

                }
            });
            return false;
        }
    });

});
