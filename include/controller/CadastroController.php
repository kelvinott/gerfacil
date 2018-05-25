<?php
require_once("../model/CadastroModel.php");
require_once("../persistencia/CadastroPersistencia.php");

switch($_POST["action"]){

	case 'cadastrar':
		$model = new CadastroModel();
        $persistencia = new CadastroPersistencia();

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
			echo '{ "mensagem": "Conta criada com sucesso!", "status" : "0" }';
			$persistencia->Cadastrar();
		}
		else
			 echo '{ "mensagem": "Este e-mail já está sendo utilizado. Tente outro.", "status" : "1" }';
		
		break;
	case 'buscar':
   		$model = new UsuarioModel();

		if(isset($_POST["codigo"])){
				$model->setCodigo($_POST["codigo"]);
		}

		$model->setNome($_POST["nomUsu"]);
		$model->setSobrenome($_POST["sobrenomeUsu"]);
		$model->setSenha($_POST["senUsu"]);
		$model->setEmail($_POST["desEml"]);
		$model->setPapel($_POST["codPap"]);
		$model->setSituacao($_POST["codSit"]);
		$model->setPercentualComissaoCli($_POST["perComCli"]);
		$model->setPercentualComissaoInt($_POST["perComInt"]);

		$persistencia = new UsuarioPersistencia();

		$persistencia->setModel($model);

		$retorno = $persistencia->buscaUsuario();

		echo $retorno;

   		break;
	case 'atualizar':
		$model = new UsuarioModel();

		$model->setCodigo($_POST["codigo"]);
		$model->setNome($_POST["nomUsu"]);
		$model->setSobrenome($_POST["sobrenomeUsu"]);
        $model->setSenha($_POST["senUsu"]);
		$model->setEmail($_POST["desEml"]);
		$model->setPapel($_POST["codPap"]);
		$model->setSituacao($_POST["codSit"]);
        $model->setPercentualComissaoCli($_POST["perComCli"]);
        $model->setPercentualComissaoInt($_POST["perComInt"]);

		$persistencia = new UsuarioPersistencia();

		$persistencia->setModel($model);

		$persistencia->Atualizar();

		break;	
}


?>
