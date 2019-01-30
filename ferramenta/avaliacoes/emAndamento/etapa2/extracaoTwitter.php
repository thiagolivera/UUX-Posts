<?php

require_once './buscaTwitter.php';
include_once './extracaoControle.php';

$stringBusca = ""; //variavel que guarda a string de busca de acordo com os padrões selecionados
$padroes = array(); //array que guarda os padroes utilizados para ser exibido na página

//padrões de extração sendo adicionados na variavel de stringBusca

//Padrões gramaticais
if(isset($_POST["verbos"]) && strcmp($_POST["verbos"], "on") == 0){
    array_push($padroes, "Verbos");
    $stringBusca .= ' "twitter ter" OR "twitter dar" OR "twitter ficar" OR "twitter poder" OR "twitter fazer" OR "twitter dever" OR "twitter seguir" OR "twitter usar" OR "twitter querer" OR "twitter achar" OR "twitter saber" OR "twitter ver" OR "twitter entrar" OR "twitter existir" OR "twitter mudar" OR "twitter editar" OR "twitter deixar" OR "twitter falar" OR "twitter apagar" OR "twitter amar"';
}

if(isset($_POST["substantivos"]) && strcmp($_POST["substantivos"], "on") == 0){
    array_push($padroes, "Substantivos");
    $stringBusca .= '"twitter facebook" OR "twitter tweet" OR "twitter face" OR "twitter orkut" OR "twitter erro" OR "twitter problema" OR "twitter sugestão" OR "twitter pessoa" OR "twitter botão" OR "twitter celular" OR "twitter app" OR "twitter gente" OR "twitter pagina" OR "twitter comentário" OR "twitter opção" OR "twitter caractere" OR "twitter conta" OR "twitter rede" OR "twitter aplicativo" OR "twitter following"';
}

if(isset($_POST["adjetivos"]) && strcmp($_POST["adjetivos"], "on") == 0){
    array_push($padroes, "Adjetivos");
    $stringBusca .= '"twitter bom" OR "twitter ruim" OR "twitter fácil" OR "twitter novo" OR "twitter direto" OR "twitter difícil" OR "twitter rápido" OR "twitter louco" OR "twitter maldito" OR "twitter triste" OR "twitter lento" OR "twitter confuso" OR "twitter perdido" OR "twitter lindo" OR "twitter legal" OR "twitter chato" OR "twitter feliz" OR "twitter querido" OR "twitter louco"';
}

if(isset($_POST["adverbios"]) && strcmp($_POST["adverbios"], "on") == 0){
    array_push($padroes, "Advérbios");
    $stringBusca .= '"twitter não" OR "twitter mais" OR "twitter bem" OR "twitter porque" OR "twitter como" OR "twitter quando" OR "twitter nem" OR "twitter assim" OR "twitter mal" OR "twitter hoje" OR "twitter então" OR "twitter demais" OR "twitter algo" OR "twitter longe" OR "twitter onde" OR "twitter quando"';
}


//Tipos de PRU
if(isset($_POST["elogio"]) && strcmp($_POST["elogio"], "on") == 0){
    array_push($padroes, "Elogio");
    $stringBusca .= '"twitter facebook" OR "twitter bem" OR "twitter bom" OR "twitter mais" OR "twitter ter" OR "twitter face" OR "twitter ficar" OR "twitter dar" OR "twitter celular" OR "twitter legal" OR "twitter adorar" OR "twitter gente"';
}

if(isset($_POST["critica"]) && strcmp($_POST["critica"], "on") == 0){
    array_push($padroes, "Crítica");
    $stringBusca .= '"twitter mais" OR "twitter tweet" OR "twitter ficar" OR "twitter entrar" OR "twitter aqui" OR "twitter querer" OR "twitter porque" OR "twitter ir gostar" OR "twitter tão" OR "twitter mal" OR "twitter chato"';
}

if(isset($_POST["duvida"]) && strcmp($_POST["duvida"], "on") == 0){
    array_push($padroes, "Dúvida");
    $stringBusca .= '"twitter fazer" OR "twitter ruim" OR "twitter erro" OR "twitter dar" OR "twitter problema" OR "twitter tweet" OR "twitter saber" OR "twitter pagina" OR "twitter como" OR "twitter comentário" OR "twitter mais" OR "twitter aqui"';
}

if(isset($_POST["comparacao"]) && strcmp($_POST["comparacao"], "on") == 0){
    array_push($padroes, "Comparação");
    $stringBusca .= '"twitter facebook" OR "twitter mais" OR "twitter face" OR "twitter orkut" OR "twitter bem" OR "twitter ir" OR "twitter bom" OR "twitter ter" OR "twitter usar" OR "twitter achar" OR "twitter ver" OR "twitter dia" OR "twitter ruim"';
}

if(isset($_POST["sugestao"]) && strcmp($_POST["sugestao"], "on") == 0){
    array_push($padroes, "Sugestão");
    $stringBusca .= '"twitter ter" OR "twitter dever" OR "twitter tweet" OR "twitter sugestão" OR "twitter poder" OR "twitter mais" OR "twitter botão" OR "twitter seguir" OR "twitter dar" OR "twitter editar" OR "twitter ficar" OR "twitter querer" OR "twitter porque"';
}




//Facetas UUX
if(isset($_POST["afeto"]) && strcmp($_POST["afeto"], "on") == 0){
    array_push($padroes, "Afeto");
    $stringBusca .= '"twitter gostar" OR "twitter rede" OR "twitter sistema" OR "twitter legal" OR "twitter adorar" OR "twitter amar" OR "twitter facebook" OR "twitter poder" OR "twitter comunicar" OR "twitter facilitar" OR "twitter criativo" OR "twitter eficiente" OR "twitter moderno" OR "twitter interessante" OR "twitter postar" OR "twitter existir" OR "twitter praticar" OR "twitter aproveitar" OR "twitter usufruir"';
}

if(isset($_POST["aprendizado"]) && strcmp($_POST["aprendizado"], "on") == 0){
    array_push($padroes, "Aprendizado");
    $stringBusca .= '"twitter saber" OR "twitter fazer" OR "twitter ver" OR "twitter ter" OR "twitter conseguir" OR "twitter poder" OR "twitter encontrar" OR "twitter aparecer" OR "twitter próximo" OR "twitter visualizar" OR "twitter clicar" OR "twitter achar" OR "twitter dizer" OR "twitter entender" OR "twitter entrar" OR "twitter informar" OR "twitter ajudar" OR "twitter novo" OR "twitter pagina" OR "twitter perder"';
}

if(isset($_POST["confianca"]) && strcmp($_POST["confianca"], "on") == 0){
    array_push($padroes, "Confiança");
    $stringBusca .= '"twitter sistema" OR "twitter parecer" OR "twitter fazer" OR "twitter gostar" OR "twitter praticar" OR "twitter interatividade" OR "twitter usar" OR "twitter poder" OR "twitter interessante" OR "twitter esperar" OR "twitter achar" OR "twitter acreditar" OR "twitter agradar" OR "twitter ajudar" OR "twitter apoio" OR "twitter resolver" OR "twitter melhorar" OR "twitter melhoria" OR "twitter começar"';
}

if(isset($_POST["eficacia"]) && strcmp($_POST["eficacia"], "on") == 0){
    array_push($padroes, "Eficácia");
    $stringBusca .= '"twitter sistema" OR "twitter ter" OR "twitter fazer" OR "twitter problema" OR "twitter saber" OR "twitter conseguir" OR "twitter aparecer" OR "twitter poder" OR "twitter dar" OR "twitter ver" OR "twitter erro" OR "twitter dizer" OR "twitter ficar" OR "twitter querer" OR "twitter tentar" OR "twitter dever" OR "twitter ajuste" OR "twitter gostar" OR "twitter colocar" OR "twitter realizar"';
}

if(isset($_POST["eficiencia"]) && strcmp($_POST["eficiencia"], "on") == 0){
    array_push($padroes, "Eficiência");
    $stringBusca .= '"twitter ruim" OR "twitter ficar" OR "twitter lento" OR "twitter ver" OR "twitter dar" OR "twitter sistema" OR "twitter esperar" OR "twitter querer" OR "twitter carregar" OR "twitter erro" OR "twitter face" OR "twitter legal" OR "twitter fazer" OR "twitter problema" OR "twitter usar" OR "twitter achar" OR "twitter passar" OR "twitter aparecer" OR "twitter disciplina" OR "twitter pau"';
}

if(isset($_POST["estetica"]) && strcmp($_POST["estetica"], "on") == 0){
    array_push($padroes, "Estética");
    $stringBusca .= '"twitter gostar" OR "twitter parecer" OR "twitter ficar" OR "twitter bonito" OR "twitter plataforma" OR "twitter design" OR "twitter atualizar" OR "twitter android" OR "twitter limpo" OR "twitter perfeito" OR "twitter acostumar" OR "twitter pagina" OR "twitter melhoria" OR "twitter adorar" OR "twitter adaptar" OR "twitter add" OR "twitter campo" OR "twitter curtir" OR "twitter escrever" OR "twitter esquerdo"';
}

if(isset($_POST["frustracao"]) && strcmp($_POST["frustracao"], "on") == 0){
    array_push($padroes, "Frustração");
    $stringBusca .= '"twitter ter" OR "twitter sistema" OR "twitter problema" OR "twitter fazer" OR "twitter ruim" OR "twitter saber" OR "twitter ficar" OR "twitter dar" OR "twitter poder" OR "twitter erro" OR "twitter ver" OR "twitter conseguir" OR "twitter querer" OR "twitter dizer" OR "twitter bug" OR "twitter aparecer" OR "twitter tempo" OR "twitter achar" OR "twitter mau" OR "twitter dever"';
}

if(isset($_POST["motivacao"]) && strcmp($_POST["motivacao"], "on") == 0){
    array_push($padroes, "Motivação");
    $stringBusca .= '"twitter poder" OR "twitter adorar" OR "twitter desabafar" OR "twitter achar" OR "twitter criar" OR "twitter falar" OR "twitter ver" OR "twitter plataforma" OR "twitter social" OR "twitter saber" OR "twitter super" OR "twitter fazer" OR "twitter interatividade" OR "twitter usar" OR "twitter deixar" OR "twitter existir" OR "twitter amar" OR "twitter sistema" OR "twitter interessante" OR "twitter ajudar"';
}

if(isset($_POST["satisfacao"]) && strcmp($_POST["satisfacao"], "on") == 0){
    array_push($padroes, "Satisfação");
    $stringBusca .= '"twitter sistema" OR "twitter gostar" OR "twitter legal" OR "twitter achar" OR "twitter adorar" OR "twitter ter" OR "twitter face" OR "twitter facebook" OR "twitter demorar" OR "twitter parecer" OR "twitter poder" OR "twitter social" OR "twitter existir" OR "twitter ficar" OR "twitter entrar" OR "twitter interatividade" OR "twitter próximo" OR "twitter criar" OR "twitter amar" OR "twitter desabafar"';
}

if(isset($_POST["seguranca"]) && strcmp($_POST["seguranca"], "on") == 0){
    array_push($padroes, "Segurança");
    $stringBusca .= '"twitter saber" OR "twitter sistema" OR "twitter começar" OR "twitter mau" OR "twitter fazer" OR "twitter dar" OR "twitter aparecer" OR "twitter errar" OR "twitter apertar" OR "twitter poder" OR "twitter ruim" OR "twitter erro" OR "twitter digitar" OR "twitter constar" OR "twitter faltar" OR "twitter lista" OR "twitter odiar" OR "twitter ver" OR "twitter ficar" OR "twitter querer"';
}

if(isset($_POST["suporte"]) && strcmp($_POST["suporte"], "on") == 0){
    array_push($padroes, "Suporte");
    $stringBusca .= '"twitter fazer" OR "twitter sistema" OR "twitter saber" OR "twitter preencher" OR "twitter ver" OR "twitter esperar" OR "twitter problema" OR "twitter solicitar" OR "twitter clicar" OR "twitter clique" OR "twitter consultar" OR "twitter providenciar" OR "twitter pedir" OR "twitter aparecer" OR "twitter dar" OR "twitter errar" OR "twitter poder" OR "twitter erro" OR "twitter pergunta" OR "twitter vir"';
}

if(isset($_POST["utilidade"]) && strcmp($_POST["utilidade"], "on") == 0){
    array_push($padroes, "Utilidade");
    $stringBusca .= '"twitter poder" OR "twitter saber" OR "twitter usar" OR "twitter ver" OR "twitter excluir" OR "twitter dar" OR "twitter ficar" OR "twitter ruim" OR "twitter problema" OR "twitter dever" OR "twitter mozilla" OR "twitter querer" OR "twitter caractere" OR "twitter demorar" OR "twitter sistema" OR "twitter tirar" OR "twitter objetivo" OR "twitter limite" OR "twitter escrever" OR "twitter entrar"';
}

if(isset($_POST["padroesPersonalizados"])){
    $padroes = $_POST["padroesPersonalizados"];
    $padroes = str_replace(',', '" OR "', $padroes);
    
    $stringBusca .= '"' . $padroes . '"';
}

$stringBusca .= ' -"filter:retweets"';

if(strcmp($stringBusca, ' -"filter:retweets"') == 0){
    header("location:introEtapa2.php");
} else{
    session_start();
    $idAvaliacao = $_SESSION['idAvaliacao'];
    $busca = new BuscaTwitter(100);
    $r = $busca->busca_pagina($stringBusca, 15, $idAvaliacao);

    $_SESSION['postagens'] = $r;
    $extracaoControle = new ExtracaoControle();
    $avaliacaoAtual = $extracaoControle->obterAvaliacao($idAvaliacao);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UUX-Posts | Postagens extraídas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
    <link rel="shortcut icon" href="../../../images/uux-icon.ico" type="image/x-icon">
    <link rel="icon" href="../../../images/uux-icon.ico" type="image/x-icon">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include("./cabecalho.php");?>
  <?php include("./slidebar.php");?>

  <div class="content-wrapper">
    <section class="content-header">
        <h1>
          UUX-Posts
          <small>Versão 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../../../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="../../avaliacoesAndamento.php">Avaliações em andamento</a></li><li class="active">Extração de PRUs do Twitter</li>
        </ol>
    </section>

    <section class="content"> 
        <?php include_once("../avaliacaoEmAndamento.php");?>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box box-body">
            <div class="box-header with-border">
              <h3 class="box-title">Postagens extraídas com os padrões: 
              <?php
              for($i=0; $i < count($padroes); $i++){
                  if($i == (count($padroes) - 1)){
                      echo $padroes[$i] . '.';
                  } else{
                      echo $padroes[$i] . ',';
                  }
              }
              ?>
              
              </h3>
            </div>
              <div class="table" style="padding-right: 20px; padding-left: 20px; padding-top: 10px">
                <table id="example1" class="table table-hover no-margin text-center table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th style="width:150px">Data</th>
                        <th>Postagem</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      <?php
                        for($i = 0; $i < count($r); $i++){
                            $post = (array) $r[$i];
                        ?>
                        <tr>
                            <td><?php echo $i + 1; ?></td>
                            <td><?php echo $post["created_at"]; ?></td>
                            <td style="text-align: left"><?php echo $post["text"]; ?></td>
                        </tr>
                        <?php
                        }
                      ?>
                  </tbody>
                </table>
              </div>
          </div>
        
            <form action="extracaoTwitterControle.php" method="post">
                <div class="row" style="display: block; padding-left: 15px; padding-right: 15px">
                    <div class="col-md-4 col-xs-4" id="voltar" style="padding-top: 10px;">
                        <button type="button" class="btn btn-info" onclick="voltar();" style="margin-left: 10px;">Voltar</button>
                    </div>
                    
                    <div class="col-md-4 col-xs-4" id="exportarPostagens" style="padding-top: 10px; display: flex; justify-content: center;">
                        <button type="button" class="btn btn-info" onclick="exportarPostagens();" style="margin-right: 10px;">Exportar postagens para CSV</button>
                    </div>

                    <div class="col-md-4 col-xs-4" id="proximo" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info" style="margin-right: 10px; float: right">Salvar postagens extraídas</button>
                    </div>
                </div>
            </form>
      </div>
        <a style="color: #ecf0f5">'</a>
    </section>
  </div>

  <?php include("../../../rodape.php");?>

</div>

<style>
    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-left: 0px;
    padding-right: 0px;
}

.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: middle;
    border-top: 1px solid #ddd;
}
</style>

<!-- jQuery 3 -->
<script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
<script>
    
    function proximo(){
        window.location.href = "../etapa3/introEtapa3.php";
        <?php $_SESSION['status'] = 'Etapa 3 - Classificação de PRUS'; ?>
    }
    
    function voltar(){
        window.location.href = "introEtapa2.php";
    }
    
    function exportarPostagens(){
        window.location.href = "exportarCSV.php?exportarSessao";
    }
    
  $(function () {
    $('#example1').DataTable({
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Exibindo até _MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar: ",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            },
        }
    })
  })
</script>

</html>