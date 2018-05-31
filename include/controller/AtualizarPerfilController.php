<?php

require_once("../model/AtualizarPerfilModel.php");
require_once("../persistencia/AtualizarPerfilPersistencia.php");
session_start();
switch($_POST["action"]){

	
	case 'buscar':
        $model = new AtualizarPerfilModel();
        
        $model->setCodigo($_SESSION["cdUsuario"]);
        
        $persistencia = new AtualizarPerfilPersistencia();

        $persistencia->setModel($model);

        $retorno = $persistencia->buscarUsuario();

        echo $retorno;        

        break;
	case 'atualizar':
		$model = new AtualizarPerfilModel();

		$model->setCodigo($_SESSION["cdUsuario"]);
        $model->setEmail($_POST["email"]);
        $model->setNome($_POST["nome"]);
        $model->setSobrenome($_POST["sobrenome"]);
        $model->setNascimento($_POST["nascimento"]);
        $model->setEstado($_POST["estado"]);
        $model->setCidade($_POST["cidade"]);

		$persistencia = new AtualizarPerfilPersistencia();

		$persistencia->setModel($model);

		$persistencia->Atualizar();

        break;
    case 'autocompleteestados':
		$model = new AtualizarPerfilModel();
		
		$model->setTermo($_POST["termo"]);
		
		$persistencia = new AtualizarPerfilPersistencia();

		$persistencia->setModel($model);

		$retorno = $persistencia->buscaEstadosAutoComplete();

		echo $retorno;

		break;		
	case 'autocompletecidades':
		$model = new AtualizarPerfilModel();
		
		$model->setTermo($_POST["termo"]);
		
		$persistencia = new AtualizarPerfilPersistencia();

		$persistencia->setModel($model);

		$retorno = $persistencia->buscaCidadesAutoComplete();

		echo $retorno;

		break;
}


?>
