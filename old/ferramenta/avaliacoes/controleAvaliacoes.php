<?php
if(isset($_GET['continuar'])){
    session_start();
    $_SESSION['idAvaliacao'] = $_GET['idAvaliacao'];
    $_SESSION['papel'] = $_GET['papel'];
    
    if(strcmp($_GET['status'], 'Etapa 1 - Contexto de avaliação') == 0){
        header("location:emAndamento/etapa1/contextoAvaliacao.php");
    }
    if(strcmp($_GET['status'], 'Etapa 2 - Extração de PRUS') == 0){
        header("location:emAndamento/etapa2/introEtapa2.php");
    }
    if(strcmp($_GET['status'], 'Definição da classificação') == 0){
        header("location:emAndamento/etapa3/introEtapa3.php");
    }
    if(strcmp($_GET['status'], 'Etapa 3 - Classificação de PRUS') == 0){
        header("location:emAndamento/etapa3/introEtapa3.php");
    }
    if(strcmp($_GET['status'], 'Etapa 4 - Interpretação dos resultados') == 0){
        header("location:emAndamento/etapa4/introEtapa4.php");
    }
    if(strcmp($_GET['status'], 'Etapa 5 - Relato dos resultados') == 0){
        header("location:emAndamento/etapa5/introEtapa5.php");
    }    
}