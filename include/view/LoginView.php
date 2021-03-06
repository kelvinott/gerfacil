
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <script type="text/javascript" src="../../js/login.js"></script>
   
    <title>Bootstrap 4 Login Form</title>

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
        <form class="form-horizontal" role="form">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Entrar</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="email">E-Mail</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                           
                            <input type="text" name="txbEmail" class="form-control" id="txbEmail"
                                   placeholder="email@exemplo.com" required autofocus>
                        </div>
                    </div>
                </div>
                <div id="divErroPrincipal" class="col-md-3" style="display:none;">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <i class="fa fa-close"></i> <span id="divErro"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="password">Senha</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            
                            <input type="password" name="txbSenha" class="form-control" id="txbSenha"
                                   placeholder="Senha" required>
                        </div>
                    </div>
                </div>
                <div id="divErroSenhaPrincipal" class="col-md-3" style="display:none;">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <i class="fa fa-close"></i> <span id="divErroSenha"></span>
                        </span>
                    </div>
                </div>                
            </div>
            <!--<div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="padding-top: .35rem">
                    <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                        <label class="form-check-label">
                            <input class="form-check-input" name="remember"
                                   type="checkbox" >
                            <span style="padding-bottom: .15rem">Remember me</span>
                        </label>
                    </div>
                </div>
            </div>-->
            <div class="row" style="padding-top: 1rem; padding-bottom: 1rem;">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="button" id="btnLogin" class="btn btn-primary"> Entrar</button>
                    <a class="btn btn-link" id="btnEsqueceuSenha">Esqueceu a senha?</a>
                </div>
            </div>
        </form>
    </div>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.12&appId=2048906665380754&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>