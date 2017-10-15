$(document).ready(function() {
    $("input[name='cep']").mask("99999-999");

    $.validator.addMethod('verificaHorario', function(value, element) {
      alert(value);
      return parseInt(value) % 5 == 0;
      // var horaAbertura = $("input[name='horaAbertura']").val();
      // var horaFechamento = value;
      // horaAbertura = horaAbertura.split(":");
      // horaAbertura = horaAbertura[0] + horaAbertura[1];
      // horaFechamento = horaFechamento.split(":");
      // horaFechamento = horaFechamento[0] + horaFechamento[1];
      //
      // horaAbertura = parseInt(horaAbertura);
      // horaFechamento = parseInt(horaFechamento);
      //
      // return horaFechamento > horaAbertura;

    }, 'Horário de Fechamento menor que o Horário de Abertura');

    $('#form_cadastro').validate({
        rules: {
            nome: {
                required: true
            },
            idu: {
                required: true,
                verificaHorario: true
            },
            horaAbertura: {
                required: true
            },
            horaFechamento: {
                required: true
            }
            logradouro: {
                required: true
            },
            bairro: {
                required: true
            },
            complemento: {
                required: true
            },
            cep: {
                required: true,
                maxlength: false
            },
            cidade: {
                required: true
            },
            uf: {
                required: true
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        messages: {
            nome: {
                required: "Este campo não pode ser vazio",
            },
            idu: {
                required: "Este campo não pode ser vazio",
            },
            horaAbertura: {
                required: "Este campo não pode ser vazio",
            },
            horaFechamento: {
                required: "Este campo não pode ser vazio",
            },
            logradouro: {
                required: "Este campo não pode ser vazio",
            },
            bairro: {
                required: "Este campo não pode ser vazio",
            },
            complemento: {
                required: "Este campo não pode ser vazio",
            },
            cidade: {
                required: "Este campo não pode ser vazio",
            },
            uf: {
                required: "Este campo não pode ser vazio",
            },
            cep: {
                required: "Este campo não pode ser vazio",
            }
        }
    });

    jQuery.extend(jQuery.validator.messages, {
        number: "Entre com um número válido.",
        maxlength: "Não insira mais do que {0} caracteres"
    });
});
