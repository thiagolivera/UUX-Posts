<?php

include_once '../../ferramenta/Banco.php';

class SalvarCSVControle extends Banco{
    public function __construct() {
        
    }

    public function salvarPostagens($idAvaliacao, $arquivo){
        $conexao = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getBanco());
        mysqli_autocommit($conexao, FALSE);
        $erro = 0;
        
        require_once './lib/ARQUIVOS/csv.class.php' ; 
        $csv = new \ARQUIVOS\Csv( './temp/'.$arquivo,',','"' );
        
        foreach( @$csv->ler() as $linha ){
            $sql = "INSERT INTO postagens_public(idAvaliacao, idPostagem, postagem) VALUES "
                    . "(".$idAvaliacao.",DEFAULT,'".mysqli_real_escape_string($conexao, utf8_encode($linha['text']))."');";
            if (!mysqli_query($conexao, $sql)){
                $erro++; //se der erro incrementa no contador para cancelar a transação
            }
        }
        
        //Verifica se houve erro para cancelar a transação
        if ($erro == 0){
            mysqli_commit($conexao);
            mysqli_close($conexao);
            return true;
        } else {
            mysqli_rollback($conexao);
            mysqli_close($conexao);
            return false;
        }
    }
}