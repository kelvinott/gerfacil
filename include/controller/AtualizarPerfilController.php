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
}


?>
