<?php
require_once("../../estrutura/conexao.php");
session_start();
class LoginPersistencia {

	protected $conexao;
	protected $Model;

	function __construct(){
		$this->conexao = new Conexao();
	}

	public function getModel(){
		return $this->Model;
	}

	public function setModel($Model){
		$this->Model = $Model;
	}

	public function getConexao(){
		return $this->conexao;
	}
	
	public function validaLogin(){
		$email = $this->getModel()->getEmail();
		$senha = $this->getModel()->getSenha();
		$id = $this->getModel()->getId();
		$usuario = $this->getModel()->getUsuario();

		//$senha = $this->criptografaSenha($senha);
		if($id == "") {
			$sSql = "select  usu.cdUsuario cdUsuario
                        ,usu.dsNome dsNome
                        ,usu.dsSobrenome dsSobrenome
                        ,usu.dsSenha dsSenha
						,usu.dsEmail dsEmail
					    ,usu.idAlteraSenha idAlteraSenha
                    FROM tbusuarios usu
                   WHERE usu.dsEmail = '" . $email . "'" .
                   " AND usu.dsSenha = '" . $senha . "'";
		} else {
			$sSql = "select  usu.cdUsuario cdUsuario
						,usu.dsNome dsNome  
						,usu.dsSobrenome dsSobrenome                      
                    FROM tbusuarios usu
                   WHERE usu.cdUsuario = '" . $usuario . "'";
		}
		
		
		$this->getConexao()->conectaBanco();

		if( $oDados = $this->getConexao()->fetch_query($sSql) ) {
			
			if($id == "") {
				
				$_SESSION["cdUsuario"] = $oDados->cdUsuario;
				$_SESSION["dsNome"] = $oDados->dsNome;
				$_SESSION["dsSobrenome"] = $oDados->dsSobrenome;
				$_SESSION["dsEmail"] = $oDados->dsEmail;
				$logado = true;
			} else {
				
				$_SESSION["cdUsuario"] = $oDados->cdUsuario;
				$_SESSION["dsNome"] = $oDados->dsNome;
				$_SESSION["dsSobrenome"] = $oDados->dsSobrenome;
				$_SESSION["idFacebook"] = $id;
				$logado = true;
			}		
			
		} else {
			
			Session_destroy();

			$logado = false;
		}
		$this->getConexao()->fechaConexao();

		return $logado;
	}

	public function buscarIdAlteraSenha(){
		$email = $this->getModel()->getEmail();
		
		$sSql = "SELECT usu.idAlteraSenha idAlteraSenha
                    FROM tbusuarios usu                    
                    WHERE upper(usu.dsEmail) = upper('" . $email . "')";
        
		$this->getConexao()->conectaBanco();

		if( $oDados = $this->getConexao()->fetch_query($sSql) ) {
			return $oDados->idAlteraSenha;
			
		} 

		$this->getConexao()->fechaConexao();


	}

	public function criptografaSenha($senha){
		return sha1($senha);
	}
}
?>
