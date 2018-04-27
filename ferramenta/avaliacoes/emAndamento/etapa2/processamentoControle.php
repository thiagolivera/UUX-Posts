<?php
include '../../../Banco.php';

class processamentoControle extends Banco{
    public function obterAvaliacao($id){
        $sql = "SELECT nomeSistema, plataforma FROM avaliacaoInfo WHERE idAvaliacao = " . $id . ";";
        $rtn = self::Executar($sql);
        return mysqli_fetch_row($rtn);
    }
}