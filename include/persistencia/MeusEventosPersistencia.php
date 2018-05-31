<?php

require_once("../../estrutura/conexao.php");

class MeusEventosPersistencia   {
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
    
    public function carregaMeusEventos(){
        $this->conexao->conectaBanco();

        $cdUsuario = $this->getModel()->getUsuario();
        $cdEvento = $this->getModel()->getEvento();
        
        if($cdEvento == "") {
            $sSql = "SELECT eve.cdEvento cdEvento
                           ,eve.nmEvento nmEvento
                           ,SUBSTRING(eve.dsEvento,1,50) dsEvento
                           ,eve.dtInicio dtInicio
                           ,eve.dtTermino dtTermino
                           ,eve.hrInicio hrInicio
                           ,eve.hrTermino hrTermino
                           ,cat.dsCategoria dsCategoria
                           ,cat.cdCategoria cdCategoria
                           ,eve.nrCep nrCep
                           ,est.nmEstado nmEstado
                           ,cid.nmCidade nmCidade
                           ,est.cdEstado cdEstado
                           ,cid.cdCidade cdCidade
                           ,eve.cdBairro cdBairro
                           ,eve.nmRua nmRua
                           ,eve.nrLocal nrLocal
                           ,eve.dsComplemento dsComplemento
                           ,uev.tbPerfis_cdPerfil cdPerfil
                           ,bai.nmBairro nmBairro
                       FROM tbusuarios_tbeventos uev
                       JOIN tbeventos eve
                         ON eve.cdEvento = uev.cdEvento
                       JOIN tbcategorias cat
                         ON cat.cdCategoria = eve.cdCategoria
                       JOIN tbEstado est
                         ON est.cdEstado = eve.cdEstado
                       JOIN tbCidades cid
                         ON cid.cdCidade = eve.cdCidade 
                       JOIN tbbairros bai
                         ON bai.cdBairro = eve.cdBairro
                      WHERE uev.cdUsuario = " . $cdUsuario . "
                      ORDER BY dtInicio, hrInicio";
        } else {
            $sSql = "SELECT eve.cdEvento cdEvento
                           ,eve.nmEvento nmEvento
                           ,eve.dsEvento dsEvento
                           ,eve.dtInicio dtInicio
                           ,eve.dtTermino dtTermino
                           ,eve.hrInicio hrInicio
                           ,eve.hrTermino hrTermino
                           ,cat.dsCategoria dsCategoria
                           ,cat.cdCategoria cdCategoria
                           ,eve.nrCep nrCep
                           ,est.nmEstado nmEstado
                           ,cid.nmCidade nmCidade
                           ,est.cdEstado cdEstado
                           ,cid.cdCidade cdCidade
                           ,eve.cdBairro cdBairro
                           ,eve.nmRua nmRua
                           ,eve.nrLocal nrLocal
                           ,eve.dsComplemento dsComplemento
                           ,3 cdPerfil
                           ,bai.nmBairro nmBairro
                       FROM tbeventos eve                      
                       JOIN tbcategorias cat
                         ON cat.cdCategoria = eve.cdCategoria
                       JOIN tbEstado est
                         ON est.cdEstado = eve.cdEstado
                       JOIN tbCidades cid
                         ON cid.cdCidade = eve.cdCidade 
                       JOIN tbbairros bai
                         ON bai.cdBairro = eve.cdBairro 
                      WHERE eve.cdEvento = " . $cdEvento . "
                      ORDER BY dtInicio, hrInicio ";
        }        
        
        $resultado = mysqli_query($this->conexao->getConexao(), $sSql);

        if (!$resultado) {
            die(mysqli_error($this->conexao->getConexao()));
        }else
        {
            $qtdLinhas = mysqli_num_rows($resultado);

            $contador = 0;

            $retorno = '[';

            while ($linha = mysqli_fetch_assoc($resultado)) {

                $contador = $contador + 1;

                $retorno = $retorno . '{"cdEvento": "'.$linha["cdEvento"].'"
                                      , "nmEvento" : "'.$linha["nmEvento"].'"
                                      , "dsEvento" : "'.$linha["dsEvento"].'"
                                      , "dtInicio" : "'.$linha["dtInicio"].'"                                      
                                      , "dtTermino" : "'.$linha["dtTermino"].'"
                                      , "hrInicio" : "'.$linha["hrInicio"].'"
                                      , "hrTermino" : "'.$linha["hrTermino"].'"                                      
                                      , "nrCep" : "'.$linha["nrCep"].'"
                                      , "nmEstado" : "'.$linha["nmEstado"].'"
                                      , "nmCidade" : "'.$linha["nmCidade"].'"
                                      , "cdEstado" : "'.$linha["cdEstado"].'"
                                      , "cdCidade" : "'.$linha["cdCidade"].'"
                                      , "nmBairro" : "'.$linha["nmBairro"].'"
                                      , "nmRua" : "'.$linha["nmRua"].'"
                                      , "nrLocal" : "'.$linha["nrLocal"].'"
                                      , "dsComplemento" : "'.$linha["dsComplemento"].'"
                                      , "cdCategoria" : "'.$linha["cdCategoria"].'"
                                      , "cdPerfil" : "'.$linha["cdPerfil"].'"
                                      , "cdBairro" : "'.$linha["cdBairro"].'"
                                      , "dsCategoria" : "'.$linha["dsCategoria"].'"}';

                //Para não concatenar a virgula no final do json
                if($qtdLinhas != $contador)
                    $retorno = $retorno . ',';

            }
            $retorno = $retorno . "]";

            return $retorno;

            $this->getConexao()->fechaConexao();
        }

        
    }

    public function Atualizar(){

        $this->conexao->conectaBanco();
        $cdEvento = $this->getModel()->getEvento();
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

        $sSql = "UPDATE tbeventos eve
                    SET eve.nmEvento  = '" . $nomeEvento . "'
                       ,eve.dsEvento  = '" . $descricao . "'
                       ,eve.dtInicio = STR_TO_DATE('" . $dataInicio . "','%d/%m/%Y')   
                       ,eve.dtTermino = STR_TO_DATE('" . $dataTermino . "','%d/%m/%Y')
                       ,eve.hrInicio = '" . $horaInicio . "'
                       ,eve.hrTermino = '" . $horaTermino . "'
                       ,eve.nmBairro = '" . $bairro . "'
                       ,eve.nmRua = '" . $rua . "'
                       ,eve.nrLocal = '" . $numero . "'
                       ,eve.dsComplemento = '" . $complemento . "'
                       ,eve.nrCep = '" . $cep . "'
                       ,eve.cdEstado = '" . $estado . "'
                       ,eve.cdCidade = '" . $cidade . "'
                       ,eve.cdUsuario = '" . $usuario . "'
                       ,eve.cdCategoria = '" . $categoria . "'
                       ,eve.idNotificacao = '" . $notificacao . "'
                       ,eve.nmImagem = '" . $nmImagem . "'
                  WHERE eve.cdEvento = " . $cdEvento;

        $this->conexao->query($sSql);
        $this->conexao->fechaConexao();

    }

    public function incluirAtividade(){

        $this->conexao->conectaBanco();
        $cdUsuario = $this->getModel()->getUsuario();
        $cdEvento = $this->getModel()->getEvento();
        $nomeAtividade = $this->getModel()->getNomeAtividade();
        $descricaoAtividade = $this->getModel()->getDescricaoAtividade();
        $dataInicioAtividade = date("d/m/y",strtotime(str_replace('/','-',$this->getModel()->getDataInicioAtividade())));
        $dataTerminoAtividade = date("d/m/y",strtotime(str_replace('/','-',$this->getModel()->getDataTerminoAtividade())));
        $horaInicioAtividade = $this->getModel()->getHoraInicioAtividade();
        $horaTerminoAtividade = $this->getModel()->getHoraTerminoAtividade();
        
        $sSql = "INSERT INTO tbatividades (nmAtividade
                                        ,dsAtividade
                                        ,cdEvento
                                        ,cdUsuario
                                        ,dtAtividadeInicio
                                        ,dtAtividadeTermino
                                        ,hrInicioAtividade
                                        ,hrTerminoAtividade)
                                        VALUES ('". $nomeAtividade ."'
                                        ,'". $descricaoAtividade ."'
                                        ,'". $cdEvento ."'
                                        ,'". $cdUsuario ."'
                                        ,STR_TO_DATE('". $dataInicioAtividade ."','%d/%m/%Y')
                                        ,STR_TO_DATE('". $dataTerminoAtividade ."','%d/%m/%Y')
                                        ,'". $horaInicioAtividade ."'                    
                                        ,'". $horaTerminoAtividade ."')";

        $this->conexao->query($sSql);
        $this->conexao->fechaConexao();

    }

    public function atualizarAtividade(){

        $this->conexao->conectaBanco();
        
        $cdEvento = $this->getModel()->getEvento();
        $cdAtividade = $this->getModel()->getAtividade();
        $nomeAtividade = $this->getModel()->getNomeAtividade();
        $descricaoAtividade = $this->getModel()->getDescricaoAtividade();
        $dataInicioAtividade = date("d/m/y",strtotime(str_replace('/','-',$this->getModel()->getDataInicioAtividade())));
        $dataTerminoAtividade = date("d/m/y",strtotime(str_replace('/','-',$this->getModel()->getDataTerminoAtividade())));
        $horaInicioAtividade = $this->getModel()->getHoraInicioAtividade();
        $horaTerminoAtividade = $this->getModel()->getHoraTerminoAtividade();
        
        $sSql = "UPDATE tbatividades ati
                    SET ati.nmAtividade = '". $nomeAtividade ."'
                       ,ati.dsAtividade = '". $descricaoAtividade ."'
                       ,ati.dtAtividadeInicio = STR_TO_DATE('". $dataInicioAtividade ."','%d/%m/%Y')
                       ,ati.dtAtividadeTermino = STR_TO_DATE('". $dataInicioAtividade ."','%d/%m/%Y')
                       ,ati.hrInicioAtividade = '". $horaInicioAtividade ."'    
                       ,ati.hrTerminoAtividade = '". $horaTerminoAtividade ."'
                  WHERE ati.cdEvento = " . $cdEvento . "
                    AND ati.cdAtividade = " . $cdAtividade ;

        $this->conexao->query($sSql);
        $this->conexao->fechaConexao();

    }

    public function carregarAtividades(){
        $this->conexao->conectaBanco();

        $cdUsuario = $this->getModel()->getUsuario();
        $cdEvento = $this->getModel()->getEvento();
        
        
        $sSql = "SELECT ati.nmAtividade
                       ,ati.dsAtividade
                       ,ati.dtAtividadeInicio
                       ,ati.dtAtividadeTermino
                       ,ati.hrInicioAtividade
                       ,ati.hrTerminoAtividade
                       ,ati.cdAtividade
                       ,ati.cdUsuario
                       ,ati.cdEvento
                   FROM tbatividades ati
                  WHERE ati.cdEvento = " . $cdEvento . "
                    AND ati.cdUsuario = " . $cdUsuario;
        

        $resultado = mysqli_query($this->conexao->getConexao(), $sSql);

        if (!$resultado) {
            die(mysqli_error($this->conexao->getConexao()));
        }else
        {
            $qtdLinhas = mysqli_num_rows($resultado);

            $contador = 0;

            $retorno = '[';

            while ($linha = mysqli_fetch_assoc($resultado)) {

                $contador = $contador + 1;

                $retorno = $retorno . '{"cdEvento": "'.$linha["cdEvento"].'"
                                      , "cdUsuario" : "'.$linha["cdUsuario"].'"
                                      , "cdAtividade" : "'.$linha["cdAtividade"].'"
                                      , "nmAtividade" : "'.$linha["nmAtividade"].'"                                      
                                      , "dsAtividade" : "'.$linha["dsAtividade"].'"
                                      , "dtAtividadeInicio" : "'.$linha["dtAtividadeInicio"].'"
                                      , "dtAtividadeTermino" : "'.$linha["dtAtividadeTermino"].'"
                                      , "hrInicioAtividade" : "'.$linha["hrInicioAtividade"].'"                                                                           
                                      , "hrTerminoAtividade" : "'.$linha["hrTerminoAtividade"].'"}';

                //Para não concatenar a virgula no final do json
                if($qtdLinhas != $contador)
                    $retorno = $retorno . ',';

            }
            $retorno = $retorno . "]";

            return $retorno;

            $this->getConexao()->fechaConexao();
        }        
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
					FROM tbBairros bai
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
}
	
?>
