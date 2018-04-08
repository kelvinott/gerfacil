
<!DOCTYPE html>
<html lang="pt">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <script type="text/javascript" src="../../js/cadastroevento.js"></script>
    

</head>
<body>
	<div class="container">
        <form class="form-horizontal" role="form">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Eventos</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="txbNomeEvento">Nome</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                           
                            <input type="text" name="txbNomeEvento" class="form-control" id="txbNomeEvento"
                                   placeholder="Nome" required autofocus>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="txbDescricao">Descrição</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbDescricao" class="form-control" id="txbDescricao" placeholder="Descrição" required autofocus>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">                
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="sr-only" for="txbDataInicio">Data de Inicio</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbDataInicio" onfocus="(this.type='date')" class="form-control" id="txbDataInicio" placeholder="Data de Inicio" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="sr-only" for="txbDataTermino">Data de Término</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbDataTermino" onfocus="(this.type='date')" class="form-control" id="txbDataTermino" placeholder="Data de Término" required>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="sr-only" for="txbHoraInicio">Hora de Inicio</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbHoraInicio" onfocus="(this.type='time')" class="form-control" id="txbHoraInicio" placeholder="Hora de Inicio" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="sr-only" for="txbHoraTermino">c</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbHoraTermino" onfocus="(this.type='time')" class="form-control" id="txbHoraTermino" placeholder="Hora de Término" required>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="row">
                <div class="col-md-3"></div>                
                <div class="col-md-3">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="txbCep">CEP</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbCep" class="form-control" id="txbCep" placeholder="CEP" maxlength="9" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="txbBairro">Bairro</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbBairro" class="form-control" id="txbBairro" placeholder="Bairro" required autofocus>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="txbRua">Rua</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbRua" class="form-control" id="txbRua" placeholder="Rua" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="txbNumeroCasa">Número</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="number" name="txbNumeroCasa" class="form-control" id="txbNumeroCasa" placeholder="Número" required autofocus>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="txbComplemento">Complemento</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbComplemento" class="form-control" id="txbComplemento" placeholder="Complemento" required autofocus>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="txbImagem">Imagem</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="file" name="txbImagem" class="form-control-file" id="txbImagem" placeholder="Imagem" maxlength="9" required autofocus>
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