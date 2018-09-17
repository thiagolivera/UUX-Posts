<?php
    include '../verificarSessao.class';
    include './extracaoControle.php';

    $idAvalicao = $_SESSION['idAvaliacao'];
    $extracaoControle = new ExtracaoControle();
    $avaliacaoAtual = $extracaoControle->obterAvaliacao($idAvalicao);

    if(isset($_SESSION['papel'])){
        if(strcmp($_SESSION['papel'], "Gerente") == '0'){
            
        } else{
            header("Location:acessoNegado.php");
        }
    } else{
        header("Location:acessoNegado.php");
    }

    if(!$extracaoControle->verificarSeHaPostagens($idAvalicao)){
        header("location:formaExtracao.php");
    } else{
        $postagensExtraidas = $extracaoControle->obterPostsExtraidas($idAvalicao);
    }

    if(isset($_GET['excluirTudo'])){
        $extracaoControle->excluirTodasPostagens($idAvalicao);
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
            <li><a href="../../avaliacoesAndamento.php">Avaliações em andamento</a></li><li class="active">Extração de PRUs</li>
        </ol>
    </section>

    <section class="content">
        <div class="alert alert-success alert-dismissible" id="alertaSucesso" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Postagem excluída</h4>
            A postagem foi excluída com sucesso!
        </div>
        
        <?php
        if(isset($_GET['sucesso'])){
            ?> 
            <script>
                document.getElementById('alertaSucesso').style.display = 'block';
                $("#alertaSucesso").fadeTo(7000, 500).slideUp(500, function(){
                    $("#alertaSucesso").alert('close');
                });
            </script>
            <?php
        }
        
        include_once("../avaliacaoEmAndamento.php");?>
        
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box box-body">
            <div class="box-header with-border">
              <h3 class="box-title">Postagens extraídas</h3>
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
                        for($i = 0; $i < count($postagensExtraidas); $i++){
                        ?>
                        <tr>
                            <td><?php echo $postagensExtraidas[$i]["idPostagem"]; ?></td>
                            <td><?php echo $postagensExtraidas[$i]["data"]; ?></td>
                            <td><?php echo $postagensExtraidas[$i]["postagem"]; ?></td>
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
    
    function excluirTudo(){
        window.location.href = "postagensExtraidas.php?excluirTudo";
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
            }
        }
    })
  })
</script>

</html>
