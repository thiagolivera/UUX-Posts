<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UUX-Posts | Postagens favoritas</title>
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
          <li>Postagens</li> <li class="active">Postagens favoritas</li>
      </ol>
    </section>

      <section class="content">
        <div class="row">
            <div class="col-md-12">
              <!-- The time line -->
              <ul class="timeline">
                <li>
                  <i class="fa fa-comments bg-yellow"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 13 dez 2017</span>

                    <h3 class="timeline-header"><a>Google Maps</a> - Google Play (Android)</h3>

                    <div class="timeline-body">
                     Está completamente errado!! Da caminhos e rotas que não dão em lugar em nenhum
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-warning btn-sm">Ver classificação</a>
                    </div>
                  </div>
                </li>
                
                <li>
                  <i class="fa fa-comments bg-yellow"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 13 dez 2017</span>

                    <h3 class="timeline-header"><a>Google Maps</a> - Google Play (Android)</h3>

                    <div class="timeline-body">
                     Voces poderiam criar a opção para caminhões Poderiam criar uma opção para quem trabalha com caminhão como rotas alternativas seguras ou em estradas onde é proibido trafegar pesados entre outras coisas
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-warning btn-sm">Ver classificação</a>
                    </div>
                  </div>
                </li>
                <li>
                  <i class="fa fa-comments bg-yellow"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 13 dez 2017</span>

                    <h3 class="timeline-header"><a>Google Maps</a> - Google Play (Android)</h3>

                    <div class="timeline-body">
                     So online Nao abaixa para ficar offline quando abaixa sua area fica pedindo para atualizar que vai expirar nao gostei por isso so vou dar duas estrelas
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-warning btn-sm">Ver classificação</a>
                    </div>
                  </div>
                </li>
                <li>
                  <i class="fa fa-comments bg-yellow"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 13 dez 2017</span>

                    <h3 class="timeline-header"><a>Google Maps</a> - Google Play (Android)</h3>

                    <div class="timeline-body">
                     Porcaria! Ele, nao entende que estou em linha reta na rua, mostra que estou dirigindo o carro de lado! O que e isso e um carrangueijo ? Ja com o waze nao tenho problemas!
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-warning btn-sm">Ver classificação</a>
                    </div>
                  </div>
                </li>
                
                <li>
                  <i class="fa fa-star-o bg-gray"></i>
                </li>
              </ul>
            </div>
            <!-- /.col -->
          </div>
          </section>
  </div>

  <?php include_once("../rodape.php");?>

</div>
</body>

<style>
    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-right: 10px;
}
</style>
</html>
