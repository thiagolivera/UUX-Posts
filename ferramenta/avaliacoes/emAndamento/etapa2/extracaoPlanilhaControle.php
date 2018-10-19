<?php

include './salvarCSVControle.php';

if(isset($_POST["formaExtracao"]) && isset($_POST["periodoExtracao"]) && isset($_FILES['fileUpload'])){
    date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

    $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $dir = './temp/'; //Diretório para uploads

    move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    
    session_start();
    $idAvalicao = $_SESSION['idAvaliacao'];
    
    $salvar = new SalvarCSVControle();
    if($salvar->salvarPostagens($idAvalicao, $new_name, $_POST["formaExtracao"], $_POST["periodoExtracao"])){
        unlink("temp/".$new_name);
        header("location:postagensExtraidas.php");
    }
}