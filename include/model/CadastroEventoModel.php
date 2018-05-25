<?php

class CadastroEventoModel {

    private $nomeEvento;
    private $descricao;
    private $dataInicio;
    private $dataTermino;
    private $horaInicio;
    private $horaTermino;
    private $bairro;
    private $rua;
    private $numero;
    private $cep;
    private $estado;
    private $cidade;
    private $complemento;
    private $categoria;
    private $usuario;
    private $nmImagem;
    private $notificacao;

    public function setNomeEvento($nomeEvento){

        $this->nomeEvento = $nomeEvento;

    }

    public function getNomeEvento(){

        return $this->nomeEvento;

    }
    public function setDescricao($descricao){

        $this->descricao = $descricao;

    }

    public function getDescricao(){

        return $this->descricao;

    }
    public function setDataInicio($dataInicio){

        $this->dataInicio = $dataInicio;

    }

    public function getDataInicio(){

        return $this->dataInicio;

    }

    public function setDataTermino($dataTermino){

        $this->dataTermino = $dataTermino;

    }

    public function getDataTermino(){

        return $this->dataTermino;

    }


    public function setHoraInicio($horaInicio){

        $this->horaInicio = $horaInicio;

    }

    public function getHoraInicio(){

        return $this->horaInicio;

    }
    public function setHoraTermino($horaTermino){

        $this->horaTermino = $horaTermino;

    }

    public function getHoraTermino(){

        return $this->horaTermino;

    }
    public function setBairro($bairro){

        $this->bairro = $bairro;

    }

    public function getBairro(){

        return $this->bairro;

    }
    public function setRua($rua){

        $this->rua = $rua;

    }

    public function getRua(){

        return $this->rua;

    }
    public function setNumero($numero){

        $this->numero = $numero;

    }

    public function getNumero(){

        return $this->numero;

    }
    public function setCep($cep){

        $this->cep = $cep;

    }

    public function getCep(){

        return $this->cep;

    }
    public function setEstado($estado){

        $this->estado = $estado;

    }

    public function getEstado(){

        return $this->estado;

    }
    public function setCidade($cidade){

        $this->cidade = $cidade;

    }

    public function getCidade(){

        return $this->cidade;

    }
    public function setCategoria($categoria){

        $this->categoria = $categoria;

    }

    public function getCategoria(){

        return $this->categoria;

    }
    public function setComplemento($complemento){

        $this->complemento = $complemento;

    }

    public function getComplemento(){

        return $this->complemento;

    }
    public function setUsuario($usuario){

        $this->usuario = $usuario;

    }

    public function getUsuario(){

        return $this->usuario;
    }

    public function setImagem($nmImagem){

        $this->nmImagem = $nmImagem;

    }

    public function getImagem(){

        return $this->nmImagem;
    }

    public function setNotificacao($notificacao){
		$this->notificacao = $notificacao;
	}

	public function getNotificacao(){
		return $this->notificacao;
	}
}

?>