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
    
    public function obterFuncCriticadas($idAvaliacao){
        $sql = "SELECT DISTINCT `classFuncionalidade`, COUNT(`classFuncionalidade`) as quantidade FROM `classificacoesPorPostagens` where `idAvaliacao` = '".$idAvaliacao."' and `isValidado` = 1 and `critica` = 1 and `classFuncionalidade` is not null GROUP by `classFuncionalidade` ORDER BY quantidade DESC;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterFuncElogio($idAvaliacao){
        $sql = "SELECT DISTINCT `classFuncionalidade`, COUNT(`classFuncionalidade`) as quantidade FROM `classificacoesPorPostagens` where `idAvaliacao` = '".$idAvaliacao."' and `isValidado` = 1 and `elogio` = 1 and `classFuncionalidade` is not null GROUP by `classFuncionalidade` ORDER BY quantidade DESC;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterFuncDuvida($idAvaliacao){
        $sql = "SELECT DISTINCT `classFuncionalidade`, COUNT(`classFuncionalidade`) as quantidade FROM `classificacoesPorPostagens` where `idAvaliacao` = '".$idAvaliacao."' and `isValidado` = 1 and `duvida` = 1 and `classFuncionalidade` is not null GROUP by `classFuncionalidade` ORDER BY quantidade DESC;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterFuncComparacao($idAvaliacao){
        $sql = "SELECT DISTINCT `classFuncionalidade`, COUNT(`classFuncionalidade`) as quantidade FROM `classificacoesPorPostagens` where `idAvaliacao` = '".$idAvaliacao."' and `isValidado` = 1 and `comparacao` = 1 and `classFuncionalidade` is not null GROUP by `classFuncionalidade` ORDER BY quantidade DESC;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterFuncSugestao($idAvaliacao){
        $sql = "SELECT DISTINCT `classFuncionalidade`, COUNT(`classFuncionalidade`) as quantidade FROM `classificacoesPorPostagens` where `idAvaliacao` = '".$idAvaliacao."' and `isValidado` = 1 and `sugestao` = 1 and `classFuncionalidade` is not null GROUP by `classFuncionalidade` ORDER BY quantidade DESC;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterFuncAjuda($idAvaliacao){
        $sql = "SELECT DISTINCT `classFuncionalidade`, COUNT(`classFuncionalidade`) as quantidade FROM `classificacoesPorPostagens` where `idAvaliacao` = '".$idAvaliacao."' and `isValidado` = 1 and `ajuda` = 1 and `classFuncionalidade` is not null GROUP by `classFuncionalidade` ORDER BY quantidade DESC;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    
}
