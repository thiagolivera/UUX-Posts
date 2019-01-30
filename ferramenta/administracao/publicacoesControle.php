<?php

include '../Banco.php';

class PublicacoesControle extends Banco{
    
    public function __construct() {
        
    }
    
    public function cadastrarPublicacao(Publicacao $publicacao){
        $sql = "INSERT INTO `publicacoes`(`idpublicacoes`, `titulo`, `autores`, `anoPublicacao`, `tipo`, `conferencia`, `linkPublicacao`, `linkBibtex`) VALUES "
                . "(DEFAULT,"
                . "'". addslashes($publicacao->titulo) ."',"
                . "'". addslashes($publicacao->autores) ."',"
                . "". $publicacao->ano .","
                . "'". addslashes($publicacao->tipo) ."',"
                . "'". addslashes($publicacao->conferencia) ."',"
                . "'". $publicacao->doi ."',"
                . "'". $publicacao->bibtex ."');";
        
        parent::Executar($sql);
        ?> 
            <script>
                window.location.href = "cadastrarPublicacao.php?sucesso";
            </script>
        <?php
    }
    
    public function obterListaUsuarios(){
        $sql = "SELECT * FROM publicacoes;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
}


    class Publicacao {
        var $titulo;
        var $autores;
        var $ano;
        var $tipo;
        var $conferencia;
        var $doi;
        var $bibtex;

        public function __construct() {
        }
    }