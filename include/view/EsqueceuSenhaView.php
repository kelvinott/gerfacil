
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <script type="text/javascript" src="../../js/esqueceusenha.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
        <form class="form-horizontal" role="form">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Esqueceu a senha</h2>
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
                <div id="divErrorEmail" class="col-md-3" style="display:none;">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <i class="fa fa-close"></i> <span id="divErro"></span>
                        </span>
                    </div>
                </div>            
            </div>
            <div class="row" style="padding-top: 1rem; padding-bottom: 1rem;">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="button" id="btnEnviar"  class="btn btn-primary">Confirma E-mail</button>                    
                </div>
            </div>
        </form>
    </div>
  
</body>
</html>