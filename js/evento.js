$(document).ready(function() {      
    
    validaInformacoesPerfil();
    
    $("#fbComentarios").attr("data-href","https://developers.facebook.com/docs/plugins/cdEvento#" + gup("cdEvento", $(location).attr("href")));
    
    $("#btnGerfacil").click(function(){
        $(location).attr('href', 'PaginaInicialView.php');         
      });
    
    
      $("#btnLoginTela").click(function(){
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
    
      $("#btnCadastro").click(function(){
        $.ajax({
          //Tipo de envio POST ou GET
          type: "POST",
          dataType: "text",
          url: "../view/CadastroView.php",
          //Se der tudo ok no envio...
          success: function (callback) {
            $("#divPrincipal").html(callback);
          }
        });	
      });
      $("#btnCadastroEvento").click(function(){
        if($("#hidflginfo").val() != ""){
            jbkrAlert.alerta('Alerta!',"Para utilizar essa funcionalidade é necessário atualizar seu perfil.");
        } else {
            $.ajax({
                //Tipo de envio POST ou GET
                type: "POST",
                dataType: "text",
                url: "../view/CadastroEventoView.php",
                //Se der tudo ok no envio...
                success: function (callback) {
                    $("#divPrincipal").html(callback);
                }
            });    	
        }	
      });
    
      $("#btnAlterarSenha").click(function(){
        $.ajax({
          //Tipo de envio POST ou GET
          type: "POST",
          dataType: "text",
          url: "../view/AtualizarSenhaView.php",
          //Se der tudo ok no envio...
          success: function (callback) {
            $("#divPrincipal").html(callback);
          }
        });	
      });
    
      $("#btnEditarPerfil").click(function(){
        $.ajax({
          //Tipo de envio POST ou GET
          type: "POST",
          dataType: "text",
          url: "../view/AtualizarPerfilView.php",
          //Se der tudo ok no envio...
          success: function (callback) {
            $("#divPrincipal").html(callback);
          }
        });	
      });
    
      $("#btnMeusEventos").click(function(){
        $.ajax({
          //Tipo de envio POST ou GET
          type: "POST",
          dataType: "text",
          url: "../view/MeusEventosView.php",
          //Se der tudo ok no envio...
          success: function (callback) {
            $("#divPrincipal").html(callback);
          }
        });	
      });

    $("#btnParticipar").click(function(){    
        $.ajax({
            type: "POST",
            dataType: "text",
            data: {          
              action: "participar",
              cdEvento: gup("cdEvento", $(location).attr("href"))
            },
      
            url: "../controller/EventoController.php",
      
            //Se der tudo ok no envio...
            success: function (dados) {            
                $("#divParticipar").css("display","none");
                $("#divDesparticipar").css("display","inline-block");
                $("#avaliacao").css("display","inline-block");
                jbkrAlert.sucesso('Evento', 'Participação concluída com sucesso.');
            }
        });
    
    });

    $("#btnDesparticipar").click(function(){    
        $.ajax({
            type: "POST",
            dataType: "text",
            data: {          
              action: "desparticipar",
              cdEvento: gup("cdEvento", $(location).attr("href"))
            },
      
            url: "../controller/EventoController.php",
      
            //Se der tudo ok no envio...
            success: function (dados) {            
                $("#divParticipar").css("display","inline-block");
                $("#divDesparticipar").css("display","none");
                $("#avaliacao").css("display","none");
                jbkrAlert.sucesso('Evento', 'Desparticipação concluída com sucesso.');
            }
        });
    
    });

    

    $("#estrela_um").click(function(){
        avaliar($("#estrela_um").val());
    });
    $("#estrela_dois").click(function(){
        avaliar($("#estrela_dois").val());
    });
    $("#estrela_tres").click(function(){
        avaliar($("#estrela_tres").val());
    });
    $("#estrela_quatro").click(function(){
        avaliar($("#estrela_quatro").val());
    });
    $("#estrela_cinco").click(function(){
        avaliar($("#estrela_cinco").val());
    });

    validaParticipacao();
    carregaEvento();
    carregaParticipantes();
    validaCoordenacao();
    carregarAtividades();
});

function carregaEvento(){
    var map;
    $.ajax({
        type: "POST",
        dataType: "text",
        data: {          
          action: "buscar",
          cdEvento: gup("cdEvento", $(location).attr("href"))
        },
  
        url: "../controller/EventoController.php",
  
        //Se der tudo ok no envio...
        success: function (dados) {
                
            var json = $.parseJSON(dados);
            var evento = null;

            var infoEvento = "";
            
            for (var i = 0; i < json.length; i++) {

                evento = json[i];
               
                moment.locale('pt');
                $("#nmEvento").text(evento.nmEvento);
                $("#dsEndereco").text(evento.nmCidade + " - " + evento.nmEstado);
                $("#dtEvento").text(moment(evento.dtInicio).format('LL') + ", " + evento.hrInicio);               
                $("#dsEvento").text(evento.dsEvento);
                $("#imgEvento").attr("src", "../../imagens/" + evento.nmImagem);

                
                initializeMap(evento.nrCep);
                redirecionarCEP('[{"nrCep": "' + evento.nrCep + '"}]'); 
            }            
        }
    });

}

function carregarAtividades() {
   
    $.ajax({
        //Tipo de envio POST ou GET
        type: "POST",
        dataType: "text",
        data: {         
            action: "carregarAtividades",
            cdEvento: gup("cdEvento", $(location).attr("href"))
        },

        url: "../controller/EventoController.php",

        //Se der tudo ok no envio...
        success: function (dados) {  
            var json = $.parseJSON(dados);
            var atividades = null;

            var dsAtividade = "";
            moment.locale('pt');
            for (var i = 0; i < json.length; i++) {
                atividades = json[i];
                dsAtividade = dsAtividade + "<p id='dsAtividade' style='text-align:justify; margin-bottom: 0px;'><span style='font-size:18px;'> "+ atividades.nmAtividade + "</span> <span style='font-size:12px;'>("+ atividades.dsAtividade + " - </span> <span style='font-size:12px;'>" +  moment(atividades.dtAtividadeInicio).format('LL') + ", " + atividades.hrInicioAtividade  +  "</span>)</p>";
            }
            
            if(dsAtividade == "")
                dsAtividade = "<p id='dsAtividade' style='text-align:justify; margin-bottom: 0px;'><span style='font-size:18px;'>Não há atividades cadastradas<p>"
                
            $("#dsAtividade").html(dsAtividade);
        }
    });

}

function carregaParticipantes(){
    $.ajax({
        type: "POST",
        dataType: "text",
        data: {          
          action: "participantes",
          cdEvento: gup("cdEvento", $(location).attr("href"))
        },
  
        url: "../controller/EventoController.php",
  
        //Se der tudo ok no envio...
        success: function (dados) {
            var json = $.parseJSON(dados);
            var participante = null;
            grid = "";
            var infoEvento = "";
            
            for (var i = 0; i < json.length; i++) {

                participante = json[i];
                grid = grid + "<tr>";
                grid = grid + "<td>" + participante.dsNome + " " +  participante.dsSobrenome + "</td>";    
                
                if(participante.cdPerfil == "1") {
                    grid = grid + "<td  title='Atribuir perfil cooperador' style='width: 50px;' ><a  href='javascript:void(0);'> <img onClick='atribuirPerfil(" + participante.cdEvento + "," + participante.cdUsuario + ")' id='tdParticipanteAtribuir" + participante.cdEvento + participante.cdUsuario + "' style='width:25px; margin-right: -12px;' class='card-img-top' src='../../imagens/access_icon.png' alt=''> <img onClick='removerPerfil(" + participante.cdEvento + "," + participante.cdUsuario + ")' id='tdParticipanteRemover" + participante.cdEvento + participante.cdUsuario + "' style='width:25px; margin-right: -12px; display:none;' class='card-img-top' src='../../imagens/access_remove_icon.png' alt=''> <span class='glyphicon glyphicon-pencil'></span></a></td>";                                                                                
                }
                else if(participante.cdPerfil == "2") {
                    grid = grid + "<td  title='Atribuir perfil cooperador' style='width: 50px;' ><a  href='javascript:void(0);'> <img onClick='atribuirPerfil(" + participante.cdEvento + "," + participante.cdUsuario + ")' id='tdParticipanteAtribuir" + participante.cdEvento + participante.cdUsuario + "' style='width:25px; margin-right: -12px;  display:none;' class='card-img-top' src='../../imagens/access_icon.png' alt=''> <img onClick='removerPerfil(" + participante.cdEvento + "," + participante.cdUsuario + ")' id='tdParticipanteRemover" + participante.cdEvento + participante.cdUsuario + "' style='width:25px; margin-right: -12px;' class='card-img-top' src='../../imagens/access_remove_icon.png' alt=''> <span class='glyphicon glyphicon-pencil'></span></a></td>";
                }
                else
                    grid = grid + "<td style='width: 50px;'></td>";                                                    
                grid = grid + "</tr>";
                $("#grdParticipantes").html(grid);
              
            }            
            
        }
    });

}

function atribuirPerfil(cdEvento, cdUsuario){
    $.ajax({
        type: "POST",
        dataType: "text",
        data: {          
          action: "atribuirperfil",
          cdEvento: cdEvento,
          cdUsuario: cdUsuario          
        },
  
        url: "../controller/EventoController.php",
  
        //Se der tudo ok no envio...
        success: function (dados) {            
            $("#tdParticipanteAtribuir" + cdEvento + cdUsuario).css("display","none");
            $("#tdParticipanteRemover" + cdEvento + cdUsuario).css("display","block");
            
            jbkrAlert.sucesso('Evento', 'Atribuição de cooperador realizada com sucesso.');
        }
    });

}

function removerPerfil(cdEvento, cdUsuario){
    $.ajax({
        type: "POST",
        dataType: "text",
        data: {          
          action: "removerperfil",
          cdEvento: cdEvento,
          cdUsuario: cdUsuario          
        },
  
        url: "../controller/EventoController.php",
  
        //Se der tudo ok no envio...
        success: function (dados) {            
            $("#tdParticipanteAtribuir" + cdEvento + cdUsuario).css("display","block");
            $("#tdParticipanteRemover" + cdEvento + cdUsuario).css("display","none");
            
            jbkrAlert.sucesso('Evento', 'Atribuição de cooperador removida com sucesso.');
        }
    });

}

function validaParticipacao(){
    $.ajax({
        type: "POST",
        dataType: "text",
        data: {          
          action: "validaparticipacao",
          cdEvento: gup("cdEvento", $(location).attr("href"))
        },
  
        url: "../controller/EventoController.php",
  
        //Se der tudo ok no envio...
        success: function (dados) {
            
            if(dados == "1") {
                $("#divDesparticipar").css("display","inline-block");
                $("#divParticipar").css("display","none");
                $("#avaliacao").css("display","inline-block");
            } else if(dados == "3") {
                $("#divDesparticipar").css("display","inline-block");
                $("#divParticipar").css("display","none");
                $("#avaliacao").css("display","none");
            } else {
                $("#avaliacao").css("display","none");
                $("#divDesparticipar").css("display","none");
                $("#divParticipar").css("display","inline-block");
            }
            
        }
    });

}

function avaliar(qtEstrela){
    $.ajax({
        type: "POST",
        dataType: "text",
        data: {          
          action: "avaliar",
          cdEvento: gup("cdEvento", $(location).attr("href")),
          qtEstrela: qtEstrela
        },
  
        url: "../controller/EventoController.php",
  
        //Se der tudo ok no envio...
        success: function (dados) {            
            
        }
    });

}

function validaCoordenacao(){
    $.ajax({
        type: "POST",
        dataType: "text",
        data: {          
          action: "validacoordenacao",
          cdEvento: gup("cdEvento", $(location).attr("href"))
        },
  
        url: "../controller/EventoController.php",
  
        //Se der tudo ok no envio...
        success: function (dados) {                   
            if(dados == "3") {
                $("#participantes").css("display","block");
                $("#divDesparticipar").css("display","none");
                $("#btnParticipar").css("display","none");
                $("#btnDesparticipar").css("display","none");
            }
            else if(dados == "2")
                $("#participantes").css("display","none");        
            else if(dados == "1")
                $("#participantes").css("display","none");        
            else
                $("#participantes").css("display","none");        
                
            
        }
    });

}

function gup(name, url ) {
    if (!url) url = location.href;
    name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
    var regexS = "[\\?&]"+name+"=([^&#]*)";
    var regex = new RegExp( regexS );
    var results = regex.exec( url );
    return results == null ? null : results[1];
}

function initializeMap(cep){
    
    var url_geocode = 'https://maps.googleapis.com/maps/api/geocode/json?address=' + cep + '&key=AIzaSyAK7x4MCnSGCqjLtaXt03BvAxLqPW-trVQ';
    //abre uma nova aba com o json do geocode
    //window.open(url_geocode,'_blank');
  
    $.getJSON(url_geocode, function (data) {
      var latitude = data.results[0].geometry.location.lat;
      var longitude = data.results[0].geometry.location.lng;
  
      var posicao = {lat: latitude, lng: longitude};
    
      var options = {
        zoom: 11,
        center: posicao
      };
      
  
      map = new google.maps.Map(document.getElementById('map'), options);
    }); 
    
  
}

function carregaPontos(latitude, longitude){
    var posicao = {lat: latitude, lng: longitude};
    var marker = new google.maps.Marker({
      position: posicao,
      map: map
    });

}

function redirecionarCEP(dados){

  jsonCeps = $.parseJSON(dados);
  var jsonPosicoes = "";
  for (var i = 0; i < jsonCeps.length; i++) {
    
    var cep = jsonCeps[i].nrCep;

    var url_geocode = 'https://maps.googleapis.com/maps/api/geocode/json?address=' + cep + '&key=AIzaSyAK7x4MCnSGCqjLtaXt03BvAxLqPW-trVQ';

    $.getJSON(url_geocode, function (data) {
    
      var latitude = data.results[0].geometry.location.lat;
      var longitude = data.results[0].geometry.location.lng;
      
      carregaPontos(latitude, longitude);
         

    });
    
  }
}

function validaInformacoesPerfil(){
    
    $.ajax({
        //Tipo de envio POST ou GET
        type: "POST",
        dataType: "text",
        data: {          
          action: "validainformacoesperfil"
        },
  
        url: "../controller/CadastroEventoController.php",
  
        //Se der tudo ok no envio...
        success: function (dados) {            
          $("#hidflginfo").val(dados);          
  
        }
      });
}