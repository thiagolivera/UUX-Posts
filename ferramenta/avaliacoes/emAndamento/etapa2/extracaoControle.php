<?php
include '../../../Banco.php';

class ExtracaoControle extends Banco{
    
    public function obterAvaliacao($id){
        $sql = "SELECT * FROM avaliacaoInfo WHERE idAvaliacao = " . $id . ";";
        $rtn = self::Executar($sql);
        return mysqli_fetch_row($rtn);
    }
    
    public function isGerente($idAvaliacao, $idPessoa){
        $sql = "SELECT papel FROM avaliacaoPapeis WHERE idavaliacao = '" . $idAvaliacao . "' and idPessoa = '" . $idPessoa . "' and papel = 'Gerente';";
        $rtn = parent::Executar($sql);
        if($rtn == '0'){
            return false;
        } else{
            return true;
        }
    }
    
    public function obterPostsExtraidas($idAvaliacao){
        $sql = "SELECT * FROM postagens WHERE idavaliacao = '" . $idAvaliacao . "';";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function excluirPostagem($idPostagem){
        $sql = "DELETE FROM `postagens` WHERE idpostagem = " . $idPostagem . ";";
        $rtn = parent::Executar($sql);
        header("location:postagensExtraidas.php?sucesso");
    }
    
    public function excluirTodasPostagens($idAvaliacao){
        $sql = "DELETE FROM `postagens` WHERE idAvaliacao = " . $idAvaliacao . ";";
        $rtn = parent::Executar($sql);
        header("location:formaExtracao.php");
    }
    
    public function verificarSeHaPostagens($idAvaliacao){
        $sql = "SELECT * FROM `postagens` WHERE `idAvaliacao` = ".$idAvaliacao." limit 1;";
        $rtn = parent::Executar($sql);
        if($rtn == '0'){
            return false;
        } else{
            return true;
        }
    }
}