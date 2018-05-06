<?php
include './classificacaoControle.php';

$controle = new ClassificacaoControle();
$classificacao = new Classificacao();
$classTipo = new ClassificaoTipo();
$classUsabilidade = new ClassificaoUsabilidade();
$classUX = new ClassificacaoUX();

if(isset($_POST["tipo"])){
    if(isset($_POST["critica"])){
        $classTipo->critica = TRUE;
    }
    if(isset($_POST["elogio"])){
        $classTipo->elogio = TRUE;
    }
    if(isset($_POST["comparacao"])){
        $classTipo->comparacao = TRUE;
    }
    if(isset($_POST["sugestao"])){
        $classTipo->sugestao = TRUE;
    }
    if(isset($_POST["ajuda"])){
        $classTipo->ajuda = TRUE;
    }
    if(isset($_POST["duvida"])){
        $classTipo->duvida = TRUE;
    }
}

if(isset($_POST["usabilidade"])){
    if(isset($_POST["eficacia"])){
        $classUsabilidade->eficacia = TRUE;
    }
    if(isset($_POST["eficiencia"])){
        $classUsabilidade->eficiencia = TRUE;
    }
    if(isset($_POST["satisfacao"])){
        $classUsabilidade->satisfacao = TRUE;
    }
    if(isset($_POST["seguranca"])){
        $classUsabilidade->seguranca = TRUE;
    }
    if(isset($_POST["utilidade"])){
        $classUsabilidade->utilidade = TRUE;
    }
    if(isset($_POST["memorabilidade"])){
        $classUsabilidade->memorabilidade = TRUE;
    }
    if(isset($_POST["aprendizado"])){
        $classUsabilidade->aprendizado = TRUE;
    }
}

if(isset($_POST["ux"])){
    if(isset($_POST["afeto"])){
        $classUX->afeto = TRUE;
    }
    if(isset($_POST["estetica"])){
        $classUX->estetica = TRUE;
    }
    if(isset($_POST["frustracao"])){
        $classUX->frustracao = TRUE;
    }
    if(isset($_POST["satisfacao"])){
        $classUX->satisfacao = TRUE;
    }
    if(isset($_POST["motivacao"])){
        $classUX->motivacao = TRUE;
    }
    if(isset($_POST["suporte"])){
        $classUX->suporte = TRUE;
    }
}

if(isset($_POST["funcionalidades"])){
    $classificacao->classFuncionalidade = $_POST["funcionalidades"];
}

if(isset($_POST["intencao"])){
    $classificacao->classIntencao = $_POST["intencao"];
}

if(isset($_POST["sentimentos"])){
    $classificacao->classAnaliseSentimentos = $_POST["sentimentos"];
}

if(isset($_POST["artefato"])){
    $classificacao->classArtefato = $_POST["artefato"];
}

session_start();
$classificacao->idClassificador = $_SESSION["login"];
$classificacao->idPostagem = $_POST["idPostagem"];
$classificacao->idAvaliacao = $_POST["idAvaliacao"];

$controle->salvarClassificacao($classificacao, $classTipo, $classUsabilidade, $classUX);

class Classificacao{
    var $idClassificador;
    var $idPostagem;
    var $idAvaliacao;
    var $classPRU;
    var $classFuncionalidade;
    var $classIntencao;
    var $classAnaliseSentimentos;
    var $classArtefato;
}

class ClassificaoTipo{
    var $critica;
    var $elogio;
    var $duvida;
    var $comparacao;
    var $sugestao;
    var $ajuda;
}

class ClassificaoUsabilidade{
    var $eficacia;
    var $eficiencia;
    var $satisfacao;
    var $seguranca;
    var $utilidade;
    var $memorabilidade;
    var $aprendizado;
}

class ClassificacaoUX{
    var $afeto;
    var $estetica;
    var $frustracao;
    var $satisfacao;
    var $motivacao;
    var $suporte;
}