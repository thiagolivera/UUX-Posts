<?php
/**
 * Created by PhpStorm.
 * User: netog
 * Date: 06/09/2018
 * Time: 14:18
 */

//include_once (__DIR__."../../../../Banco.php");

class FachadaLimparPostagens extends Banco
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

    function limparPostagens($filtro){
        echo '<pre>';
                $sql = "SELECT * FROM postagensClassificadas as posta join postagens on idPostagensClassificadas = idPostagem";
                $valores = parent::Executar($sql);
                $array = array();
                while($row = @mysqli_fetch_assoc($valores)){
                    $array[] = $row;
                }
                echo 'filtros';
                print_r($filtro);
                echo 'postagens';
                print_r($array);
        echo '</pre>';
        return $array;
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