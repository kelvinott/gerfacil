$(document).ready(function() {
  
    buscarUsuario();

    $("#btnAtualizar").click(function () {
      var txbEmail = $("#txbEmail").val();
      var txbNome = $("#txbNome").val();
      var txbSobrenome = $("#txbSobrenome").val();      
      var txbNascimento = $("#txbNascimento").val();
      var estado = $("#txbEstado").val().split("-");
      var cidade = $("#txbCidade").val().split("-");

      var txbEstado = estado[0];
      var txbCidade = cidade[0];
          
      var msgErro = validaCampos(txbEmail, txbNome, txbSobrenome, txbNascimento, txbEstado, txbCidade);
  
        if(msgErro !== ""){
            jbkrAlert.alerta('  !',msgErro);
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
                nascimento: txbNascimento,
                estado: txbEstado,
                cidade: txbCidade,
                action: "atualizar"
            },
  
            url: "../controller/AtualizarPerfilController.php",
  
            //Se der tudo ok no envio...
            success: function (dados) {
              jbkrAlert.sucesso('Conta', 'Conta atualizada com sucesso!');
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
            url: '../controller/AtualizarPerfilController.php',
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
            url: '../controller/AtualizarPerfilController.php',
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
  
  function validaCampos(txbEmail, txbNome, txbSobrenome, txbNascimento, txbEstado, txbCidade){
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

function buscarUsuario(){
    
  $.ajax({
      //Tipo de envio POST ou GET
      type: "POST",
      dataType: "text",
      data: {          
        action: "buscar"
      },

      url: "../controller/AtualizarPerfilController.php",

      //Se der tudo ok no envio...
      success: function (dados) {
          var json = $.parseJSON(dados);
          var usuario = null;

          var grid = "";
          for (var i = 0; i < json.length; i++) {
              usuario = json[i];

              $("#txbNascimento").attr("type","date");
              $("#txbEmail").val(usuario.dsEmail);
              $("#txbNome").val(usuario.dsNome);
              $("#txbSobrenome").val(usuario.dsSobrenome);
              if(usuario.dtNascimento != "")
                $("#txbNascimento").val(usuario.dtNascimento);
              if(usuario.cdEstado != "")
                $("#txbEstado").val(usuario.cdEstado + " - " + usuario.nmEstado);
              if(usuario.cdCidade != "")
                $("#txbCidade").val(usuario.cdCidade + " - " + usuario.nmCidade);                

          } 

      }
    });
}
     