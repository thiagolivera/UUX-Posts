<?php
include './verificarSessao.class';
include './avaliacoesConcluidasControle.php';
$controleAvaliacaoConcluidas = new AvaliacoesConcluidasControle();
$avaliacoesConcluidas = $controleAvaliacaoConcluidas->obterAvaliacoesUsuario($_SESSION['login']);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UUX-Posts | Avaliações concluídas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
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
          <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Avaliações concluídas</li>
      </ol>
    </section>

    <section class="content">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box box-body">
            <div class="box-header with-border">
              <h3 class="box-title">Avaliações concluídas</h3>
            </div>
              <div class="table" style="padding-right: 20px; padding-left: 20px; padding-top: 10px">
                <table id="example1" class="table table-hover no-margin text-center table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Data de conclusão</th>
                        <th>Título</th>
                        <th>Sistema</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      <?php
                        for($i = 0; $i < count($avaliacoesConcluidas); $i++){
                        ?>
                        <tr>
                            <td><?php echo $avaliacoesConcluidas[$i]["dataTermino"]; ?></td>
                            <td><?php echo $avaliacoesConcluidas[$i]["nomeAvaliacao"]; ?></td>
                            <td><?php echo $avaliacoesConcluidas[$i]["nomeSistema"]; ?></td>
                            <td><a class="btn btn-sm btn-default" title="Abrir relatório" href="abrirRelatorioControle.php?id=<?php echo $avaliacoesConcluidas[$i]["idAvaliacao"]; ?>"><i class="fa fa-file-text-o" aria-hidden="true"></i></a></td>
                            
                    <form id="myForm" method="POST" action="emAndamento/relatorioAvaliacao/relatorioAvaliacao.php">
                                <input type="hidden" value="<?php echo $avaliacoesConcluidas[$i]["idAvaliacao"];?>">
                            </form>
                        </tr>
                        <?php
                        }
                      ?>
                  </tbody>
                </table>
              </div>
          </div>
      </div>
        <a style="color: #ecf0f5">'</a>
    </section>
  </div>

  <?php include("../rodape.php");?>

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
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
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
