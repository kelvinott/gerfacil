
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <script type="text/javascript" src="../../js/cadastro.js"></script>
    

</head>
<body>
	<div class="container">
        <form class="form-horizontal" role="form">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Cadastrar</h2>
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
                                   placeholder="email@exemplo.com" required autofocus>
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
                            <input type="text" name="txbNome" class="form-control" id="txbNome" placeholder="Nome" required autofocus>
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
                            <input type="text" name="txbSobrenome" class="form-control" id="txbSobrenome" placeholder="Sobrenome" required autofocus>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="txbSenha">Senha</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="password" name="txbSenha" class="form-control" id="txbSenha" placeholder="Senha" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="txbSenhaRepetir">Senha</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="password" name="txbSenhaRepetir" class="form-control" id="txbSenhaRepetir" placeholder="Repetir Senha" required>
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
                            <input type="text" name="txbNascimento" onfocus="(this.type='date')" class="form-control" id="txbNascimento" placeholder="Nascimento" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group" class="form-control">
                        <label class="sr-only" for="txbEstado">Estado</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <select id="txbEstado" name="txbEstado" class="form-control" required>
                            <option value="" disabled selected>Estado</option>
                            <option value="1">Santa Catarina</option>
                        </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group" class="form-control">
                        <label class="sr-only" for="txbCidade">Cidade</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <select id="txbCidade" name="txbCidade" class="form-control" required>
                            <option value="" disabled selected>Cidade</option>
                            <option value="1">Pomerode</option>
                        </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 1rem; padding-bottom: 1rem;">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="button" id="btnCadastrar" class="btn btn-primary"> Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>