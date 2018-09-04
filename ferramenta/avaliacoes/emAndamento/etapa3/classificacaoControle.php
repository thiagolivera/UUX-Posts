<?php

include_once '../../../Banco.php';

class ClassificacaoControle extends Banco{
    private $postagensClassificadas;

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
        $idPostagemFinal = self::obterIdPrimeiraPostagem($idAvaliacao)[0]["idPostagem"] + self::obterFaixaValoresClassificacao($idAvaliacao, $idClassificador)[0]["faixaFim"] - 1;
        
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
    
    public function obterStatus($id){
        $sql = "SELECT status FROM avaliacao WHERE idAvaliacao = " . $id . ";";
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

    public function classificacaoAutomatica($avaliacao, $filtro){
        $palavras = $this->buscarFiltro($filtro);
        $array = null;
        $sql = "select * from postagens where BINARY idAvaliacao = ".$avaliacao." and postagem LIKE ";
        foreach ($palavras as $value){
            $sql = $sql."'%".trim($value)."%'"." OR postagem LIKE ";
        }
        $sql = substr($sql, 0,strlen($sql)-18);
        $valores = parent::Executar($sql);
        while($row = @mysqli_fetch_assoc($valores)){
            $array[] = $row;
        }
        $this->postagensClassificadas = $array;
        return $array;
    }

    private function buscarFiltro($filtro){
        $termos = array();
        if (isset($filtro['Verbos'])) $termos = array_merge($termos, array("twitter" , "ter" , "dar" , "ficar" , "poder" , "fazer" , "dever" , "seguir" , "usar" , "querer" , "achar" , "saber" , "ver" , "entrar" , "existir" , "mudar" , "editar" , "deixar" , "falar" , "apagar" , "amar" , "olhar" , "gostar" , "dizer" , "vir" , "passar" , "começar" , "parecer" , "perder" , "indicar" , "responder" , "curtir" , "carregar"));
        if (isset($filtro['Substantivos'])) $termos = array_merge($termos, array("twitter" , "facebook" , "tweet" , "face" , "orkut" , "erro" , "problema" , "sugestão" , "pessoa" , "botão" , "celular" , "app" , "gente" , "pagina" , "comentário" , "opção" , "caractere" , "conta" , "rede" , "aplicativo" , "following" , "follower" , "obrigado" , "tempo" , "vida" , "galera" , "seguidor"));
        if (isset($filtro['Adjetivos'])) $termos = array_merge($termos, array("twitter" , "bom" , "ruim" , "fácil" , "novo" , "direto" , "difícil" , "rápido" , "louco" , "maldito" , "triste" , "lento" , "confuso" , "perdido" , "lindo" , "legal" , "chato" , "feliz" , "querido"));
        if (isset($filtro['Adverbios'])) $termos = array_merge($termos, array("twitter" , "não" , "mais" , "bem" , "porque" , "como" , "quando" , "nem" , "assim" , "mal" , "hoje" , "então" , "demais" , "algo" , "longe" , "onde"));
        if (isset($filtro['Comparacao'])) $termos = array_merge($termos, array("twitter" , "facebook" , "mais" , "face" , "orkut" , "bem" , "ir" , "bom" , "ter" , "usar" , "achar" , "ver" , "dia" , "ruim"));
        if (isset($filtro['Elogio'])) $termos = array_merge($termos, array("twitter" , "facebook" , "bem" , "bom" , "mais" , "ter" , "face" , "ficar" , "dar" , "celular" , "legal" , "adorar" , "gente"));
        if (isset($filtro['Duvida'])) $termos = array_merge($termos, array("twitter" , "fazer" , "ruim" , "erro" , "dar" , "problema" , "tweet" , "saber" , "página" , "como" , "comentário" , "mais" , "aqui"));
        if (isset($filtro['Critica'])) $termos = array_merge($termos, array("twitter" , "mais" , "tweet" , "ficar" , "entrar" , "aqui" , "querer" , "porque" , "ir" , "gostar" , "tão" , "mal" , "chato"));
        if (isset($filtro['Sugestao'])) $termos = array_merge($termos, array("twitter" , "ter" , "dever" , "tweet" , "sugestão" , "poder" , "mais" , "botão" , "seguir" , "dar" , "editar" , "ficar" , "querer" , "porque"));
        if (isset($filtro['Afeto'])) $termos = array_merge($termos, array("twitter" , "gostar" , "rede" , "sistema" , "legal" , "adorar" , "amar" , "facebook" , "poder" , "comunicar" , "facilitar" , "criativo" , "eficiente" , "moderno" , "interessante" , "postar" , "existir" , "praticar" , "aproveitar" , "usufruir"));
        if (isset($filtro['Aprendizado'])) $termos = array_merge($termos, array("twitter" , "saber" , "fazer" , "ver" , "ter" , "conseguir" , "poder" , "encontrar" , "aparecer" , "próximo" , "visualizar" , "clicar" , "achar" , "dizer" , "entender" , "entrar" , "informar" , "ajudar" , "novo" , "pagina" , "perder" , "campo" , "anterior" , "caminho" , "difícil" , "email" , "fácil" , "menu" , "mexer" , "querer" , "aprender"));
        if (isset($filtro['Confianca'])) $termos = array_merge($termos, array("twitter" , "sistema" , "parecer" , "fazer" , "gostar" , "praticar" , "interatividade" , "usar" , "poder" , "interessante" , "esperar" , "achar" , "acreditar" , "agradar" , "ajudar" , "apoio" , "resolver" , "melhorar" , "melhoria" , "começar"));
        if (isset($filtro['Eficacia'])) $termos = array_merge($termos, array("twitter" , "sistema" , "ter" , "fazer" , "problema" , "saber" , "conseguir" , "aparecer" , "poder" , "dar" , "ver" , "erro" , "dizer" , "ficar" , "querer" , "tentar" , "dever" , "ajuste" , "gostar" , "colocar" , "realizar" , "continuar" , "mensagem" , "achar" , "mudar" , "esperar" , "abrir" , "pagina" , "entrar" , "opção" , "permitir" , "faltar" , "excluir" , "acessar" , "mandar" , "jeito"));
        if (isset($filtro['Eficiencia'])) $termos = array_merge($termos, array("twitter" , "ruim" , "ficar" , "lento" , "ver" , "dar" , "sistema" , "esperar" , "querer" , "carregar" , "erro" , "face" , "legal" , "fazer" , "problema" , "usar" , "achar" , "passar" , "aparecer" , "disciplina" , "pau" , "app" , "espaço" , "ler" , "tentar" , "abrir"));
        if (isset($filtro['Estetica'])) $termos = array_merge($termos, array("twitter" , "gostar" , "parecer" , "ficar" , "bonito" , "plataforma" , "design" , "atualizar" , "android" , "limpo" , "perfeito" , "acostumar" , "pagina" , "melhoria" , "adorar" , "adaptar" , "add" , "campo" , "curtir" , "escrever" , "esquerdo" , "estilo" , "mexer" , "simples" , "visual" , "windows" , "entrar" , "interface" , "diferente"));
        if (isset($filtro['Frustracao'])) $termos = array_merge($termos, array("twitter" , "ter" , "sistema" , "problema" , "fazer" , "ruim" , "saber" , "ficar" , "dar" , "poder" , "erro" , "ver" , "conseguir" , "querer" , "dizer" , "bug" , "aparecer" , "tempo" , "achar" , "mau" , "dever" , "entender" , "mudança" , "mudar" , "passar" , "usar" , "entrar" , "funcionar" , "odiar" , "começar" , "tentar" , "abrir" , "acessar" , "colocar" , "complicar" , "falar" , "precisar"));
        if (isset($filtro['Motivacao'])) $termos = array_merge($termos, array("twitter" , "poder" , "adorar" , "desabafar" , "achar" , "criar" , "falar" , "ver" , "plataforma" , "social" , "saber" , "super" , "fazer" , "interatividade" , "usar" , "deixar" , "existir" , "amar" , "sistema" , "interessante" , "ajudar" , "igual" , "facebook" , "ficar" , "interativo" , "ótimo" , "legal"));
        if (isset($filtro['Satisfacao'])) $termos = array_merge($termos, array("twitter" , "sistema" , "gostar" , "legal" , "achar" , "adorar" , "ter" , "face" , "facebook" , "demorar" , "parecer" , "poder" , "social" , "existir" , "ficar" , "entrar" , "interatividade" , "próximo" , "criar" , "amar" , "desabafar" , "fácil" , "ver" , "interessante" , "bonito" , "ferramenta" , "novo" , "fazer" , "querer" , "falar" , "deus" , "usar" , "deixar" , "perfeito"));
        if (isset($filtro['Seguranca'])) $termos = array_merge($termos, array("twitter" , "saber" , "sistema" , "começar" , "mau" , "fazer" , "dar" , "aparecer" , "errar" , "apertar" , "poder" , "ruim" , "erro" , "digitar" , "constar" , "faltar" , "lista" , "odiar" , "ver" , "ficar" , "querer" , "mexer" , "perceber" , "problema" , "clicar" , "medo" , "enter" , "raiva" , "teclar" , "espaço" , "criar" , "remover" , "complicar"));
        if (isset($filtro['Suporte'])) $termos = array_merge($termos, array("twitter" , "fazer" , "sistema" , "saber" , "preencher" , "ver" , "esperar" , "problema" , "solicitar" , "clicar" , "clique" , "consultar" , "providenciar" , "pedir" , "aparecer" , "dar" , "errar" , "poder" , "erro" , "pergunta" , "vir" , "acreditar" , "continuar" , "dever" , "resolver" , "funcionar" , "tentar" , "conseguir" , "cadastrar" , "complexo" , "procurar" , "selecionar"));
        if (isset($filtro['Utilidade'])) $termos = array_merge($termos, array("twitter" , "poder" , "saber" , "usar" , "ver" , "excluir" , "dar" , "ficar" , "ruim" , "problema" , "dever" , "mozilla" , "querer" , "caractere" , "demorar" , "sistema" , "tirar" , "objetivo" , "limite" , "escrever" , "entrar" , "precisar" , "abrir" , "linha" , "face" , "deixar" , "utilizar" , "editar" , "palavra" , "gostar" , "achar" , "novo" , "fazer" , "ótimo" , "ter" , "parecer" , "próximo"));
        if (isset($filtro['Outros'])){
            $palavras = explode(",",$filtro['filtros']);
            $termos = array_merge($termos, $palavras);
        }
        return $termos;
    }

    public function getPostagensClassificadas(){
        return $this->postagensClassificadas;
}
}