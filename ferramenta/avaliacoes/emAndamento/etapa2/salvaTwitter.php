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
            if (!mysqli_query($conexao, $sql)){
                echo mysqli_error($conexao);
            }
        }
        mysqli_close($conexao);
    }
}