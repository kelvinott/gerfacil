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
		
		$valido = $persistencia->validaExisteEmail();
		
		if($valido){
			echo '{ "mensagem": "E-mail enviado com sucesso!", "status" : "0" }';
			$persistencia->Atualizar();
		}
		else
			 echo '{ "mensagem": "Este e-mail não consta no nosso sistema!", "status" : "1" }';
		

		break;
}


?>
