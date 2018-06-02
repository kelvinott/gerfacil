
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <script type="text/javascript" src="../../js/atualizarsenha.js"></script>
    

</head>
<body>
	<div class="container">
        <form class="form-horizontal" role="form">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Atualizar Senha</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="txbSenhaAntiga">Senha Antiga</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="password" name="txbSenhaAntiga" class="form-control" id="txbSenhaAntiga" placeholder="Senha Antiga *" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="txbSenha">Nova Senha</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="password" name="txbSenhaNova" class="form-control" id="txbSenhaNova" placeholder="Nova Senha *" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="txbSenhaRepetir">Repetir Nova Senha</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="password" name="txbSenhaNovaRepetir" class="form-control" id="txbSenhaNovaRepetir" placeholder="Repetir Nova Senha *" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 1rem; padding-bottom: 1rem;">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="button" id="btnAtualizarSenha" class="btn btn-primary"> Atualizar Senha</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>