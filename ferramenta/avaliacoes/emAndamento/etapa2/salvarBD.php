<?php

include '../../../Banco.php';

class SalvarNoBD extends Banco{
    public function __construct() {
        
    }
    
    public function salvarTweetes($r, $idAvaliacao) {
        $conexao = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getBanco());
        echo 'aqui';
        foreach ($r as $r){
            echo 'oi';
            $sql = "INSERT INTO postagens(idAvaliacao, idPostagem, postagem, data) "
                . "VALUES (".$idAvaliacao.","
                . "DEFAULT,'".$r->text."',"
                . "'".$r->created_at."');";
//            if (!mysqli_query($conexao, $sql)){
//                $erro++; //se der erro incrementa no contador para cancelar a transação
//                echo mysqli_error($conexao);
//            }
            echo $sql;
        }
        mysqli_close($conexao);
    }

    public function salvarPostagens($idAvaliacao, $arquivo, $formaExtracao, $periodoExtracao){
        $conexao = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getBanco());
        mysqli_autocommit($conexao, FALSE);
        $erro = 0;
        
        require_once './lib/ARQUIVOS/csv.class.php' ; 
        $csv = new \ARQUIVOS\Csv( 'temp/'.$arquivo,',','"' );
        
        foreach( @$csv->ler() as $linha ){
            $sql = "INSERT INTO postagens(idAvaliacao, idPostagem, postagem, data) VALUES (".$idAvaliacao.",DEFAULT,'".mysqli_real_escape_string($conexao, utf8_encode($linha['text']))."','".mysqli_real_escape_string($conexao, utf8_encode($linha['date']))."');";
            if (!mysqli_query($conexao, $sql)){
                $erro++; //se der erro incrementa no contador para cancelar a transação
            }
        }
        
        //2) altera o status se for um sequencial
        $sql = "SELECT status FROM avaliacao WHERE `idavaliacao` = ".$idAvaliacao." LIMIT 1;";
        $result = mysqli_query($conexao, $sql);
        $status = mysqli_fetch_array($result)[0];
        if(strcmp($status, "Etapa 2 - Extração de PRUS") == '0'){
            //2) muda status da avaliação no dados no banco
            $sql = "UPDATE `avaliacao` SET `status` = 'Definição da classificação' WHERE `idavaliacao` = ".$idAvaliacao.";";
            if (!mysqli_query($conexao, $sql)){
                $erro++; //se der erro incrementa no contador para cancelar a transação
            }
        }
        
        //3) atualiza info de extracao
        $sql = "UPDATE `avaliacaoInfo` SET `formaExtracao`= '".$formaExtracao."',`periodoExtracao`= '".$periodoExtracao."' WHERE `idAvaliacao` = '".$idAvaliacao."';";
        if (!mysqli_query($conexao, $sql)){
                $erro++; //se der erro incrementa no contador para cancelar a transação
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