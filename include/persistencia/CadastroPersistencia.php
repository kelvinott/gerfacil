<?php

require_once("../../estrutura/conexao.php");
require_once("../../estrutura/conf_email.php");

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
		
		$cdUsuarioFacebook = $this->existeUsuarioFacebook();
		$this->getConexao()->conectaBanco();

		$id = $this->getModel()->getId();
		$email = $this->getModel()->getEmail();
		$nome = $this->getModel()->getNome();
		$sobrenome = $this->getModel()->getSobrenome();
		$senha = $this->getModel()->getSenha();
		$nascimento = date("d/m/y",strtotime(str_replace('/','-',$this->getModel()->getNascimento())));
		$estado = $this->getModel()->getEstado();
		$cidade = $this->getModel()->getCidade();
		$notificacao = $this->getModel()->getNotificacao();

		if($id == ""){
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
	
			return $this->ultimoUsuario();

		} else {			
			if($cdUsuarioFacebook == ""){

				$sSql = "INSERT INTO tbusuarios (idfacebook, dsSobreNome, dsNome)
										VALUES ('". $id ."'		
												,'". $sobrenome ."'							
												,'". $nome ."')";

				$this->getConexao()->query($sSql);

				$this->getConexao()->fechaConexao();
		
				return $this->ultimoUsuario();											
			} else {
				return $cdUsuarioFacebook;	
			}
		}

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
	
	public function buscaEstadosAutoComplete(){
		$this->conexao->conectaBanco();

		$termo = $this->getModel()->getTermo();

		$sSql = "SELECT CONCAT(est.cdEstado,' - ',est.nmEstado) nmEstado
					FROM tbestado est
					WHERE nmEstado LIKE '%". $termo ."%'";

		$resultado = mysqli_query($this->conexao->getConexao(), $sSql);

		$qtdLinhas = mysqli_num_rows($resultado);

		$contador = 0;

		$retorno = null;

		while ($linha = mysqli_fetch_assoc($resultado)) {

			$contador = $contador + 1;

			$retorno = $retorno . utf8_encode($linha["nmEstado"]);

			//Para não concatenar a virgula no final do json
			if($qtdLinhas != $contador)
				$retorno = $retorno . ',';

		}

		$this->conexao->fechaConexao();

		return $retorno;

	}

	public function buscaCidadesAutoComplete(){
		$this->conexao->conectaBanco();

		$termo = $this->getModel()->getTermo();

		$sSql = "SELECT CONCAT(cid.cdCidade,' - ',cid.nmCidade) nmCidade
					FROM tbcidades cid
					WHERE nmCidade LIKE '%". $termo ."%'";

		$resultado = mysqli_query($this->conexao->getConexao(), $sSql);

		$qtdLinhas = mysqli_num_rows($resultado);

		$contador = 0;

		$retorno = null;

		while ($linha = mysqli_fetch_assoc($resultado)) {

			$contador = $contador + 1;

			$retorno = $retorno . utf8_encode($linha["nmCidade"]);

			//Para não concatenar a virgula no final do json
			if($qtdLinhas != $contador)
				$retorno = $retorno . ',';

		}

		$this->conexao->fechaConexao();

		return $retorno;

	}

	public function ultimoUsuario(){
        $this->conexao->conectaBanco();
		
		$sSql = "SELECT MAX(usu.cdUsuario) cdUsuario
                   FROM tbusuarios usu";
                      
        if( $oDados = $this->conexao->fetch_query($sSql) ) {
            return $oDados->cdUsuario;        
        }
        else
            return "erro";

        $this->conexao->fechaConexao();

		
	}
	

	public function existeUsuarioFacebook(){
		$this->conexao->conectaBanco();
		$id = $this->getModel()->getId();
		
		$sSql = "SELECT usu.cdUsuario cdUsuario
				   FROM tbusuarios usu
				  WHERE usu.idFacebook = '" . $id . "'";
                    
        if( $oDados = $this->conexao->fetch_query($sSql) ) {
            return $oDados->cdUsuario;        
        }
        else
            return "";

        $this->conexao->fechaConexao();

		
    }

	

}
	
?>
