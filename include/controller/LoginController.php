<?php
header("Content-type: text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
date_default_timezone_set('America/Sao_Paulo');
require_once("../model/LoginModel.php");
require_once("../persistencia/LoginPersistencia.php");


if($_POST["email"] == '' OR
    $_POST["senha"] == '' ){
        exit;
    }

$oModel = new LoginModel();

$oPersistencia = new LoginPersistencia();

$oModel->setSenha($_POST["senha"]);

$oModel->setEmail($_POST["email"]);

$oPersistencia->setModel($oModel);

$bLogou = $oPersistencia->validaLogin();

$idAlteraSenha = $oPersistencia->buscarIdAlteraSenha();

if($bLogou){
    if($idAlteraSenha == 1){
        echo '{ "mensagem": "Atualizar Senha", "status" : "2" }';
    } else {
        echo '{ "mensagem": "Login realizado com sucesso", "status" : "0" }';
    }

} else{
    echo '{ "mensagem": "Usuário ou senha incorretos", "status" : "1" }';
}


?>
