$(document).ready(function(){

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


});

function carregaEventos(){
    
  $.ajax({
      //Tipo de envio POST ou GET
      type: "POST",
      dataType: "text",
      data: {          
        action: "buscar"
      },

      url: "../controller/PaginaInicialController.php",

      //Se der tudo ok no envio...
      success: function (dados) {  
        
        var json = $.parseJSON(dados);
        var usuario = null;

        var listaEventos = "";
        for (var i = 0; i < json.length; i++) {
          usuario = json[i];
          listaEventos = listaEventos + "<div class='col-lg-4 col-sm-6 portfolio-item'>";
          listaEventos = listaEventos + "<div class='card h-100'>";
          listaEventos = listaEventos + "<a href='#'><img class='card-img-top' src='../../imagens/" + usuario.nmImagem + "' alt=''></a>";
          listaEventos = listaEventos + "<div class='card-body'>";
          listaEventos = listaEventos + "<h4 class='card-title'>";
          listaEventos = listaEventos + "<a href='#'>" + usuario.nmEvento + "</a>";
          listaEventos = listaEventos + "</h4>";
          listaEventos = listaEventos + "<p class='card-text'>" + usuario.dsEvento + "</p>";
          listaEventos = listaEventos + "</div>";
          listaEventos = listaEventos + "</div>";
          listaEventos = listaEventos + "</div>";   
          $("#divListaEventos").html(listaEventos);
        } 
      }
    });
}