<?php

require_once("../../estrutura/conexao.php");

class AtualizarSenhaPersistencia   {
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

    public function validaSenhaAntiga(){
        $this->conexao->conectaBanco();
        $usuario = $this->getModel()->getUsuario();
		$senhaAntiga = $this->getModel()->getSenhaAntiga();
		//$senha = $this->criptografaSenha($senha);
		
		$sSql = "select  1
                    FROM tbusuarios usu
                   WHERE usu.cdUsuario = " . $usuario ."
                     AND usu.dsSenha = '" . $senhaAntiga . "'";
        
		

		if( $oDados = $this->conexao->fetch_query($sSql) ) 
			$valida = true;
		else 			
            $valida = false;
            
        $this->conexao->fechaConexao();

		return $valida;
	}

	public function Atualizar(){
        $this->conexao->conectaBanco();

        $usuario = $this->getModel()->getUsuario();        
		$senhaNova = $this->getModel()->getSenhaNova();
		
		$sSql = "UPDATE tbusuarios 
					SET dsSenha = '". $senhaNova ."'
					   ,idAlteraSenha = 0                        
                  WHERE cdUsuario = ". $usuario ;

        $this->conexao->query($sSql);

		$this->conexao->fechaConexao();

    }

    
}
	
?>
