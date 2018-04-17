<?php

if(isset($_GET['continuar'])){
    $_SESSION['idAvaliacaoCriada'] = $_GET['idAvaliacao'];
    
    if(strcmp($_GET['status'], 'Etapa%201%20-%20Contexto%20de%20avaliação')){
        header("location:emAndamento/etapa1/contextoAvaliacao.php");
    }
    
}

