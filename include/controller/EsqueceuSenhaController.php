<?php
session_start();
require_once("../model/EsqueceuSenhaModel.php");
require_once("../persistencia/EsqueceuSenhaPersistencia.php");


switch($_POST["action"]){
	
	case 'atualizar':
		$model = new UsuarioModel();

		$model->setUsuario($_SESSION["cdUsuario"]);
		$model->setEmail($_POST["dsEmail"]);		
		
		$persistencia = new EsqueceuSenhaPersistencia();

		$persistencia->setModel($model);

		$persistencia->Atualizar();

		break;
}


?>
