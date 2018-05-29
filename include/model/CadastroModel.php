<?php

class CadastroModel {

	private $email;
	private $nome;
	private $sobrenome;
	private $senha;
	private $nascimento;
	private $estado;
	private $cidade;
	private $notificacao;
	private $termo;

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

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getSenha(){
		return $this->senha;
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
    
    public function setCidade($cidade){
		$this->cidade = $cidade;
	}

	public function getCidade(){
		return $this->cidade;
	}

	public function setNotificacao($notificacao){
		$this->notificacao = $notificacao;
	}

	public function getNotificacao(){
		return $this->notificacao;
	}

	public function setTermo($termo){
		$this->termo = $termo;
	}

	public function getTermo(){
		return $this->termo;
	}

}
?>
