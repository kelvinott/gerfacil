<?php

require_once("../../estrutura/conexao.php");
require_once("../../estrutura/conf_email.php");

class CadastroEventoPersistencia{
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
        $nomeEvento = $this->getModel()->getNomeEvento();
        $descricao = $this->getModel()->getDescricao();
        $dataInicio = date("d/m/y",strtotime(str_replace('/','-',$this->getModel()->getDataInicio())));
        $dataTermino = date("d/m/y",strtotime(str_replace('/','-',$this->getModel()->getDataTermino())));
        $horaInicio = $this->getModel()->getHoraInicio();
        $horaTermino = $this->getModel()->getHoraTermino();
        $bairro = $this->getModel()->getBairro();
        $rua = $this->getModel()->getRua();
        $numero = $this->getModel()->getNumero();
        $cep = $this->getModel()->getCep();
        $estado = $this->getModel()->getEstado();
        $cidade = $this->getModel()->getCidade();
        $complemento = $this->getModel()->getComplemento();
        $usuario = $this->getModel()->getUsuario();
        $categoria = $this->getModel()->getCategoria();
        $nmImagem = $this->getModel()->getImagem();
        $notificacao = $this->getModel()->getNotificacao();

        $sSql = "INSERT INTO tbeventos (nmEvento
                    ,dsEvento
                    ,dtInicio
                    ,dtTermino
                    ,hrInicio
                    ,hrTermino
                    ,cdbairro
                    ,nmRua
                    ,nrLocal
                    ,dsComplemento
                    ,nrCep
                    ,cdEstado
                    ,cdCidade
                    ,cdUsuario
                    ,cdCategoria
                    ,nmImagem
                    ,idNotificacao)
                    VALUES ('". $nomeEvento ."'
                    ,'". $descricao ."'
                    ,STR_TO_DATE('". $dataInicio ."','%d/%m/%Y')
                    ,STR_TO_DATE('". $dataTermino ."','%d/%m/%Y')
                    ,'". $horaInicio ."'
                    ,'". $horaTermino ."'
                    ,'". $bairro ."'
                    ,'". $rua ."'
                    ,'". $numero ."'
                    ,'". $complemento ."'
                    ,'". $cep ."'
                    ,'". $estado ."'
                    ,'". $cidade ."'
                    ,'". $usuario ."'
                    ,'". $categoria ."'
                    ,'". $nmImagem ."'
                    ,'". $notificacao ."')";

        $this->getConexao()->query($sSql);
        $this->getConexao()->fechaConexao();

        $cdUltimoEvento = $this->ultimoEvento();

        $this->participarEvento($cdUltimoEvento);
        $this->enviarNotificacaoNovoEvento($cdUltimoEvento);

    }

    public function participarEvento($cdEvento){
		$this->conexao->conectaBanco();
		
        $cdUsuario = $this->getModel()->getUsuario();	   

		$sSql = "INSERT INTO tbusuarios_tbeventos (cdUsuario
                                                  ,cdEvento
                                                  ,tbperfis_cdPerfil) 
                                           values (" . $cdUsuario . "
                                                  ," . $cdEvento . " 
                                                  , 3)";
                                              
        $this->conexao->query($sSql);

		$this->conexao->fechaConexao();

    }

    public function ultimoEvento(){
        $this->conexao->conectaBanco();
		
		$cdUsuario = $this->getModel()->getUsuario();	   
        
		$sSql = "SELECT MAX(eve.cdevento) cdEvento
                   FROM tbeventos eve
                  WHERE eve.cdUsuario = " . $cdUsuario;
                      
        if( $oDados = $this->conexao->fetch_query($sSql) ) {
            return $oDados->cdEvento;        
        }
        else
            return "erro";

        $this->conexao->fechaConexao();

		
    }

    public function enviarNotificacaoNovoEvento($cdEvento){
        $this->conexao->conectaBanco();
		
		$estado = $this->getModel()->getEstado();
		$cidade = $this->getModel()->getCidade(); 
        $nomeEvento = $this->getModel()->getNomeEvento();
        
        $emailUsuario = 'kelvinott3112@gmail.com';
		$assunto = "Novo evento para sua cidade - " . $nomeEvento;

		$sSql = "SELECT usu.dsEmail dsEmail
					   ,usu.dsNome dsNome
				   FROM tbusuarios usu
			      WHERE usu.cdEstado = " .  $estado . "
				    AND usu.cdCidade  = " . $cidade . "
					AND usu.idNotificacao = 1";
   
		$resultado = mysqli_query($this->conexao->getConexao(), $sSql);

		while ($linha = mysqli_fetch_assoc($resultado)) {
			
			$mensagem = $linha["dsNome"] . ", o evento " . $nomeEvento . " foi adicionado a sua cidade </br> <a href='https://gerfacil.herokuapp.com/include/view/EventoView.php?cdEvento=" . $cdEvento ."' target='_blank'>Clique Aqui</a> para conhecer.";
            
            $objemail = new Email();
            $objemail->enviaEmail($linha["dsEmail"],$mensagem,$assunto,$emailUsuario,null);
			
		}
        
        $this->conexao->fechaConexao();

		
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
    
    public function buscaBairrosAutoComplete(){
		$this->conexao->conectaBanco();

		$termo = $this->getModel()->getTermo();

		$sSql = "SELECT CONCAT(bai.cdBairro,' - ',bai.nmBairro) nmBairro
					FROM tbbairros bai
					WHERE nmBairro LIKE '%". $termo ."%'";

		$resultado = mysqli_query($this->conexao->getConexao(), $sSql);

		$qtdLinhas = mysqli_num_rows($resultado);

		$contador = 0;

		$retorno = null;

		while ($linha = mysqli_fetch_assoc($resultado)) {

			$contador = $contador + 1;

			$retorno = $retorno . utf8_encode($linha["nmBairro"]);

			//Para não concatenar a virgula no final do json
			if($qtdLinhas != $contador)
				$retorno = $retorno . ',';

		}

		$this->conexao->fechaConexao();

		return $retorno;

    }
    
    public function validaInformacoesPerfil(){
		$this->conexao->conectaBanco();
		$usuario = $this->getModel()->getUsuario();
		
		$sSql = "SELECT cdUsuario cdUsuario
                   FROM tbusuarios
                  WHERE cdUsuario = " . $usuario . "
                    AND (cdEstado IS NULL
                     OR cdCidade IS NULL
                     OR dsEmail IS NULL
                     OR dtNascimento IS NULL)"; 
                    
        if( $oDados = $this->conexao->fetch_query($sSql) ) {
            return $oDados->cdUsuario;        
        }
        else
            return "";

        $this->conexao->fechaConexao();

		
    }    

    public function buscaCategoria(){
		$this->conexao->conectaBanco();

        $sSql = "SELECT cdCategoria
                       ,dsCategoria
                   FROM tbcategorias";

		$resultado = mysqli_query($this->conexao->getConexao(), $sSql);

		$qtdLinhas = mysqli_num_rows($resultado);

		$contador = 0;

		$retorno = '[';
		while ($linha = mysqli_fetch_assoc($resultado)) {

			$contador = $contador + 1;

			$retorno = $retorno . '{"cdCategoria": "'.$linha["cdCategoria"].'"
			                        , "dsCategoria" : "'.$linha["dsCategoria"].'"}';
        //Para não concatenar a virgula no final do json
			if($qtdLinhas != $contador)
				$retorno = $retorno . ',';

		}
		$retorno = $retorno . "]";

		$this->conexao->fechaConexao();

		return $retorno;

	}

}

    

?>