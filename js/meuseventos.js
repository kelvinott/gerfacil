$(document).ready(function(){
    carregaEventos();
    buscaCategoria();
    
    $("#btnAtualizarAtividade").click(function () {
        hidCdAtividade = $("#hidCdAtividade").val();  
        hidCdEventoAtividade = $("#hidCdEventoAtividade").val();

        var txbNomeAtividade = $("#txbNomeAtividade").val();
        var txbDescricaoAtividade  = $("#txbDescricaoAtividade").val();
        var txbDataInicioAtividade = $("#txbDataInicioAtividade").val();
        var txbDataTerminoAtividade = $("#txbDataTerminoAtividade").val();
        var txbHoraInicioAtividade = $("#txbHoraInicioAtividade").val();
        var txbHoraTerminoAtividade = $("#txbHoraTerminoAtividade").val();      
        
        var msgErro = validaCamposAtividade(txbNomeAtividade, txbDescricaoAtividade, txbDataInicioAtividade, txbDataTerminoAtividade, txbHoraInicioAtividade, txbHoraTerminoAtividade);
    
        if(msgErro !== ""){
            jbkrAlert.alerta('Alerta!',msgErro);
            return;
        }

        $.ajax({
            //Tipo de envio POST ou GET
            type: "POST",
            dataType: "text",
            data: {
                cdEvento: hidCdEventoAtividade,
                cdAtividade: hidCdAtividade,
                nomeAtividade: txbNomeAtividade,
                descricaoAtividade: txbDescricaoAtividade,
                dataInicioAtividade: txbDataInicioAtividade,
                dataTerminoAtividade: txbDataTerminoAtividade,
                horaInicioAtividade: txbHoraInicioAtividade,
                horaTerminoAtividade: txbHoraTerminoAtividade,                
                action: "editarAtividade"    
            },
            url: "../controller/MeusEventosController.php",
    
            //Se der tudo ok no envio...
            success: function (dados) {
    
                jbkrAlert.sucesso('Evento', 'Atividade atualizada com sucesso!');
    
            }          
    
        });
        carregarAtividades(hidCdEventoAtividade);
    });

    $("#btnIncluirAtividade").click(function () {
        var hidCdEventoAtividade = $("#hidCdEventoAtividade").val();

        var txbNomeAtividade = $("#txbNomeAtividade").val();
        var txbDescricaoAtividade  = $("#txbDescricaoAtividade").val();
        var txbDataInicioAtividade = $("#txbDataInicioAtividade").val();
        var txbDataTerminoAtividade = $("#txbDataTerminoAtividade").val();
        var txbHoraInicioAtividade = $("#txbHoraInicioAtividade").val();
        var txbHoraTerminoAtividade = $("#txbHoraTerminoAtividade").val();
        
        var msgErro = validaCamposAtividade(txbNomeAtividade, txbDescricaoAtividade, txbDataInicioAtividade, txbDataTerminoAtividade, txbHoraInicioAtividade, txbHoraTerminoAtividade);
    
        if(msgErro !== ""){
            jbkrAlert.alerta('Alerta!',msgErro);
            return;
        }
    
        $.ajax({
            //Tipo de envio POST ou GET
            type: "POST",
            dataType: "text",
            data: {
                cdEvento: hidCdEventoAtividade,
                nomeAtividade: txbNomeAtividade,
                descricaoAtividade: txbDescricaoAtividade,
                dataInicioAtividade: txbDataInicioAtividade,
                dataTerminoAtividade: txbDataTerminoAtividade,
                horaInicioAtividade: txbHoraInicioAtividade,
                horaTerminoAtividade: txbHoraTerminoAtividade,                
                action: "incluirAtividade"    
            },
            url: "../controller/MeusEventosController.php",
    
            //Se der tudo ok no envio...
            success: function (dados) {
    
                $("#txbNomeAtividade").val("");
                $("#txbDescricaoAtividade").val("");
                $("#txbDataInicioAtividade").val("");
                $("#txbDataTerminoAtividade").val("");                
                $("#txbHoraInicioAtividade").val("");
                $("#txbHoraTerminoAtividade").val("");                
            
                jbkrAlert.sucesso('Evento', 'Atividade incluida com sucesso!');
    
            }          
    
        });

        carregarAtividades(hidCdEventoAtividade);

    });

    $("#btnAtualizar").click(function () {
        var hidCdEvento = $("#hidCdEvento").val();
        var txbNomeEvento = $("#txbNomeEvento").val();
        var txbDescricao  = $("#txbDescricao").val();
        var txbDataInicio = $("#txbDataInicio").val();
        var txbDataTermino = $("#txbDataTermino").val();
        var txbHoraInicio = $("#txbHoraInicio").val();
        var txbHoraTermino = $("#txbHoraTermino").val();
        var txbRua = $("#txbRua").val();
        var txbNumero = $("#txbNumeroCasa").val();
        var txbComplemento = $("#txbComplemento").val();
        var txbCep = $("#txbCep").val();

        var estado = $("#txbEstado").val().split("-");
        var cidade = $("#txbCidade").val().split("-");
        var bairro = $("#txbBairro").val().split("-");
        var txbBairro = bairro[0];
        var txbEstado = estado[0];
        var txbCidade = cidade[0];

        var txbCategoria = $("#txbCategoria").val();
        var txbImagem  = $("#imagem").val();

        var ckbNotificacao = "";

        if($("#ckbNotificacao").is(':checked'))
            ckbNotificacao = "1";
        else
            ckbNotificacao = "0";
        
        var msgErro = validaCampos(txbNomeEvento, txbDescricao, txbDataInicio, txbDataTermino, txbHoraInicio, txbHoraTermino, txbBairro 
            , txbRua, txbNumero, txbCep, txbEstado, txbCidade, txbCategoria, txbImagem );

        if(msgErro !== ""){
            jbkrAlert.alerta('Alerta!',msgErro);
            return;
        }

        $.ajax({
            //Tipo de envio POST ou GET
            type: "POST",
            dataType: "text",
            data: {
                cdEvento: hidCdEvento,
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
                action: "atualizar"
    
            },
            url: "../controller/MeusEventosController.php",
    
            //Se der tudo ok no envio...
            success: function (dados) {
    
                jbkrAlert.sucesso('Evento', 'Evento atualizado com sucesso!');
    
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
            url: '../controller/MeusEventosController.php',
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
            url: '../controller/MeusEventosController.php',
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

    $('#txbBairro').autocomplete({
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
            url: '../controller/MeusEventosController.php',
            type: 'POST',
            dataType: 'text',
            data: {
                termo: request.term,
                action: "autocompletebairros"
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


function carregaEventos(cdEvento){
    $("#frmAtualizarEvento").css("display","block");                   
    $("#frmAtividades").css("display","none");
    $("#divAtividades").css("display","none");
    $("#btnIncluirAtividade").css("display","block");
    $("#btnAtualizarAtividade").css("display","none");
    $("#txbNomeAtividade").val("");
    $("#txbDescricaoAtividade").val("");
    $("#txbDataInicioAtividade").val("");
    $("#txbDataTerminoAtividade").val("");                
    $("#txbHoraInicioAtividade").val("");
    $("#txbHoraTerminoAtividade").val("");  

    $.ajax({
        //Tipo de envio POST ou GET
        type: "POST",
        dataType: "text",
        data: {         
          action: "buscar",
          cdEvento: cdEvento
        },
  
        url: "../controller/MeusEventosController.php",
  
        //Se der tudo ok no envio...
        success: function (dados) {  
          
            var json = $.parseJSON(dados);
            var eventos = null;
    
            //Carregando a grid
          
            var grid = "";
            
            if(typeof cdEvento == "undefined"){
            
                for (var i = 0; i < json.length; i++) {
                    eventos = json[i];
        
                    moment.locale('pt');
                    grid = grid + "<tr>";
                    grid = grid + "<td>" + eventos.nmEvento + "</td>";
                    grid = grid + "<td>" + eventos.dsEvento + "</td>";
                    grid = grid + "<td>" + moment(eventos.dtInicio).format("DD/MM/YYYY") + "</td>";
                    grid = grid + "<td>" + moment(eventos.dtTermino).format("DD/MM/YYYY") + "</td>";
                    grid = grid + "<td>" + eventos.dsCategoria + "</td>";
                   
                    if(eventos.cdPerfil == 3) {
                        grid = grid + "<td onClick='carregaEventos(" + eventos.cdEvento + ")'><a  href='javascript:void(0);'> <img title='Editar evento' style='width:25px; margin-right: -12px;' class='card-img-top' src='../../imagens/edit_icon.png' alt=''> <span class='glyphicon glyphicon-pencil'></span></a></td>";                
                        grid = grid + "<td onClick='carregarAtividades(" + eventos.cdEvento + ")'><a  href='javascript:void(0);'> <img title='Editar atividade' style='width:25px; margin-right: -12px;' class='card-img-top' src='../../imagens/open_activity_icon.png' alt=''> <span class='glyphicon glyphicon-pencil'></span></a></td>";                                                            
                        grid = grid + "<td ><a href='../../include/view/EventoView.php?cdEvento="+eventos.cdEvento +"' target='_blank'><img title='Abrir evento' style='width:30px; margin-right: -12px;' class='card-img-top' src='../../imagens/link_icon.png' alt=''> <span class='glyphicon glyphicon-pencil'></span></a></td>";                
                        grid = grid + "<td onClick='inativaEvento(" + eventos.cdEvento + ")'><a  href='javascript:void(0);'> <img title='Editar atividade' style='width:25px; margin-right: -12px;' class='card-img-top' src='../../imagens/delete_icon.png' alt=''> <span class='glyphicon glyphicon-pencil'></span></a></td>";                                    
                    }
                    else if(eventos.cdPerfil == 2) {
                        grid = grid + "<td onClick='carregaEventos(" + eventos.cdEvento + ")'><a  href='javascript:void(0);'> <img title='Editar evento' style='width:25px; margin-right: -12px;' class='card-img-top' src='../../imagens/edit_icon.png' alt=''> <span class='glyphicon glyphicon-pencil'></span></a></td>";                
                        grid = grid + "<td onClick='carregarAtividades(" + eventos.cdEvento + ")'><a  href='javascript:void(0);'> <img title='Editar atividade' style='width:25px; margin-right: -12px;' class='card-img-top' src='../../imagens/open_activity_icon.png' alt=''> <span class='glyphicon glyphicon-pencil'></span></a></td>";
                        grid = grid + "<td ><a href='../../include/view/EventoView.php?cdEvento="+eventos.cdEvento +"' target='_blank'><img title='Abrir evento' style='width:30px; margin-right: -12px;' class='card-img-top' src='../../imagens/link_icon.png' alt=''> <span class='glyphicon glyphicon-pencil'></span></a></td>";                
                        grid = grid + "<td></td>";                
                        
                    }                        
                    else if(eventos.cdPerfil == 1) {
                        grid = grid + "<td></td>";                
                        grid = grid + "<td></td>"; 
                        grid = grid + "<td ><a href='../../include/view/EventoView.php?cdEvento="+eventos.cdEvento +"' target='_blank'><img title='Abrir evento' style='width:30px; margin-right: -12px;' class='card-img-top' src='../../imagens/link_icon.png' alt=''> <span class='glyphicon glyphicon-pencil'></span></a></td>";                
                        grid = grid + "<td></td>";                
                        
                    }                    
                    grid = grid + "</tr>";

                }
                if(grid == ""){
                    $("#divForm").css("display","none");                      
                }                                        
                else {
                    $("#divForm").css("display", "block");                 
                }
                                
                
                $("#grdMeusEventos").html(grid);
            } else {
                for (var i = 0; i < json.length; i++) {                    
                    eventos = json[i];

                    $("#txbDataInicio").attr("type","date");
                    $("#txbDataTermino").attr("type","date");
                    $("#hidCdEvento").val(eventos.cdEvento);
                    $("#txbNomeEvento").val(eventos.nmEvento);
                    $("#txbDescricao").val(eventos.dsEvento);
                    $("#txbDataInicio").val(eventos.dtInicio);
                    $("#txbDataTermino").val(eventos.dtTermino);
                    $("#txbHoraInicio").val(eventos.hrInicio);
                    $("#txbHoraTermino").val(eventos.hrTermino);                    
                    $("#txbRua").val(eventos.nmRua);
                    $("#txbNumeroCasa").val(eventos.nrLocal);
                    $("#txbComplemento").val(eventos.dsComplemento);
                    $("#txbCep").val(eventos.nrCep);                    
                    $("#txbCategoria").val(eventos.cdCategoria);
                    
                    if(eventos.idNotificacao == 1)
                        $('#ckbNotificacao').prop('checked', true);
                    else
                        $('#ckbNotificacao').prop('checked', false);

                    $("#txbEstado").val(eventos.cdEstado + " - " + eventos.nmEstado);
                    $("#txbCidade").val(eventos.cdCidade + " - " + eventos.nmCidade); 
                    $("#txbBairro").val(eventos.cdBairro + " - " + eventos.nmBairro);
                }
            }
           
          
        }
      });
}

function carregarAtividades(cdEvento) {
    $("#txbNomeAtividade").val("");
    $("#txbDescricaoAtividade").val("");
    $("#txbDataInicioAtividade").val("");
    $("#txbDataTerminoAtividade").val("");                
    $("#txbHoraInicioAtividade").val("");
    $("#txbHoraTerminoAtividade").val("");  

    $("#btnIncluirAtividade").css("display","block");
    $("#btnAtualizarAtividade").css("display","none");

    $.ajax({
        //Tipo de envio POST ou GET
        type: "POST",
        dataType: "text",
        data: {         
            action: "carregarAtividades",
            cdEvento: cdEvento
        },

        url: "../controller/MeusEventosController.php",

        //Se der tudo ok no envio...
        success: function (dados) {  
            var json = $.parseJSON(dados);
            var atividades = null;

            //Carregando a grid
            
            var grid = "";                   
            
            for (var i = 0; i < json.length; i++) {
                atividades = json[i];
                moment.locale('pt');

                grid = grid + "<tr>";
                grid = grid + "<td>" + atividades.nmAtividade + "</td>";
                grid = grid + "<td>" + atividades.dsAtividade + "</td>";
                grid = grid + "<td>" + moment(atividades.dtAtividadeInicio).format("DD/MM/YYYY") + "</td>";
                grid = grid + "<td>" + moment(atividades.dtAtividadeTermino).format("DD/MM/YYYY") + "</td>";
                grid = grid + "<td>" + atividades.hrInicioAtividade + "</td>";
                grid = grid + "<td>" + atividades.hrTerminoAtividade + "</td>";                
                
                if(atividades.cdPerfil = 3){
                    grid = grid + '<td onClick="editarAtividade(' + atividades.cdEvento + ',' + atividades.cdAtividade + ',\'' + atividades.nmAtividade + '\',\'' + atividades.dsAtividade + '\',\'' + atividades.dtAtividadeInicio + '\',\''  + atividades.dtAtividadeTermino + '\',\'' + atividades.hrInicioAtividade + '\',\''  + atividades.hrTerminoAtividade  +'\')"><a  href="javascript:void(0);"> <img title="Editar atividade" style="width:25px; margin-right: -12px;" class="card-img-top" src="../../imagens/edit_icon.png" alt=""> <span class="glyphicon glyphicon-pencil"></span></a></td>';                                                    
                    grid = grid + '<td onClick="inativaAtividade(' + atividades.cdEvento + ',' + atividades.cdAtividade + ')"><a  href="javascript:void(0);"> <img title="Editar atividade" style="width:25px; margin-right: -12px;" class="card-img-top" src="../../imagens/delete_icon.png" alt=""> <span class="glyphicon glyphicon-pencil"></span></a></td>';                                                    
                }
                else if(atividades.cdPerfil = 2){
                    grid = grid + '<td onClick="editarAtividade(' + atividades.cdEvento + ',' + atividades.cdAtividade + ',\'' + atividades.nmAtividade + '\',\'' + atividades.dsAtividade + '\',\'' + atividades.dtAtividadeInicio + '\',\''  + atividades.dtAtividadeTermino + '\',\'' + atividades.hrInicioAtividade + '\',\''  + atividades.hrTerminoAtividade  +'\')"><a  href="javascript:void(0);"> <img title="Editar atividade" style="width:25px; margin-right: -12px;" class="card-img-top" src="../../imagens/edit_icon.png" alt=""> <span class="glyphicon glyphicon-pencil"></span></a></td>';                                                    
                    grid = grid + '<td></td>';                                                    
                }
                
                grid = grid + "</tr>";

            }
            
            $("#hidCdEventoAtividade").val(cdEvento);
            $("#grdAtividades").html(grid);

            $("#divAtividades").css("display","block");
            $("#frmAtividades").css("display","block");
            $("#frmAtualizarEvento").css("display","none");
        }
    });

}

function inativaEvento(cdEvento) {
    $.ajax({
        type: "POST",
        dataType: "text",
        data: {          
          action: "inativaevento",
          cdEvento: cdEvento
        },
  
        url: "../controller/MeusEventosController.php",
  
        //Se der tudo ok no envio...
        success: function (dados) {                        
            jbkrAlert.sucesso('Evento', 'Evento excluido com sucesso.');
            carregaEventos();
        }
    });

}

function inativaAtividade(cdEvento, cdAtividade) {
    $.ajax({
        type: "POST",
        dataType: "text",
        data: {          
          action: "inativaatividade",
          cdEvento: cdEvento,
          cdAtividade: cdAtividade
        },
  
        url: "../controller/MeusEventosController.php",
  
        //Se der tudo ok no envio...
        success: function (dados) {                        
            jbkrAlert.sucesso('Atividade', 'Atividade excluida com sucesso.');            
            carregarAtividades(cdEvento);
        }
    });

}



function editarAtividade(cdEvento, cdAtividade, nmAtividade, dsAtividade, dtAtividadeInicio, dtAtividadeTermino, hrInicioAtividade, hrTerminoAtividade) {

    $("#hidCdAtividade").val(cdAtividade);  
    $("#hidCdEventoAtividade").val(cdEvento);  
    
    $("#txbDataInicioAtividade").attr("type","date");
    $("#txbDataTerminoAtividade").attr("type","date");
    $("#txbNomeAtividade").val(nmAtividade);
    $("#txbDescricaoAtividade").val(dsAtividade);
    $("#txbDataInicioAtividade").val(dtAtividadeInicio);
    $("#txbDataTerminoAtividade").val(dtAtividadeTermino);                
    $("#txbHoraInicioAtividade").val(hrInicioAtividade);
    $("#txbHoraTerminoAtividade").val(hrTerminoAtividade);  
    
    $("#btnIncluirAtividade").css("display","none");
    $("#btnAtualizarAtividade").css("display","block");

}

function buscaCategoria() {

    $.ajax({
        //Tipo de envio POST ou GET
        type: "POST",
        dataType: "text",
        data: {          
          action: "buscacategoriadropdown"
        },
  
        url: "../controller/CadastroEventoController.php",
        success: function (dados) {
          var json = $.parseJSON(dados);
  
          var dropdown;
          
          dropdown = dropdown + '<option value="" disabled selected>Categorias</option>';
          for (var i = 0; i < json.length; i++) {
  
            var categoria = json[i];
  
            dropdown = dropdown + '<option value="' + categoria.cdCategoria  + '">'+ categoria.dsCategoria +'</option>';
  
          }
          $("#txbCategoria").html(dropdown);
  
        }
  
      });
  
  
  }

function validaCampos(txbNomeEvento, txbDescricao, txbDataInicio, txbDataTermino, txbHoraInicio, txbHoraTermino, txbBairro
                    , txbRua, txbNumero, txbCep, txbEstado, txbCidade, txbCategoria, txbImagem) {

    msgErro = "";

    if(txbNomeEvento === ""){
        msgErro = msgErro + "<b>Nome</b> é um campo de preenchimento obrigatorio<br/>";
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

function validaCamposAtividade(txbNomeAtividade, txbDescricaoAtividade, txbDataInicioAtividade, txbDataTerminoAtividade, txbHoraInicioAtividade, txbHoraTerminoAtividade) {
    msgErroAtividade = "";
    
    if(txbNomeAtividade === ""){
        msgErroAtividade = msgErroAtividade + "<b>Nome</b> é um campo de preenchimento obrigatorio<br/>";
    }

    if(txbDescricaoAtividade === ""){
        msgErroAtividade = msgErroAtividade + "<b>Descrição</b> é um campo de preenchimento obrigatorio<br/>";
    }

    if(txbDataInicioAtividade === ""){
        msgErroAtividade = msgErroAtividade + "<b>Data Inicio</b> é um campo de preenchimento obrigatorio<br/>";
    }

    if(txbDataTerminoAtividade === ""){
        msgErroAtividade = msgErroAtividade + "<b>Data Termino</b> é um campo de preenchimento obrigatorio<br/>";
    }
    var dataInicio = new Date(txbDataInicioAtividade);
    var dataTermino = new Date(txbDataTerminoAtividade);

    if(dataInicio > dataTermino){      
        msgErroAtividade = msgErroAtividade + "<b>Data Inicio</b> não pode ser maior que a <b>Data Término</b><br/>";
    }


    if(txbHoraInicioAtividade === ""){
        msgErroAtividade = msgErroAtividade + "<b>Hora de Inicio</b> é um campo de preenchimento obrigatorio<br/>";
    }

    if(txbHoraTerminoAtividade === ""){
        msgErroAtividade = msgErroAtividade + "<b>Hora de Término</b> é um campo de preenchimento obrigatorio<br/>";
    }

    return msgErroAtividade;

}

