$(document).ready(function() {
  
    buscarUsuario();

    $("#btnAtualizar").click(function () {
      var txbEmail = $("#txbEmail").val();
      var txbNome = $("#txbNome").val();
      var txbSobrenome = $("#txbSobrenome").val();      
      var txbNascimento = $("#txbNascimento").val();
      var txbEstado = $("#txbEstado").val();
      var txbCidade = $("#txbCidade").val();
          
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
              $("#txbEmail").val("");
              $("#txbNome").val("");
              $("#txbSobrenome").val("");              
              $("#txbNascimento").val("");
              $("#txbEstado").val("");
              $("#txbCidade").val("");
              jbkrAlert.sucesso('Conta', 'Conta atualizada com sucesso!');
            }
        });
  
        $.ajax({
              //Tipo de envio POST ou GET
              type: "POST",
              dataType: "text",
              url: "../view/LoginView.php",
              //Se der tudo ok no envio...
              success: function (callback) {
                $("#divPrincipal").html(callback);
              }
            });	
        
    
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

                $("#txbEmail").val(usuario.dsEmail);
                $("#txbNome").val(usuario.dsNome);
                $("#txbSobrenome").val(usuario.dsSobrenome);
                $("#txbNascimento").val(usuario.dtNascimento);
                $("#txbEstado").val(usuario.cdEstado);
                $("#txbCidade").val(usuario.cdCidade);                
  
            } 
  
        }
      });
}
     /* $("#formUsuario #btnCancelar").click(function(){
        limpaCampos($(this).closest("form"));
        formularioModoInserir();
        buscaUsuario();
      });
    
      $("#formUsuario #btnBuscar").click(function () {
        buscaUsuario();
    
      });
    
      $("#formUsuario #btnAtualizar").click(function () {
        var codigo = $("#hidCodUsu").val();
        var txbNomUsu = $("#txbNomUsu").val();
        var txbSobrenomeUsu = $("#txbSobrenomeUsu").val();
        var txbSenUsu = $("#txbSenUsu").val();
        var txbSenUsuConfirma = $("#txbSenUsuConfirma").val();
        var txbDesEml = $("#txbDesEml").val();
        var cbbPapel = $("#cbbPapel").val();
        var cbbSituacao = $("#cbbSituacao").val();
        var txbPerComCli = $("#txbPerComCli").val();
        var txbPerComInt = $("#txbPerComInt").val();
    
        var msgErro = validaCamposAtu(txbNomUsu, txbSobrenomeUsu, txbSenUsu, txbSenUsuConfirma, txbDesEml, cbbPapel, cbbSituacao);
    
        if(msgErro !== ""){
          jbkrAlert.alerta('Alerta!',msgErro);
        }
        else{
          $.ajax({
            //Tipo de envio POST ou GET
            type: "POST",
            dataType: "text",
            data: {
              codigo: codigo,
              nomUsu: txbNomUsu,
              sobrenomeUsu: txbSobrenomeUsu,
              senUsu: txbSenUsu,
              desEml: txbDesEml,
              codPap: cbbPapel,
              codSit: cbbSituacao,
              perComCli: txbPerComCli,
              perComInt: txbPerComInt,
              action: "atualizar"
            },
    
            url: "../controller/UsuarioController.php",
    
            //Se der tudo ok no envio...
            success: function (dados) {
              jbkrAlert.sucesso('Usuário', 'Usuário atualizado com sucesso!');
              $("#formUsuario #btnCancelar").trigger("click");
            }
          });
        }
      });
    
    });
    
    function buscaPapelDropdown(){
      $.ajax({
            //Tipo de envio POST ou GET
            type: "POST",
            dataType: "text",
            data: {
              action: "papeldropdown"
            },
    
            url: "../controller/UsuarioController.php",
    
            //Se der tudo ok no envio...
            success: function (dados) {
              var json = $.parseJSON(dados);
    
              var dropdown = "";
              for (var i = 0; i < json.length; i++) {
    
                var papel = json[i];
    
                dropdown = dropdown + '<li role="presentation" value="' + papel.codPap  + '"><a role="menuitem" tabindex="-1" href="#">' + papel.desPap + '</a></li>';
    
              }
              $("#ulPapel").html(dropdown);
    
              $("#ulPapel li a").click(function(){
    
                $("#cbbPapel:first-child").text($(this).text());
    
                $("#ulPapel li").each(function(){
    
                  if ($(this).text() == $("#cbbPapel").text().trim()){
                    $("#cbbPapel").val($(this).val());
                  }
                });
    
              });
            }
    
          });
    }
    
    function buscaUsuario(codigo){
      var txbNomUsu = $("#txbNomUsu").val();
      var txbSobrenomeUsu = $("#txbSobrenomeUsu").val();
      var txbSenUsu = $("#txbSenUsu").val();
      var txbDesEml = $("#txbDesEml").val();
      var cbbPapel = $("#cbbPapel").val();
      var cbbSituacao = $("#cbbSituacao").val();
      var txbPerComCli = $("#txbPerComCli").val();
      var txbPerComInt = $("#txbPerComInt").val();
    
      $.ajax({
          //Tipo de envio POST ou GET
          type: "POST",
          dataType: "text",
          data: {
            codigo: codigo,
            nomUsu: txbNomUsu,
            sobrenomeUsu: txbSobrenomeUsu,
            senUsu: txbSenUsu,
            desEml: txbDesEml,
            codPap: cbbPapel,
            codSit: cbbSituacao,
            perComCli: txbPerComCli,
            perComInt: txbPerComInt,
            action: "buscar"
          },
    
          url: "../controller/UsuarioController.php",
    
          //Se der tudo ok no envio...
          success: function (dados) {
            var json = $.parseJSON(dados);
            var usuario = null;
    
            //Carregando a grid
            if(codigo == null){
              var grid = "";
              for (var i = 0; i < json.length; i++) {
                usuario = json[i];
    
                grid = grid + "<tr>";
                grid = grid + "<td>" + usuario.codUsu  + "</td>";
                grid = grid + "<td>" + usuario.nomUsu  + "</td>";
                grid = grid + "<td>" + usuario.sobrenomeUsu  + "</td>";
                grid = grid + "<td>" + usuario.desEml  + "</td>";
                grid = grid + "<td>" + usuario.desPap + "</td>";
                grid = grid + "<td>" + usuario.perComCli + "</td>";
                grid = grid + "<td>" + usuario.perComInt + "</td>";
                grid = grid + "<td>" + usuario.desSit + "</td>";
                grid = grid + "<td href='javascript:void(0);' onClick='buscaUsuario(" + usuario.codUsu + ")'><a>Editar <span class='glyphicon glyphicon-pencil'></span></a></td>";
                grid = grid + "</tr>";
    
              }
              $("#grdUsuario").html(grid);
            }else{
              formularioModoAtualizar();
              for (var j = 0; j < json.length; j++) {
                usuario = json[j];
    
                $("#hidCodUsu").val(usuario.codUsu);
                $("#txbNomUsu").val(usuario.nomUsu);
                $("#txbSobrenomeUsu").val(usuario.sobrenomeUsu);
                $("#txbDesEml").val(usuario.desEml);
                $("#cbbPapel:first-child").text(usuario.desPap);
                $("#cbbPapel:first-child").val(usuario.codPap);
                $("#cbbSituacao:first-child").text(usuario.desSit);
                $("#cbbSituacao:first-child").val(usuario.codSit);
                $("#txbPerComCli").val(usuario.perComCli);
                $("#txbPerComInt").val(usuario.perComInt);
    
              }
    
            }
    
          }
        });
    
    }
    
    
    
    
    
    function aplicaMascaraUsuario(){
      $("#txbPerComCli").mask('99%', {reverse: false});
      $("#txbPerComInt").mask('99%', {reverse: false});
    }*/