<?php
include '../verificarSessao.class';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>UUX-Posts | Fim da Classificação</title>
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
              <section class="content text-center">
                  <form action="../../../index.php" method="POST">
                      <img class="img-responsive center-block" src="../../../images/classificadoresFelizes.png" style="width: 450px">
                      <h3>Parabéns! Você já classificou todas as suas postagens</h3>
                      <h4>Antes de continuar, você deverá aguardar a validação de classificação para visualizar os resultados (Etapa 4) e fornecer suas percepções de classificação (Etapa 5)</h4>
                      <button type="submit" class="btn btn-success center-block">Voltar para o início</button>
                  </form>
              </section>
            </div>
            
            <?php include("../../../rodape.php");?>
        </div>
    </body>
</html>
