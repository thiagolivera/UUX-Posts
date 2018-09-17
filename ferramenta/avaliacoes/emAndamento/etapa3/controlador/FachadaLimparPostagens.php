<?php
/**
 * Created by PhpStorm.
 * User: netog
 * Date: 06/09/2018
 * Time: 14:18
 */

class FachadaLimparPostagens
{

    private $postagem = array();

    /**
     * FachadaLimparPostagens constructor.
     */
    public function __construct()
    {
    }

    function autenticar(){

    }

    function limparPostagens($filtro, $postagens){
        echo '<pre>';
                echo 'filtros';
                print_r($filtro);
                echo 'postagens';
                var_dump($postagens);
        echo '</pre>';
    }

    public function getMetodos($postagens)
    {
        if(isset($_GET['m'])){
            switch ($_GET['m']){
                case 'limparPostagens':
                    $this->autenticar();
                    $this->limparPostagens($_POST['filtro'],$postagens);
                    break;
                case 'FachadaClassificacao':
                    if($_GET['m'] == "classificacaoBooleana"){
                        include './PostagensClassificacadas.php';
                    }
                    break;
                default:
                    header('Location: ./introEtapa3.php');
                    break;
            }
        }
    }
}