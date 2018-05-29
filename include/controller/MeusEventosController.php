<?php

require_once("../model/MeusEventosModel.php");
require_once("../persistencia/MeusEventosPersistencia.php");
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
                                echo $nome_atual;
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

} else {
        switch($_POST["action"]){

                case 'buscar':
                        $model = new MeusEventosModel();
                        
                        $model->setUsuario($_SESSION["cdUsuario"]);
                        
                        if(isset($_POST["cdEvento"])) {                        
                                $model->setEvento($_POST["cdEvento"]);
                        }       
                        
                        $persistencia = new MeusEventosPersistencia();

                        $persistencia->setModel($model);

                        $retorno = $persistencia->carregaMeusEventos();

                        echo $retorno;
                        break;
                case 'atualizar':
                        $model = new MeusEventosModel();
                        
                        $model->setEvento($_POST["cdEvento"]);
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

                        $persistencia = new MeusEventosPersistencia();

                        $persistencia->setModel($model);

                        $persistencia->Atualizar();

                        break;
                case 'carregarAtividades':
                        $model = new MeusEventosModel();
                        $model->setEvento($_POST["cdEvento"]);
                        $model->setUsuario($_SESSION["cdUsuario"]);
                        
                        $persistencia = new MeusEventosPersistencia();

                        $persistencia->setModel($model);
                        $retorno = $persistencia->carregarAtividades();
                        echo $retorno;
                        break;
                case 'incluirAtividade':
                        $model = new MeusEventosModel();
                        $persistencia = new MeusEventosPersistencia();
                        
                        $model->setEvento($_POST["cdEvento"]);
                        $model->setUsuario($_SESSION["cdUsuario"]);
                        $model->setNomeAtividade($_POST["nomeAtividade"]);
                        $model->setDescricaoAtividade($_POST["descricaoAtividade"]);
                        $model->setDataInicioAtividade($_POST["dataInicioAtividade"]);
                        $model->setDataTerminoAtividade($_POST["dataTerminoAtividade"]);
                        $model->setHoraInicioAtividade($_POST["horaInicioAtividade"]);
                        $model->setHoraTerminoAtividade($_POST["horaTerminoAtividade"]);                      
                       
                        $persistencia->setModel($model);
                        $persistencia->incluirAtividade();
    
                        break;
                case 'editarAtividade':
                        $model = new MeusEventosModel();
                        $persistencia = new MeusEventosPersistencia();
                        
                        $model->setEvento($_POST["cdEvento"]);
                        $model->setAtividade($_POST["cdAtividade"]);                        
                        $model->setNomeAtividade($_POST["nomeAtividade"]);
                        $model->setDescricaoAtividade($_POST["descricaoAtividade"]);
                        $model->setDataInicioAtividade($_POST["dataInicioAtividade"]);
                        $model->setDataTerminoAtividade($_POST["dataTerminoAtividade"]);
                        $model->setHoraInicioAtividade($_POST["horaInicioAtividade"]);
                        $model->setHoraTerminoAtividade($_POST["horaTerminoAtividade"]);                      
                       
                        $persistencia->setModel($model);
                        $persistencia->atualizarAtividade();
    
                        break;
                        
                
        }
}




?>
