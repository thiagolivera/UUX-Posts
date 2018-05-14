<?php
include '../../../Banco.php';
include './ClassesClassificacao.php';

$classificacoes = null;
$numPostagens = $_POST["numPostagens"];

for($i=0; $i < $numPostagens; $i++){ //10 é o número de postagens
    if(isset($_POST["classPRU".$i])){
        if(strcmp($_POST["classPRU".$i], "PRU") == '0'){
            $classificacoes[$i]["PRU"] = 1;
        } else{
            $classificacoes[$i]["PRU"] = 0;
        }
    }
    if(isset($_POST["classFuncionalidade".$i])){
        $classificacoes[$i]["funcionalidade"] = $_POST["classFuncionalidade".$i];
    } else{
        $classificacoes[$i]["funcionalidade"] = null;
    }
    if(isset($_POST["classTipo".$i])){
        $classificacoes[$i]["tipo"] = $_POST["classTipo".$i];
    } else{
        $classificacoes[$i]["tipo"] = null;
    }
    if(isset($_POST["classIntencao".$i])){
        $classificacoes[$i]["intencao"] = $_POST["classIntencao".$i];
    } else{
        $classificacoes[$i]["intencao"] = null;
    }
    if(isset($_POST["classSentimento".$i])){
        $classificacoes[$i]["sentimento"] = $_POST["classSentimento".$i];
    } else{
        $classificacoes[$i]["sentimento"] = null;
    }
    if(isset($_POST["classUsabilidade".$i])){
        $classificacoes[$i]["usabilidade"] = $_POST["classUsabilidade".$i];
    } else{
        $classificacoes[$i]["usabilidade"] = null;
    }
    if(isset($_POST["classUX".$i])){
        $classificacoes[$i]["ux"] = $_POST["classUX".$i];
    } else{
        $classificacoes[$i]["ux"] = null;
    }
    if(isset($_POST["classArtefato".$i])){
        $classificacoes[$i]["artefato"] = $_POST["classArtefato".$i];
    } else{
        $classificacoes[$i]["artefato"] = null;
    }
    
    if(isset($_POST["idPostagem".$i])){
        $classificacoes[$i]["idPostagem"] = $_POST["idPostagem".$i];
    }
}

include './ClassificacaoPRUsControle.php';
$salvar = new ClassificacaoPRUsControle();

if($salvar->salvarClassificacaoPRUs($classificacoes, $_POST["idAvaliacao"])){
    header("location:classificacaoPostagens.php");
}