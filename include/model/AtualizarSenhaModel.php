<?php

class AtualizarSenhaModel {

    private $usuario;
    private $senhaAntiga;
		private $senhaNova;
		private $senhaNovaRepetir;

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getUsuario(){
		return $this->usuario;
	}

    public function setSenhaAntiga($senhaAntiga){
		$this->senhaAntiga = $senhaAntiga;
	}

	public function getSenhaAntiga(){
		return $this->senhaAntiga;
	}
    
    public function setSenhaNova($senhaNova){
		$this->senhaNova = $senhaNova;
	}

	public function getSenhaNova(){
		return $this->senhaNova;
    }

    public function setSenhaNovaRepetir($senhaNovaRepetir){
		$this->senhaNovaRepetir = $senhaNovaRepetir;
	}

	public function getSenhaNovaRepetir(){
		return $this->senhaNovaRepetir;
    }

    

}
?>
