<?php
session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<title>GerFacil - Gerenciador de eventos</title>
    <link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="../../lib/jquery/jquery.min.js"></script>
	  <script type="text/javascript" src="../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../../js/paginainicial.js"></script>
    <link rel="stylesheet" href="../../css/alerta.css">
    <script type="text/javascript" src="../../js/alerta.js"></script>
    <script type="text/javascript" src="../../js/geral.js"></script>
    <!-- Custom styles for this template -->
    <link href="../../css/3-col-portfolio.css" rel="stylesheet">
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
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));

     
    </script>

  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">GerFacil</a>
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
            <li id="btnCadastroEvento" class="nav-item" <?php if(!isset($_SESSION["dsNome"])){ echo 'style="display:none;"'; } else {  echo 'style="display:block"'; } ?>>
              <a class="nav-link" href="#">Novo Evento</a>
            </li>
            <li class="nav-item">
              <div class="fb-login-button" data-max-rows="1" data-size="small" data-button-type="login_with" 
              data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right" <?php if(!isset($_SESSION["dsNome"])){ echo 'style="display:none;"'; } else {  echo 'style="display:block"'; } ?>>
            <li class="dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-user"></i><?php echo ucfirst($_SESSION["dsNome"]); echo " " . ucfirst($_SESSION["dsSobrenome"]) ?> </a>
                <ul class="dropdown-menu" role="menu">
                  <li class="nav-item">
                    <a id="btnEditarPerfil" id="perfil" href="#"> Editar Perfil</a>
                  </li class="nav-item">
                          
                  </li class="nav-item">
                    <a href="Sair.php">Sair</a>
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
      <h1 class="my-4">Eventos
        
      </h1>

      <div class="row">
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project One</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Two</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Three</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Four</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Five</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Six</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

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
