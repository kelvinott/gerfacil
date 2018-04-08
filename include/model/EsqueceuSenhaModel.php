<?php

class EsqueceuSenhaModel {

    private $usuario;
    private $email;	
    
    public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

    public function getUsuario(){
		return $this->usuario;
	}
    

    public function setEmail($email){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}
    
}
?>
