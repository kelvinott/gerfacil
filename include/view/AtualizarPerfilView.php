
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <script type="text/javascript" src="../../js/atualizarperfil.js"></script>
    <script type="text/javascript" src="../../js/geral.js"></script>
    

</head>
<body>
	<div class="container">
        <form class="form-horizontal" role="form">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Atualizar Perfil</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="txbEmail">E-Mail</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                           
                            <input type="text" name="txbEmail" class="form-control" id="txbEmail"
                                   placeholder="Email@exemplo.com *" required autofocus maxlength="100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="txbNome">Nome</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbNome" class="form-control" id="txbNome" placeholder="Nome *" required autofocus maxlength="100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="txbSobrenome">Sobrenome</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbSobrenome" class="form-control" id="txbSobrenome" placeholder="Sobrenome *" required autofocus maxlength="100">
                        </div>
                    </div>
                </div>
            </div>        
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="txbNascimento">Nascimento</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbNascimento" onfocus="(this.type='date')" class="form-control" id="txbNascimento" placeholder="Nascimento *" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="txbEstado">Estado</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbEstado" class="form-control" id="txbEstado" placeholder="Estado *" required autofocus>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="txbCidade">Cidade</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbCidade" class="form-control" id="txbCidade" placeholder="Cidade *" required autofocus>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 1rem; padding-bottom: 1rem;">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="button" id="btnAtualizar" class="btn btn-primary"> Atualizar</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>