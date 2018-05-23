<?php
include '../Banco.php';

class AvaliacoesAndamentoControle extends Banco{
    public function __construct() {

    }

    public function obterAvaliacoesUsuario($idPessoa){
        $sql = "SELECT avaliacaoPapeis.idAvaliacao, avaliacaoInfo.nomeAvaliacao, avaliacaoInfo.plataforma, "
                . "avaliacaoInfo.nomeSistema, avaliacaoPapeis.papel, avaliacao.status from avaliacaoInfo, "
                . "avaliacao, avaliacaoPapeis where avaliacao.idavaliacao = avaliacaoPapeis.idAvaliacao and "
                . "avaliacaoInfo.idAvaliacao = avaliacao.idavaliacao and avaliacaoPapeis.idPessoa = ".$idPessoa." "
                . "and status != 'Avaliação Concluída';";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
}

class AvaliacaoAndamento {
    var $sistema;
    var $seuPapel;
    var $status;
    
    public function __construct() {
        
    }
}