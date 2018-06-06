<?php
include_once '../../../Banco.php';

class RelatorioControle extends Banco{

    public function obterInfoAvaliacao($idAvaliacao){
        $sql = "SELECT * FROM `avaliacaoInfo` where idAvaliacao = ".$idAvaliacao.";";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array[0];
    }
    
    public function obterFuncionalidades($idAvaliacao){
        $sql = "SELECT * FROM `avaliacaoFuncionalidades` WHERE `idAvaliacao` = ".$idAvaliacao.";";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterClassificadores($idAvaliacao){
        $sql = "SELECT login.nome FROM `avaliacaoPapeis`, `login` where idAvaliacao = ".$idAvaliacao." and papel = 'Classificador' and avaliacaoPapeis.idPessoa = login.codlogin;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterContexto($idAvaliacao){
        $sql = "SELECT * FROM `avaliacaoContexto` WHERE idAvaliacao = " . $idAvaliacao. ";";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array[0];
    }
    
    public function obterValidadores($idAvaliacao){
        $sql = "SELECT login.nome FROM `avaliacaoPapeis`, `login` where idAvaliacao = ".$idAvaliacao." and papel = 'Validador' and avaliacaoPapeis.idPessoa = login.codlogin;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterPercepcoes($idAvaliacao){
        $sql = "SELECT * FROM `avaliacaoPercepcoes` where idAvaliacao =".$idAvaliacao.";";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterNumeroPostagens($idAvaliacao){
        $sql = "SELECT count(*) FROM `postagens` WHERE `idAvaliacao` = ".$idAvaliacao.";";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array[0]["count(*)"];
        
    }
    
    
}
