<?php
include '../../../Banco.php';
include './ClassesClassificacao.php';

$classificacoes = null;

for($i=0; $i < 10; $i++){ //10 é o número de postagens
    if(isset($_POST["classPRU".$i])){
        if(strcmp($_POST["classPRU".$i], "PRU") == '0'){
            $classificacoes[$i][0] = 1;
        } else{
            $classificacoes[$i][0] = 0;
        }
    }
    if(isset($_POST["classFuncionalidade".$i])){
        $classificacoes[$i][1] = $_POST["classFuncionalidade".$i];
    }
    if(isset($_POST["classTipo".$i])){
        $classificacoes[$i][2] = $_POST["classTipo".$i];
    }
    if(isset($_POST["classIntencao".$i])){
        $classificacoes[$i][3] = $_POST["classIntencao".$i];
    }
    if(isset($_POST["classSentimento".$i])){
        $classificacoes[$i][4] = $_POST["classSentimento".$i];
    }
    if(isset($_POST["classUsabilidade".$i])){
        $classificacoes[$i][5] = $_POST["classUsabilidade".$i];
    }
    if(isset($_POST["classUX".$i])){
        $classificacoes[$i][6] = $_POST["classUX".$i];
    }
    if(isset($_POST["classArtefato".$i])){
        $classificacoes[$i][7] = $_POST["classArtefato".$i];
    }
    
    if(isset($_POST["idPostagem".$i])){
        $classificacoes[$i][8] = $_POST["idPostagem".$i];
    }
}

include './ClassificacaoPRUsControle.php';
$salvar = new ClassificacaoPRUsControle();
$salvar->salvarClassificacaoPRUs($classificacoes, $_POST["idAvaliacao"]);