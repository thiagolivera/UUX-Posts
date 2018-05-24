<?php
include_once '../../../Banco.php';

class RelatoControle extends Banco{
    public function obterAvaliacao($id){
        $sql = "SELECT * FROM avaliacaoInfo WHERE idAvaliacao = " . $id . ";";
        $rtn = self::Executar($sql);
        return mysqli_fetch_row($rtn);
    }
    
    public function atualizarStatus($idAvaliacao){
        $conexao = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getBanco());
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d');
        //2) altera o status se for um sequencial
        $sql = "SELECT status FROM avaliacao WHERE `idavaliacao` = ".$idAvaliacao." LIMIT 1;";
        $result = mysqli_query($conexao, $sql);
        $status = mysqli_fetch_array($result)[0];
        if(strcmp($status, "Etapa 5 - Relato dos resultados") == '0'){
            //2) muda status da avaliação no dados no banco
            $sql = "UPDATE `avaliacao` SET `status` = 'Avaliação Concluída', `dataTermino` = DATE('". $date ."') WHERE `idavaliacao` = ".$idAvaliacao.";";
            if (!mysqli_query($conexao, $sql)){
                $erro++; //se der erro incrementa no contador para cancelar a transação
            }
        }
    }
    
    public function salvarPercepcoes($idAvaliador, $idAvaliacao, Relato $relato){
        $sql = "INSERT INTO `avaliacaoPercepcoes`(`idPercepcao`, `idAvaliador`, `idAvaliacao`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`) VALUES "
                . "(DEFAULT,".$idAvaliador.",".$idAvaliacao.",'".$relato->q1."','".$relato->q2."','".$relato->q3."','".$relato->q4."','".$relato->q5."','".$relato->q6."');";
        self::Executar($sql);
    }
    
    public function obterAvaliadoresComPercepcao($idAvaliacao){
        $sql = "SELECT DISTINCT login.nome, login.codlogin FROM login, avaliacaoPapeis, avaliacaoPercepcoes where login.codlogin = avaliacaoPapeis.idPessoa and avaliacaoPapeis.idAvaliacao =".$idAvaliacao." and avaliacaoPercepcoes.idAvaliador = login.codlogin;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterAvaliadoresSemPercepcao($idAvaliacao){
        $sql = "SELECT DISTINCT login.nome, login.codlogin FROM login, avaliacaoPapeis, avaliacaoPercepcoes where login.codlogin = avaliacaoPapeis.idPessoa and avaliacaoPapeis.idAvaliacao = ".$idAvaliacao." and login.codlogin NOT IN (SELECT idAvaliador from avaliacaoPercepcoes where avaliacaoPercepcoes.idAvaliacao = ".$idAvaliacao.");";
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