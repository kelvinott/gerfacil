$(document).ready(function(){  
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