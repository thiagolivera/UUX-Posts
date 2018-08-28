<?php
include '../verificarSessao.class';
include './avaliadoresControle.php';
include './classificacaoControle.php';

if(!isset($_SESSION['idAvaliacao'])){
    header("location:erro.php");
}

$idAvalicao = $_SESSION['idAvaliacao'];
$avaliadoresControle = new AvaliadoresControle();

//Se não for o gerente de avaliação, não tem acesso a essa página, então.. sai
if(!$avaliadoresControle->isGerente($idAvalicao, $_SESSION['login'])){
    header("location:erro.php");
}
$controle = new ClassificacaoControle();
$postagens = $controle->classificacaoAutomatica($_SESSION["idAvaliacao"],$_POST);
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    <!-- Select 2 -->
    <link rel="stylesheet" href="../../../dist/css/select2.css"/>
    <script src="../../../dist/js/select2.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include_once("cabecalho.php");?>
  <?php include_once("slidebar.php");?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        UUX-Posts
        <small>Versão 2.0</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="../../../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="../../avaliacoesAndamento.php">Avaliações em andamento</a></li><li class="active">Classificação automátia</li>
      </ol>
    </section>

    <?php include_once("../avaliacaoEmAndamento.php");?>

    <section class="content">
        <div class="col-md-12 col-sm-12 col-xs-12" style=" padding-left: 0; padding-right: 0;">
            <div class="col-md-12 col-sm-12 col-xs-12" style=" padding-left: 0;">
                <div class="box box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">Postagens classificadas</h3>
                        <br><i>Postagens classificadas por:
                            <?php
                                while ($fruit_name = current($_POST)){
                                    if (key($_POST) != "filtros") echo key($_POST);
                                    if(next($_POST) && key($_POST) != "filtros") echo ", ";
                                }
                            ?>
                        </i>
                    </div>
                    <div class="table" style="padding-right: 20px; padding-left: 20px; padding-top: 10px">
                        <table id="example" class="table table-hover no-margin text-center table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:75px">ID</th>
                                    <th style="width:150px">Data</th>
                                    <th>Postagem</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($postagens as $postagen){
                                ?>
                                <tr>
                                    <td><?php echo $postagen["idPostagem"]; ?></td>
                                    <td><?php echo $postagen["data"]; ?></td>
                                    <td><?php echo $postagen["postagem"]; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" style="display: block; padding-left: 15px; padding-right: 15px">
                    <div class="col-md-4 col-xs-4" id="voltar" style="padding-top: 10px;">
                        <button type="button" class="btn btn-info" onclick="voltar();" style="margin-left: 10px;">Voltar</button>
                    </div>

                    <div class="col-md-4 col-xs-4" id="excluirPostagens" style="padding-top: 10px; display: flex; justify-content: center;">
                        <button type="button" class="btn btn-info" onclick="excluirTudo();" style="margin-right: 10px;">Excluir todas as postagens</button>
                    </div>

                    <div class="col-md-4 col-xs-4" id="proximo" style="padding-top: 10px;">
                        <button type="button" class="btn btn-info" onclick="proximo();" style="margin-right: 10px; float: right">Salvar e próximo</button>
                    </div>
                </div>
            </div>
        </div>
        <a style="color: #ecf0f5">'</a>
    </section>
  </div>
    <?php include_once("../../../rodape.php");?>
</div>

</body>
<!-- DataTables -->
<script src="../../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<style>
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: middle;
        border-top: 1px solid #ddd;
    }
</style>

<script>
    $(function () {
        $('#example').DataTable({
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
                }
            }
        })
    });
  
    function proximo(){
        window.location.href = "contextoAvaliacao.php";
    }
    function voltar(){
        window.location.href = "./introEtapa3.php";
    }
    function excluirTudo(){
        window.location.href = "postagensExtraidas.php?excluirTudo";
    }
</script>
</html>
