<?php
/**
 * Created by PhpStorm.
 * User: netog
 * Date: 06/09/2018
 * Time: 09:39
 */

include_once 'FachadaLimparPostagens.php';
include_once 'FachadaClassificacao.php';

if (!isset($_SESSION['idAvaliacao'])) {
    header("location:erro.php");
}

class FrontController{

    private $postagens;
    /**
     * FrontController constructor.
     */
    public function __construct()
    {
    }

    public function getFachada($idAvaliacao){
        if(isset($_GET['c']) && isset($_GET['m'])){
            switch ($_GET['c']){
                case 'FachadaLimparPostagens':
                    $controlador = new FachadaLimparPostagens();
                    $this->getMetodoLimpar($controlador);
                    break;
                case 'FachadaClassificacao':
                    $controlador = new FachadaClassificacao();
                    $this->getMetodoClassificacao($idAvaliacao, $controlador);
                    break;
                default:
                    header('Location: ./introEtapa3.php');
                    break;
            }
        }
    }

    private function getMetodoClassificacao($idAvaliacao, $controlador){
        if(isset($_GET['m'])){
            switch ($_GET['m']){
                case 'classificacaoBooleana':
                    $this->postagens = $controlador->classificacaoBooleana($idAvaliacao);
                    require_once(__DIR__.'/../PostagensClassificacadas.php');
                    break;
                default:
                    header('Location: ./introEtapa3.php');
                    break;
            }
        }
    }

    private function getMetodoLimpar($controlador){
        if(isset($_GET['m'])){
            switch ($_GET['m']){
                case 'limparPostagensTela':
                    require_once(__DIR__.'/../LimparPostagens.php');
                    break;
                case 'limparPostagens':
                    $this->postagens = $controlador->limparPostagens($_POST, $this->postagens);
                    require_once(__DIR__.'/../PostagensLimpas.php');
                    break;
                default:
                    header('Location: ./introEtapa3.php');
                    break;
            }
        }
    }

    function getPostagens(){
        return $this->postagens;
    }
}