<?php

include '../../../Banco.php';

class ExtracaoControle extends Banco{
    
    public function obterAvaliacao($id){
        $sql = "SELECT nomeSistema, plataforma FROM avaliacaoInfo WHERE idAvaliacao = " . $id . ";";
        $rtn = self::Executar($sql);
        return mysqli_fetch_row($rtn);
    }
}