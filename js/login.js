$(document).ready(function(){
    $("#txbEmail").focus();

    
    $("#btnEsqueceuSenha").click(function(){
        $.ajax({
            //Tipo de envio POST ou GET
            type: "POST",
            dataType: "text",
            url: "../view/EsqueceuSenhaView.php",
            //Se der tudo ok no envio...
            success: function (callback) {
                $("#divPrincipal").html(callback);
            }
        });	


    });
    
    $("#txbSenha").on('keyup', function(event) {
        if(event.keyCode == 13){
        $("#btnLogin").click();
        }
   });
  
    $("#btnLogin").click(function(){
        var txbEmail = $("#txbEmail").val();
        var txbSenha = $("#txbSenha").val();
        var divErroPrincipal =  $("#divErroPrincipal");
        var divErro =  $("#divErro");
        var mensagem = validaCamposLogin();
        
        if(mensagem == "") {
            $.ajax({
                    //Tipo de envio POST ou GET
                    type: "POST",
                    dataType: "text",
                    data: {email: txbEmail, senha: txbSenha},

                    url: "../controller/LoginController.php",

                    //Se der tudo ok no envio...
                    success: function (dados) {
                        
                        var json = $.parseJSON(dados);

                        if (json.status != 1 || json.status != 2) {
                                                      
                            $(location).attr('href', 'PaginaInicialView.php');                            
                        }
                    }
            });
        }
        else{
            divErroPrincipal.css("display", "block");
            divErro.html(mensagem);
        }
    });
  });
  
  
  
  function validaCamposLogin(){
    var txbEmail = $("#txbEmail");
    var txbSenha = $("#txbSenha");
  
    var mensagem = "";
    if(txbEmail.val() == ""){
      mensagem = mensagem.concat("<i>Informe o <b>Email</b></i><br/>");
    }
    if(txbSenha.val() == ""){
      mensagem = mensagem.concat("<i>Informe a <b>Senha</b></i>");
    }
  
    return mensagem;
  }
  