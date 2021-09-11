<?php
include_once './salvarJSON-BD.php';
if(isset($_FILES['fileUpload'])){
    date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

    $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $dir = './temp/'; //Diretório para uploads

    move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    
    session_start();
    $_SESSION['idAvaliacao'] = date("YmdHis"); //cria um id unico de avaliação e salva na seção para baixar as postagens posteriormente
    $idAvaliacao = $_SESSION['idAvaliacao'];
    $salvar = new SalvarJSONControle();
    
    if($salvar->salvarPostagens($idAvaliacao, $dir.$new_name)){
        unlink($dir.$new_name);
        header("location:../classificacaoPosts.php");
    }
}