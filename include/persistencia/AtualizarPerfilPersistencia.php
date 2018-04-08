<?php

require_once("../../estrutura/conexao.php");

class AtualizarPerfilPersistencia   {
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

	public function Atualizar(){
		$this->conexao->conectaBanco();

        $codigo = $this->getModel()->getCodigo();
        $email = $this->getModel()->getEmail();
		$nome = $this->getModel()->getNome();
		$sobrenome = $this->getModel()->getSobrenome();
		$nascimento = date("d/m/y",strtotime(str_replace('/','-',$this->getModel()->getNascimento())));
		$estado = $this->getModel()->getEstado();
		$cidade = $this->getModel()->getCidade();
	
		$sSql = "UPDATE tbusuarios 
                    SET dsEmail = '". $email ."'
                        ,dsNome = '". $nome ."'
                        ,dsSobrenome = '". $sobrenome ."'                    
                        ,dtNascimento = '". $nascimento ."'
                        ,cdEstado = ". $estado ."
                        ,cdCidade = ". $cidade ;

        $this->conexao->query($sSql);

		$this->conexao->fechaConexao();

    }

    public function buscarUsuario(){
        $this->conexao->conectaBanco();

        $codigo = $this->getModel()->getCodigo();
        
        $sSql = "SELECT usu.dsEmail
                        ,usu.dsNome
                        ,usu.dsSobrenome
                        ,usu.dtNascimento                        
                        ,usu.cdEstado
                        ,usu.cdCidade
                    FROM tbusuarios usu                    
                    WHERE usu.cdUsuario = " . $codigo;

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

                $retorno = $retorno . '{"dsEmail": "'.$linha["dsEmail"].'"
                , "dsNome" : "'.$linha["dsNome"].'"
                , "dsSobrenome" : "'.$linha["dsSobrenome"].'"
                , "dtNascimento" : "'.$linha["dtNascimento"].'"
                , "cdEstado" : "'.$linha["cdEstado"].'"
                , "cdCidade" : "'.$linha["cdCidade"].'"}';

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
