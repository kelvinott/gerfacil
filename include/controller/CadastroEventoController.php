<?php

require_once("../model/CadastroEventoModel.php");
require_once("../persistencia/CadastroEventoPersistencia.php");
session_start();


if(!isset($_POST["action"])) {
    $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
    $pasta = "../../imagens/"; 
    $nome_imagem    = $_FILES['imagem']['name'];
    $tamanho_imagem = $_FILES['imagem']['size'];

    $ext = strtolower(strrchr($nome_imagem,"."));
    
    $im = imagecreatefromjpeg($_FILES['imagem']['tmp_name']);
    
    
    if(imagesx($im) < 1200 || imagesx($im) < 250)        
        echo "Resolução mínima 1200x250";   

    else {

        if(in_array($ext,$permitidos)){
            $tamanho = round($tamanho_imagem / 1024);   
            
            if($tamanho < 1024){ //se imagem for até 1MB envia
                $nome_atual = md5(uniqid(time())).$ext; //nome que dará a imagem
                $tmp = $_FILES['imagem']['tmp_name']; //caminho temporário da imagem        
                move_uploaded_file($tmp,$pasta.$nome_atual);
                $_SESSION["nmImagem"] = $nome_atual;
            }
            else {
                echo "A imagem deve ser de no máximo 1MB";
            }
        }
        else { 
            echo "Somente são aceitos arquivos do tipo Imagem";
        }
        
    }

    imagedestroy($im);
}
else {
    switch($_POST["action"]){
        case 'cadastrar':
    
            $model = new CadastroEventoModel();
            $persistencia = new CadastroEventoPersistencia();
    
            $model->setNomeEvento($_POST["nomeEvento"]);
            $model->setDescricao($_POST["descricao"]);
            $model->setDataInicio($_POST["dataInicio"]);
            $model->setDataTermino($_POST["dataTermino"]);
            $model->setHoraInicio($_POST["horaInicio"]);
            $model->setHoraTermino($_POST["horaTermino"]);
            $model->setBairro($_POST["bairro"]);
            $model->setRua($_POST["rua"]);
            $model->setNumero($_POST["numero"]);
            $model->setCep($_POST["cep"]);
            $model->setEstado($_POST["estado"]);
            $model->setCidade($_POST["cidade"]);
            $model->setCategoria($_POST["categoria"]);
            $model->setComplemento($_POST["complemento"]);
            $model->setUsuario($_SESSION["cdUsuario"]);
            $model->setImagem($_SESSION["nmImagem"]);
            $model->setNotificacao($_POST["notificacao"]);
    
            $persistencia->setModel($model);
            $persistencia->Cadastrar();

            break;
        case 'autocompleteestados':
            $model = new CadastroEventoModel();
            
            $model->setTermo($_POST["termo"]);
            
            $persistencia = new CadastroEventoPersistencia();
    
            $persistencia->setModel($model);
    
            $retorno = $persistencia->buscaEstadosAutoComplete();
    
            echo $retorno;
    
            break;		
        case 'autocompletecidades':
            $model = new CadastroEventoModel();
            
            $model->setTermo($_POST["termo"]);
            
            $persistencia = new CadastroEventoPersistencia();
    
            $persistencia->setModel($model);
    
            $retorno = $persistencia->buscaCidadesAutoComplete();
    
            echo $retorno;
    
            break;
        case 'autocompletebairros':
            $model = new CadastroEventoModel();
            
            $model->setTermo($_POST["termo"]);
            
            $persistencia = new CadastroEventoPersistencia();
    
            $persistencia->setModel($model);
    
            $retorno = $persistencia->buscaBairrosAutoComplete();
    
            echo $retorno;
    
            break;
        case 'validainformacoesperfil':
            $model = new CadastroEventoModel();
            
            $model->setUsuario($_SESSION["cdUsuario"]);
            
            $persistencia = new CadastroEventoPersistencia();
    
            $persistencia->setModel($model);
    
            $retorno = $persistencia->validaInformacoesPerfil();
    
            echo $retorno;        
    
            break;
            
    }
}






?>