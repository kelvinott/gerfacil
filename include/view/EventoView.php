<?php
session_start();

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
	  <script type="text/javascript" src="../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>     
    <script type="text/javascript" src="../../js/evento.js"></script>
    <script type="text/javascript" src="../../lib/moment/moment.min.js"></script>
    <link rel="stylesheet" href="../../css/alerta.css">
    <script type="text/javascript" src="../../js/alerta.js"></script>
    <script type="text/javascript" src="../../js/geral.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="../../css/3-col-portfolio.css" rel="stylesheet">

    <style type="text/css">
      .estrelas input[type=radio]{
        display: none;
      }.estrelas label i.fa:before{
        content: '\f005';
        color: #FC0;
      }.estrelas  input[type=radio]:checked  ~ label i.fa:before{
        color: #CCC;
      }
    </style>
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

      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/pt_BR/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));

     
    </script>

    <div id="fb-root"></div>


  </head>

  <body>
  <input type="hidden" id="hidflginfo"></input>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
      <a class="navbar-brand" href="#" id="btnGerfacil" ><img class="card-img-top" src="../../imagens/logo_gerfacil.png" alt="" style="    width: 188px;height: 92px;position: absolute;top: -21px;"></a>
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
              data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
            </li>
          </ul>
          <a id="btnCadastroEvento" <?php if(!isset($_SESSION["dsNome"])){ echo 'style="display:none; padding-bottom: 0; padding-top: 0; padding-left: 0; padding-right: 20px;"'; } else {  echo 'style="display:block; padding-bottom: 0; padding-top: 0; padding-left: 0; padding-right: 20px;"'; } ?>  class="nav-link" href="#"><img style="width:40px;" class="card-img-top" src="../../imagens/event_icon.png" title="Adicionar novo Evento" alt=""></a>
          <ul class="nav navbar-nav navbar-right" <?php if(!isset($_SESSION["dsNome"])){ echo 'style="display:none;"'; } else {  echo 'style="display:block"'; } ?>>
            <li class="dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-user"></i><?php echo ucfirst($_SESSION["dsNome"]); echo " " . ucfirst($_SESSION["dsSobrenome"]) ?> </a>
                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                  <li>
                    <a class="dropdown-item" id="btnMeusEventos" id="perfil" href="#"> Meus Eventos</a>
                  </li >
                  <li>
                    <a class="dropdown-item" id="btnEditarPerfil" id="perfil" href="#"> Atualizar Perfil</a>
                  </li >
                  <li >
                    <a class="dropdown-item" id="btnAlterarSenha" id="perfil" href="#"> Alterar Senha</a>
                  </li >        
                  <div class="dropdown-divider"></div>
                  <li >
                    <a class="dropdown-item"href="Sair.php">Sair</a>
                  </li>
                </ul>
            </li>              
          </ul>
        </div>
      </div>
    </nav>

    
    <!-- Page Content -->
    <div id="divPrincipal" class="container">

      <div style="padding:0px;" class="container border-left border-right event-section bg-white" id="info">
      
        <img id="imgEvento" style="height:250px;" class="card-img-top" alt="">
        
      </div>
      
    
      <div style="padding:0px;" class="container border-left border-right event-section bg-white" id="info">
        
        <div style="display:inline-block; max-width: 65.666667%;" class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
          
          
          <div style="display:inline-block; width:50%">
            <h1 id="nmEvento" style="color: #50525f;font-family: 'Open Sans', 'Raleway', sans-serif;" class="uppercase"></h1>
          </div>  
          
          </br>

          <div style="display:inline-block">
            <img style="width:15px" class="card-img-top" src="../../imagens/location_icon.png" alt="">
          </div>

          <div style="display:inline-block" id="dsEndereco" style="color: #50525f;font-family: 'Open Sans', 'Raleway', sans-serif;"></div>

          </br>

          <div style="display:inline-block">
            <img style="width:15px" class="card-img-top" src="../../imagens/calendar_icon.png" alt="">
          </div>

          <div style="display:inline-block" id="dtEvento" style="color: #50525f;font-family: 'Open Sans', 'Raleway', sans-serif;"> </div>

        </div>
        
        <div id="avaliacao" class="estrelas" style="display: inline-block;">
          Avalição:
          <input type="radio" id="vazio" name="estrela" value="" checked>
          
          <label for="estrela_um"><i class="fa"></i></label>
          <input type="radio" id="estrela_um" name="estrela" value="1">
          
          <label for="estrela_dois"><i class="fa"></i></label>
          <input type="radio" id="estrela_dois" name="estrela" value="2">
          
          <label for="estrela_tres"><i class="fa"></i></label>
          <input type="radio" id="estrela_tres" name="estrela" value="3">
          
          <label for="estrela_quatro"><i class="fa"></i></label>
          <input type="radio" id="estrela_quatro" name="estrela" value="4">
          
          <label for="estrela_cinco"><i class="fa"></i></label>
          <input type="radio" id="estrela_cinco" name="estrela" value="5"><br><br><br><br>
          
        </div>
        <div id="divParticipar" style="display:inline-block;" class="float-right" ><button <?php if(!isset($_SESSION["dsNome"])){ echo 'style="display:none;margin:15px;"'; } else {  echo 'style="display:block;margin:15px"'; } ?> type="button" id="btnParticipar" class="btn btn-success"> Participar</button></div>
        <div id="divDesparticipar" style="display:none;" class="float-right" ><button <?php if(!isset($_SESSION["dsNome"])){ echo 'style="display:none;margin:15px;"'; } else {  echo 'style="display:block;margin:15px"'; } ?> type="button" id="btnDesparticipar" class="btn btn-danger"> Cancelar Participação</button></div>
        </br>
      </div>
    
      <div style="padding:0px;" style="background-color: #f6f6f6 !important;" class="container border-top border-left border-right event-section" id="descricao">
        <div style="margin-top: 10px;" class="col-md-8 col-lg-8 col-sm-12 col-xs-12" id="event-txt">
          <div style="display:inline-grid">
            <img style="width:20px" class="card-img-top" src="../../imagens/description_icon.png" alt="">
          </div>  
          <div style="display:inline-block">
            <h3 style="color: #50525f;font-family: 'Open Sans', 'Raleway', sans-serif;" id="description">Descrição do evento</h3>  
              
          </div>
          <p id="dsEvento" style="text-align:justify; margin-bottom: 0px;"></p>
        </div>
        </br>
      </div>

      <div style="padding:0px;" class="container border-top border-left border-right event-section" id="participantes">
        <div style="margin-top: 10px;" class="col-md-8 col-lg-8 col-sm-12 col-xs-12" id="event-txt">
          <div style="display:inline-grid">
            <img style="width:20px" class="card-img-top" src="../../imagens/people2_icon.png" alt="">
          </div>  
          <div style="display:inline-block">
            <h3 style="color: #50525f;font-family: 'Open Sans', 'Raleway', sans-serif;" id="description">Participantes</h3>  
          </div>
        </div>
        <!-- Tabela da consulta -->
        <div class="panel panel-default" style="overflow-y: scroll; height:200px !important;">
          <table class="table table-hover table-condensed table-striped table-bordered">
            <tbody id="grdParticipantes"></tbody>
          </table>  
        </div>        
      </div>

      <div style="padding:0px;" style="background-color: #f6f6f6 !important;" class="container border-top border-left border-right event-section" id="atividades">
        <div style="margin-top: 10px;" class="col-md-8 col-lg-8 col-sm-12 col-xs-12" id="event-txt">
          <div style="display:inline-grid">
            <img style="width:17px" class="card-img-top" src="../../imagens/activity_icon.png" alt="">
          </div>  
          <div style="display:inline-block">
            <h3 style="color: #50525f;font-family: 'Open Sans', 'Raleway', sans-serif;" id="atividade">Atividades</h3>                
          </div>
          <span id="dsAtividade">
            
          </span>
         
        </div>
        </br>
      </div>

      <div style="padding:0px;" class="container border-top border-left border-right event-section" id="comentarios">
      <div id="fbComentarios" class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/cdEvento#" data-width="1000" data-numposts="5"></div>
      </div>
      
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
