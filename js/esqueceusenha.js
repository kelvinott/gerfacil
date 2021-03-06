$(document).ready(function(){
    $("#btnEnviar").click(function(){
        var divErrorEmail =  $("#divErrorEmail");
        var divErro =  $("#divErro");
        var txbEmail = $("#txbEmail").val();            
        var mensagem = validaCamposLogin();
        if(mensagem == "") {
            
            
            $.ajax({
                //Tipo de envio POST ou GET
                type: "POST",
                dataType: "text",
                data: {
                email: txbEmail,
                action: 'atualizar'

                },

                url: "../controller/EsqueceuSenhaController.php",

                //Se der tudo ok no envio...
                success: function (dados) {
                    var json = $.parseJSON(dados);
                    if (json.status == 0)                       
                        jbkrAlert.sucesso('Conta', 'E-mail enviado com sucesso!');             
                    else 
                        jbkrAlert.alerta('E-mail', 'Este e-mail não consta no nosso sistema!');                                                    
                }
            });
        }
        else{
            divErrorEmail.css("display", "block");
            divErro.html(mensagem);
        }

    });
    
});


function validaCamposLogin(){    
    var txbEmail = $("#txbEmail").val();  
    var mensagem = "";
    
    if(txbEmail == ""){
      mensagem = mensagem.concat("<i>Informe o <b>Email</b></i><br/>");
    }    
    else if(!validaEmail(txbEmail)){        
        mensagem = mensagem.concat("<i><b>Email</b> Deve ser válido </i><br/>");          
    }
    return mensagem;
}
  
  
  
 
  