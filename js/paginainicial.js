$(document).ready(function(){
  var map;
  initializeMap();
  carregaEventos();
  
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
  

  $("#btnPesquisar").click(function(){
    carregaEventos($("#txbPesquisarEventos").val());
  });


});

function carregaEventos(pesquisar, metodo){
  
  var hidInicio = $("#hidInicio").val();
  var hidFim = $("#hidFim").val();

  $.ajax({
      //Tipo de envio POST ou GET
      type: "POST",
      dataType: "text",
      data: {          
        pesquisar: pesquisar,
        hidInicio: hidInicio,
        hidFim: hidFim,
        action: "buscar"
      },

      url: "../controller/PaginaInicialController.php",

      //Se der tudo ok no envio...
      success: function (dados) {  
        
        var json = $.parseJSON(dados);
        var usuario = null;

        var listaEventos = "";
        var jsonCeps = "[";
        var contadorCeps = 0;
        var qtdPaginacao = 1;
        var contPaginacao = 1;
        var itensPaginacao = "";
                
        if(json.length == 0) {          
          if(typeof metodo != "undefined"){
            if(metodo == "1"){
              var inicio = parseInt($("#hidInicio").val());
              var fim = parseInt($("#hidFim").val());              
              inicio = inicio - 6;
              fim = fim - 6;
              
              $("#hidInicio").val(inicio);
              $("#hidFim").val(fim);

            } else if(metodo == "2") {
              var inicio = parseInt($("#hidInicio").val());
              var fim = parseInt($("#hidFim").val());              
              inicio = inicio + 6;
              fim = fim + 6;
              
              $("#hidInicio").val(inicio);
              $("#hidFim").val(fim);
            }
          }

          jbkrAlert.alerta('Alerta!','Não há mais registros!');
          return;
        }

        for (var i = 0; i < json.length; i++) {

          usuario = json[i];

          contadorCeps = contadorCeps + 1;

          jsonCeps = jsonCeps + '{"nrCep": "' + usuario.nrCep + '"}';

          //Para não concatenar a virgula no final do json
          if(json.length != contadorCeps)
            jsonCeps = jsonCeps + ',';

          
          if(usuario.qtdPaginacao <= 6) {
            qtdPaginacao = 1;
          }
          else if(usuario.qtdPaginacao > 6) {
            qtdPaginacao = 2;
          }
          else if(usuario.qtdPaginacao > 6) {
            qtdPaginacao = 3;
          }
          else if(usuario.qtdPaginacao > 6) {
            qtdPaginacao = 4;
          }
          else if(usuario.qtdPaginacao > 6) {
            qtdPaginacao = 5;
          }

          listaEventos = listaEventos + "<div class='col-lg-4 col-sm-6 portfolio-item'>";
          listaEventos = listaEventos + "<div class='card h-100'>";
          listaEventos = listaEventos + "<a href='../../include/view/EventoView.php?cdEvento="+usuario.cdEvento +"' target='_blank'><img style='max-width: 350px; max-height: 250px;' class='card-img-top' src='../../imagens/" + usuario.nmImagem + "' alt=''></a>";
          listaEventos = listaEventos + "<div class='card-body'>";
          listaEventos = listaEventos + "<h4 class='card-title'>";
          listaEventos = listaEventos + "<a href='#'>" + usuario.nmEvento + "</a>";
          listaEventos = listaEventos + "</h4>";
          listaEventos = listaEventos + "<p class='card-text'>" + usuario.dsEvento.substring(0, 90); + "</p>";
          listaEventos = listaEventos + "</div>";
          listaEventos = listaEventos + "</div>";
          listaEventos = listaEventos + "</div>";   
          $("#divListaEventos").html(listaEventos);
        }
        
        itensPaginacao = itensPaginacao + "<li class='page-item'><a onClick='paginaAnterior();' class='page-link' href='#' aria-label='Previous'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a></li>";
      
        for (var j = 0; j < qtdPaginacao; j++) {

          contPaginacao = j + 1;
          
          itensPaginacao = itensPaginacao + "<li class='page-item'><a onClick='paginaNumeracao("+ contPaginacao +");'class='page-link' href='#'>" + contPaginacao + "</a></li>"          
        }
        
        itensPaginacao = itensPaginacao + "<li class='page-item'><a onClick='paginaProxima();' class='page-link' href='#' aria-label='Next'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a></li>";

        $("#ulPaginacao").html(itensPaginacao);

        jsonCeps = jsonCeps + "]";
        
        redirecionarCEP(jsonCeps);
        
      }
    });
}

function paginaProxima(){
  var inicio = parseInt($("#hidInicio").val());
  var fim = parseInt($("#hidFim").val());
  
  inicio = inicio + 6;
  fim = fim + 6;
  
  $("#hidInicio").val(inicio);
  $("#hidFim").val(fim);
  
  carregaEventos($("#txbPesquisarEventos").val(),"1");

}

function paginaAnterior(){
  
  var inicio = parseInt($("#hidInicio").val());
  var fim = parseInt($("#hidFim").val());

  inicio = inicio - 6;
  fim = fim - 6;

  $("#hidInicio").val(inicio);
  $("#hidFim").val(fim);

  carregaEventos($("#txbPesquisarEventos").val(),"2");

}

function paginaNumeracao(numero) {
  
  fim = numero * 6;

  inicio = fim - 5;
  

  $("#hidInicio").val(inicio);
  $("#hidFim").val(fim);

  carregaEventos($("#txbPesquisarEventos").val());
  
}

function initializeMap(){
  cep = "89107000";
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