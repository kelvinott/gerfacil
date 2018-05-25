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
		$notificacao = $this->getModel()->getNotificacao();
	
		$sSql = "INSERT INTO tbusuarios (dsEmail, dsNome, dsSobreNome, dsSenha, dtNascimento, cdEstado, cdCidade, idNotificacao)
		VALUES ('". $email ."'
		,'". $nome ."'
		,'". $sobrenome ."'
		,'". $senha ."'
		,STR_TO_DATE('" . $nascimento . "','%d/%m/%Y') 
		,'". $estado ."'
		,'". $cidade ."'
		,'". $notificacao ."')";

		$this->getConexao()->query($sSql);

		$this->getConexao()->fechaConexao();

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
