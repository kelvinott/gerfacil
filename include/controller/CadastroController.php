<?php
require_once("../model/CadastroModel.php");
require_once("../persistencia/CadastroPersistencia.php");
require_once("../model/LoginModel.php");
require_once("../persistencia/LoginPersistencia.php");

switch($_POST["action"]){

	case 'cadastrar':
		$model = new CadastroModel();
		$persistencia = new CadastroPersistencia();
		$modelLogin = new LoginModel();
		$persistenciaLogin = new LoginPersistencia();

		if(!isset($_POST["id"])) {
			$model->setEmail($_POST["email"]);
			$model->setNome($_POST["nome"]);
			$model->setSobrenome($_POST["sobrenome"]);
			$model->setSenha($_POST["senha"]);
			$model->setNascimento($_POST["nascimento"]);
			$model->setEstado($_POST["estado"]);
			$model->setCidade($_POST["cidade"]);
			$model->setNotificacao($_POST["notificacao"]);	

			$persistencia->setModel($model);
			$valido = $persistencia->validaExisteEmail();
			
			if(!$valido){
				$persistencia->Cadastrar();
				echo '{ "mensagem": "Conta criada com sucesso!", "status" : "0" }';
				
			}
			else
				echo '{ "mensagem": "Este e-mail já está sendo utilizado. Tente outro.", "status" : "1" }';
		}
		else{

			//Cadastro
			$model->setid($_POST["id"]); 
			$model->setNome($_POST["nome"]);
			$model->setSobrenome($_POST["sobrenome"]);

			$persistencia->setModel($model);

			$cdUsuario = $persistencia->Cadastrar();

			//Login
			$modelLogin->setUsuario($cdUsuario); 
			$modelLogin->setid($_POST["id"]); 
			$persistenciaLogin->setModel($modelLogin);

			$bLogou = $persistenciaLogin->validaLogin();

			if($bLogou)
        		echo '{ "mensagem": "Login realizado com sucesso", "status" : "0" }';

			
		}
		
		
		
		
		break;	
	case 'autocompleteestados':
		$model = new CadastroModel();
		
		$model->setTermo($_POST["termo"]);
		
		$persistencia = new CadastroPersistencia();

		$persistencia->setModel($model);

		$retorno = $persistencia->buscaEstadosAutoComplete();

		echo $retorno;

		break;		
	case 'autocompletecidades':
		$model = new CadastroModel();
		
		$model->setTermo($_POST["termo"]);
		
		$persistencia = new CadastroPersistencia();

		$persistencia->setModel($model);

		$retorno = $persistencia->buscaCidadesAutoComplete();

		echo $retorno;

		break;
}


?>
