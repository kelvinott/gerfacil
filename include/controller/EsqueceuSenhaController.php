<?php
session_start();
require_once("../model/EsqueceuSenhaModel.php");
require_once("../persistencia/EsqueceuSenhaPersistencia.php");


switch($_POST["action"]){
	
	case 'atualizar':
		$model = new EsqueceuSenhaModel();

		$model->setEmail($_POST["email"]);		
		
		$persistencia = new EsqueceuSenhaPersistencia();

		$persistencia->setModel($model);

		$persistencia->Atualizar();

		break;
}


?>
