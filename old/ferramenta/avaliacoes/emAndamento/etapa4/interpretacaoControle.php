<?php
include_once '../../../Banco.php';

class InterpretacaoControle extends Banco{
    public function obterAvaliacao($id){
        $sql = "SELECT * FROM avaliacaoInfo WHERE idAvaliacao = " . $id . ";";
        $rtn = self::Executar($sql);
        return mysqli_fetch_row($rtn);
    }
    
    public function obterCategoriasAvaliacao($idAvaliacao){
        $sql = "SELECT * FROM avaliacaoCategorias WHERE idavaliacao = " . $idAvaliacao . ";";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterResultadosClassPRUs($idAvaliacao){
        $array = array();
        
        $sql = "SELECT count(`classPRU`) FROM `classificacoesPorPostagens` WHERE idAvaliacao = ".$idAvaliacao." and isValidado = 1 and classPRU = 1";
        $array[] = mysqli_fetch_row(self::Executar($sql));
        
        $sql = "SELECT count(`classPRU`) FROM `classificacoesPorPostagens` WHERE idAvaliacao = ".$idAvaliacao." and isValidado = 1 and classPRU = 0";
        $array[] = mysqli_fetch_row(self::Executar($sql));
        
        return $array;
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
    
    public function atualizarStatus($idAvaliacao){
        $conexao = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getBanco());
        //2) altera o status se for um sequencial
        $sql = "SELECT status FROM avaliacao WHERE `idavaliacao` = ".$idAvaliacao." LIMIT 1;";
        $result = mysqli_query($conexao, $sql);
        $status = mysqli_fetch_array($result)[0];
        if(strcmp($status, "Etapa 4 - Interpretação dos resultados") == '0'){
            //2) muda status da avaliação no dados no banco
            $sql = "UPDATE `avaliacao` SET `status` = 'Etapa 5 - Relato dos resultados' WHERE `idavaliacao` = ".$idAvaliacao.";";
            if (!mysqli_query($conexao, $sql)){
                $erro++; //se der erro incrementa no contador para cancelar a transação
            }
        }
    }
}