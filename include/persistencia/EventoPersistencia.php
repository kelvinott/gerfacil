<?php

require_once("../../estrutura/conexao.php");

class EventoPersistencia   {
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

    public function carregaEvento(){
        $this->conexao->conectaBanco();

        $cdEvento = $this->getModel()->getEvento();
        
        $sSql = "SELECT eve.nmImagem nmImagem
                       ,eve.nmEvento nmEvento
                       ,eve.dsEvento dsEvento
                       ,eve.nrCep nrCep
                       ,est.nmEstado nmEstado
                       ,cid.nmCidade nmCidade                        
                       ,cat.dsCategoria dsCategoria
                       ,eve.dtInicio dtInicio
                       ,eve.dtTermino dtTermino
                       ,eve.hrInicio hrInicio
                       ,eve.hrTermino hrTermino
                       ,eve.nmBairro nmBairro
                       ,eve.nmRua nmRua                       
                       ,eve.nrLocal nrLocal
                       ,eve.dsComplemento dsComplemento
                       ,eve.nrCep nrCep
                  FROM tbeventos eve
                  JOIN tbestado est
                    ON est.cdEstado = eve.cdEstado
                  JOIN tbcidades cid
                    ON cid.cdCidade = eve.cdCidade
                  JOIN tbcategorias cat
                    ON cat.cdCategoria = eve.cdCategoria 
                 WHERE eve.cdEvento = " . $cdEvento;

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

                $retorno = $retorno . '{"nmImagem": "'.$linha["nmImagem"].'"
                                      , "nmEvento" : "'.$linha["nmEvento"].'"
                                      , "nrCep" : "'.$linha["nrCep"].'"                                                                          
                                      , "nmEstado" : "'.$linha["nmEstado"].'"
                                      , "nmCidade" : "'.$linha["nmCidade"].'"
                                      , "dsCategoria" : "'.$linha["dsCategoria"].'"
                                      , "dtInicio" : "'.$linha["dtInicio"].'"
                                      , "dtTermino" : "'.$linha["dtTermino"].'"
                                      , "hrInicio" : "'.$linha["hrInicio"].'"
                                      , "hrTermino" : "'.$linha["hrTermino"].'"
                                      , "nmBairro" : "'.$linha["nmBairro"].'"
                                      , "nmRua" : "'.$linha["nmRua"].'"
                                      , "nrLocal" : "'.$linha["nrLocal"].'"
                                      , "dsComplemento" : "'.$linha["dsComplemento"].'"
                                      , "nrCep" : "'.$linha["nrCep"].'"
                                      , "dsEvento" : "'.$linha["dsEvento"].'"}';

                //Para não concatenar a virgula no final do json
                if($qtdLinhas != $contador)
                    $retorno = $retorno . ',';

            }
            $retorno = $retorno . "]";

            return $retorno;

            $this->getConexao()->fechaConexao();
        }

        
    }
    
    public function carregaParticipantes(){
        $this->conexao->conectaBanco();

        $cdEvento = $this->getModel()->getEvento();
        
        $sSql = "SELECT usu.dsNome dsNome
                       ,usu.dsSobrenome dsSobrenome
                       ,uev.cdEvento cdEvento
                       ,uev.cdUsuario cdUsuario
                       ,uev.tbPerfis_cdPerfil cdPerfil
                   FROM tbusuarios_tbeventos uev
                   JOIN tbusuarios usu
                     ON uev.cdUsuario = usu.cdUsuario
                 WHERE uev.cdEvento = " . $cdEvento;

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

                $retorno = $retorno . '{"dsNome": "'.$linha["dsNome"].'"
                                      , "cdEvento" : "'.$linha["cdEvento"].'"
                                      , "cdUsuario" : "'.$linha["cdUsuario"].'"
                                      , "cdPerfil" : "'. $linha["cdPerfil"].'"
                                      , "dsSobrenome" : "'.$linha["dsSobrenome"].'"}';

                //Para não concatenar a virgula no final do json
                if($qtdLinhas != $contador)
                    $retorno = $retorno . ',';

            }
            $retorno = $retorno . "]";

            return $retorno;

            $this->getConexao()->fechaConexao();
        }

        
    }

    public function participarEvento(){
		$this->conexao->conectaBanco();
		
        $cdUsuario = $this->getModel()->getUsuario();	   

        $cdEvento = $this->getModel()->getEvento();	  
        
		$sSql = "INSERT INTO tbusuarios_tbeventos (cdUsuario
                                                  ,cdEvento
                                                  ,tbperfis_cdPerfil) 
                                           values (" . $cdUsuario . "
                                                  ," . $cdEvento . " 
                                                  , 1)";
                                              
        $this->conexao->query($sSql);

		$this->conexao->fechaConexao();

    }

    public function desparticiparEvento(){
		$this->conexao->conectaBanco();
		
        $cdUsuario = $this->getModel()->getUsuario();	   

        $cdEvento = $this->getModel()->getEvento();	  
        
        $sSql = "DELETE FROM tbusuarios_tbeventos
                  WHERE cdUsuario = " . $cdUsuario . "
                    AND cdEvento = " . $cdEvento;
                                              
        $this->conexao->query($sSql);

		$this->conexao->fechaConexao();

    }
    
    
    public function validaParticipacao(){
        $this->conexao->conectaBanco();
		
		$cdUsuario = $this->getModel()->getUsuario();	   

        $cdEvento = $this->getModel()->getEvento();	  
		
		$sSql = "select  1
                    FROM tbusuarios_tbeventos usu
                    WHERE cdUsuario = " . $cdUsuario . " 
                      AND cdEvento = " . $cdEvento;

        if( $oDados = $this->conexao->fetch_query($sSql) ) 
			echo "1";
		else 			
            echo "2";
        
        $this->conexao->fechaConexao();

		
    }

    public function existeAvaliacao(){
        $this->conexao->conectaBanco();
		
		$cdUsuario = $this->getModel()->getUsuario();	   

        $cdEvento = $this->getModel()->getEvento();	  
		
		$sSql = "select  1
                    FROM tbAvaliacoes usu
                    WHERE cdUsuario = " . $cdUsuario . " 
                      AND cdEvento = " . $cdEvento;

        if( $oDados = $this->conexao->fetch_query($sSql) ) 
			$valida = true;
		else 			
            $valida = false;
        
        $this->conexao->fechaConexao();

		return $valida;
    }
    
    public function avaliar(){
        $existeAvaliacao = $this->existeAvaliacao();

        $this->conexao->conectaBanco();
		
        $cdUsuario = $this->getModel()->getUsuario();	   
        $cdEvento = $this->getModel()->getEvento();	  
        $qtEstrela = $this->getModel()->getEstrela();	  

        if($existeAvaliacao == "1"){
            $sSql = "UPDATE tbAvaliacoes
                        SET qtEstrela = " . $qtEstrela . "
                      WHERE cdUsuario =  " . $cdUsuario . "
                        AND cdEvento = " . $cdEvento;

        } else {

            $sSql = "INSERT INTO tbAvaliacoes (cdUsuario
                                              ,cdEvento
                                              ,qtEstrela) 
                                        values (" . $cdUsuario . "
                                                ," . $cdEvento . " 
                                                ," . $qtEstrela .")";
        }

		
                                              
        $this->conexao->query($sSql);

		$this->conexao->fechaConexao();

    }

    public function atribuirPerfil(){
        
        $this->conexao->conectaBanco();
		
        $cdUsuario = $this->getModel()->getUsuario();	   
        $cdEvento = $this->getModel()->getEvento();	  

        $sSql = "UPDATE tbusuarios_tbeventos
                    SET tbperfis_cdPerfil = 2  
                  WHERE cdUsuario =  " . $cdUsuario . "
                    AND cdEvento = " . $cdEvento;    
                                              
        $this->conexao->query($sSql);

		$this->conexao->fechaConexao();

    }

    public function removerPerfil(){
        
        $this->conexao->conectaBanco();
		
        $cdUsuario = $this->getModel()->getUsuario();	   
        $cdEvento = $this->getModel()->getEvento();	  

        $sSql = "UPDATE tbusuarios_tbeventos
                    SET tbperfis_cdPerfil = 1  
                  WHERE cdUsuario =  " . $cdUsuario . "
                    AND cdEvento = " . $cdEvento;    
                                              
        $this->conexao->query($sSql);

		$this->conexao->fechaConexao();

    }
    
    public function validaCoordenacao(){
        $this->conexao->conectaBanco();
		
		$cdUsuario = $this->getModel()->getUsuario();	   

        $cdEvento = $this->getModel()->getEvento();	  
		
		$sSql = "SELECT uve.tbPerfis_cdPerfil cdPerfil
                   FROM tbusuarios_tbeventos uve
                  WHERE cdUsuario = " . $cdUsuario . " 
                    AND cdEvento = " . $cdEvento;

        if( $oDados = $this->conexao->fetch_query($sSql)) 
			echo $oDados->cdPerfil;
		else 			
            echo "Erro EventoPersistencia.validaCoordenacao";
        
        $this->conexao->fechaConexao();		
    }

    public function carregarAtividades(){
        $this->conexao->conectaBanco();

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
                  WHERE ati.cdEvento = " . $cdEvento;        

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

}
	
?>
