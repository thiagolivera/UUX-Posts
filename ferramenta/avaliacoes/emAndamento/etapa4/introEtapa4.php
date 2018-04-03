<?php
include '../verificarSessao.class';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UUX-Posts | Interpretação dos Resultados</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../dist/css/skins/skin-blue.min.css">
  
    <!-- jQuery 3 -->
    <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/adminlte.min.js"></script>
    
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include("cabecalho.php");?>
  <?php include("slidebar.php");?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        UUX-Posts
        <small>Versão 2.0</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="../../../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Avaliações</li><li class="active">Interpretação dos Resultados</li>
      </ol>
    </section>

    <section class="content">
        <div class="col-md-6">
          <div class="box box-solid">
              <div class="box box-widget widget-user">
                <div class="widget-user-header bg-black" style="height: 250px;
                     background: url('../../../images/InterpretacaoResultados.svg') center center; position: relative">
                    <div style="width: 100%; left: 0; top: 0; background-color: #3c8dbc;  position: absolute;">
                        <h3 style="color: white; padding-left: 15px; padding-top: 10px" class="widget-user-username">Etapa 4 - Interpretação dos Resultados</h3>
                        <h5 style="color: white; padding-left: 15px;" class="widget-user-desc">Metodologia MALTU</h5>  
                    </div>
                </div>
                <div class="box-footer" style="padding-top: 10px;">
                    <h4 style="text-align: center">Nessa etapa os resultados de classificação são apresentados, e o avaliador poderá relaciona-los de acordo com os objetivos de avaliação. </h4>
                </div>
                  <!-- /.row -->
                </div>
            </div>
        </div>
        
        <div class="col-md-6" id="etapas">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-list-ol" style="font-size: 20px"></i>
                    <h3 class="box-title">ETAPAS DE AVALIAÇÃO</h3>
                </div>
                <div class="box-body">
                    <ul class="timeline">
                        <li>
                          <i class="fa fa-eercast bg-yellow"></i>
                          <div class="timeline-item">
                              <h3 class="timeline-header">ETAPA 1 - Definição do contexto de avaliação</h3>
                          </div>
                        </li>
                        
                        <li>
                          <i class="fa fa-cloud-download bg-yellow"></i>
                          <div class="timeline-item">
                              <h3 class="timeline-header">ETAPA 2 - Extração das PRUs</h3>
                          </div>
                        </li>
                        
                        <li>
                          <i class="fa fa-check-circle-o bg-yellow"></i>
                          <div class="timeline-item">
                            <h3 class="timeline-header">ETAPA 3 - Classificação das PRUs</h3>
                          </div>
                        </li>
                        
                        <li>
                          <i class="fa fa-bar-chart bg-yellow"></i>
                          <div class="timeline-item">
                            <h3 class="timeline-header"><strong>ETAPA 4 - Interpretação dos resultados</strong></h3>
                          </div>
                        </li>
                        
                        <li>
                          <i class="fa fa-align-justify bg-yellow"></i>
                          <div class="timeline-item">
                            <h3 class="timeline-header">ETAPA 5 - Relato dos resultados</h3>
                          </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div style="padding-bottom: 10px;">
            <button type="submit" class="btn btn-info" onclick="proximo()" style="width: 100%; margin-right: 10px;">Próximo</button>
        </div>
        <a style="color: #ecf0f5">'</a>
    </section>
  </div>

  <?php include("../../../rodape.php");?>

</div>
</body>

<script>
    $(".alert-dismissible").fadeTo(7000, 500).slideUp(500, function(){
        $(".alert-dismissible").alert('close');
    });
    
    function proximo(){
        window.location.href = "escolhaDadosResultados.php";
    }
</script>

<style>
@media(max-width: 991px){
    #etapas {
        display: none;  
      }
}    
</style>
</html>
