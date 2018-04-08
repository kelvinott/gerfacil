<?php

require_once("../../estrutura/conexao.php");

class CadastroPersistencia{
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

	public function Cadastrar(){
		$this->getConexao()->conectaBanco();

        $email = $this->getModel()->getEmail();
		$nome = $this->getModel()->getNome();
		$sobrenome = $this->getModel()->getSobrenome();
		$senha = $this->getModel()->getSenha();
		$nascimento = date("d/m/y",strtotime(str_replace('/','-',$this->getModel()->getNascimento())));
		$estado = $this->getModel()->getEstado();
		$cidade = $this->getModel()->getCidade();
	
		$sSql = "INSERT INTO tbusuarios (dsEmail, dsNome, dsSobreNome, dsSenha, dtNascimento, cdEstado, cdCidade)
		VALUES ('". $email ."'
		,'". $nome ."'
		,'". $sobrenome ."'
		,'". $senha ."'
		,'". $nascimento ."'
		,'". $estado ."'
		,'". $cidade ."')";

		$this->getConexao()->query($sSql);

		$this->getConexao()->fechaConexao();

	}
	

}
	
?>
