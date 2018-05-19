<?php
include_once '../../../../Banco.php';
include_once '../ClassesClassificacao.php';

class ValidacaoControle extends Banco{
    
    public function obterIDPostagensNaoValidadas($idAvaliacao){
        $sql = "SELECT DISTINCT idPostagem FROM `classificacoesPorPostagens` where idPostagem not in (SELECT idPostagem from classificacoesPorPostagens WHERE isValidado = 1 and idAvaliacao = ".$idAvaliacao.") and idAvaliacao = ".$idAvaliacao.";";
        $rtn = parent::Executar($sql);   
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterClassificaoesDeUmaPostagem($idPostagem, $idAvaliacao){
        $sql = "SELECT * FROM `classificacoesPorPostagens` where idPostagem = ".$idPostagem." and idAvaliacao = ".$idAvaliacao.";";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterPostagem($idPostagem){
        $sql = "SELECT * FROM postagens where idPostagem = ".$idPostagem.";";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }

    public function obterPostagensNaoValidadas($idAvaliacao){
        $idsPostagens = self::obterIDPostagensNaoValidadas($idAvaliacao);
        $postsParaValidacao = array();
        
        for($i=0; (count($postsParaValidacao) < 1) && ($i < count($idsPostagens)); $i++){
            $classificacoes = self::obterClassificaoesDeUmaPostagem($idsPostagens[$i]["idPostagem"], $idAvaliacao);
            $diferencas = 0;
            for($j=1; $j < count($classificacoes); $j++){
                $diferencas += count(array_diff_assoc($classificacoes[0], $classificacoes[$j]));
            }
            
            if($diferencas > 0){
                $postsParaValidacao[] = $classificacoes;
            } else{
                self::construirObjetoClassificacao($classificacoes);
            }
        }
        
        if(count($postsParaValidacao) > 0){
            return $postsParaValidacao;
        } else{
            header("location:../../etapa4/introEtapa4.php");
        }
    }
    
    public function construirObjetoClassificacao($array){
        $classTipo = new ClassificaoTipo();
        $classTipo->ajuda = $array[0]["ajuda"];
        $classTipo->comparacao = $array[0]["comparacao"];
        $classTipo->critica = $array[0]["critica"];
        $classTipo->duvida = $array[0]["duvida"];
        $classTipo->elogio = $array[0]["elogio"];
        $classTipo->sugestao = $array[0]["sugestao"];

        $classUsabilidade = new ClassificaoUsabilidade();
        $classUsabilidade->aprendizado = $array[0]["aprendizado"];
        $classUsabilidade->eficacia = $array[0]["eficacia"];
        $classUsabilidade->eficiencia = $array[0]["eficiencia"];
        $classUsabilidade->memorabilidade = $array[0]["memorabilidade"];
        $classUsabilidade->satisfacao = $array[0]["satisfacaoUs"];
        $classUsabilidade->seguranca = $array[0]["seguranca"];
        $classUsabilidade->utilidade = $array[0]["utilidade"];

        $classUX = new ClassificacaoUX();
        $classUX->afeto = $array[0]["afeto"];
        $classUX->estetica = $array[0]["estetica"];
        $classUX->frustracao = $array[0]["frustracao"];
        $classUX->motivacao = $array[0]["motivacao"];
        $classUX->satisfacao = $array[0]["satisfacaoUX"];
        $classUX->suporte = $array[0]["suporte"];

        $classificacao = new Classificacao();
        $classificacao->classAnaliseSentimentos = $array[0]["classAnaliseSentimentos"];
        $classificacao->classArtefato = $array[0]["classArtefato"];
        $classificacao->classFuncionalidade = $array[0]["classFuncionalidade"];
        $classificacao->classIntencao = $array[0]["classIntencao"];
        $classificacao->classPRU = $array[0]["classPRU"];
        $classificacao->idAvaliacao = $array[0]["idAvaliacao"];
        $classificacao->idClassificador = $_SESSION["login"];
        $classificacao->idPostagem = $array[0]["idPostagem"];
        $classificacao->isValidado = 1;
        
        if(self::salvarClassificacao($classificacao, $classTipo, $classUsabilidade, $classUX)){
            return true;
        }
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
}
