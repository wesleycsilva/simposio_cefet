jQuery(document).ready(function($) {
  "use strict";
  $('#cpf').mask("999.999.999-99");
  $('#telefone').mask("(99) 99999-9999");
  // dataPickerPeriodo('dataNascimento');

  var validador = $('#formCadastrar').validate({
    rules: {
      nome: {required: true},
      matricula: {required: true},
      email: {required: true},
      emailConfirmacao: {required: true, equalTo: '#email'},
      dataNascimento: {required: true},
      cpf: {required: true},
      rg: {required: true},
      telefone: {required: true},
      password: {required: true},
      passwordConfirmacao: {required: true, equalTo: '#password'}
    },
    messages: {
      nome: {required: "* Nome é obrigatório!"},
      matricula: {required: "* Matrícula é obrigatório!"},
      email: {required: "* E-mail é obrigatório!"},
      emailConfirmacao: {
        required: "* Confirmação do e-mail é obrigatório!",
        equalTo: "* O e-mail e a confirmação não estão coincidindo!"
      },
      dataNascimento: {required: "* Data de nascimento é obrigatório!"},
      cpf: {required: "* CPF é obrigatório!"},
      rg: {required: "* RG é obrigatório!"},
      telefone: {required: "* Telefone é obrigatório!"},
      password: {required: "* A Senha é obrigatório!"},
      passwordConfirmacao: {
        required: "* Confirmação da senha é obrigatório!",
        equalTo: "* A senha e a confirmação não estão coincidindo!"
      }
    }
  });

  //Contact
  $('form.contactForm').submit(function() {
    var nome = $('#nome').val();
    var matricula = $('#matricula').val();
    var email = $('#email').val();
    var dataNascimento = $('#dataNascimento').val();
    var cpf = $('#cpf').val();
    var rg = $('#rg').val();
    var telefone = $('#telefone').val();
    var password = $('#password').val();

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
            controle: "inscrever"
          },
      success: function(msg) {
        if (msg == 'OK') {
          $("#modalCadastro").modal('show');
          window.setTimeout(function(){
            window.location.href = "index.php";
          }, 5000);
        } else {
          $("#modalCadastroErro").modal('show');
        }

      }
    });
    return false;
  });

});
