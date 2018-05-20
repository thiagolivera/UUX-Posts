<?php
include_once '../../../Banco.php';

class InterpretacaoControle extends Banco{
    public function obterAvaliacao($id){
        $sql = "SELECT * FROM avaliacaoInfo WHERE idAvaliacao = " . $id . ";";
        $rtn = self::Executar($sql);
        return mysqli_fetch_row($rtn);
    }
    
    public function obterResultadosTipo($idAvaliacao){
        $sql = "SELECT SUM(critica), SUM(elogio), SUM(duvida), SUM(comparacao), SUM(sugestao), SUM(ajuda), SUM(classPRU) FROM `classificacoesPorPostagens` WHERE `idAvaliacao` = ".$idAvaliacao." and `isValidado` = 1;";
        $rtn = self::Executar($sql);
        return mysqli_fetch_row($rtn);
    }
    
    public function obterResultadosIntencao($idAvaliacao){
        $array = array();
        
        $sql = "SELECT count(`classIntencao`) FROM `classificacoesPorPostagens` WHERE idAvaliacao = ".$idAvaliacao." and isValidado = 1 and classIntencao = 'Visceral';";
        $array[] = mysqli_fetch_row(self::Executar($sql));
        
        $sql = "SELECT count(`classIntencao`) FROM `classificacoesPorPostagens` WHERE idAvaliacao = ".$idAvaliacao." and isValidado = 1 and classIntencao = 'Comportamental';";
        $array[] = mysqli_fetch_row(self::Executar($sql));
        
        $sql = "SELECT count(`classIntencao`) FROM `classificacoesPorPostagens` WHERE idAvaliacao = ".$idAvaliacao." and isValidado = 1 and classIntencao = 'Reflexiva';";
        $array[] = mysqli_fetch_row(self::Executar($sql));
        
        $sql = "SELECT SUM(classPRU) FROM `classificacoesPorPostagens` WHERE idAvaliacao = ".$idAvaliacao." and isValidado = 1;";
        $array[] = mysqli_fetch_row(self::Executar($sql));
        
        return $array;
    }
    
    public function obterResultadosSentimentos($idAvaliacao){
        $array = array();
        
        $sql = "SELECT count(`classAnaliseSentimentos`) FROM `classificacoesPorPostagens` WHERE idAvaliacao = ".$idAvaliacao." and isValidado = 1 and classAnaliseSentimentos = 'Positiva';";
        $array[] = mysqli_fetch_row(self::Executar($sql));
        
        $sql = "SELECT count(`classAnaliseSentimentos`) FROM `classificacoesPorPostagens` WHERE idAvaliacao = ".$idAvaliacao." and isValidado = 1 and classAnaliseSentimentos = 'Negativa';";
        $array[] = mysqli_fetch_row(self::Executar($sql));
        
        $sql = "SELECT count(`classAnaliseSentimentos`) FROM `classificacoesPorPostagens` WHERE idAvaliacao = ".$idAvaliacao." and isValidado = 1 and classAnaliseSentimentos = 'Neutra';";
        $array[] = mysqli_fetch_row(self::Executar($sql));
        
        $sql = "SELECT SUM(classPRU) FROM `classificacoesPorPostagens` WHERE idAvaliacao = ".$idAvaliacao." and isValidado = 1;";
        $array[] = mysqli_fetch_row(self::Executar($sql));
        
        return $array;
    }
    
    public function obterResultadosUsabilidade($idAvaliacao){
        $sql = "SELECT SUM(eficacia), SUM(eficiencia), SUM(satisfacaoUs), SUM(seguranca), SUM(utilidade), SUM(memorabilidade), SUM(aprendizado), SUM(classPRU) FROM `classificacoesPorPostagens` WHERE `idAvaliacao` = ".$idAvaliacao." and `isValidado` = 1;";
        $rtn = self::Executar($sql);
        return mysqli_fetch_row($rtn);
    }
    
    public function obterResultadosUX($idAvaliacao){
        $sql = "SELECT SUM(afeto), SUM(estetica), SUM(frustracao), SUM(satisfacaoUX), SUM(motivacao), SUM(suporte), SUM(classPRU) FROM `classificacoesPorPostagens` WHERE `idAvaliacao` = ".$idAvaliacao." and `isValidado` = 1;";
        $rtn = self::Executar($sql);
        return mysqli_fetch_row($rtn);
    }
    
    public function obterResultadosFuncionalidade($idAvaliacao){
        $sql = "SELECT DISTINCT `classFuncionalidade`, COUNT(*) as quantidade FROM `classificacoesPorPostagens` where classPRU = 1 and isValidado = 1 and idAvaliacao = ".$idAvaliacao." GROUP BY classFuncionalidade ORDER by quantidade DESC;";
        $rtn = self::Executar($sql);
        return mysqli_fetch_all($rtn);
    }
    
    public function obterResultadosArtefato($idAvaliacao){
        $sql = "SELECT DISTINCT `classArtefato`, COUNT(*) as quantidade FROM `classificacoesPorPostagens` where classPRU = 1 and isValidado = 1 and idAvaliacao = ".$idAvaliacao." GROUP BY classArtefato ORDER by quantidade DESC;";
        $rtn = self::Executar($sql);
        return mysqli_fetch_all($rtn);
    }
    
    public function obterNumeroPRUs($idAvaliacao){
        $sql = "SELECT SUM(classPRU) FROM `classificacoesPorPostagens` WHERE idAvaliacao = ".$idAvaliacao." and isValidado = 1;";
        return mysqli_fetch_row(self::Executar($sql));
    }
}