<?php

class EventoModel {

	private $cdEvento;
	private $cdUsuario;
	private $qtEstrela;
	
	public function setUsuario($cdUsuario){
		$this->cdUsuario = $cdUsuario;
	}

	public function getUsuario(){
		return $this->cdUsuario;
	}

	public function setEvento($cdEvento){
		$this->cdEvento = $cdEvento;
	}

	public function getEvento(){
		return $this->cdEvento;
	}

	public function setEstrela($qtEstrela){
		$this->qtEstrela = $qtEstrela;
	}

	public function getEstrela(){
		return $this->qtEstrela;
	}

}
?>
