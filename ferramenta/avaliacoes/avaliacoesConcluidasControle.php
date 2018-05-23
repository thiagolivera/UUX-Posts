<?php
include '../Banco.php';

class AvaliacoesConcluidasControle extends Banco{
    public function __construct() {

    }

    public function obterAvaliacoesUsuario($idPessoa){
        $sql = "SELECT avaliacaoPapeis.idAvaliacao, avaliacaoInfo.nomeSistema, avaliacaoPapeis.papel, avaliacao.dataTermino from avaliacaoInfo, avaliacao, avaliacaoPapeis where avaliacao.idavaliacao = avaliacaoPapeis.idAvaliacao and avaliacaoInfo.idAvaliacao = avaliacao.idavaliacao and avaliacaoPapeis.idPessoa = ".$idPessoa." and status = 'Avaliação Concluída';";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
}

class AvaliacaoConcluida {
    var $sistema;
    var $seuPapel;
    var $status;
    
    public function __construct() {
        
    }
}