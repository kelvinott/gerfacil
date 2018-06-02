<?php

require_once("../../estrutura/conexao.php");

class PaginaInicialPersistencia   {
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

    public function carregaEventos($idNovamente){
        $this->conexao->conectaBanco();

        $codigo = $this->getModel()->getCodigo();
        $cidade = $this->getModel()->getCidade();
        $estado = $this->getModel()->getEstado();
        $pesquisar = $this->getModel()->getPesquisar();
        $inicio = $this->getModel()->getInicio();
        $fim = $this->getModel()->getFim();
        $idFacebook = $this->getModel()->getIdFacebook();

        if($idNovamente == "") {        
            if($pesquisar == "") {            
                if($codigo != "" && $idFacebook == "") {
                    $sSql = "SELECT dados.nmImagem
                                ,dados.nmEvento
                                ,dados.dsEvento
                                ,dados.nrCep
                                ,dados.cdEvento
                                ,dados.row_number
                                ,(SELECT count(1)
                                    FROM tbeventos eve2
                                WHERE eve2.cdCidade = (SELECT usu2.cdCidade
                                                                FROM tbusuarios usu2
                                                            WHERE usu2.cdUsuario =  " . $codigo . ")
                                    AND eve2.cdEstado = (SELECT usu3.cdEstado
                                                            FROM tbusuarios usu3
                                                        WHERE usu3.cdUsuario = " . $codigo . ")) qtdPaginacao
                            FROM (SELECT eve.nmImagem nmImagem
                                            ,eve.nmEvento nmEvento
                                            ,eve.dsEvento dsEvento
                                            ,eve.nrCep nrCep
                                            ,eve.cdEvento cdEvento
                                            ,(@row_number := @row_number + 1) row_number
                                        FROM tbeventos eve
                                            ,(SELECT @row_number := 0) r                                                   
                                        WHERE eve.cdCidade = (SELECT usu.cdCidade
                                                                FROM tbusuarios usu
                                                            WHERE usu.cdUsuario =  " . $codigo . ")
                                        AND eve.cdEstado = (SELECT usu.cdEstado
                                                                FROM tbusuarios usu
                                                            WHERE usu.cdUsuario = " . $codigo . ")                        
                                        ORDER BY eve.dtInicio) dados
                            WHERE (dados.row_number >=" . $inicio. " AND dados.row_number <= " . $fim . ")";
                    
                } else {                
                    $sSql = "SELECT dados.nmImagem
                                    ,dados.nmEvento
                                    ,dados.dsEvento
                                    ,dados.nrCep
                                    ,dados.cdEvento
                                    ,dados.row_number
                                    ,(SELECT count(1)
                                        FROM tbeventos eve2
                                    WHERE eve2.cdCidade = (SELECT cid.cdCidade
                                                                FROM tbcidades cid
                                                            WHERE UPPER(cid.nmCidade) = UPPER('". $cidade ."'))
                                        AND eve2.cdEstado = (SELECT est.cdEstado
                                                                FROM tbestado est
                                                            WHERE UPPER(est.nmEstado) = UPPER('". $estado ."'))) qtdPaginacao
                                FROM ( SELECT eve.nmImagem nmImagem
                                                ,eve.nmEvento nmEvento
                                                ,eve.dsEvento dsEvento
                                                ,eve.nrCep nrCep
                                                ,eve.cdEvento cdEvento
                                                ,(@row_number := @row_number + 1) row_number
                                            FROM tbeventos eve    
                                                ,(SELECT @row_number := 0) r                       
                                        WHERE eve.cdCidade = (SELECT cid.cdCidade
                                                                FROM tbcidades cid
                                                                WHERE UPPER(cid.nmCidade) = UPPER('" . $cidade . "')) " .
                                        " AND eve.cdEstado = (SELECT est.cdEstado
                                                                FROM tbestado est
                                                                WHERE UPPER(est.nmEstado) = UPPER('" . $estado . "'))
                                        ORDER BY eve.dtInicio) dados
                                WHERE (dados.row_number >=" . $inicio. " AND dados.row_number <= " . $fim . ")";			 			 			                        
                
                }
            } else {            
                $sSql = "SELECT dados.nmImagem nmImagem
                            ,dados.nmEvento nmEvento
                            ,dados.dsEvento dsEvento
                            ,dados.nrCep nrCep
                            ,dados.nmEstado nmEstado
                            ,dados.nmCidade nmCidade
                            ,dados.dsCategoria dsCategoria
                            ,dados.cdEvento cdEvento
                            ,dados.row_number
                            ,(SELECT count(1)
                                FROM tbeventos eve2
                                JOIN tbestado est2
                                    ON est2.cdEstado = eve2.cdEstado
                                JOIN tbcidades cid2
                                    ON cid2.cdCidade = eve2.cdCidade
                                JOIN tbcategorias cat2
                                    ON cat2.cdCategoria = eve2.cdCategoria 
                                WHERE upper(eve2.nmEvento) like upper('%" . $pesquisar . "%')
                                    OR upper(est2.nmEstado) like upper('%" . $pesquisar . "%')
                                    OR upper(cid2.nmCidade) like upper('%" . $pesquisar . "%')
                                    OR upper(cat2.dsCategoria) like upper('%" . $pesquisar . "%')) qtdPaginacao      
                        FROM (SELECT eve.nmImagem nmImagem
                                    ,eve.nmEvento nmEvento
                                    ,eve.dsEvento dsEvento
                                    ,eve.nrCep nrCep
                                    ,est.nmEstado nmEstado
                                    ,cid.nmCidade nmCidade
                                    ,cat.dsCategoria dsCategoria
                                    ,eve.cdEvento cdEvento
                                    ,(@row_number := @row_number + 1) row_number
                                FROM tbeventos eve
                                JOIN tbestado est
                                    ON est.cdEstado = eve.cdEstado
                                JOIN tbcidades cid
                                    ON cid.cdCidade = eve.cdCidade
                                JOIN tbcategorias cat
                                    ON cat.cdCategoria = eve.cdCategoria 
                                    ,(SELECT @row_number := 0) r
                                WHERE upper(eve.nmEvento) like upper('%" . $pesquisar . "%')
                                    OR upper(est.nmEstado) like upper('%" . $pesquisar . "%')
                                    OR upper(cid.nmCidade) like upper('%" . $pesquisar . "%')
                                    OR upper(cat.dsCategoria) like upper('%" . $pesquisar . "%')                         
                                ORDER BY eve.dtInicio) dados
                            WHERE (dados.row_number >=" . $inicio. " AND dados.row_number <= " . $fim . ")";

            }
        } else {
            if($idNovamente == "1") {
                $sSql = "SELECT dados.nmImagem
                                ,dados.nmEvento
                                ,dados.dsEvento
                                ,dados.nrCep
                                ,dados.cdEvento
                                ,dados.row_number
                                ,(SELECT count(1)
                                    FROM tbeventos eve2
                                WHERE eve2.cdEstado = (SELECT est.cdEstado
                                                            FROM tbestado est
                                                        WHERE UPPER(est.nmEstado) = UPPER('". $estado ."'))) qtdPaginacao
                            FROM ( SELECT eve.nmImagem nmImagem
                                            ,eve.nmEvento nmEvento
                                            ,eve.dsEvento dsEvento
                                            ,eve.nrCep nrCep
                                            ,eve.cdEvento cdEvento
                                            ,(@row_number := @row_number + 1) row_number
                                        FROM tbeventos eve    
                                            ,(SELECT @row_number := 0) r                       
                                    WHERE eve.cdEstado = (SELECT est.cdEstado
                                                            FROM tbestado est
                                                            WHERE UPPER(est.nmEstado) = UPPER('" . $estado . "'))
                                    ORDER BY eve.dtInicio) dados
                            WHERE (dados.row_number >=" . $inicio. " AND dados.row_number <= " . $fim . ")";
            } else {
                $sSql = "SELECT dados.nmImagem
                                ,dados.nmEvento
                                ,dados.dsEvento
                                ,dados.nrCep
                                ,dados.cdEvento
                                ,dados.row_number
                                ,(SELECT count(1)
                                    FROM tbeventos eve2) qtdPaginacao
                            FROM ( SELECT eve.nmImagem nmImagem
                                            ,eve.nmEvento nmEvento
                                            ,eve.dsEvento dsEvento
                                            ,eve.nrCep nrCep
                                            ,eve.cdEvento cdEvento
                                            ,(@row_number := @row_number + 1) row_number
                                        FROM tbeventos eve    
                                            ,(SELECT @row_number := 0) r                                                          
                                    ORDER BY eve.dtInicio) dados
                            WHERE (dados.row_number >=" . $inicio. " AND dados.row_number <= " . $fim . ")";
            }

        }
        
        $resultado = mysqli_query($this->conexao->getConexao(), $sSql);
        
        if (!$resultado) {            
            die(mysqli_error($this->conexao->getConexao()));
        }else {            
            $qtdLinhas = mysqli_num_rows($resultado);

            $contador = 0;

            $retorno = '[';

            while ($linha = mysqli_fetch_assoc($resultado)) {
                
                $contador = $contador + 1;

                $retorno = $retorno . '{"nmImagem": "'.$linha["nmImagem"].'"
                                      , "nmEvento" : "'.$linha["nmEvento"].'"
                                      , "nrCep" : "'.$linha["nrCep"].'"     
                                      , "cdEvento" : "'.$linha["cdEvento"].'" 
                                      , "qtdPaginacao" : "'.$linha["qtdPaginacao"].'"                                                                                 
                                      , "dsEvento" : "'.$linha["dsEvento"].'"}';

                //Para não concatenar a virgula no final do json
                if($qtdLinhas != $contador)
                    $retorno = $retorno . ',';

            }
            $retorno = $retorno . "]";
            
           /* if($retorno == "[]"){
                if($idNovamente == ""){
                    $this->conexao->fechaConexao();
                    $this->carregaEventos("1");
                }
                else if($idNovamente == "1"){
                    $this->conexao->fechaConexao();
                    $this->carregaEventos("2");
                }                    
            }*/

            return $retorno;

            $this->conexao->fechaConexao();
        }

        
    }
    

}
	
?>
