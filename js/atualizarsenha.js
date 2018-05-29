$(document).ready(function() {
    $("#btnAtualizarSenha").click(function () {
        var txbSenhaAntiga = $("#txbSenhaAntiga").val();
        var txbSenhaNova = $("#txbSenhaNova").val();
        var txbSenhaNovaRepetir = $("#txbSenhaNovaRepetir").val();      
            
        var msgErro = validaCampos(txbSenhaAntiga, txbSenhaNova, txbSenhaNovaRepetir);

        if(msgErro !== ""){
            jbkrAlert.alerta('Alerta!',msgErro);
            return;
         }

        $.ajax({
                //Tipo de envio POST ou GET
            type: "POST",
            dataType: "text",
            data: {
                senhaAntiga: txbSenhaAntiga,
                senhaNova: txbSenhaNova,
                senhaNovaRepetir: txbSenhaNovaRepetir,                
                action: "atualizar"
            },

            url: "../controller/AtualizarSenhaController.php",

            //Se der tudo ok no envio...
            success: function (dados) {
                var json = $.parseJSON(dados);

                if (json.status == 0) {
                    jbkrAlert.sucesso('Senha', 'Senha atualizada com sucesso!');                         
                    $("#txbSenhaAntiga").val("");
                    $("#txbSenhaNova").val("");
                    $("#txbSenhaNovaRepetir").val("");    
                } else {
                    jbkrAlert.alerta('Senha', 'Senha antiga incorreta!');

                }
                
            }
        });
    });
});

function validaCampos(txbSenhaAntiga, txbSenhaNova, txbSenhaNovaRepetir){
    msgErro = "";
    
    if(txbSenhaAntiga === ""){
        msgErro = msgErro + "<b>Senha Antiga</b> é um campo de preenchimento obrigatorio<br/>";
    }

    if(txbSenhaNova === ""){
        msgErro = msgErro + "<b>Nova Senha</b> é um campo de preenchimento obrigatorio<br/>";
    } else {
        if(txbSenhaNova !== txbSenhaNovaRepetir){
          msgErro = msgErro + "<b>Senhas</b> não coincidem<br/>";    
        }
    }
    
    return msgErro;
  
}