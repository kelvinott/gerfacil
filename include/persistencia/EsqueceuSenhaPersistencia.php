<?php

require_once("../../estrutura/conexao.php");
require_once("../../estrutura/conf_email.php");

class EsqueceuSenhaPersistencia{
	protected $model;
	protected $conexao;

	function __construct(){
		$this->conexao = new Conexao();
	}

	public function getModel(){

		return $this->model;

	}

	public function setModel($model){

		$this->model = $model;
	}

	public function getConexao(){
		return $this->conexao;
	}

	public function Atualizar(){
		$this->getConexao()->conectaBanco();
		
		
		//Paramêtros e e-mail
		$emailUsuario = 'kelvinott3112@gmail.com';
		$dsSenha = str_shuffle('1a2b3h4k5l');
		$mensagem = "Sua senha foi alterada, nova senha: " . $dsSenha;
		$assunto = "Alteração de senha";
        $email = $this->getModel()->getEmail();		        
		
		$sSql = "UPDATE tbusuarios usu
					SET usu.dsSenha = '". $dsSenha . "' 
					   ,usu.idAlteraSenha = 1
                  WHERE upper(usu.dsEmail) = upper('" . $email . "')";

		$this->getConexao()->query($sSql);

		$this->getConexao()->fechaConexao();

		$objemail = new Email();
      	$objemail->enviaEmail($email,$mensagem,$assunto,$emailUsuario,null);

	}

	public function validaExisteEmail(){
        $this->conexao->conectaBanco();
		
		$email = $this->getModel()->getEmail();
		
		$sSql = "select  1
                    FROM tbusuarios usu
                    WHERE upper(usu.dsEmail) = upper('" . $email . "')";


		if( $oDados = $this->conexao->fetch_query($sSql) ) 
			$valida = true;
		else 			
            $valida = false;
            
        $this->conexao->fechaConexao();

		return $valida;
	}

	

}
	
?>
