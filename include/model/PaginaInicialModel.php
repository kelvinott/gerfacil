<?php

class PaginaInicialModel {

	private $codigo;
	private $estado;
	private $cidade;
	private $pesquisar;
	private $inicio;
	private $fim;
	private $idFacebook;

	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}

	public function getCodigo(){
		return $this->codigo;
	}

	public function setIdFacebook($idFacebook){
		$this->idFacebook = $idFacebook;
	}

	public function getIdFacebook(){
		return $this->idFacebook;
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

	public function setPesquisar($pesquisar){
		$this->pesquisar = $pesquisar;
	}

	public function getPesquisar(){
		return $this->pesquisar;
	}


	public function setInicio($inicio){
		$this->inicio = $inicio;
	}

	public function getInicio(){
		return $this->inicio;
	}


	public function setFim($fim){
		$this->fim = $fim;
	}

	public function getFim(){
		return $this->fim;
	}

}
?>
