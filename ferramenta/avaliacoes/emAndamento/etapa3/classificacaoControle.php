<?php

include_once '../../../Banco.php';

class ClassificacaoControle extends Banco{

    public function salvarClassificacao(Classificacao $classificacao, ClassificaoTipo $classTipo, ClassificaoUsabilidade $classUsabilidade, ClassificacaoUX $classUX){
        $erro = 0;
        
        $conexao = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getBanco());
        mysqli_autocommit($conexao, FALSE);
        //1) grava classificação por tipo
        $sql = "INSERT INTO `classTipo`(`idClassTipo`, `critica`, `elogio`, `duvida`, `comparacao`, `sugestao`, `ajuda`) VALUES ("
                . "DEFAULT,'".$classTipo->critica."','".$classTipo->elogio."','".$classTipo->duvida."','".$classTipo->comparacao."','".$classTipo->sugestao."','".$classTipo->ajuda."');";
        if (!mysqli_query($conexao, $sql)){
            $erro++; //se der erro incrementa no contador para cancelar a transação
        }
        
        //1.1) obtem o id da classTipo
        $sql = "SELECT idClassTipo FROM classTipo ORDER BY idClassTipo DESC LIMIT 1;";
        $result = mysqli_query($conexao, $sql);
        $idClassTipo = mysqli_fetch_array($result)[0];
        
        //2) grava classificação por usabilidade
        $sql = "INSERT INTO `classUsabilidade`(`idClassUsabilidade`, `eficacia`, `eficiencia`, `satisfacao`, `seguranca`, `utilidade`, `memorabilidade`, `aprendizado`) VALUES ("
                . "DEFAULT,'".$classUsabilidade->eficacia."','".$classUsabilidade->eficiencia."','".$classUsabilidade->satisfacao."','".$classUsabilidade->seguranca."','".$classUsabilidade->utilidade."','".$classUsabilidade->memorabilidade."','".$classUsabilidade->aprendizado."');";
        if (!mysqli_query($conexao, $sql)){
            $erro++; //se der erro incrementa no contador para cancelar a transação
        }
        
        //2.1) obtem o id da classUsabilidade
        $sql = "SELECT idClassUsabilidade FROM classUsabilidade ORDER BY idClassUsabilidade DESC LIMIT 1;";
        $result = mysqli_query($conexao, $sql);
        $idClassUsabilidade = mysqli_fetch_array($result)[0];
        
        //3) grava classificação ux
        $sql = "INSERT INTO `classUX`(`idClassUX`, `afeto`, `estetica`, `frustracao`, `satisfacao`, `motivacao`, `suporte`) VALUES ("
                . "DEFAULT,'".$classUX->afeto."','".$classUX->estetica."','".$classUX->frustracao."','".$classUX->satisfacao."','".$classUX->motivacao."','".$classUX->suporte."');";
        if (!mysqli_query($conexao, $sql)){
            $erro++; //se der erro incrementa no contador para cancelar a transação
        }
        
        //3.1) obtem o id da classUX
        $sql = "SELECT idClassUX FROM classUX ORDER BY idClassUX DESC LIMIT 1;";
        $result = mysqli_query($conexao, $sql);
        $idClassUX = mysqli_fetch_array($result)[0];
        
        //4) grava classificação
        $sql = "INSERT INTO `classificacao`(`idClassificador`, `idPostagem`, `idAvaliacao`, `classPRU`, `classFuncionalidade`, `classTipo`, `classIntencao`, `classAnaliseSentimentos`, `classUsabilidade`, `classUX`, `classArtefato`, isValidado) VALUES ("
                . "'".$classificacao->idClassificador."','".$classificacao->idPostagem."','".$classificacao->idAvaliacao."','".$classificacao->classPRU."','".$classificacao->classFuncionalidade."','".$idClassTipo."','".$classificacao->classIntencao."','".$classificacao->classAnaliseSentimentos."','".$idClassUsabilidade."','".$idClassUX."','".$classificacao->classArtefato."', ".$classificacao->isValidado.");";
        if (!mysqli_query($conexao, $sql)){
            $erro++; //se der erro incrementa no contador para cancelar a transação
        }
        
        //Verifica se houve erro para cancelar a transação
        if ($erro == 0){
            mysqli_commit($conexao);
            mysqli_close($conexao);
            return true;
        } else {
            mysqli_close($conexao);
            
        }
    }
    
    public function obterUmaPostagemNaoClassificada($idAvaliacao, $idClassificador){
        $idPostagemInicial = self::obterIdPrimeiraPostagem($idAvaliacao)[0]["idPostagem"] + self::obterFaixaValoresClassificacao($idAvaliacao, $idClassificador)[0]["faixaInicio"] - 1;
        $idPostagemFinal = self::obterIdPrimeiraPostagem($idAvaliacao)[0]["idPostagem"] + self::obterFaixaValoresClassificacao($idAvaliacao, $idClassificador)[0]["faixaFim"];
        
        $sql = "SELECT * FROM `postagens` WHERE postagens.idPostagem NOT IN (SELECT classificacao.idPostagem from classificacao where idClassificador = ".$idClassificador.") "
                . "and postagens.idAvaliacao = " . $idAvaliacao . " and idPostagem BETWEEN ".$idPostagemInicial." AND ".$idPostagemFinal." LIMIT 1;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterFaixaValoresClassificacao($idAvaliacao, $idClassificador){
        $sql = "SELECT * FROM `avaliacaoPapeis` WHERE idAvaliacao = ".$idAvaliacao." and idPessoa = ".$idClassificador." and papel = 'Classificador' LIMIT 1;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterIdPrimeiraPostagem($idAvaliacao){
        $sql = "SELECT * FROM `postagens` WHERE idAvaliacao = ".$idAvaliacao." LIMIT 1;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }

    public function obterPostagensNaoClassificadas($idAvaliacao, $idClassificador){
        $idPostagemInicial = self::obterIdPrimeiraPostagem($idAvaliacao)[0]["idPostagem"] + self::obterFaixaValoresClassificacao($idAvaliacao, $idClassificador)[0]["faixaInicio"] - 1;
        $idPostagemFinal = self::obterIdPrimeiraPostagem($idAvaliacao)[0]["idPostagem"] + self::obterFaixaValoresClassificacao($idAvaliacao, $idClassificador)[0]["faixaFim"];
        
        $sql = "SELECT * FROM `postagens` WHERE postagens.idPostagem NOT IN (SELECT classificacao.idPostagem from classificacao where idClassificador = ".$idClassificador.") "
                . "and postagens.idAvaliacao = " . $idAvaliacao . " and idPostagem BETWEEN ".$idPostagemInicial." AND ".$idPostagemFinal." LIMIT 10;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function ataulizarStatusAvaliador($idAvaliacao, $idClassificador){
        $sql = "UPDATE `avaliacaoPapeis` SET `isConcluido`= 1 WHERE `idAvaliacao` = ".$idAvaliacao." and `idPessoa` = ".$idClassificador.";";
        parent::Executar($sql);
    }


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
}