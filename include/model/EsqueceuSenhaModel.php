<?php

class EsqueceuSenhaModel {

	private $usuario;
	private $email;	
	

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}
    
}
?>
