<?php

require_once("../../estrutura/conexao.php");

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

        $email = $this->getModel()->getEmail();		
        $usuario = $this->getModel()->getUsuario();
		
		$sSql = "UPDATE tbusuarios usu
                    SET usu.dsSenha = 'teste'
                WHERE usu.cdUsuario = " . $usuario;

		$this->getConexao()->query($sSql);

		$this->getConexao()->fechaConexao();

	}

}
	
?>
