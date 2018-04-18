<?php

if(isset($_GET['continuar'])){
    $_SESSION['idAvaliacaoCriada'] = $_GET['idAvaliacao'];
    
    if(strcmp($_GET['status'], 'Etapa 1 - Contexto de avaliação') == 0){
        header("location:emAndamento/etapa1/contextoAvaliacao.php");
    }
    if(strcmp($_GET['status'], 'Etapa 2 - Extração de PRUS') == 0){
        header("location:emAndamento/etapa2/introEtapa2.php");
    }
    
}

