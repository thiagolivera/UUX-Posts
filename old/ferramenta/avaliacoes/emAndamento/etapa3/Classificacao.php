<?php
include '../verificarSessao.class';
include './avaliadoresControle.php';
include './classificacaoControle.php';
include_once(__DIR__ . '/controlador/FrontController.php');

if (!isset($_SESSION['idAvaliacao'])) {
    header("location:erro.php");
}
$idAvalicao = $_SESSION['idAvaliacao'];
$avaliadoresControle = new AvaliadoresControle();

//Se não for o gerente de avaliação, não tem acesso a essa página, então.. sai
if (!$avaliadoresControle->isGerente($idAvalicao, $_SESSION['login'])) {
    header("location:erro.php");
}
$front = new FrontController();
$avaliacaoAtual = $avaliadoresControle->obterAvaliacao($idAvalicao);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UUX-Posts | Definir avaliadores</title>
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
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../dist/css/skins/skin-blue.min.css">

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
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Select 2 -->
    <link rel="stylesheet" href="../../../dist/css/select2.css"/>
    <script src="../../../dist/js/select2.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php require_once("cabecalho.php");
    require_once("slidebar.php"); ?>
    <section class="content-wrapper">
        <!-- ********************************
         *  Cabeçalho a cima da tabela  *
         ********************************-->
        <header class="content-header">
            <h1>
                UUX-Posts
                <small>Versão 2.0</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../../../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="../../avaliacoesAndamento.php">Avaliações em andamento</a></li>
                <li class="active">Classificação automátia</li>
            </ol>
            <?php include_once("../avaliacaoEmAndamento.php"); ?>
        </header>
        <?php $front->getFachada($idAvalicao); ?>
    </section>
    <footer>
        <?php require_once("../../../rodape.php"); ?>
    </footer>
</div>
</body>
</html>
