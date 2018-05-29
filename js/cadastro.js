$(document).ready(function() {

  $("#btnCadastrar").click(function () {
    var txbEmail = $("#txbEmail").val();
    var txbNome = $("#txbNome").val();
    var txbSobrenome = $("#txbSobrenome").val();
    var txbSenha = $("#txbSenha").val();
    var txbSenhaRepetir = $("#txbSenhaRepetir").val(); 
    var txbNascimento = $("#txbNascimento").val();

    var estado = $("#txbEstado").val().split("-");
    var cidade = $("#txbCidade").val().split("-");

    var txbEstado = estado[0];
    var txbCidade = cidade[0];
    var ckbNotificacao = "";
    
    if($("#ckbNotificacao").is(':checked'))
      ckbNotificacao = "1";
    else
      ckbNotificacao = "0";

    var msgErro = validaCampos(txbEmail, txbNome, txbSobrenome, txbSenha, txbSenhaRepetir, txbNascimento, txbEstado, txbCidade);

      if(msgErro !== ""){
          jbkrAlert.alerta('Alerta!',msgErro);
          return;
      }

      $.ajax({
              //Tipo de envio POST ou GET
          type: "POST",
          dataType: "text",
          data: {
              email: txbEmail,
              nome: txbNome,
              sobrenome: txbSobrenome,
              senha: txbSenha,
              nascimento: txbNascimento,
              estado: txbEstado,
              cidade: txbCidade,
              notificacao: ckbNotificacao,
              action: "cadastrar"
          },

          url: "../controller/CadastroController.php",

          //Se der tudo ok no envio...
          success: function (dados) {
            var json = $.parseJSON(dados);

            if (json.status == 0) {
              $("#txbEmail").val("");
              $("#txbNome").val("");
              $("#txbSobrenome").val("");
              $("#txbSenha").val("");
              $("#txbSenhaRepetir").val("");
              $("#txbNascimento").val("");
              $("#txbEstado").val("");
              $("#txbCidade").val("");
              $('#ckbNotificacao').prop('checked', false);

              jbkrAlert.sucesso('Conta', 'Conta criada com sucesso!');             
            } else {
              jbkrAlert.alerta('E-mail', 'Este e-mail já está sendo utilizado. Tente novamente.');

            }
            
          }
      });

    });

    $('#txbEstado').autocomplete({
      minLength: 1,
      maxLength: 10,
      autoFocus: true,
      delay: 300,
      position: {
        my: 'bottom top',
        at: 'bottom'
      },
      appendTo: '#tabGeral',
      source: function(request, response){
        $.ajax({
          url: '../controller/CadastroController.php',
          type: 'POST',
          dataType: 'text',
          data: {
            termo: request.term,
            action: "autocompleteestados"
          }
        }).done(function(data){          
          if(data.length > 0){
            data = data.split(',');
            data = data.slice(0, 10);
            response($.each(data, function(key, item){
              return({
                label: item
              });
            }));
          }
        });
      }
    });

    $('#txbCidade').autocomplete({
      minLength: 1,
      maxLength: 10,
      autoFocus: true,
      delay: 300,
      position: {
        my: 'bottom top',
        at: 'bottom'
      },
      appendTo: '#tabGeral',
      source: function(request, response){
        $.ajax({
          url: '../controller/CadastroController.php',
          type: 'POST',
          dataType: 'text',
          data: {
            termo: request.term,
            action: "autocompletecidades"
          }
        }).done(function(data){          
          if(data.length > 0){
            data = data.split(',');
            data = data.slice(0, 10);
            response($.each(data, function(key, item){
              return({
                label: item
              });
            }));
          }
        });
        
      }
    });
});

function validaCampos(txbEmail, txbNome, txbSobrenome, txbSenha, txbSenhaRepetir, txbNascimento, txbEstado, txbCidade){
    msgErro = "";
    
    if(txbEmail === ""){
        msgErro = msgErro + "<b>E-mail</b> é um campo de preenchimento obrigatorio<br/>";
    }
    else if(!validaEmail(txbEmail)){
        msgErro = msgErro + "<b>E-mail</b> deve ser válido<br/>";
    }

    if(txbNome === ""){
        msgErro = msgErro + "<b>Nome do usuário</b> é um campo de preenchimento obrigatorio<br/>";
    }
    if(txbSobrenome === ""){
        msgErro = msgErro + "<b>Sobrenome do usuário</b> é um campo de preenchimento obrigatorio<br/>";
    }
    if(txbSenha === ""){
        msgErro = msgErro + "<b>Senha</b> é um campo de preenchimento obrigatorio<br/>";
    }
    else {
      if(txbSenha !== txbSenhaRepetir){
        msgErro = msgErro + "<b>Senhas</b> não coincidem<br/>";    
      }
    }
    
    if(txbNascimento === ""){
        msgErro = msgErro + "<b>Nascimento</b> é um campo de preenchimento obrigatorio<br/>";
    } 

    var hoje = new Date();  
    var comparar = new Date(txbNascimento);

    if(comparar > hoje){      
      msgErro = msgErro + "<b>Nascimento</b> não pode ser maior que a data atual<br/>";
    }

    
    if(txbEstado === ""){
        msgErro = msgErro + "<b>Estado</b> é um campo de preenchimento obrigatorio<br/>";
    }
    if(txbCidade === ""){
        msgErro = msgErro + "<b>Cidade</b> é um campo de preenchimento obrigatorio";
    }
  
    return msgErro;
  
}
