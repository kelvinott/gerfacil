<?php

require_once("../model/AtualizarSenhaModel.php");
require_once("../persistencia/AtualizarSenhaPersistencia.php");
session_start();
switch($_POST["action"]){

	case 'atualizar':
		$model = new AtualizarSenhaModel();

		$model->setUsuario($_SESSION["cdUsuario"]);
        $model->setSenhaAntiga($_POST["senhaAntiga"]);
        $model->setSenhaNova($_POST["senhaNova"]);
        $model->setSenhaNovaRepetir($_POST["senhaNovaRepetir"]);

		$persistencia = new AtualizarSenhaPersistencia();

		$persistencia->setModel($model);

		$valido = $persistencia->validaSenhaAntiga();
		if($valido){
			echo '{ "mensagem": "Senha alterada com sucesso!", "status" : "0" }';
			$persistencia->Atualizar();
		}
		else
			 echo '{ "mensagem": "Senha antiga incorreta", "status" : "1" }';
		break;
}


?>
