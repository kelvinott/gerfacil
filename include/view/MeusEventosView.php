<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <script type="text/javascript" src="../../js/meuseventos.js"></script>
    <script type="text/javascript" src="../../js/geral.js"></script>
</head>
<body>
	<div class="container">
        <form id="frmAtualizarEvento" class="form-horizontal" role="form">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Meus Eventos</h2>
                    <hr>
                </div>
            </div>
            <input type="hidden" name="hidCdEvento" id="hidCdEvento"/>
            <div id="divForm">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group has-danger">
                            <label class="sr-only" for="txbNomeEvento">Nome</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            
                                <input type="text" name="txbNomeEvento" class="form-control" id="txbNomeEvento"
                                    placeholder="Nome" required autofocus/>
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
                        <div class="form-group" class="form-control">
                            <label class="sr-only" for="txbCategoria">Categoria</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <select id="txbCategoria" name="txbCategoria" class="form-control" required>
                                <option value="" disabled selected>Categoria</option>
                                <option value="1">Festa</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group has-danger">
                            <label class="sr-only" for="txbCep">CEP</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <input type="text" name="txbCep" class="form-control" id="txbCep" placeholder="CEP" maxlength="9" required autofocus>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="sr-only" for="txbEstado">Estado</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <input type="text" name="txbEstado" class="form-control" id="txbEstado" placeholder="Estado" required autofocus>
                            </div>
                        </div>
                    </div>                            
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="sr-only" for="txbCidade">Cidade</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <input type="text" name="txbCidade" class="form-control" id="txbCidade" placeholder="Cidade" required autofocus>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <div class="form-group has-danger">
                            <label class="sr-only" for="txbBairro">Bairro</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <input type="text" name="txbBairro" class="form-control" id="txbBairro" placeholder="Bairro" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group has-danger">
                            <label class="sr-only" for="txbRua">Rua</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <input type="text" name="txbRua" class="form-control" id="txbRua" placeholder="Rua" required autofocus>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <div class="form-group has-danger">
                            <label class="sr-only" for="txbNumeroCasa">Número</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <input type="number" name="txbNumeroCasa" class="form-control" id="txbNumeroCasa" placeholder="Número" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group has-danger">
                            <label class="sr-only" for="txbComplemento">Complemento</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <input type="text" name="txbComplemento" class="form-control" id="txbComplemento" placeholder="Complemento" required autofocus>
                            </div>
                        </div>
                    </div>
                    
                </div>
                </form>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group has-danger">
                            <label class="sr-only" for="txbImagem">Imagem</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <form id="formulario" class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="../controller/CadastroEventoController.php">   
                                    <input type="file" name="imagem" class="form-control-file" id="imagem">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="ckbNotificacao" checked="checked">
                            <label class="form-check-label" for="checkbox100">Receber notificações para novos participantes</label>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem; padding-bottom: 1rem;">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <button type="button" id="btnAtualizar" class="btn btn-primary"> Atualizar</button>
                    </div>
                </div>
            </div>
        </form>
        <form id="frmAtividades" class="form-horizontal" role="form" style="display:none;">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Atividades</h2>
                    <hr>
                </div>
            </div>
            <input type="hidden" name="hidCdEventoAtividade" id="hidCdEventoAtividade"/>
            <input type="hidden" name="hidCdAtividade" id="hidCdAtividade"/>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="txbNomeAtividade">Nome</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        
                            <input type="text" name="txbNomeAtividade" class="form-control" id="txbNomeAtividade"
                                placeholder="Nome" required autofocus/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="txbDescricaoAtividade">Descrição</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbDescricaoAtividade" class="form-control" id="txbDescricaoAtividade" placeholder="Descrição" required autofocus>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">                
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="sr-only" for="txbDataInicioAtividade">Data de Inicio</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbDataInicioAtividade" onfocus="(this.type='date')" class="form-control" id="txbDataInicioAtividade" placeholder="Data de Inicio" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="sr-only" for="txbDataTerminoAtividade">Data de Término</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbDataTerminoAtividade" onfocus="(this.type='date')" class="form-control" id="txbDataTerminoAtividade" placeholder="Data de Término" required>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="sr-only" for="txbHoraInicioAtividade">Hora de Inicio</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbHoraInicioAtividade" onfocus="(this.type='time')" class="form-control" id="txbHoraInicioAtividade" placeholder="Hora de Inicio" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="sr-only" for="txbHoraTerminoAtividade">c</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" name="txbHoraTerminoAtividade" onfocus="(this.type='time')" class="form-control" id="txbHoraTerminoAtividade" placeholder="Hora de Término" required>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="row" style="padding-top: 1rem; padding-bottom: 1rem;">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="button" id="btnIncluirAtividade" class="btn btn-success"> Incluir</button>
                    <button style="display:none;" type="button" id="btnAtualizarAtividade" class="btn btn-primary"> Atualizar</button>
                </div>
            </div>
        </form>
        <div class="panel panel-default" style="overflow-y: scroll; height:300px !important;">
            <table class="table table-hover table-condensed table-striped table-bordered" >
                <thead>
                    <tr>
                        <th>
                            Evento
                        </th>
                        <th>
                            Descrição
                        </th>
                        <th>
                            Inicio
                        </th>
                        <th>
                            Término
                        </th>
                        <th>
                            Categoria
                        </th>
                        <th>
                            
                        </th>
                        <th>
                            
                        </th>
                        <th>
                            
                        </th>
                    </tr>
                </thead>
                <tbody id="grdMeusEventos"></tbody>
            </table>
        </div> 
        <br/>
        <div id="divAtividades" class="panel panel-default" style="overflow-y: scroll; height:300px !important; display:none;">
            <table class="table table-hover table-condensed table-striped table-bordered" >
                <thead>
                    <tr>
                        <th>
                            Atividade
                        </th>
                        <th>
                            Descrição
                        </th>
                        <th>
                            Data Inicio
                        </th>
                        <th>
                            Data Término
                        </th>
                        <th>
                            Hora Inicio
                        </th>
                        <th>
                            Hora Termino
                        </th>
                        <th>
                            
                        </th>                        
                    </tr>
                </thead>
                <tbody id="grdAtividades"></tbody>
            </table>
        </div>           
        
    </div>
</body>
</html>