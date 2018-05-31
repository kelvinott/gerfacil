<?php
session_start();

if(isset($_SESSION["cdUsuario"])) 
  $_SESSION['userid'] = $_SESSION["cdUsuario"]; 
?>
<!DOCTYPE html>
<html>
  <head>
  <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
    <meta charset="utf-8">
	  <title>GerFacil - Gerenciador de eventos</title>
    <link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap.min.css">  
    <script type="text/javascript" src="../../lib/jquery/jquery.min.js"></script>    
    <script type="text/javascript" src="../../lib/jquery/jquery-ui.min.js"></script>    
    <link rel="stylesheet" href="../../lib/jquery/jquery-ui.min.css">    
    <script type="text/javascript" src="../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>    
    <link rel="stylesheet" href="../../css/alerta.css">    
    <script type="text/javascript" src="../../js/paginainicial.js"></script>                    
    <script type="text/javascript" src="../../js/alerta.js"></script>
    <script type="text/javascript" src="../../js/geral.js"></script>
    
    
    
    <!-- Custom styles for this template -->
    <link href="../../css/3-col-portfolio.css" rel="stylesheet">
  <!-- start orangechat code -->
  <link type="text/css" rel="stylesheet" media="all" href="../../orangechat/orangechat/orangecss.php" />
  <script type="text/javascript" src="../../orangechat/orangechat/orangejs.php"></script>
  <!-- end orangechat code -->

    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '2048906665380754',
          cookie     : true,
          xfbml      : true,
          version    : 'v2.12'
      });
          
        FB.AppEvents.logPageView();   
      };

      function checkLoginState() {
          FB.getLoginStatus(function(response) {

            if(response.status === 'connected'){
              testAPI();
            }

            statusChangeCallback(response);
          });
        }     

      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/pt_BR/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
      

      function testAPI() {        
        FB.api('/me', {fields: 'short_name,last_name',}, function(response) {          
          //CADASTRO DO USUÁRIO
          $.ajax({
              //Tipo de envio POST ou GET
              type: "POST",
              dataType: "text",
              data: {
                  id: response.id,
                  nome: response.short_name,              
                  sobrenome: response.last_name,  
                  action: "cadastrar"
              },

              url: "../controller/CadastroController.php",

              //Se der tudo ok no envio...
              success: function (dados) {            
                var json = $.parseJSON(dados);

                if (json.status == 0) {
                  $(location).attr('href', 'PaginaInicialView.php'); 
                }
                  
              }
          });          
        });
      }
    </script>

  </head>

  <body>
    <input type="hidden" id="hidflginfo"></input>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#" id="btnGerfacil" >GerFacil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive" >
          <ul class="navbar-nav ml-auto" >
            <li id="btnLoginTela" class="nav-item" <?php if(!isset($_SESSION["dsNome"])){ echo 'style="display:inherit;"'; } else {  echo 'style="display:none"'; } ?>>
              <a class="nav-link" href="#">Login</a>
            </li>
            <li id="btnCadastro" class="nav-item" <?php if(!isset($_SESSION["dsNome"])){ echo 'style="display:inherit;"'; } else {  echo 'style="display:none"'; } ?>>
              <a class="nav-link" href="#">Cadastrar</a>
            </li>            
            <li class="nav-item" <?php if(!isset($_SESSION["dsNome"])){ echo 'style="display:inherit;"'; } else {  echo 'style="display:none"'; } ?>>
              <div class="fb-login-button" data-max-rows="1" data-size="small" data-button-type="login_with" 
              data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false" onlogin="checkLoginState();"></div>
            </li>
          </ul>
          <a id="btnCadastroEvento" <?php if(!isset($_SESSION["dsNome"])){ echo 'style="display:none; padding-bottom: 0; padding-top: 0; padding-left: 0; padding-right: 20px;"'; } else {  echo 'style="display:block; padding-bottom: 0; padding-top: 0; padding-left: 0; padding-right: 20px;"'; } ?>  class="nav-link" href="#"><img style="width:40px;" class="card-img-top" src="../../imagens/event_icon.png" title="Adicionar novo Evento" alt=""></a>
          <ul class="nav navbar-nav navbar-right" <?php if(!isset($_SESSION["dsNome"])){ echo 'style="display:none;"'; } else {  echo 'style="display:block"'; } ?>>
            <li class="dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-user"></i><?php echo ucfirst($_SESSION["dsNome"]); echo " " . ucfirst($_SESSION["dsSobrenome"]) ?> </a>
                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                  <li>
                    <a class="dropdown-item" id="btnMeusEventos" id="perfil" href="#"> Meus Eventos</a>
                  </li>
                  <li>
                    <a class="dropdown-item" id="btnEditarPerfil" id="perfil" href="#"> Editar Perfil</a>
                  </li>
                  <li <?php if(isset($_SESSION["idFacebook"])){ echo 'style="display:none;"'; } else {  echo 'style="display:block"'; } ?>>
                    <a class="dropdown-item" id="btnAlterarSenha" id="perfil" href="#"> Alterar Senha</a>
                  </li >        
                  <div class="dropdown-divider"></div>
                  <li>
                    <a class="dropdown-item" id="btnSair" href="Sair.php">Sair</a>
                  </li>
                </ul>
            </li>              
          </ul>
        </div>
      </div>
    </nav>

    
    <!-- Page Content -->
    <div id="divPrincipal" class="container">
    <!-- Page Heading -->
      </br>
      <div class="row">	              
        <div class="col-md-2"></div>
        <div class="col-md-7">
          <div class="form-group has-danger">
            <label class="sr-only" for="PesquisarEventos">Pesquisar Eventos</label>
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">            
              <input style="height:50px;font-size:20px;" type="text" name="txbPesquisarEventos" class="form-control" id="txbPesquisarEventos"
                  placeholder="Pesquisar Eventos" required autofocus>
            </div>
           
            
          </div>
        </div>
        <div class="col-md-1"><button type="button" id="btnPesquisar" class="btn btn-primary" style="height:50px;font-size: 18px;"> Pesquisar</button></div>
      </div>
      </br>
      </br>
      <div id="divListaEventos" class="row">
        
      </div>
      <!-- /.row -->

      <!-- Pagination -->
      <ul id="ulPaginacao" class="pagination justify-content-center"></ul>
      
      <input type="hidden" id="hidInicio" value="1"/>
      <input type="hidden" id="hidFim" value="6"/>
      <input type="hidden" id="hidNumeracao" value="1"/>

      <div id="map"></div>
      <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK7x4MCnSGCqjLtaXt03BvAxLqPW-trVQ&callback=initMap">
      </script>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

  </body>

</html>
