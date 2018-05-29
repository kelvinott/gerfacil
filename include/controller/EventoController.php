<?php

require_once("../model/EventoModel.php");
require_once("../persistencia/EventoPersistencia.php");
session_start();

switch($_POST["action"]){

	
	case 'buscar':
                $model = new EventoModel();

                $model->setEvento($_POST["cdEvento"]);

                $persistencia = new EventoPersistencia();

                $persistencia->setModel($model);

                $retorno = $persistencia->carregaEvento();

                echo $retorno;
                break;
        case 'participantes':
                
                $model = new EventoModel();

                $model->setEvento($_POST["cdEvento"]);

                $persistencia = new EventoPersistencia();

                $persistencia->setModel($model);

                $retorno = $persistencia->carregaParticipantes();

                echo $retorno;

                break;
        case 'participar':
                
                $model = new EventoModel();

                $model->setEvento($_POST["cdEvento"]);
                $model->setUsuario($_SESSION["cdUsuario"]);

                $persistencia = new EventoPersistencia();

                $persistencia->setModel($model);

                $retorno = $persistencia->participarEvento();

                echo $retorno;

                break;
        case 'desparticipar':
                
                $model = new EventoModel();

                $model->setEvento($_POST["cdEvento"]);
                $model->setUsuario($_SESSION["cdUsuario"]);

                $persistencia = new EventoPersistencia();

                $persistencia->setModel($model);

                $retorno = $persistencia->desparticiparEvento();

                echo $retorno;

                break;
                
        case 'validaparticipacao':
                
                $model = new EventoModel();

                $model->setEvento($_POST["cdEvento"]);
                
                if(isset($_SESSION["cdUsuario"])) {                     
                        $model->setUsuario($_SESSION["cdUsuario"]);

                        $persistencia = new EventoPersistencia();

                        $persistencia->setModel($model);

                        $retorno = $persistencia->validaParticipacao();

                        echo $retorno;
                } else {
                        echo "3";
                }

                break;  
        case 'avaliar':
                
                $model = new EventoModel();

                $model->setEvento($_POST["cdEvento"]);
                $model->setUsuario($_SESSION["cdUsuario"]);
                $model->setEstrela($_POST["qtEstrela"]);

                $persistencia = new EventoPersistencia();

                $persistencia->setModel($model);

                $retorno = $persistencia->avaliar();

                echo $retorno;

                break; 
        case 'atribuirperfil':
                
                $model = new EventoModel();

                $model->setEvento($_POST["cdEvento"]);
                $model->setUsuario($_POST["cdUsuario"]);                

                $persistencia = new EventoPersistencia();

                $persistencia->setModel($model);

                $retorno = $persistencia->atribuirPerfil();

                echo $retorno;

                break;
        case 'removerperfil':
                
                $model = new EventoModel();

                $model->setEvento($_POST["cdEvento"]);
                $model->setUsuario($_POST["cdUsuario"]);                

                $persistencia = new EventoPersistencia();

                $persistencia->setModel($model);

                $retorno = $persistencia->removerPerfil();

                echo $retorno;

                break;
        case 'validacoordenacao':
                
                $model = new EventoModel();

                $model->setEvento($_POST["cdEvento"]);
                
                if(isset($_SESSION["cdUsuario"])) {
                        $model->setUsuario($_SESSION["cdUsuario"]);                

                        $persistencia = new EventoPersistencia();

                        $persistencia->setModel($model);

                        $retorno = $persistencia->validaCoordenacao();

                        echo $retorno;
                } else {
                        echo "1";
                }

                break;
        case 'carregarAtividades':
                $model = new EventoModel();
                $model->setEvento($_POST["cdEvento"]);
                
                $persistencia = new EventoPersistencia();

                $persistencia->setModel($model);
                $retorno = $persistencia->carregarAtividades();
                echo $retorno;
                break;        
}




?>
