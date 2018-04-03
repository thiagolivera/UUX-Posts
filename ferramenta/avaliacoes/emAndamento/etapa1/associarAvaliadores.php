<?php
include '../verificarSessao.class';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UUX-Posts | Associar avaliadores</title>
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
    
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                placeholder: 'Ex.: João da Silva',
                minimumInputLength: 3,
                language: {
                    errorLoading: function () {
                      return 'Os resultados não puderam ser carregados.';
                    },
                    inputTooLong: function (args) {
                      var overChars = args.input.length - args.maximum;

                      var message = 'Apague ' + overChars + ' caracter';

                      if (overChars != 1) {
                        message += 'es';
                      }

                      return message;
                    },
                    inputTooShort: function (args) {
                      var remainingChars = args.minimum - args.input.length;

                      var message = 'Digite ' + remainingChars + ' ou mais caracteres';

                      return message;
                    },
                    loadingMore: function () {
                      return 'Carregando mais resultados…';
                    },
                    maximumSelected: function (args) {
                      var message = 'Você só pode selecionar ' + args.maximum + ' ite';

                      if (args.maximum == 1) {
                        message += 'm';
                      } else {
                        message += 'ns';
                      }

                      return message;
                    },
                    noResults: function () {
                      return 'Nenhum resultado encontrado';
                    },
                    searching: function () {
                      return 'Buscando…';
                    }
                }
            });
            $('.js-example-basic-single').on('select2:select', function (e) {
                var data = e.params.data; //pegar os dados do objeto selecionado no select
                console.log(data);
            });
        });
    </script>
    
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
          <li><a href="../../avaliacoesAndamento.php">Avaliações em andamento</a></li><li class="active">Associar avaliadores</li>
      </ol>
    </section>

    <section class="content">
        <?php include_once("../avaliacaoEmAndamento.php");?>
        
        <div class="col-md-12 col-sm-12 col-xs-12" style=" padding-left: 0; padding-right: 0;">
            <div class="col-md-6 col-sm-12 col-xs-12" style=" padding-left: 0;">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informe os avaliadores <small>min 02, max 10</small></h3>
                    </div>

                    <div class="box-body" style="padding-left: 15px; padding-right: 15px">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="nameAvaliador" class="col-sm-2 control-label">Nome</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single" id="nameAvaliador" name="state" style="width: 100%">
                                        <option></option>
                                        <option>Jeferson Juliani</option>
                                        <option>Lavínia Matoso</option>
                                        <option>Marília Mendes</option>
                                        <option>Thiago Silva</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <table id="example2" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                  <th>Nome</th>
                                  <th id="email">E-mail</th>
                                  <th>Profissão</th>
                                  <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <td>Jeferson Juliani</td>
                                  <td id="email">jeferson.engsoftware@gmail.com</td>
                                  <td>Estudante</td>
                                  <td><a class="btn btn-sm btn-default"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                </tr>
                                <tr>
                                  <td>Lavínia Matoso</td>
                                  <td id="email">laviniamatosof@hotmail.com</td>
                                  <td>Estudante</td>
                                  <td><a class="btn btn-sm btn-default"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                </tr>
                                <tr>
                                  <td>Thiago Silva</td>
                                  <td id="email">thiago.engsoftware@gmail.com</td>
                                  <td>Estudante</td>
                                  <td><a class="btn btn-sm btn-default"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12" style=" padding-left: 0;">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Informe os validadores <small>min 01, max 03</small></h3>
                </div>
                  <div class="box-body" style="padding-left: 15px; padding-right: 15px">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label">Nome</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single" id="nameAvaliador" name="state" style="width: 100%">
                                        <option></option>
                                        <option>Jeferson Juliani</option>
                                        <option>Lavínia Matoso</option>
                                        <option>Marília Mendes</option>
                                        <option>Thiago Silva</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <table id="example1" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                  <th>Nome</th>
                                  <th id="email">E-mail</th>
                                  <th>Profissão</th>
                                  <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <td>Marília Mendes</td>
                                  <td id="email">mariliamendes@ufc.br</td>
                                  <td>Professora</td>
                                  <td><a class="btn btn-sm btn-default"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
              </div>
          </div>
        </div>
        <div class="col-sm-3" id="btnVoltar" style="float: left; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="voltar()" type="button" style="margin-right: 10px;">Voltar</button>
        </div>
        <div style="float: right; padding-bottom: 10px;">
            <button type="submit" class="btn btn-info" onclick="proximo()" style="margin-right: 10px;">Salvar e próximo</button>
        </div>
        <a style="color: #ecf0f5">'</a>
    </section>
      <br>
  </div>
    <?php include_once("../../../rodape.php");?>
</div>

</body>

<style>
    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-left: 10px;
    padding-right: 10px;
}

.content{
    padding-right: 5px;
}

@media(max-width: 1175px){
    #email {
        display: none;  
      }
}
</style>

<!-- DataTables -->
<script src="../../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false
    }),
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">        
    $(".myselect").select2({
        placeholder: 'Selecione um avaliador',
        selectOnClose: true,
        minimumInputLength: 3,
        language: {
          inputTooShort: function () {
            return "Digite 3 ou mais caracteres para buscar";
          },
          errorLoading: function () {
          return 'Os resultados não puderam ser carregados.';
          },
          inputTooLong: function (args) {
          var overChars = args.input.length - args.maximum;

          var message = 'Apague ' + overChars + ' caracter';

          if (overChars != 1) {
            message += 'es';
          }

          return message;
          },
          inputTooShort: function (args) {
          var remainingChars = args.minimum - args.input.length;

          var message = 'Digite ' + remainingChars + ' ou mais caracteres';

          return message;
          },
          loadingMore: function () {
          return 'Carregando mais resultados…';
          },
          maximumSelected: function (args) {
          var message = 'Você só pode selecionar ' + args.maximum + ' ite';

          if (args.maximum == 1) {
            message += 'm';
          } else {
            message += 'ns';
          }

          return message;
          },
          noResults: function () {
          return 'Nenhum resultado encontrado';
          },
          searching: function () {
          return 'Buscando…';
          }
        }
    });
    
    function proximo(){
        window.location.href = "contextoAvaliacao.php";
    }
    function voltar(){
        window.location.href = "../../novaAvaliacao/criarAvaliacao.php";
    }
</script>
</html>
