<?php

include '../../../Banco.php';

class SalvaTwitter extends Banco{
    public function __construct($r, $idAvaliacao) {
        $conexao = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getBanco());
        foreach ($r as $r){
            $sql = "INSERT INTO postagens(idAvaliacao, idPostagem, postagem, data) "
                . "VALUES (".$idAvaliacao.","
                . "DEFAULT,'".$r->text."',"
                . "'".$r->created_at."');";
            mysqli_query($conexao, $sql);
        }
        mysqli_close($conexao);
        
        header("location:../etapa3/introEtapa3.php");
    }
}