$(document).ready(function() {    
    $("#btnCadastrar").click(function () {
        var txbNomeEvento = $("#txbNomeEvento").val();
        var txbDescricao  = $("#txbDescricao").val();
        var txbDataInicio = $("#txbDataInicio").val();
        var txbDataTermino = $("#txbDataTermino").val();
        var txbHoraInicio = $("#txbHoraInicio").val();
        var txbHoraTermino = $("#txbHoraTermino").val();
        var txbBairro = $("#txbBairro").val();
        var txbRua = $("#txbRua").val();
        var txbNumero = $("#txbNumeroCasa").val();
        var txbComplemento = $("#txbComplemento").val();
        var txbCep = $("#txbCep").val();
        var txbEstado = $("#txbEstado").val();
        var txbCidade = $("#txbCidade").val();
        var txbCategoria = $("#txbCategoria").val();
        var txbImagem  = $("#imagem").val();
        var ckbNotificacao = "";
    
        if($("#ckbNotificacao").is(':checked'))
            ckbNotificacao = "1";
        else
            ckbNotificacao = "0";

        /*var msgErro = validaCampos(txbNomeEvento, txbDescricao, txbDataInicio, txbDataTermino, txbHoraInicio, txbHoraTermino, txbBairro 
                                 , txbRua, txbNumero, txbCep, txbEstado, txbCidade, txbCategoria, txbImagem );
    
        if(msgErro !== ""){
            jbkrAlert.alerta('Alerta!',msgErro);
            return;
        }*/
            
    
        $.ajax({
            //Tipo de envio POST ou GET
            type: "POST",
            dataType: "text",
            data: {
                nomeEvento: txbNomeEvento,
                descricao: txbDescricao,
                dataInicio: txbDataInicio,
                dataTermino: txbDataTermino,
                horaInicio: txbHoraInicio,
                horaTermino: txbHoraTermino,
                bairro: txbBairro,
                rua: txbRua,
                numero: txbNumero,
                cep: txbCep,
                estado: txbEstado,
                cidade: txbCidade,
                complemento: txbComplemento,
                categoria: txbCategoria,
                notificacao: ckbNotificacao,
                action: "cadastrar"
    
            },
            url: "../controller/CadastroEventoController.php",
    
            //Se der tudo ok no envio...
            success: function (dados) {
    
                $("#txbNomeEvento").val("");
                $("#txbDescricao").val("");
                $("#txbDataInicio").val("");
                $("#txbDataTermino").val("");                
                $("#txbHoraInicio").val("");
                $("#txbHoraTermino").val("");
                $("#txbBairro").val("");
                $("#txbRua").val("");
                $("#txbNumeroCasa").val("");
                $("#txbComplemento").val("");
                $("#txbCep").val("");
                $("#txbEstado").val("");
                $("#txbCidade").val("");
                $("#txbCategoria").val("");
                $('#ckbNotificacao').prop('checked', false);
            
                jbkrAlert.sucesso('Evento', 'Evento criado com sucesso!');
    
            }          
    
        });

    });

    $("#imagem").change(function () {
        $('#formulario').ajaxForm({            
            success: function(dados) {
                if(dados != "")
                    jbkrAlert.alerta('Alerta!',dados);
            }    
        }).submit();
    });

});
    
function validaCampos(txbNomeEvento, txbDescricao, txbDataInicio, txbDataTermino, txbHoraInicio, txbHoraTermino, txbBairro
                    , txbRua, txbNumero, txbCep, txbEstado, txbCidade, txbCategoria, txbImagem){

    msgErro = "";
    
    if(txbNomeEvento === ""){
        msgErro = msgErro + "<b>Nomel</b> é um campo de preenchimento obrigatorio<br/>";
    }
    
    if(txbDescricao === ""){
        msgErro = msgErro + "<b>Descrição</b> é um campo de preenchimento obrigatorio<br/>";
    }
    
    if(txbDataInicio === ""){
        msgErro = msgErro + "<b>Data Inicio</b> é um campo de preenchimento obrigatorio<br/>";
    }

    if(txbDataTermino === ""){
        msgErro = msgErro + "<b>Data Termino</b> é um campo de preenchimento obrigatorio<br/>";
    }
    var dataInicio = new Date(txbDataInicio);
    var dataTermino = new Date(txbDataTermino);

    if(dataInicio > dataTermino){      
      msgErro = msgErro + "<b>Data Inicio</b> não pode ser maior que a <b>Data Término</b><br/>";
    }
    
    
    if(txbHoraInicio === ""){
        msgErro = msgErro + "<b>Hora de Inicio</b> é um campo de preenchimento obrigatorio<br/>";
    }
    
    if(txbHoraTermino === ""){
        msgErro = msgErro + "<b>Hora de Término</b> é um campo de preenchimento obrigatorio<br/>";
    }
    if(txbBairro === ""){
        msgErro = msgErro + "<b>Bairro</b> é um campo de preenchimento obrigatorio<br/>";
    }
    if(txbRua === ""){
        msgErro = msgErro + "<b>Rua</b> é um campo de preenchimento obrigatorio<br/>";
    }
    if(txbNumero === ""){
        msgErro = msgErro + "<b>Número</b> é um campo de preenchimento obrigatorio<br/>";
    }
    if(txbCep === ""){
        msgErro = msgErro + "<b>CEP</b> é um campo de preenchimento obrigatorio<br/>";
    }
    
    if(txbEstado === ""){
        msgErro = msgErro + "<b>Estado</b> é um campo de preenchimento obrigatorio<br/>";
    }
    
    if(txbCidade === ""){
        msgErro = msgErro + "<b>Cidade</b> é um campo de preenchimento obrigatorio";
    }

    if(txbCategoria === ""){
        msgErro = msgErro + "<b>Categoria</b> é um campo de preenchimento obrigatorio";
    }

    if(txbImagem === ""){
        msgErro = msgErro + "<b>Imagem</b> é um campo de preenchimento obrigatorio";
    }
    
    return msgErro;
    
    
}