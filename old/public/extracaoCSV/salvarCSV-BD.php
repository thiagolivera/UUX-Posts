<?php

include_once '../../ferramenta/Banco.php';

class SalvarCSVControle extends Banco{
    public function __construct() {
        
    }

    public function salvarPostagens($idAvaliacao, $arquivo){
        $conexao = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getBanco());
        mysqli_autocommit($conexao, FALSE);
        $erro = 0;
        
        $meuArray = Array();
        $file = fopen('./temp/'.$arquivo, 'r');
        while (($line = fgetcsv($file)) !== false)
        {
          $meuArray[] = $line;
        }
        fclose($file);
        
        foreach($meuArray as $linha ){
            if(array_key_exists(1, $meuArray[0])){
                $sql = "INSERT INTO postagens_public(idAvaliacao, idPostagem, postagem, data) VALUES "
                    . "(".$idAvaliacao.",DEFAULT,'".$linha[0]."','".$linha[1]."');";
            } else{
                $sql = "INSERT INTO postagens_public(idAvaliacao, idPostagem, postagem) VALUES "
                    . "(".$idAvaliacao.",DEFAULT,'".$linha[0]."');";
            }
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