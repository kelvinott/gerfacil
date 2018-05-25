<?php

require_once("../../estrutura/conexao.php");

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
                    ,nmBairro
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

        $this->participarEvento($this->ultimoEvento());


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

}

    

?>