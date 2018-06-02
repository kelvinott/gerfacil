<?php

require_once("../model/PaginaInicialModel.php");
require_once("../persistencia/PaginaInicialPersistencia.php");
session_start();

switch($_POST["action"]){

	
	case 'buscar':
        $model = new PaginaInicialModel();

        $model->setInicio($_POST["hidInicio"]);
        $model->setFim($_POST["hidFim"]);
        
        $ip = "187.55.46.72";//$_SERVER['REMOTE_ADDR'];

        $detalhes = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));    
        
        $model->setCidade($detalhes->city);
        
        $model->setEstado($detalhes->region);
        
        if(isset($_SESSION["idFacebook"])) 
            $model->setidFacebook($_SESSION["idFacebook"]);


        if(isset($_POST["pesquisar"])) {
            $model->setPesquisar($_POST["pesquisar"]);

            if (isset($_SESSION["cdUsuario"]) && !isset($_SESSION["idFacebook"])){
                
                $model->setCodigo($_SESSION["cdUsuario"]);

            } else {
                
                
                
            }

        } else {

            if (isset($_SESSION["cdUsuario"])  && !isset($_SESSION["idFacebook"])){
                
                $model->setCodigo($_SESSION["cdUsuario"]);

            } else {
                
                
                
            }
        }
        
        $persistencia = new PaginaInicialPersistencia();

        $persistencia->setModel($model);

        $retorno = $persistencia->carregaEventos("");

        if($retorno == "[]") {
            $retorno = $persistencia->carregaEventos("1"); 

            if($retorno == "[]") {
                $retorno = $persistencia->carregaEventos("2"); 
            }
        }

        echo $retorno;

        break;
}


?>
