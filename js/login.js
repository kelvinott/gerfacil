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
       
        var flgerro = validaCamposLogin();
        
        if(flgerro == "") {
            $.ajax({
                    //Tipo de envio POST ou GET
                    type: "POST",
                    dataType: "text",
                    data: {email: txbEmail, senha: txbSenha},

                    url: "../controller/LoginController.php",

                    //Se der tudo ok no envio...
                    success: function (dados) {
                        
                        var json = $.parseJSON(dados);

                        if (json.status != 1) {

                            $(location).attr('href', 'PaginaInicialView.php');                            
                        } else {

                            jbkrAlert.alerta('Login', 'E-mail ou Senha está incorreto.');

                        }

                    }
            });
        }
        else{
           
            
        }
    });
  });
  
  
  
  function validaCamposLogin(){
    var txbEmail = $("#txbEmail");
    var txbSenha = $("#txbSenha");
    var divErroPrincipal =  $("#divErroPrincipal");
    var divErro =  $("#divErro");

    var divErroSenhaPrincipal =  $("#divErroSenhaPrincipal");
    var divErroSenha =  $("#divErroSenha");
    
    var flgerro = "";
    if(txbEmail.val() == ""){
        divErro.html("<i>Informe o <b>Email</b></i><br/>");
        divErroPrincipal.css("display", "block");
        flgerro = "1";
    }
    if(txbSenha.val() == ""){
        divErroSenha.html("<i>Informe a <b>Senha</b></i>");
        divErroSenhaPrincipal.css("display", "block");
        flgerro = "1";
    }
  
    return flgerro;
  }
  