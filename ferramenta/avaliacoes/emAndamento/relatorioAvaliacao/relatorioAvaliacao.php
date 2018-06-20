<?php
include '../verificarSessao.class';
include_once '../etapa4/interpretacaoControle.php';
include_once './relatorioControle.php';

$idAvalicao = $_GET["id"];
$controle = new InterpretacaoControle();
$avaliacaoAtual = $controle->obterAvaliacao($idAvalicao);
$categoriasAvaliacao = $controle->obterCategoriasAvaliacao($idAvalicao)[0];

$relatorioControle = new RelatorioControle();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>UUX-Posts | Relatório de avaliação</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="../../../plugins/iCheck/all.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="../../../bower_components/jvectormap/jquery-jvectormap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../../../dist/css/skins/skin-blue.min.css">

        <link rel="stylesheet" href="../../../dist/bootstrap-tagsinput.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/rainbow.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/generic.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/html.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/javascript.js"></script>

        <!-- jQuery 3 -->
        <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck 1.0.1 -->
        <script src="../../../plugins/iCheck/icheck.min.js"></script>
        <!-- FastClick -->
        <script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="../../../dist/js/adminlte.min.js"></script>
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include_once("cabecalho.php");?>
            <?php include_once("slidebar.php");?>
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>UUX-Posts <small>Versão 2.0</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="../../../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li>Avaliações</li><li class="active">Relatório de avaliação</li>
                    </ol>
                </section>

                <section class="content">
                    <h2 style="text-align: center">Relatório de Avaliação 
                        <?php 
                        if(isset($_POST["preliminar"])){
                            echo "Preliminar";
                        } ?>
                    </h2>
                    <?php include_once("./infoAvaliacao.php");
                          include_once("./contextoAvaliacao.php");
                          include_once("./avaliadores.php");?>
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Resultados de Classificação</h3>
                        </div>
                    </div>
                    <?php
                        include '../etapa4/resultadosClassPRU.php';
                    if($categoriasAvaliacao["funcionalidade"]){
                        include("../etapa4/resultadosPorFuncionalidade.php");
                    }
                    if($categoriasAvaliacao["funcionalidade"] && $categoriasAvaliacao["tipo"]){
                        include './funcTipo.php';
                    }
                    if($categoriasAvaliacao["tipo"]){
                        include("../etapa4/resultadosPorTipo.php");
                    }
                    if($categoriasAvaliacao["intencao"]){
                        include("../etapa4/resultadosPorIntencao.php");
                    }
                    if($categoriasAvaliacao["analiseSentimentos"]){
                        include("../etapa4/resultadosAnaliseSentimentos.php");
                    }
                    if($categoriasAvaliacao["usabilidade"]){
                        include("../etapa4/resultadosUsabilidade.php");
                    }
                    if($categoriasAvaliacao["ux"]){
                        include("../etapa4/resultadosUX.php");
                    }
                    if($categoriasAvaliacao["artefato"]){
                        include("../etapa4/resultadosArtefato.php");
                    }
                    include("./percepcoesAvaliacao.php");
                    ?>
                    <a target="_blank" onclick="window.print();" class="btn btn-primary no-print"><i class="fa fa-print"></i> Imprimir</a>
                </section>
            </div>
            <?php include_once("../../../rodape.php");?>
        </div>
    </body>

    <style>
    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
        position: relative;
        min-height: 1px;
        padding-left: 10px;
        padding-right: 20px;
    }

    .content{
        padding-right: 5px;
    }
    </style>

    <script type="text/javascript">
        function proximaPagina(){
            window.location.href = "../emAndamento/etapa1/associarAvaliadores.php";
        }
    </script>

</html>