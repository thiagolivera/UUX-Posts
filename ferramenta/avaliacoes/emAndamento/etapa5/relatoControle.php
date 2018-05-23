<?php
include_once '../../../Banco.php';

class RelatoControle extends Banco{
    public function obterAvaliacao($id){
        $sql = "SELECT * FROM avaliacaoInfo WHERE idAvaliacao = " . $id . ";";
        $rtn = self::Executar($sql);
        return mysqli_fetch_row($rtn);
    }
    
    public function salvarPercepcoes($idAvaliador, $idAvaliacao, Relato $relato){
        $sql = "INSERT INTO `avaliacaoPercepcoes`(`idPercepcao`, `idAvaliador`, `idAvaliacao`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`) VALUES "
                . "(DEFAULT,".$idAvaliador.",".$idAvaliacao.",'".$relato->q1."','".$relato->q2."','".$relato->q3."','".$relato->q4."','".$relato->q5."','".$relato->q6."');";
        self::Executar($sql);
    }
    
    public function obterAvaliadores($idAvaliacao){
        $sql = "SELECT DISTINCT login.nome, login.codlogin FROM login, avaliacaoPapeis where login.codlogin = avaliacaoPapeis.idPessoa and avaliacaoPapeis.idAvaliacao =".$idAvaliacao.";";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterPercepcoes($idAvaliacao){
        $sql = "SELECT login.codlogin, avaliacaoPercepcoes.idPercepcao from login, avaliacaoPercepcoes where login.codlogin = avaliacaoPercepcoes.idAvaliador and avaliacaoPercepcoes.idAvaliacao =".$idAvaliacao.";";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
}

class Relato{
    var $q1;
    var $q2;
    var $q3;
    var $q4;
    var $q5;
    var $q6;
    
    public function __construct() {
        
    }
}