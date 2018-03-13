<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UUX-Posts | Gerenciar usuários</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">
  
	<!-- jQuery 3 -->
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="../bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="../dist/js/adminlte.min.js"></script>
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
          <li>Usuários</li> <li class="active">Gerenciar usuários</li>
      </ol>
    </section>

    <section class="content">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box box-body">
            <div class="box-header with-border">
              <h3 class="box-title">Gerenciar usuários</h3>
            </div>
            <div class="table">
                <table class="table table-hover no-margin text-center">
                  <thead>
                  <tr>
                    <th>Nome</th>
                    <th id="email">E-mail</th>
                    <th>Tipo de Acesso</th>
                    <th>Ações</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Jeferson Juliani</td>
                    <td id="email">jeferson.engsoftware@gmail.com</td>
                    <td>Avaliador</td>
                    <td><a class="btn btn-sm btn-default"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <a class="btn btn-sm btn-default"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>Lavínia Matoso</td>
                    <td id="email">laviniamatosof@hotmail.com</td>
                    <td>Avaliador</td>
                    <td><a class="btn btn-sm btn-default"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <a class="btn btn-sm btn-default"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                  </tr>
                  
                  <tr>
                    <td>Marília Mendes</td>
                    <td id="email">mariliamendes@ufc.br</td>
                    <td>Administrador</td>
                    <td><a class="btn btn-sm btn-default"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <a class="btn btn-sm btn-default"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                  </tr>
                  
                  <tr>
                    <td>Thiago Silva</td>
                    <td id="email">thiago.engsoftware@gmail.com</td>
                    <td>Administrador</td>
                    <td><a class="btn btn-sm btn-default"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <a class="btn btn-sm btn-default"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                  </tr>
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
@media(max-width: 768px){
    #email {
        display: none;  
      }
}

</style>

</html>