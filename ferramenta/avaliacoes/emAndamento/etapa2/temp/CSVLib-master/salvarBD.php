<?php

include '../../../../../Banco.php';

class SalvarNoBD extends Banco{
    public function __construct() {
        
    }
    
    public function testeSalvar(){
        $conexao = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getBanco());
        mysqli_autocommit($conexao, FALSE);
        $erro = 0;
        
        header('Content-Type: text/html; charset=utf-8');
        require_once './lib/ARQUIVOS/csv.class.php' ; 
        $csv = new \ARQUIVOS\Csv( 'posts.csv',',','"' );
        
        foreach( @$csv->ler() as $linha ){
            $sql = "INSERT INTO postagens(idAvaliacao, idPostagem, postagem, data) VALUES (9,DEFAULT,'".mysqli_real_escape_string($conexao, utf8_encode($linha['text']))."','".mysqli_real_escape_string($conexao, utf8_encode($linha['date']))."');";
            if (!mysqli_query($conexao, $sql)){
                $erro++; //se der erro incrementa no contador para cancelar a transação
                echo mysqli_error($conexao);
            }
        }
        
        //Verifica se houve erro para cancelar a transação
        if ($erro == 0){
            mysqli_commit($conexao);
            mysqli_close($conexao);
            echo 'Deu certo!!';
        } else {
            mysqli_rollback($conexao);
            mysqli_close($conexao);
            echo 'Deu errado!!';
        }  
    }
}