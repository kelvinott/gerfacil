<?php

class AtualizarPerfilModel {

	private $email;
	private $nome;
	private $sobrenome;
	private $nascimento;
	private $estado;
    private $cidade;
    private $codigo;

    public function setEmail($email){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}
    
    public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setSobrenome($sobrenome){
		$this->sobrenome = $sobrenome;
	}

	public function getSobrenome(){
		return $this->sobrenome;
	}

	public function setNascimento($nascimento){
		$this->nascimento = $nascimento;
	}

	public function getNascimento(){
		return $this->nascimento;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getEstado(){
		return $this->estado;
    }
    
    public function setCidade($estado){
		$this->estado = $estado;
	}

	public function getCidade(){
		return $this->estado;
    }
    
    public function setCodigo($codigo){
		$this->codigo = $codigo;
	}

	public function getCodigo(){
		return $this->codigo;
	}

}
?>
